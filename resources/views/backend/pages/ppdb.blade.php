@extends('backend.dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>📄 Data PPDB</h4>
        <div>
            <a href="{{ route('admin.ppdb.export.pdf') }}" class="btn btn-danger btn-sm">⬇️ Cetak PDF</a>
        </div>
    </div>
    <form method="GET" action="{{ route('admin.ppdb') }}" class="mb-3 row g-2">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari nama / NISN / alamat"
                value="{{ request('search') }}">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" type="submit">🔍 Cari</button>
        </div>
    </form>

    {{-- Data Table --}}
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NISN</th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>Orang Tua</th>
                <th>No. HP</th>
                <th>Pekerjaan</th>
                <th>Pendidikan</th>
                <th>Penghasilan</th>
                <th>Aksi</th> {{-- Tambah kolom Aksi --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftar as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->tgl_lahir }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->nama_ortu }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ $item->pekerjaan_ortu }}</td>
                    <td>{{ $item->pendidikan_ortu }}</td>
                    <td>{{ $item->penghasilan_ortu }}</td>
                    <td>
                        {{-- Tombol Lihat (modal) --}}
                        <button class="btn btn-info btn-sm btn-view" data-bs-toggle="modal" data-bs-target="#detailModal"
                            data-nama="{{ $item->nama }}" data-nisn="{{ $item->nisn }}"
                            data-tgl_lahir="{{ $item->tgl_lahir }}" data-alamat="{{ $item->alamat }}"
                            data-nama_ortu="{{ $item->nama_ortu }}" data-telepon="{{ $item->telepon }}"
                            data-pekerjaan="{{ $item->pekerjaan_ortu }}" data-pendidikan="{{ $item->pendidikan_ortu }}"
                            data-penghasilan="{{ $item->penghasilan_ortu }}">👁️</button>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('admin.ppdb.destroy', $item->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">🗑️</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Modal View --}}
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pendaftar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody id="modalDetailBody">
                            {{-- Akan diisi lewat JavaScript --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn-view');
            const tbody = document.getElementById('modalDetailBody');

            buttons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const data = {
                        'Nama Siswa': this.dataset.nama,
                        'NISN Siswa': this.dataset.nisn,
                        'Tanggal Lahir': this.dataset.tgl_lahir,
                        'Alamat': this.dataset.alamat,
                        'Nama Orang Tua': this.dataset.nama_ortu,
                        'Telepon orang tua': this.dataset.telepon,
                        'Pekerjaan orang tua': this.dataset.pekerjaan,
                        'Pendidikan orang tua': this.dataset.pendidikan,
                        'Penghasilan orang tua': this.dataset.penghasilan,
                    };

                    tbody.innerHTML = '';
                    for (const [key, value] of Object.entries(data)) {
                        tbody.innerHTML += `<tr><th>${key}</th><td>${value}</td></tr>`;
                    }
                });
            });
        });
    </script>
@endsection
