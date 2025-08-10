<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nisn',
        'tgl_lahir',
        'alamat',
        'nama_ortu',
        'telepon',
        'pekerjaan_ortu',
        'pendidikan_ortu',
        'penghasilan_ortu',
    ];
}
