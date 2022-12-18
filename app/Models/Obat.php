<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_golongan',
        'nama',
        'jenis',
        'kapasitas',
        'stok',
        'satuan',
        'sisa'
    ];

    // public function golongan()
    // {
    //     return $this->belongsTo(Golongan::class, 'id_golongan');
    // }

    public function pakaiobat()
    {
        return $this->hasMany(ObatPakai::class, 'id', 'id_obat');
    }
}
