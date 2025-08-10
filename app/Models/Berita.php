<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Berita extends Model
{
    protected $fillable = [
        'judul', 'isi', 'gambar', 'tanggal',
    ];

    public $timestamps = false; // karena kamu pakai kolom 'tanggal' sendiri

    // Accessor untuk format tanggal
    public function getTanggalIndoAttribute()
    {
        return Carbon::parse($this->tanggal)->translatedFormat('d F Y');
    }
}