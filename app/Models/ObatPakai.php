<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatPakai extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'foreign',
        'id_obat',
        'nama_obat',
        'dosis_obat'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat','id','obat');
    }
}
