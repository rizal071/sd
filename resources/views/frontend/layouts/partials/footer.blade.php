<style>
    .bg-gradient-blue {
        background: linear-gradient(to right, #0b2545, #1976d2);
        /* lebih gelap */
        color: white;
    }

    .bg-gradient-blue a {
        color: white;
    }

    .bg-gradient-blue a:hover {
        color: #bbdefb;
        /* Biru muda untuk hover */
        text-decoration: underline;
    }
</style>


<footer class="bg-gradient-blue mt-auto py-4">
    <div class="container">

        {{-- Baris 1: Logo & Deskripsi Singkat --}}
        <div class="row mb-4">
            <div class="col-md-4 text-center text-md-start">
                <img src="#" alt="sd05" style="height:50px">
                <p class="mt-2 small">
                    SD Negeri Hambalang 05 merupakan sekolah dasar negeri yang terletak di Desa Hambalang, Kecamatan
                    Citeureup, Kabupaten Bogor. Sekolah ini berkomitmen memberikan pendidikan dasar yang berkualitas,
                    membentuk karakter siswa yang disiplin, cerdas, dan berakhlak mulia. Dengan lingkungan belajar yang
                    aman dan mendukung, SDN Hambalang 05 terus berupaya meningkatkan mutu pendidikan melalui kegiatan
                    akademik maupun non-akademik.
                </p>
            </div>

            {{-- Baris 1: Navigasi Cepat --}}
            <div class="col-md-4">
                <h6 class="text-uppercase fw-bold">Tautan Cepat</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/tentang') }}">Tentang</a></li>
                    <li><a href="{{ url('/program') }}">Program</a></li>
                    <li><a href="{{ url('/donasi') }}">Donasi</a></li>
                    <li><a href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
            </div>

            {{-- Baris 1: Kontak --}}
            <div class="col-md-4">
                <h6 class="text-uppercase fw-bold">Kontak Kami</h6>
                <ul class="list-unstyled small lh-lg">
                    <li><i class="bi bi-geo-alt-fill me-2"></i>Desa Leuwinutug, Citeuerup</li>
                    <li><i class="bi bi-telephone-fill me-2"></i>(0251) 123‑456</li>
                    <li><i class="bi bi-envelope-fill me-2"></i>info@sd05hamlang.com</li>
                </ul>

                {{-- Sosial Media --}}
                <div class="mt-2">
                    <a href="https://facebook.com/" target="_blank" class="me-3">
                        <i class="bi bi-facebook fs-5"></i>
                    </a>
                    <a href="https://instagram.com/" target="_blank" class="me-3">
                        <i class="bi bi-instagram fs-5"></i>
                    </a>
                    <a href="https://youtube.com/" target="_blank">
                        <i class="bi bi-youtube fs-5"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Baris 2: Copyright --}}
        <div class="border-top pt-3 text-center small">
            © {{ date('Y') }} Rizal Abdul Rosyid — All rights reserved.
        </div>
    </div>
</footer>
