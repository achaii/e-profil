<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Unitkerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('unit_kerja')->nullable();
            $table->string('kategori_unit_kerja')->nullable();
            $table->bigInteger('id_unit_kerja')->nullable();
            $table->bigInteger('id_sort')->nullable();
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
        Schema::drop('unit_kerja');
    }
}
