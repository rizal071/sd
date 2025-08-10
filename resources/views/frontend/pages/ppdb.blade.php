@extends('frontend.layouts.app')
@section('title', 'PPDB - SD Hambalang 05')
@section('content')

    <style>
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.7s ease;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .ppdb-section {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            padding: 60px 0;
        }

        .ppdb-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #0d6efd;
        }

        .info-card {
            background-color: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
        }

        .cta-button {
            font-size: 1.2rem;
            padding: 12px 30px;
            border-radius: 50px;
        }

        .contact-info {
            font-size: 1.1rem;
        }
    </style>

    {{-- Flash Message --}}

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <div class="ppdb-section" style="margin-top: 50px;">
        <div class="container text-center">
            <h1 class="ppdb-title mb-3 fade-up">Penerimaan Peserta Didik Baru</h1>
            <p class="text-muted fade-up">Tahun Ajaran {{ date('Y') }}/{{ date('Y') + 1 }}</p>

            <div class="row g-4 my-5 justify-content-center">
                <div class="col-md-5 fade-up">
                    <div class="info-card h-100">
                        <h4 class="text-primary"><i class="bi bi-file-earmark-check me-2"></i>Syarat Pendaftaran</h4>
                        <ul class="list-unstyled text-start">
                            <li>📄 Fotokopi Akta Kelahiran</li>
                            <li>👨‍👩‍👧 Fotokopi Kartu Keluarga</li>
                            <li>🖼️ Pas Foto ukuran 3x4 (2 lembar)</li>
                            <li>🎂 Usia minimal 6 tahun per 1 Juli</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 fade-up">
                    <div class="info-card h-100">
                        <h4 class="text-success"><i class="bi bi-diagram-3 me-2"></i>Alur Pendaftaran</h4>
                        <ol class="text-start">
                            <li>Isi formulir online</li>
                            <li>Unggah dokumen</li>
                            <li>Verifikasi panitia</li>
                            <li>Pengumuman seleksi</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="my-4 fade-up">
                <button class="btn btn-primary btn-lg cta-button" data-bs-toggle="modal" data-bs-target="#formPPDBModal">
                    <i class="bi bi-pencil-square me-2"></i> Daftar Sekarang
                </button>
            </div>

            <div class="fade-up">
                <p class="contact-info">🛎️ Info: <strong>0812-3456-7890</strong> | 📧 ppdb@sdhambalang05.sch.id</p>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mx-3 mt-4" role="alert" id="ppdbAlert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>






    {{-- Modal Form --}}
    <div class="modal fade" id="formPPDBModal" tabindex="-1" aria-labelledby="formPPDBLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" action="{{ route('ppdb.submit') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formPPDBLabel">Formulir Pendaftaran PPDB</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" name="nisn" class="form-control" id="nisn">
                    </div>
                    <div class="col-md-6">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required>
                    </div>
                    <div class="col-md-6">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                    </div>

                    {{-- Field Orang Tua akan digenerate oleh JS --}}
                    <div id="orangTuaFields" class="row g-3"></div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-send me-1"></i> Kirim Pendaftaran
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Animasi scroll
        const fadeEls = document.querySelectorAll('.fade-up');

        function animateOnScroll() {
            fadeEls.forEach(el => {
                const top = el.getBoundingClientRect().top;
                if (top < window.innerHeight - 100) {
                    el.classList.add('visible');
                }
            });
        }

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);

        // Auto-dismiss alert
        const alertBox = document.querySelector('.alert');
        if (alertBox) {
            setTimeout(() => {
                alertBox.classList.remove('show');
                alertBox.classList.add('fade');
            }, 4000);
        }

        // Field orang tua dengan JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const orangTuaFields = document.getElementById('orangTuaFields');

            const fields = [{
                    label: 'Nama Orang Tua/Wali',
                    name: 'nama_ortu',
                    type: 'text',
                    required: true
                },
                {
                    label: 'No. HP Orang Tua',
                    name: 'telepon',
                    type: 'tel',
                    required: true
                },
                {
                    label: 'Pekerjaan Orang Tua',
                    name: 'pekerjaan_ortu',
                    type: 'text'
                },
                {
                    label: 'Pendidikan Terakhir Orang Tua',
                    name: 'pendidikan_ortu',
                    type: 'select',
                    options: ['SD', 'SMP', 'SMA', 'Diploma', 'S1', 'S2']
                },
                {
                    label: 'Penghasilan Orang Tua',
                    name: 'penghasilan_ortu',
                    type: 'select',
                    options: ['< 1 juta', '1 - 3 juta', '3 - 5 juta', '> 5 juta']
                }
            ];

            fields.forEach(field => {
                const col = document.createElement('div');
                col.className = 'col-md-6';

                const label = document.createElement('label');
                label.className = 'form-label';
                label.textContent = field.label;
                label.setAttribute('for', field.name);

                let input;
                if (field.type === 'select') {
                    input = document.createElement('select');
                    input.className = 'form-select';
                    input.name = field.name;
                    input.id = field.name;

                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = '-- Pilih --';
                    input.appendChild(defaultOption);

                    field.options.forEach(opt => {
                        const option = document.createElement('option');
                        option.value = opt;
                        option.textContent = opt;
                        input.appendChild(option);
                    });

                } else {
                    input = document.createElement('input');
                    input.className = 'form-control';
                    input.type = field.type;
                    input.name = field.name;
                    input.id = field.name;
                    if (field.required) input.required = true;
                }

                col.appendChild(label);
                col.appendChild(input);
                orangTuaFields.appendChild(col);
            });
        });
    </script>

@endsection
