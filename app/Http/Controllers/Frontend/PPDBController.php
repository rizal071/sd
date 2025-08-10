<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ppdb;

class PPDBController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'nisn' => 'nullable|string',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'nama_ortu' => 'required|string',
            'telepon' => 'required|string',
            'pekerjaan_ortu' => 'nullable|string',
            'pendidikan_ortu' => 'nullable|string',
            'penghasilan_ortu' => 'nullable|string',
        ]);

        // Simpan ke database
        Ppdb::create($validated);

        // Redirect balik ke halaman dengan flash message
        return back()->with('success', 'Pendaftaran berhasil dikirim!');
    }
}
