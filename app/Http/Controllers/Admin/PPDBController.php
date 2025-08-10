<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PPDBController extends Controller
{
    public function index(Request $request)
    {
        $query = Ppdb::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nisn', 'like', '%' . $request->search . '%')
                  ->orWhere('alamat', 'like', '%' . $request->search . '%');
        }

        $pendaftar = $query->latest()->get();
        return view('backend.pages.ppdb', compact('pendaftar'));
    }

    public function destroy($id)
    {
        $data = Ppdb::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function exportPdf()
    {
        $pendaftar = Ppdb::all();
        $pdf = Pdf::loadView('backend.pages.ppdb-pdf', compact('pendaftar'));
        return $pdf->download('data-ppdb.pdf');
    }
}
