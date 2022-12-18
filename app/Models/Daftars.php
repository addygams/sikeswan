<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftars extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_pendaftaran',
        'tanggal',
        'no',
        'nama',
        'ktp',
        'hp',
        'jenis_pengobatan',
        'jenis_hewan',
        'hewan_lain',
        'nama_hewan',
        'nama_hewan2',
        'nama_hewan3',
        'gejala'
    ];
}
