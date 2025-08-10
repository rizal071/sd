@extends('frontend.layouts.app')

@section('title', $berita->judul)

@section('content')

    <style>
        .berita-isi p {
            margin-bottom: 1rem;
            text-align: justify;
        }

        .hero-image {
            max-height: 400px;
            width: auto;
            max-width: 100%;
            border-radius: 12px;
            display: block;
            margin: 0 auto;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: #f1f1f1;
            border: none;
            color: #333;
            padding: 10px 18px;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-back:hover {
            background-color: #e2e6ea;
            transform: translateX(-2px);
            color: #0d6efd;
        }
    </style>

    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="fw-bold">{{ $berita->judul }}</h1>
                <p class="text-muted mb-4">
                    <i class="bi bi-calendar-event me-1"></i>
                    Diterbitkan pada {{ $berita->tanggal_indo ?? $berita->tanggal }}
                </p>
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="shadow hero-image mb-4" alt="{{ $berita->judul }}">
            </div>

            <div class="col-lg-10">
                <div class="berita-isi" style="line-height: 1.9; font-size: 1.1rem;">
                    {!! $berita->isi !!}
                </div>

                <div class="mt-5">
                    <a href="{{ route('frontend.berita') }}" class="btn-back">
                        <i class="bi bi-arrow-left-circle"></i>
                        Kembali ke Daftar Berita
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

@endsection
