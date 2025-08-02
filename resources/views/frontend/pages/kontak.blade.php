@extends('frontend.layouts.app')
@section('title', 'Beranda - SD Hambalang 05')

@section('content')
    <style>
        .contact-card {
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        iframe {
            border: 0;
            width: 100%;
            height: 350px;
            border-radius: 1rem;
        }
    </style>

    <section class="py-5 bg-white" style="margin-top: 30px; margin-bottom: 100px;">
        <div class="container">
            <div class="text-center mb-5 my-5" data-aos="fade-up">
                <h2 class="fw-bold position-relative d-inline-block heading-with-line">Hubungi Kami</h2>
                <p class="text-muted">Informasi kontak SD Negeri Hambalang 05 dan lokasi sekolah</p>
            </div>

            <div class="row">
                {{-- Kiri: Info Kontak --}}
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <div class="bg-white p-4 rounded-4 shadow contact-card h-100">
                        <h4 class="fw-semibold mb-4 text-primary">Informasi Kontak</h4>
                        <ul class="list-unstyled text-muted">
                            <li class="mb-3">
                                <i class="bi bi-geo-alt-fill text-success me-2"></i>
                                <strong>Alamat:</strong> Jl. Raya Hambalang No.05, Kec. Citeureup, Kab. Bogor
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-envelope-fill text-danger me-2"></i>
                                <strong>Email:</strong> sdn.hambalang05@sekolah.sch.id
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-telephone-fill text-primary me-2"></i>
                                <strong>Telepon:</strong> (0251) 123456
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-clock-fill text-warning me-2"></i>
                                <strong>Jam Operasional:</strong> Senin – Jumat, 07.00 – 14.00 WIB
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Kanan: Maps --}}
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="contact-card shadow bg-white rounded-4 p-1 h-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7935.507364749171!2d106.900000!3d-6.600000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMzYnMDAuMCJTIDEwNsKwNTQnMDAuMCJF!5e0!3m2!1sen!2sid!4v1699999999999"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
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
