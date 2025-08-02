<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    public function index()
    {
        return view('backend.pages.galeri');
    }
}
