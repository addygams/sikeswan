<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarAktif extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_pendaftaran',
        'tanggal',
        'no',
        'nama',
        'hp',
        'kecamatan',
        'kelurahan',
        'kelompok',
        'jenis_hewan',
        'hewan_lain',
        'jenkel',
        'umur',
        'status',
        'ciri_khusus',
        'gejala',
    ];
}
