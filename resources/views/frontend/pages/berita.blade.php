@extends('frontend.layouts.app')

@section('title', 'Berita & Artikel')

@section('content')
    <style>
        /* Heading H1 */
        .heading-with-line::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            border-radius: 4px;
            background: linear-gradient(to right, #003366, #0059b3);
            /* Biru gelap gradasi */
            transition: width 0.4s ease;
        }

        .heading-with-line:hover::after {
            width: 120px;
        }

        /* Card */
        .card-title {
            min-height: 3rem;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .card {
            transition: transform 0.3s ease;
            overflow: hidden;
            /* <- Penting untuk efek zoom */
            border-radius: 0.5rem;
        }

        .card-img-top {
            transition: transform 0.4s ease;
            object-fit: cover;
            height: 200px;
            width: 100%;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .berita-section h1 {
            font-size: 2.5rem;
        }

        .pagination {
            justify-content: center;
        }

        .search-bar input {
            border-radius: 30px;
            padding-left: 20px;
        }

        .search-bar .btn {
            border-radius: 30px;
        }

        /* Navigasi */
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
    </style>


    <div class="container berita-section" style="margin-top: 120px; margin-bottom: 100px;">
        <div class="text-center mb-4 fade-in">
            <h1 class="fw-bold position-relative d-inline-block heading-with-line">Berita & Artikel</h1>
            <p class="text-muted mt-2">Informasi terbaru seputar kegiatan dan pengumuman di SD Hambalang 05</p>
        </div>

        {{-- Search Bar --}}
        <div class="row justify-content-center mb-5 fade-in">
            <div class="col-md-8">
                <form action="" method="GET" class="search-bar d-flex">
                    <input type="text" name="q" class="form-control shadow-sm me-2" placeholder="Cari berita...">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-search"></i>
                        <span>Cari</span>
                    </button>
                </form>
            </div>
        </div>

        {{-- Daftar 9 Berita --}}
        <div class="row g-4">
            @for ($i = 1; $i <= 9; $i++)
                <div class="col-md-4 fade-in" style="animation-delay: {{ $i * 0.1 }}s;">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('assets/images/berita/berita' . $i . '.jpg') }}" class="card-img-top"
                            alt="Berita {{ $i }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Judul Berita {{ $i }}</h5>
                            <p class="text-muted small">31 Juli 2025 • Admin</p>
                            <p class="card-text">Ringkasan singkat berita nomor {{ $i }} mengenai kegiatan
                                penting di sekolah.</p>
                            <a href="{{ url('/berita/detail') }}" class="btn btn-outline-primary mt-auto">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        {{-- Navigasi Pagination Dummy --}}
        <div class="mt-5">
            <nav>
                <ul class="pagination justify-content-center custom-pagination">
                    <li class="page-item disabled">
                        <a class="page-link">← Sebelumnya</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Selanjutnya →</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
