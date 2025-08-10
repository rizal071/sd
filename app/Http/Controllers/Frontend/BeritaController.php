<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $query = Berita::query();

        if (request('q')) {
            $search = request('q');
            $query->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');
        }

        $beritas = $query->orderBy('tanggal', 'desc')->paginate(9);

        return view('frontend.pages.berita', compact('beritas'));
    }

    public function show($id)
{
    $berita = Berita::findOrFail($id); // Ganti dari where('slug', $id)
    return view('frontend.pages.beritashow', compact('berita'));
}

}

