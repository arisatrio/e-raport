<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKKelasSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_kelas_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('k_kelas_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nisn');
            $table->string('nama_siswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('k_kelas_siswas');
    }
}
