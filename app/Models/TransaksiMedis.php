<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiMedis extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_aktif',
        'id_pasif',
        'id_tenagamedis',
        'jenis'
    ];
}
