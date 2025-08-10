<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Summernote CSS/JS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <style>
        body {
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s ease;
            z-index: 1050;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
        }

        .sidebar .nav-link {
            color: white;
            padding: 1rem;
            display: flex;
            align-items: center;
            font-weight: 500;
            transition: background 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .sidebar .nav-icon {
            margin-right: 10px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }
        }

        .overlay {
            display: none;
            position: fixed;
            z-index: 1040;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .overlay.show {
            display: block;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar text-white p-3">
        <div class="text-center fs-5 fw-bold py-3 border-bottom">
            📘 SD Admin
        </div>

        <ul class="nav flex-column mt-3">
            <li class="nav-item mb-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active fw-bold' : '' }}">
                    🏠 Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.ppdb') }}"
                    class="nav-link {{ request()->routeIs('admin.ppdb') ? 'active fw-bold' : '' }}">
                    👨‍🏫 Data Siswa
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.berita') }}"
                    class="nav-link {{ request()->routeIs('admin.berita') ? 'active fw-bold' : '' }}">
                    📰 Berita
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.galeri') }}"
                    class="nav-link {{ request()->routeIs('admin.galeri') ? 'active fw-bold' : '' }}">
                    🖼️ Galeri
                </a>
            </li>
        </ul>

        <form action="{{ route('admin.logout') }}" method="POST" class="mt-auto">
            @csrf
            <button class="btn btn-outline-light btn-sm w-100 mt-4">🔓 Logout</button>
        </form>
    </div>

    <!-- Overlay for mobile -->
    <div id="overlay" class="overlay"></div>

    <!-- Main Content -->
    <div id="mainContent" class="main-content">
        <nav class="navbar navbar-light bg-white shadow-sm mb-4">
            <div class="container-fluid">
                <button class="btn btn-outline-primary d-md-none" id="toggleSidebar">☰</button>
                <span class="ms-auto">👋 Halo, {{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
            </div>
        </nav>

        {{-- Konten Dashboard --}}
        <h4 class="mb-4">Dashboard Admin</h4>

        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="{{ route('admin.ppdb') }}" class="text-decoration-none">
                    <div class="card border-0 shadow text-bg-primary hover-card">
                        <div class="card-body text-white">
                            <h5>👨‍🎓 Siswa</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('admin.berita') }}" class="text-decoration-none">
                    <div class="card border-0 shadow text-bg-success hover-card">
                        <div class="card-body text-white">
                            <h5>📰 Berita</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('admin.galeri') }}" class="text-decoration-none">
                    <div class="card border-0 shadow text-bg-warning hover-card">
                        <div class="card-body text-white">
                            <h5>🖼️ Galeri</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        {{-- Optional yield section --}}
        @yield('content')

    </div>



    <!-- Script Toggle Sidebar -->
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    </script>

</body>

</html>
