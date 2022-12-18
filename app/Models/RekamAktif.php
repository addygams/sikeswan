<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamAktif extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'no',
        'nama',
        'ktp',
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
        'dokter',
        'paramedik',
        'anamnesa',
        'diagnosa',
        'terapi',
        'dosis_terapi',
        'tambahan',
        'catatan',
        'isikhnas'
    ];

    
}
