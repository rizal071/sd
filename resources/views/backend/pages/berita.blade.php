@extends('backend.dashboard')

@section('content')
    <style>
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
    </style>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>📰 Berita Sekolah</h4>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahBerita">➕ Tambah
            Berita</button>
    </div>
    <form action="{{ route('admin.berita') }}" method="GET" class="input-group mb-4" style="max-width: 400px;">
        <input type="text" name="q" class="form-control" placeholder="Cari judul atau deskripsi..."
            value="{{ request('q') }}">
        <button class="btn btn-outline-primary" type="submit">Cari</button>
    </form>
    @if (request('q'))
        <p class="text-muted">Hasil pencarian untuk: <strong>{{ request('q') }}</strong></p>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    <div class="row">
        @foreach ($beritas as $berita)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100 border-0">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}">
                    <div class="card-body d-flex flex-column">
                        <h6 class="fw-bold">{{ $berita->judul }}</h6>
                        <small
                            class="text-muted mb-2">{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}</small>
                        <p class="flex-grow-1">
                            {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100, '...') }}
                        </p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalEditBerita{{ $berita->id }}">✏️ Edit</button>

                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus berita ini?')">🗑️
                                    Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Edit Berita --}}
            <div class="modal fade" id="modalEditBerita{{ $berita->id }}" tabindex="-1" aria-labelledby="modalEditLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST"
                        enctype="multipart/form-data" class="modal-content">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">✏️ Edit Berita</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Judul Berita</label>
                                <input type="text" class="form-control" name="judul" value="{{ $berita->judul }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ganti Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                                <div class="form-text">Kosongkan jika tidak ingin mengubah gambar.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Isi Berita</label>
                                <textarea class="form-control summernote" name="isi">{{ $berita->isi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Terbit</label>
                                <input type="date" class="form-control" name="tanggal" value="{{ $berita->tanggal }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Batal</button>
                            <button type="submit" class="btn btn-success">💾 Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Modal Tambah Berita --}}
    <div class="modal fade" id="modalTambahBerita" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data"
                class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">➕ Tambah Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" class="form-control" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Utama</label>
                        <input type="file" class="form-control" name="gambar" required>
                        <div class="form-text">Format gambar: JPG/PNG. Ukuran maks: 2MB</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea class="form-control summernote" name="isi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Terbit</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Batal</button>
                    <button type="submit" class="btn btn-primary">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-5">
        <nav>
            <ul class="pagination justify-content-center custom-pagination">
                {{ $beritas->links('pagination::bootstrap-5') }}
            </ul>
        </nav>
    </div>

    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('.summernote').summernote({
                height: 300
            });
        });
    </script>
@endsection
