<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('no');
            $table->string('nama');
            $table->string('ktp');
            $table->string('hp');
            $table->string('jenis_pengobatan');
            $table->string('jenis_hewan');
            $table->string('hewan_lain');
            $table->string('nama_hewan');
            $table->string('nama_hewan2');
            $table->string('nama_hewan3');
            $table->string('gejala');
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
        Schema::dropIfExists('daftars');
    }
}
