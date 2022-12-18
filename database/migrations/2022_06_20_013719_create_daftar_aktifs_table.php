<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarAktifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_aktifs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('no');
            $table->string('nama');
            $table->string('hp');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kelompok');
            $table->string('jenis_hewan');
            $table->string('hewan_lain');
            $table->string('jenkel');
            $table->string('umur');
            $table->string('jenis_pengobatan');
            $table->string('ciri_khusus');
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
        Schema::dropIfExists('daftar_aktifs');
    }
}
