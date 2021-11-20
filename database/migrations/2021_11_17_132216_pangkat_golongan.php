<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PangkatGolongan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pangkat_golongan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip_baru')->nullable();
            $table->string('pangkat_golongan')->nullable();
            $table->string('tanggal_surat_pangkat_golongan')->nullable();
            $table->string('nomor_surat_pangkat_golongan')->nullable();
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
        Schema::drop('riwayat_pangkat_golongan');
    }
}
