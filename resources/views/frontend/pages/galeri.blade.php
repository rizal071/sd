@extends('frontend.layouts.app')

@section('title', 'Galeri')

@section('content')
    <style>
        .heading-with-line::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            border-radius: 4px;
            background: linear-gradient(to right, #3366cc, #66a3ff);
            transition: width 0.4s ease;
        }

        .heading-with-line:hover::after {
            width: 120px;
        }

        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
            transition: box-shadow 0.3s ease;
        }

        .gallery-card:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .gallery-card img {
            height: 220px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.4s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.07);
        }

        .gallery-card .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 16px;
            background: linear-gradient(to top, rgba(0, 82, 245, 0.95), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-card:hover .overlay {
            opacity: 1;
        }

        .overlay-text {
            text-align: left;
            color: white;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .gallery-card:hover .overlay-text {
            opacity: 1;
            transform: translateY(0);
        }

        .search-bar input {
            border-radius: 30px;
            padding-left: 20px;
        }

        .search-bar .btn {
            border-radius: 30px;
        }

        .custom-pagination .page-item .page-link {
            border: none;
            color: #0d6efd;
            padding: 0.6rem 1.1rem;
            margin: 0 4px;
            border-radius: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .custom-pagination .page-item .page-link:hover {
            background-color: #0d6efd;
            color: white;
        }

        .custom-pagination .page-item.active .page-link {
            background-color: #0d6efd;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .custom-pagination .page-item.disabled .page-link {
            color: #ccc;
            pointer-events: none;
            background-color: #f8f9fa;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-card {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        /* Overlay Text Styling Final */
        .gallery-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .gallery-desc {
            font-size: 0.85rem;
            margin-bottom: 4px;
            line-height: 1.3;
            color: #f0f0f0;
        }

        .gallery-date {
            font-size: 0.8rem;
            color: #fff;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }
    </style>

    <div class="container" style="margin-top: 120px; margin-bottom: 100px;">
        <!-- Heading -->
        <div class="text-center mb-4">
            <h1 class="fw-bold position-relative d-inline-block heading-with-line">Galeri</h1>
            <p class="text-muted mt-2">Kumpulan Dokumentasi SD 05 Hambalang</p>
        </div>

        <!-- Search Bar -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <form action="{{ route('frontend.galeri') }}" method="GET" class="search-bar d-flex">
                    <input type="text" name="q" class="form-control shadow-sm me-2" placeholder="Cari galeri..."
                        value="{{ request('q') }}">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-search"></i>
                        <span>Cari</span>
                    </button>
                </form>
            </div>
        </div>
        @if (request('q'))
            <div class="text-center mb-4">
                <p class="text-muted">Hasil pencarian untuk: <strong>{{ request('q') }}</strong></p>
            </div>
        @endif

        <!-- Gallery Grid -->
        <div class="row">
            @forelse ($galeris as $i => $galeri)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card gallery-card border-0 shadow-sm fade-in-card"
                        style="animation-delay: {{ ($i + 1) * 0.1 }}s;">
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}">
                        <div class="overlay">
                            <div class="overlay-text">
                                <div class="gallery-title">{{ $galeri->judul }}</div>
                                <div class="gallery-desc">
                                    {{ $galeri->deskripsi ?: 'SD Negeri 05 Hambalang' }}
                                </div>
                                <div class="gallery-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    <p>Belum ada foto galeri yang ditambahkan.</p>
                </div>
            @endforelse

            <div class="mt-5">
                <nav>
                    <ul class="pagination justify-content-center custom-pagination">
                        {{ $galeris->links('pagination::bootstrap-5') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
