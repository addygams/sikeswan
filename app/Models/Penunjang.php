<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penunjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'foreign',
        'nama',
        'foto'
    ];
}
