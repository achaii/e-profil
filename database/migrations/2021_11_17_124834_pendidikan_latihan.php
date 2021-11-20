<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendidikanLatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pendidikan_non_formal', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip_baru')->nullable();
            $table->string('nama_diklat')->nullable();
            $table->string('tanggal_diklat_awal')->nullable();
            $table->string('tanggal_diklat_akhir')->nullable();
            $table->string('kategori')->nullable();
            $table->string('nomor_surat_diklat')->nullable();
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
        Schema::drop('riwayat_pendidikan_non_formal');
    }
}
