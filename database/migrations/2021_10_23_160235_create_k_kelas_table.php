<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('m_tahun_ajaran_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('m_jurusan_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('wali_kelas_id');
            $table->string('tingkat');
            $table->string('ruangan');
            $table->timestamps();

            $table->foreign('wali_kelas_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('k_kelas');
    }
}
