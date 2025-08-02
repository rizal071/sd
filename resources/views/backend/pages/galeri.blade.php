@extends('backend.dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>🖼️ Galeri Sekolah</h4>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalGaleri">➕ Tambah Foto</button>
    </div>

    <div class="row">
        {{-- Galeri Dummy --}}
        @for ($i = 1; $i <= 6; $i++)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="https://via.placeholder.com/600x400?text=Kegiatan+{{ $i }}" class="card-img-top"
                        alt="Foto {{ $i }}">
                    <div class="card-body">
                        <h6 class="card-title">Kegiatan {{ $i }}</h6>
                        <p class="text-muted small mb-2">
                            Kegiatan ini merupakan bagian dari program pembelajaran kreatif di sekolah.
                        </p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-warning">✏️ Edit</button>
                            <button class="btn btn-sm btn-danger">🗑️ Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    {{-- Modal Tambah Galeri --}}
    <div class="modal fade" id="modalGaleri" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">➕ Tambah Foto Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Foto</label>
                        <input type="text" class="form-control" placeholder="Contoh: Kegiatan Literasi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" rows="3" placeholder="Contoh: Kegiatan membaca di taman sekolah..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unggah Gambar</label>
                        <input type="file" class="form-control">
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
@endsection
