<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_mapels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('m_jurusan_id')->nullable();
            $table->unsignedBigInteger('guru_id');
            $table->string('golongan');
            $table->string('mapel');
            $table->string('tingkat');
            $table->integer('kkm');
            $table->timestamps();
            
            $table->foreign('m_jurusan_id')->references('id')->on('m_jurusans');
            $table->foreign('guru_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_mapels');
    }
}
