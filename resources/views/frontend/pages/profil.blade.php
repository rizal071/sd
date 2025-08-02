@extends('frontend.layouts.app')

@section('title', 'Profil Kami')

@section('content')


    <style>
        .animated-gradient {
            background: linear-gradient(-45deg, #0d47a1, #1976d2, #42a5f5, #0d47a1);
            background-size: 400% 400%;
            animation: gradientMove 10s ease infinite;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .hover-animate {
            transition: all 0.3s ease-in-out;
        }

        .hover-animate:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        }

        .custom-card {
            background: linear-gradient(135deg, #f5f7fa, #e4ecf3);
            border-radius: 20px;
            padding: 30px;
        }

        .custom-card h4 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .custom-card ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .custom-card ul li {
            position: relative;
            padding-left: 1.8rem;
            margin-bottom: 0.75rem;
        }

        .custom-card ul li::before {
            content: "✔";
            position: absolute;
            left: 0;
            color: #198754;
            font-weight: bold;
        }
    </style>

    {{-- Section Hero --}}
    <section class="text-white text-center animated-gradient" style="padding-top: 140px; padding-bottom: 100px;">
        <div class="container" data-aos="fade-down">
            <h1 class="fw-bold display-4">Profil Sekolah</h1>
            <p class="lead mb-0">Berita Terkini tentang LAZ Persatuan Islam</p>
        </div>
    </section>

    {{-- Card Profil Sekolah --}}
    <section class="bg-white py-5">
        <div class="container d-flex justify-content-center">
            <div class="w-100" style="max-width: 900px;">
                <div class="bg-light shadow rounded-4 overflow-hidden " data-aos="fade-up" data-aos-delay="100">

                    {{-- Bagian Atas --}}
                    <div class="p-4 text-center text-white animated-gradient hover-animate">
                        <img src="{{ asset('assets/logo/logosd.png') }}" alt="Logo SD"
                            class="rounded-circle border border-3 border-white mb-3"
                            style="width: 100px; height: 100px; object-fit: cover;">
                        <h3 class="fw-bold mb-2">SD Negeri Hambalang 05</h3>
                        <p class="mb-0">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            Jl. Raya Hambalang No.05, Kec. Citeureup, Kab. Bogor
                        </p>
                    </div>

                    {{-- Bagian Bawah --}}
                    <div class="p-4" data-aos="fade-right" data-aos-delay="200">
                        <p class="text-muted" style="text-align: justify;">
                            <strong>SDN Hambalang 05</strong> merupakan lembaga pendidikan dasar yang berkomitmen mencetak
                            generasi <strong>cerdas</strong>, <strong>berakhlak mulia</strong>, dan <strong>berwawasan
                                lingkungan</strong>. Sekolah ini menjadi tempat tumbuh kembang siswa melalui pendekatan
                            pembelajaran yang <strong>menyenangkan</strong>, <strong>interaktif</strong>, dan
                            <strong>adaptif terhadap perkembangan zaman</strong>
                            <br><br>
                            Dengan semangat <em>"Mendidik dengan Hati"</em>, <strong>SDN Hambalang 05</strong> mengembangkan
                            berbagai program unggulan seperti <strong>Gerakan Literasi Sekolah</strong> untuk meningkatkan
                            minat baca dan kemampuan berpikir kritis, <strong>Digitalisasi Pembelajaran</strong> melalui
                            pemanfaatan teknologi dalam proses belajar mengajar, <strong>Pembinaan Karakter</strong> yang
                            menanamkan nilai-nilai <strong>kejujuran</strong>, <strong>tanggung jawab</strong>, dan
                            <strong>kepedulian sosial</strong>, <strong>Sekolah Ramah Anak</strong> yang menciptakan
                            lingkungan belajar <strong>aman</strong> dan <strong>nyaman</strong>, serta program
                            <strong>Peduli Lingkungan</strong> melalui kegiatan kebersihan, daur ulang, dan penghijauan yang
                            melibatkan seluruh warga sekolah
                            <br><br>
                            Terletak di lingkungan yang <strong>asri dan strategis</strong>, <strong>SDN Hambalang
                                05</strong> menjadi pilihan tepat bagi orang tua yang menginginkan pendidikan dasar yang
                            <strong>berkualitas</strong> dan <strong>holistik</strong> bagi putra-putrinya
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Section Visi & Misi --}}
    <section class="bg-white py-5">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Visi & Misi</h2>
                <p class="text-muted">Landasan dan arah tujuan pendidikan di SD Negeri Hambalang 05</p>
            </div>
            <div class="row justify-content-center g-4">
                {{-- Visi --}}
                <div class="col-lg-6">
                    <div class="custom-card hover-animate shadow-sm h-100">
                        <h4 class="fw-semibold text-primary">🎯 Visi</h4>
                        <p class="text-muted mb-0" style="text-align: justify;">
                            Terwujudnya peserta didik yang cerdas, berakhlak mulia, berwawasan global, peduli lingkungan,
                            dan
                            mampu menghadapi tantangan zaman dengan semangat belajar sepanjang hayat
                        </p>
                    </div>
                </div>

                {{-- Misi --}}
                <div class="col-lg-6">
                    <div class="custom-card hover-animate shadow-sm h-100">
                        <h4 class="fw-semibold text-success">🚀 Misi</h4>
                        <ul class="text-muted">
                            <li>Menyelenggarakan pembelajaran yang aktif, kreatif, dan menyenangkan</li>
                            <li>Menanamkan nilai-nilai keimanan, kedisiplinan, dan tanggung jawab</li>
                            <li>Mendorong pemanfaatan teknologi untuk mendukung proses belajar</li>
                            <li>Membangun budaya literasi dan numerasi sejak dini</li>
                            <li>Mewujudkan lingkungan sekolah yang bersih, hijau, dan sehat</li>
                            <li>Meningkatkan peran serta orang tua dan masyarakat dalam pendidikan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>
        .floating-hover {
            transition: transform 0.3s ease-in-out;
        }

        .floating-hover:hover {
            animation: floatUpDown 1s ease-in-out infinite alternate;
        }

        @keyframes floatUpDown {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-8px);
            }
        }

        .facility-card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }
    </style>
    @php
        $facilities = [
            ['icon' => '🏫', 'title' => 'Ruang Kelas Nyaman', 'count' => 6],
            ['icon' => '📚', 'title' => 'Perpustakaan Sekolah', 'count' => 1],
            ['icon' => '💻', 'title' => 'Laboratorium Komputer', 'count' => 1],
            ['icon' => '🎨', 'title' => 'Ruang Seni & Budaya', 'count' => 1],
            ['icon' => '⚽', 'title' => 'Lapangan Olahraga', 'count' => 1],
            ['icon' => '🚻', 'title' => 'Toilet Bersih', 'count' => 4],
            ['icon' => '🌳', 'title' => 'Taman Sekolah', 'count' => 2],
            ['icon' => '🛗', 'title' => 'Akses Ramah Difabel', 'count' => 1],
        ];
    @endphp

    <section class="bg-light py-5">
        <div class="container" data-aos="fade-up">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Sarana & Prasarana</h2>
                <p class="text-muted mb-1">Fasilitas pendukung pembelajaran di SD Negeri Hambalang 05</p>
                <p class="fw-semibold text-primary">Total: {{ count($facilities) }} Fasilitas</p>
            </div>

            <div class="row g-4">
                @foreach ($facilities as $item)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div
                            class="facility-card floating-hover text-center p-4 bg-white rounded-4 shadow-sm h-100 border border-light">
                            <div class="fs-1 mb-2">{{ $item['icon'] }}</div>
                            <h6 class="fw-semibold text-dark mb-1">{{ $item['title'] }}</h6>
                            <small class="text-muted">{{ $item['count'] }} unit</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .hover-scale {
            transition: all 0.3s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .floating-bg {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(0, 123, 255, 0.15), transparent 70%);
            top: -50px;
            right: -50px;
            z-index: 0;
            animation: float 6s ease-in-out infinite;
            border-radius: 50%;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(15px);
            }
        }
    </style>

    <section class="bg-light py-5 position-relative overflow-hidden">
        {{-- Hiasan latar belakang --}}
        <div class="floating-bg"></div>

        <div class="container position-relative z-2" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                {{-- Testimoni --}}
                <div class="col-md-7 mb-4 mb-md-0" data-aos="fade-right" data-aos-delay="200">
                    <div class="p-4 bg-white rounded-4 shadow-sm hover-scale">
                        <h3 class="fw-bold text-primary">“Anak saya jadi lebih semangat belajar sejak masuk SDN Hambalang
                            05.”</h3>
                        <p class="mb-0 text-muted fst-italic">– Orang Tua Murid, Kelas 3</p>
                    </div>
                </div>

                {{-- Ajak daftar --}}
                <div class="col-md-5 text-center" data-aos="fade-left" data-aos-delay="300">
                    <h4 class="fw-bold mb-3">Yuk, bergabung bersama kami!</h4>
                    <a href="#" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-lg transition-all"
                        style="transition: all 0.3s ease-in-out;"
                        onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 20px rgba(40,167,69,0.4)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow=''">
                        Daftar PPDB Sekarang <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

@endsection
