@extends('backend.dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>📄 Data PPDB</h4>
        <div>
            <button class="btn btn-success btn-sm me-1">⬇️ Export Excel</button>
            <button class="btn btn-danger btn-sm me-1">⬇️ Export PDF</button>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPPDB">➕ Tambah
                Pendaftar</button>
        </div>
    </div>

    {{-- Filter & Search --}}
    <form class="row g-2 mb-3">
        <div class="col-md-3">
            <select class="form-select" name="status">
                <option value="">🔍 Semua Status</option>
                <option>Diterima</option>
                <option>Menunggu</option>
                <option>Ditolak</option>
            </select>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" name="search" placeholder="Cari nama / NISN / sekolah">
        </div>
        <div class="col-md-2">
            <button class="btn btn-secondary w-100">🔍 Filter</button>
        </div>
    </form>

    {{-- Data Table --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Asal Sekolah</th>
                        <th>JK</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Status</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ahmad Ramadhan</td>
                        <td>1234567890</td>
                        <td>SDN 01 Sukamaju</td>
                        <td>L</td>
                        <td>Jl. Pendidikan No. 12</td>
                        <td>081234567890</td>
                        <td><span class="badge bg-success">Diterima</span></td>
                        <td>
                            <button class="btn btn-warning btn-sm">✏️</button>
                            <button class="btn btn-danger btn-sm">🗑️</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Siti Aisyah</td>
                        <td>0987654321</td>
                        <td>SDN 05 Harapan</td>
                        <td>P</td>
                        <td>Jl. Merdeka No. 45</td>
                        <td>082112223333</td>
                        <td><span class="badge bg-warning text-dark">Menunggu</span></td>
                        <td>
                            <button class="btn btn-warning btn-sm">✏️</button>
                            <button class="btn btn-danger btn-sm">🗑️</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah/Edit PPDB --}}
    <div class="modal fade" id="modalPPDB" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">➕ Tambah Pendaftar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NISN</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Asal Sekolah</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select">
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">No. HP</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>Diterima</option>
                            <option>Menunggu</option>
                            <option>Ditolak</option>
                        </select>
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
