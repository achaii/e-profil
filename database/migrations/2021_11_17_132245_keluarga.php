<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Keluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_keluarga', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip_baru')->nullable();
            $table->string('nama_keluarga')->nullable();
            $table->string('tempat_lahir_keluarga')->nullable();
            $table->string('tanggal_lahir_keluarga')->nullable();
            $table->string('status_keluarga')->nullable();
            $table->bigInteger('nomor_ktp_keluarga')->nullable();
            $table->string('pendidikan_keluarga')->nullable();
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
        Schema::drop('riwayat_keluarga');
    }
}
