<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->string('password_look');
            $table->string('nip_baru');
            $table->string('nip_lama');
            $table->integer('nomor_npwp')->nullable();
            $table->string('tanggal_npwp')->nullable();
            $table->integer('nomor_ktp')->nullable();
            $table->integer('nomor_bpjs')->nullable();
            $table->string('tanggal_bpjs')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('gander')->nullable();
            $table->string('tampat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            //$table->string('golongan_pangkat')->nullable();
            //$table->string('pendidikan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('sub_unit_kerja')->nullable();
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
        Schema::dropIfExists('users');
    }
}
