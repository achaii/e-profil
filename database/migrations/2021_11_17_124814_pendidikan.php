<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pendidikan_formal', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip_baru')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('tingkat')->nullable();
            $table->integer('tahun_lulus')->nullable();
            $table->string('jurusan')->nullable();
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
        Schema::drop('riwayat_pendidikan_formal');
    }
}
