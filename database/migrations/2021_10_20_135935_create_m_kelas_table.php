<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('m_jurusan_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('tingkat');
            $table->string('ruangan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_kelas');
    }
}
