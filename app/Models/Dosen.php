<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'nama',
        'nidn',
        'jabatan_struktural',
        'jabatan_fungsional',
        'kuota',
        'jumlah_publikasi',
        'ketersediaan_waktu'
    ];
}
