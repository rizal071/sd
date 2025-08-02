<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PPDBController extends Controller
{
    public function submit(Request $request)
    {
        // Validasi input (contoh)
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        // Simpan ke database atau kirim email atau lainnya
        // Untuk sementara, kita hanya return data yang dikirim
        return redirect()->route('ppdb')->with('success', 'Pendaftaran berhasil dikirim!');
    }
}
