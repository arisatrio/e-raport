<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRCatatanSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_catatan_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('m_tahun_ajaran_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('k_kelas_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('murid_id');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('murid_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_catatan_siswas');
    }
}
