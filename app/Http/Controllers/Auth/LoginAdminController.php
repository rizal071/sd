<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
    return redirect()->intended('/admin/dashboard');
}

    return back()->withErrors(['email' => 'Login gagal. Cek email dan password!']);
}

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}

