<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamAktifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_aktifs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('no');
            $table->string('nama');
            $table->string('ktp');
            $table->string('hp');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kelompok');
            $table->string('jenis_hewan');
            $table->string('hewan_lain');
            $table->string('nama_hewan');
            $table->string('nama_hewan2');
            $table->string('nama_hewan3');
            $table->string('jenkel');
            $table->integer('umur');
            $table->integer('status');
            $table->string('gejala');
            $table->string('dokter');
            $table->string('paramedik');
            $table->string('anamnesa');
            $table->string('diagnosa');            
            $table->string('terapi');
            $table->integer('dosis_terapi');
            $table->string('tambahan');
            $table->string('catatan');
            $table->string('isikhnas');
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
        Schema::dropIfExists('rekam_aktifs');
    }
}
