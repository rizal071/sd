<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
   public function index(Request $request)
{
    Carbon::setLocale('id');

    $query = Galeri::query();

    // Jika ada input pencarian (q), filter berdasarkan judul atau deskripsi
    if ($request->has('q') && $request->q != '') {
        $query->where('judul', 'like', '%' . $request->q . '%')
              ->orWhere('deskripsi', 'like', '%' . $request->q . '%');
    }

    // Ambil data terbaru + paginasi
    $galeris = $query->orderBy('tanggal', 'desc')->paginate(9);

    return view('frontend.pages.galeri', compact('galeris'));
}
}

