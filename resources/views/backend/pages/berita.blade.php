@extends('backend.dashboard')


@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>📰 Berita Sekolah</h4>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalBerita">➕ Tambah Berita</button>
    </div>

    <div class="row">
        @foreach ([1, 2, 3] as $i)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100 border-0">
                    <img src="https://via.placeholder.com/600x350?text=Berita+{{ $i }}" class="card-img-top"
                        alt="Berita {{ $i }}">
                    <div class="card-body d-flex flex-column">
                        <h6 class="fw-bold">Judul Berita {{ $i }}</h6>
                        <small class="text-muted mb-2">30 Juli 2025</small>
                        <p class="flex-grow-1">Cuplikan singkat isi berita {{ $i }}. Contoh berita sekolah
                            seperti lomba, upacara, kunjungan, dll.</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-warning btn-sm">✏️ Edit</button>
                            <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Modal Tambah Berita --}}
    <div class="modal fade" id="modalBerita" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">➕ Tambah Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" class="form-control" placeholder="Contoh: Kegiatan Literasi di SD">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea class="form-control" rows="5" placeholder="Tuliskan isi lengkap berita di sini..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unggah Gambar</label>
                        <input type="file" class="form-control">
                        <div class="form-text">Format gambar: JPG/PNG. Ukuran maks: 2MB</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Batal</button>
                    <button type="submit" class="btn btn-primary">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
