<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        // Urutkan berdasarkan tanggal_berita terbaru
      $beritas = Berita::orderBy('tanggal', 'desc')->take(3)->get();

        return view('frontend.pages.home', compact('beritas'));
    }
}
