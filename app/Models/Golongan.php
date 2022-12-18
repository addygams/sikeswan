<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $fillable=[
        'nama_golongan',
    ];

    public function obat()
    {
        return $this->hasMany(Obat::class, 'id_golongan', 'id_golongan');
    }
}
