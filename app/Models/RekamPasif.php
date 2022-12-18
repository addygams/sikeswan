<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamPasif extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'no',
        'nama',
        'ktp',
        'alamat',
        'kecamatan',
        'kelurahan',
        'hp',
        'jenis_pengobatan',
        'jenis_hewan',
        'hewan_lain',
        'nama_hewan',
        'nama_hewan2',
        'nama_hewan3',
        'jenkel',
        'umur',
        'spesifik',
        'gejala',
        'dokter',
        'paramedik',
        'anamnesa',
        'suhu',
        'pulsus',
        'frekuensi',
        'berat',
        'khusus',
        'diags',
        'penunjang',
        'diaga',
        'dosis_obat',
        'terapi',
        'dosis_terapi',
        'tambahan',
        'biaya',
        'isikhnas'
    ];

    // public function setDokterAttribute($value)
    // {
    //     $this->attributes['dokter'] = json_encode($value);
    // }

    public function getDokterAttribute($value)
    {
        return json_decode($this->attributes['dokter'], true);
    }
    
    // public function setParamedikAttribute($value)
    // {
    //     $this->attributes['paramedik'] = json_encode($value);
    // }

    public function getParamedikAttribute($value)
    {
        return json_decode($this->attributes['paramedik'], true);
    }

    public function ekstra_siswas()
    {
        return $this->hasMany(TenagaMedik::class,'id_tenagamedis');
    }

    public function kelurahan()
    {
        return $this->hasOne(TenagaMedik::class,'id_tenagamedis');
    }




}
