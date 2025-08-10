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
        <h4>🖼️ Galeri Sekolah</h4>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalGaleri">➕ Tambah Foto</button>
    </div>
    <form action="{{ route('admin.galeri') }}" method="GET" class="input-group mb-4" style="max-width: 400px;">
        <input type="text" name="q" class="form-control" placeholder="Cari judul atau deskripsi..."
            value="{{ request('q') }}">
        <button class="btn btn-outline-primary" type="submit">Cari</button>
    </form>
    @if (request('q'))
        <p class="text-muted">Hasil pencarian untuk: <strong>{{ request('q') }}</strong></p>
    @endif
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($galeris as $galeri)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top" alt="{{ $galeri->judul }}"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="card-title">{{ $galeri->judul }}</h6>
                        <p class="text-muted small mb-1">{{ $galeri->deskripsi }}</p>
                        <small class="text-muted">📅
                            {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}</small>
                        <div class="d-flex mt-2 justify-content-between">
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalEditGaleri{{ $galeri->id }}">✏️ Edit</button>

                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalHapusGaleri{{ $galeri->id }}">🗑️ Hapus</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Galeri -->
            <div class="modal fade" id="modalEditGaleri{{ $galeri->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Foto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control" value="{{ $galeri->judul }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Kegiatan</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ $galeri->tanggal }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ganti Gambar (opsional)</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>



            <!-- Modal Hapus Galeri -->
            <div class="modal fade" id="modalHapusGaleri{{ $galeri->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title text-danger">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin ingin menghapus <strong>{{ $galeri->judul }}</strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Modal Tambah Galeri --}}
    <div class="modal fade" id="modalGaleri" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('admin.galeri.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">➕ Tambah Foto Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Foto</label>
                        <input type="text" name="judul" class="form-control"
                            placeholder="Contoh: Kegiatan Literasi" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Unggah Gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
                        <div class="form-text">Format: jpg, png. Max: 2MB</div>
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
                {{ $galeris->links('pagination::bootstrap-5') }}
            </ul>
        </nav>
    </div>





    <!-- Bootstrap 5 JS Bundle (wajib untuk modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
