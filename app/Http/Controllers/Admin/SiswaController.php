<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        return view('backend.pages.siswa');
    }
}

