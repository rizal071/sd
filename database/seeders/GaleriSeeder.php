<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class GaleriSeeder extends Seeder
{
    public function run()
    {
        DB::table('galeris')->insert([
            [
                'judul' => 'Kegiatan Upacara Bendera',
                'gambar' => 'galeri/galeri1.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Pramuka',
                'gambar' => 'galeri/galeri2.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Lomba HUT RI',
                'gambar' => 'galeri/galeri3.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Kelas Bersih',
                'gambar' => 'galeri/galeri4.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Peringatan Hari Kartini',
                'gambar' => 'galeri/galeri5.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lomba Kebersihan',
                'gambar' => 'galeri/galeri6.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Ekstrakurikuler Seni',
                'gambar' => 'galeri/galeri7.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Literasi',
                'gambar' => 'galeri/galeri8.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Olahraga',
                'gambar' => 'galeri/galeri9.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kunjungan Tamu Sekolah',
                'gambar' => 'galeri/galeri10.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pentas Seni Akhir Tahun',
                'gambar' => 'galeri/galeri11.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Wisuda Siswa Kelas 6',
                'gambar' => 'galeri/galeri12.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Gotong Royong Sekolah',
                'gambar' => 'galeri/galeri13.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lomba Cerdas Cermat',
                'gambar' => 'galeri/galeri14.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pelatihan Guru',
                'gambar' => 'galeri/galeri15.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Outdoor Learning',
                'gambar' => 'galeri/galeri16.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Foto Bersama Siswa & Guru',
                'gambar' => 'galeri/galeri17.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Menanam Pohon',
                'gambar' => 'galeri/galeri18.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Senam Pagi Bersama',
                'gambar' => 'galeri/galeri19.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Simulasi Kebencanaan',
                'gambar' => 'galeri/galeri20.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Belajar di Alam',
                'gambar' => 'galeri/galeri21.jpg',
                'deskripsi' => 'SD Negeri 05 Hambalang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
