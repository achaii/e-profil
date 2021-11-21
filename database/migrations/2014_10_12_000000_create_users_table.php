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
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('password_look')->nullable();
            $table->string('nip_baru')->nullable();
            $table->string('nip_lama')->nullable();
            $table->integer('nomor_npwp')->nullable();
            $table->string('tanggal_npwp')->nullable();
            $table->integer('nomor_ktp')->nullable();
            $table->integer('nomor_bpjs')->nullable();
            $table->string('tanggal_bpjs')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('sub_unit_kerja')->nullable();
            $table->longText('picture')->nullable();
            $table->string('system_lock')->nullable();
            $table->string('access')->nullable();
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
