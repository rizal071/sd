@extends('frontend.layouts.app')
@section('title', 'Beranda - SD Hambalang 05')

@section('content')

    <style>
        /* hero */
        .hero-caption-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
        }

        .hero-caption-overlay h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
        }

        .hero-caption-overlay p {
            font-size: 1.1rem;
            color: #f8f9fa;
        }

        .carousel-item img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
            object-position: center;
        }

        @media (max-width: 576px) {
            .carousel-item img {
                height: 65vh;
            }
        }

        @media (max-width: 576px) {
            .hero-caption-overlay h1 {
                font-size: 1.8rem;
            }

            .hero-caption-overlay p {
                font-size: 1rem;
            }

            .carousel-item img {
                height: 75vh;
            }
        }

        a.btn-warning.transition {
            transition: all 0.3s ease;
        }

        a.btn-warning.transition:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* statistik card */
        .statistik-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.15);
            cursor: pointer;
        }

        /* sambutan */
        .sambutan-img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            position: absolute;
            top: -65px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #fff;
            padding: 5px;
            z-index: 1;
        }

        .sambutan-footer {
            border-top: 1px solid #dee2e6;
            padding-top: 1rem;
            margin-top: 2rem;
        }

        .sambutan-box {
            background: linear-gradient(to right, #f8f9fa, #ffffff);
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            position: relative;
        }
    </style>

    <!-- Hero Carousel -->
    <section id="heroCarousel" class="position-relative overflow-hidden">
        <div id="heroCarouselIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                @foreach (['sd1.jpg', 'sd2.jpg', 'sd3.jpg'] as $i => $image)
                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/hero/' . $image) }}" class="d-block w-100"
                            alt="Slide {{ $i + 1 }}">
                        <div class="hero-caption-overlay d-flex flex-column justify-content-center align-items-center text-center text-white position-absolute top-0 start-0 w-100 h-100"
                            style="background: rgba(0, 0, 0, 0.4);">
                            @if ($i === 0)
                                <div data-aos="zoom-in" class="p-3">
                                    {{-- <img src="{{ asset('assets/logo-sd.png') }}" alt="Logo SD" style="max-width: 100px;"
                                        class="mb-3"> --}}
                                    <h1 class="fw-bold">Selamat Datang di<br><span class="text-warning">SD Hambalang
                                            05</span></h1>
                                    <p>Sekolah Dasar ramah anak, aktif, dan berprestasi</p>
                                    <a href="/ppdb"
                                        class="btn btn-warning btn-lg mt-3 shadow-sm d-inline-flex align-items-center gap-2 px-4 py-2 rounded-pill transition">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                        <span class="fw-semibold">Daftar Sekarang</span>
                                    </a>
                                </div>
                            @elseif ($i === 1)
                                <div data-aos="fade-up">
                                    <h1 class="fw-bold">Membangun Karakter & Prestasi</h1>
                                    <p>Kegiatan belajar yang menyenangkan dan bermakna</p>
                                </div>
                            @elseif ($i === 2)
                                <div data-aos="fade-up">
                                    <h1 class="fw-bold">Lingkungan Sekolah yang Asri</h1>
                                    <p>Suasana belajar yang nyaman dan aman untuk semua siswa</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarouselIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarouselIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Berikutnya</span>
            </button>
        </div>

        <!-- Statistik Card -->
        <div class="container position-relative" style="margin-top: -60px; z-index: 10; margin-bottom: 10px">
            <div class="row g-3 text-center">
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-white p-4 rounded-4 shadow-sm h-100 statistik-card">
                        <i class="bi bi-person-fill text-primary fs-2 mb-2"></i>
                        <h6 class="fw-bold">Siswa Aktif</h6>
                        <p class="small text-muted">Jumlah siswa aktif saat ini</p>
                        <div class="fs-4 text-primary fw-bold"><span class="countup" data-count="315">0</span></div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-white p-4 rounded-4 shadow-sm h-100 statistik-card">
                        <i class="bi bi-person-vcard-fill text-success fs-2 mb-2"></i>
                        <h6 class="fw-bold">Guru & Tendik</h6>
                        <p class="small text-muted">Tenaga pendidik profesional</p>
                        <div class="fs-4 text-success fw-bold"><span class="countup" data-count="28">0</span></div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-white p-4 rounded-4 shadow-sm h-100 statistik-card">
                        <i class="bi bi-people-fill text-warning fs-2 mb-2"></i>
                        <h6 class="fw-bold">Alumni</h6>
                        <p class="small text-muted">Lulusan tersebar luas</p>
                        <div class="fs-4 text-warning fw-bold"><span class="countup" data-count="850">0</span>+</div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                        <i class="bi bi-patch-check-fill text-danger fs-2 mb-2"></i>
                        <h6 class="fw-bold">Akreditasi</h6>
                        <p class="small text-muted">Terakreditasi A oleh BAN-SM</p>
                        <div class="fs-4 text-danger fw-bold">A</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- sambutan --}}
    <section class="py-5 position-relative bg-white">
        <div class="container">
            <div class="text-center mb-5 pb-3">
                <h2 class="fw-bold" data-aos="fade-down">Sambutan Kepala Sekolah</h2>
                <div class="mx-auto mt-2 mb-5"
                    style="width: 60px; height: 4px; background: linear-gradient(to right, #0d6efd, #198754); border-radius: 2px;">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="bg-light rounded-4 shadow-sm p-4 position-relative text-center" data-aos="fade-up"
                        data-aos-delay="100">
                        <!-- Foto Kepala Sekolah -->
                        <img src="{{ asset('assets/images/foto-kepala.png') }}" alt="Kepala Sekolah" class="sambutan-img">

                        <!-- Isi Sambutan -->
                        <div class="mt-5 pt-3 px-2">
                            <p class="text-muted" style="line-height: 1.8;">
                                <span class="fst-italic">Assalamu’alaikum Wr. Wb.</span><br><br>
                                Di masa sekarang, penyampaian informasi tidak terbatas hanya pada surat, namun juga media
                                sosial
                                sangat berpengaruh. Untuk itu, SD Negeri Kedungrejo telah merilis website resmi sebagai
                                sarana
                                informasi yang terbuka bagi masyarakat.
                                <br><br>
                                Dengan adanya website ini, semoga informasi-informasi penting dan kegiatan sekolah dapat
                                diakses
                                dengan mudah oleh publik secara luas.
                                <br><br>
                                <span class="fst-italic">Wassalamu'alaikum Wr. Wb.</span>
                            </p>
                        </div>

                        <!-- Nama Kepala Sekolah -->
                        <div class="sambutan-footer">
                            <h5 class="fw-bold mb-0">Rizal Abdul Rosyid</h5>
                            <small class="text-muted">Kepala Sekolah SD 05 Hambalang </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>
        .img-zoom {
            transition: transform 0.5s ease;
        }

        .img-zoom:hover {
            transform: scale(1.1);
        }

        .berita-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .berita-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.1);
        }

        .berita-card .card-title {
            transition: color 0.3s;
        }

        .berita-card:hover .card-title {
            color: #0d6efd;
        }

        /* Button */
        .see-all-btn {
            font-size: 14px;
            padding: 8px 18px;
            color: #fff !important;
            background: linear-gradient(135deg, #0d6efd, #3f8efc);
            border: none;
            border-radius: 30px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            box-shadow: 0 2px 6px rgba(0, 123, 255, 0.2);
        }

        .see-all-btn:hover {
            background: linear-gradient(135deg, #3f8efc, #69aaff);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 123, 255, 0.4);
        }

        .btn {
            font-size: 12px;
            padding: 6px 14px;
            color: #0d6efd !important;
            background-color: white;
            border: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(1, 36, 74, 0.2);
        }

        .btn:hover {
            color: white !important;
            background: linear-gradient(135deg, #3f8efc, #69aaff);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 123, 255, 0.4);
        }
    </style>

    <!-- Berita Section -->
    <section class="py-5 bg-light" id="berita">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Artikel Berita</h2>
                <p class="text-muted">Ikuti update terbaru seputar kegiatan dan informasi sekolah</p>
            </div>

            <div class="row g-4">
                @forelse ($beritas as $index => $berita)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="card berita-card h-100 shadow-sm border-0">
                            <div class="overflow-hidden">
                                <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top img-zoom"
                                    alt="{{ $berita->judul }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $berita->judul }}</h5>
                                <p class="text-muted small">
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }} • Admin
                                </p>
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100) }}
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="{{ route('frontend.beritashow', $berita->id) }}"
                                    class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada berita yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-5">
                <a href="{{ url('/berita') }}" class="see-all-btn">
                    Lihat Semua Berita
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </div>
    </section>



    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>

    <section class="py-5"
        style="background: linear-gradient(to bottom, rgba(13, 110, 253, 0.5), rgba(255, 255, 255, 0.5)), url('{{ asset('assets/images/bg-contact.jpg') }}') center/cover no-repeat;">
        <div class="container">
            <div class="row justify-content-between align-items-center">

                <!-- Kontak Card Glass -->
                <div class="col-md-5 mb-4 mb-md-0">
                    <div class="glass-card p-4 shadow-lg">
                        <h3 class="fw-bold mb-4 text-primary">Hubungi Kami</h3>
                        <p class="text-primary-50"><i class="bi bi-geo-alt-fill me-2 text-primary"></i> Jl. Raya Hambalang
                            No.05, Citeureup, Bogor</p>
                        <p class="text-primary-50"><i class="bi bi-envelope-fill me-2 text-primary"></i>
                            info@sdhambalang05.sch.id</p>
                        <p class="text-primary-50"><i class="bi bi-telephone-fill me-2 text-primary"></i> 0812-3456-7890
                        </p>
                        <p class="text-primary-50"><i class="bi bi-clock-fill me-2 text-primary"></i> Senin - Jumat: 07.00
                            -
                            14.00</p>
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-outline-light mt-3">
                            <i class="bi bi-whatsapp me-1"></i> Chat WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="col-md-6">
                    <div class="ratio ratio-4x3 rounded-4 overflow-hidden shadow">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15836.532142881028!2d106.8713108!3d-6.5264454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c41c0c6ffb7b%3A0x9fa43b2e61cb7f6a!2sSDN%20Hambalang%2005!5e0!3m2!1sid!2sid!4v1690999999999"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- JS CountUp -->
    <script src="https://cdn.jsdelivr.net/npm/countup.js@2.0.7/dist/countUp.umd.js" defer></script>

    <script>
        window.addEventListener('load', function() {
            if (typeof CountUp !== 'undefined') {
                document.querySelectorAll('.countup').forEach(el => {
                    const endVal = el.getAttribute('data-count');
                    const counter = new CountUp(el, endVal);
                    if (!counter.error) counter.start();
                    else console.error(counter.error);
                });
            } else {
                console.error('CountUp is still undefined after load.');
            }
        });
    </script>

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init();
        });
    </script>

@endsection
