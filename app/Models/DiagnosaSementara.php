<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosaSementara extends Model
{
    use HasFactory;

    protected $fillable = [
        'inisial','kepanjangan'
    ];
}
