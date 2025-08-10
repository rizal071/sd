<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class GaleriController extends Controller
{
   public function index(Request $request)
{
    Carbon::setLocale('id');

    $query = Galeri::query();

    if ($request->has('q') && $request->q != '') {
        $query->where('judul', 'like', '%' . $request->q . '%')
              ->orWhere('deskripsi', 'like', '%' . $request->q . '%');
    }

    $galeris = $query->orderBy('tanggal', 'desc')->paginate(9);

    return view('backend.pages.galeri', compact('galeris'));
}

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Set default deskripsi otomatis
        $request->merge(['deskripsi' => 'SD Negeri 05 Hambalang']);
        $path = $request->file('gambar')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'gambar' => $path,
        ]);

         return redirect()->route('admin.galeri')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date', // 🛠️ ini ditambahkan agar tanggal valid
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle gambar baru jika diunggah
        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($galeri->gambar);
            $path = $request->file('gambar')->store('galeri', 'public');
            $galeri->gambar = $path;
        }

        // Tetapkan data lainnya
        $galeri->judul = $request->judul;
        $galeri->tanggal = $request->tanggal;
        $galeri->deskripsi = $request->deskripsi ?: 'SD Negeri 05 Hambalang';
        $galeri->save();

        return redirect()->route('admin.galeri')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::disk('public')->delete($galeri->gambar);
        $galeri->delete();

         return redirect()->route('admin.galeri')->with('success', 'Foto berhasil dihapus!');
    }
}
