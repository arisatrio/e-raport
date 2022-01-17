<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMapelJurusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_mapel_jurusans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('m_jurusans_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('guru_id');
            $table->string('golongan');
            $table->string('mapel');
            $table->string('tingkat');
            $table->integer('kkm');
            $table->timestamps();
            
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
        Schema::dropIfExists('m_mapel_jurusans');
    }
}
