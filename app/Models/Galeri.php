<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ← tambahkan ini

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'gambar', 'tanggal'];
}
