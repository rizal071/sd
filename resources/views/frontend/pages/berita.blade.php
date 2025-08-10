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

        .img-zoom {
            transition: transform 0.5s ease;
        }

        .img-zoom:hover {
            transform: scale(1.1);
        }

        .berita-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .berita-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.1);
        }

        .berita-card .card-title {
            transition: color 0.3s;
        }

        .berita-card:hover .card-title {
            color: #0d6efd;
        }

        /* Button */
        .btn {
            margin: 15px;
            font-size: 16px;
            padding: 6px 14px;
            color: #0d6efd !important;
            background-color: white;
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(1, 36, 74, 0.2);
        }

        .btn:hover {
            color: white !important;
            background: linear-gradient(135deg, #3f8efc, #69aaff);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 123, 255, 0.4);
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
                <form action="{{ route('frontend.berita') }}" method="GET" class="search-bar d-flex">
                    <input type="text" name="q" class="form-control shadow-sm me-2" placeholder="Cari berita..."
                        value="{{ request('q') }}">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-search"></i>
                        <span>Cari</span>
                    </button>
                </form>
            </div>
        </div>




        <div class="row g-4">
            @forelse ($beritas as $berita)
                <div class="col-md-4 fade-in">
                    <div class="card berita-card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top"
                            alt="{{ $berita->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <p class="text-muted small">
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }} • Admin</p>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100) }}</p>
                        </div>
                        <div class="d-flex flex-column text-center mt-auto">
                            <a href="{{ route('frontend.beritashow', $berita->id) }}" class="btn">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    <p>Belum ada berita yang ditambahkan.</p>
                </div>
            @endforelse
        </div>
        {{-- Navigasi Pagination Dummy --}}
        <div class="mt-5">
            <nav>
                <ul class="pagination justify-content-center custom-pagination">
                    {{ $beritas->links('pagination::bootstrap-5') }}
                </ul>
            </nav>
        </div>
    </div>
@endsection
