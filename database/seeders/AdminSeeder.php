<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

DB::table('admins')->insert([
    'name' => 'Super Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('admin123'),
]);