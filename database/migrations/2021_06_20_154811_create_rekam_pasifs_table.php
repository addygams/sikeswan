<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamPasifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_pasifs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('no');
            $table->string('nama');
            $table->string('ktp');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->integer('hp');
            $table->string('jenis_pengobatan');
            $table->string('jenis_hewan');
            $table->string('hewan_lain');
            $table->string('nama_hewan');
            $table->string('nama_hewan2');
            $table->string('nama_hewan3');
            $table->string('jenkel');
            $table->string('umur');
            $table->string('spesifik');
            $table->string('gejala');
            $table->string('dokter');
            $table->string('paramedik');
            $table->string('anamnesa');
            $table->integer('suhu');
            $table->integer('pulsus');
            $table->integer('frekuensi');
            $table->float('berat');
            $table->string('khusus');
            $table->string('diags');
            $table->string('penunjang');
            $table->string('diaga');
            $table->string('terapi');
            $table->string('dosis_terapi');
            $table->string('tambahan');
            $table->string('catatan');
            $table->integer('biaya');
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
        Schema::dropIfExists('rekam_pasifs');
    }
}
