<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRNilaiSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_nilai_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('m_tahun_ajaran_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('k_kelas_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('murid_id');
            $table->unsignedBigInteger('mapel_id');
            $table->float('pengetahuan')->nullable();
            $table->float('keterampilan')->nullable();
            $table->float('nilai_akhir')->nullable();
            $table->string('predikat')->nullable();
            $table->string('sikap')->nullable();
            $table->timestamps();

            $table->foreign('murid_id')->references('id')->on('users');
            $table->foreign('mapel_id')->references('id')->on('m_mapels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_nilai_siswas');
    }
}
