@php
    $isHome = request()->is('/');
@endphp

<style>
    .navbar-custom {
        background-color: rgba(255, 255, 255, 0.2) !important;
        /* lebih transparan */
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        /* efek garis tipis kaca */
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        color: #ffffff;
    }

    .navbar .nav-link {
        font-weight: 500;
        transition: color 0.3s ease;
        color: rgb(255, 255, 255) !important;
    }

    .navbar .nav-link:hover {
        color: #0d6efd !important;
    }

    .navbar .nav-link.active {
        border-bottom: 2px solid #0d6efd;
        color: #0d6efd !important;
    }

    .navbar-brand span {
        color: #ffffff;
    }

    .navbar.scrolled {
        background-color: white !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar.scrolled .nav-link {
        color: #333 !important;
    }

    .navbar.scrolled .nav-link.active {
        color: #0d6efd !important;
        border-color: #0d6efd;
    }

    .navbar.scrolled .navbar-brand span {
        color: #0d6efd;
    }

    .navbar.scrolled .navbar-toggler i {
        color: #0d6efd;
    }

    .navbar:not(.navbar-custom) .nav-link {
        color: #333 !important;
    }

    .navbar:not(.navbar-custom) .navbar-brand span {
        color: #0d6efd;
    }

    .navbar:not(.navbar-custom) .nav-link.active {
        border-color: #0d6efd;
        color: #0d6efd !important;
    }

    .navbar:not(.navbar-custom) .navbar-toggler i {
        color: #0d6efd;
    }

    /* Tambahan: Toggle button styling */
    .navbar-toggler {
        color: #0d6efd;
        padding: 6px 10px;
        border-radius: 6px;
        background-color: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        transition: background-color 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .navbar-toggler:hover {
        background-color: rgba(255, 255, 255, 0.4);

    }
</style>

<nav class="navbar navbar-expand-lg fixed-top {{ $isHome ? 'navbar-custom' : 'bg-white shadow-sm' }}">
    <div class="container px-3 px-md-5 d-flex align-items-center justify-content-between">
        {{-- Logo --}}
        <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
            <img src="{{ asset('assets/logo/logosd.png') }}" alt="Logo SD" height="40" class="me-2">
            <span class="fs-5">SD Hambalang 05</span>
        </a>

        {{-- Toggle Button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-3 {{ $isHome ? 'text' : 'text-primary' }}"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse px-3 px-md-5" id="mainNavbar">
        <ul class="navbar-nav ms-auto gap-2 gap-lg-3 text-center text-lg-start py-3 py-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active fw-bold' : '' }}" href="/">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('profil') ? 'active fw-bold' : '' }}" href="/profil">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('galeri') ? 'active fw-bold' : '' }}" href="/galeri">Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('berita') ? 'active fw-bold' : '' }}" href="/berita">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-center gap-2 {{ request()->is('ppdb') ? 'active fw-bold' : '' }}"
                    href="/ppdb">
                    <i class="bi bi-pencil-square"></i>
                    <span>PPDB</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('kontak') ? 'active fw-bold' : '' }}" href="/kontak">Kontak</a>
            </li>
        </ul>
    </div>
</nav>

@if ($isHome)
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
@endif
