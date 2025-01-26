@extends('kerangka.master')
@section('content')
<style>
    body {
        font-size: 0.85rem; /* Ukuran font seluruh halaman */
    }
</style>
<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{ asset('assets/img/hero.jpg') }}"></div>

<div class="container-fluid tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-12 tm-text-primary text-center">
            Tentang Gallery-App
        </h2>
    </div>
    <div class="row tm-mb-74 tm-row-1640">
        <div class="col-lg-5 col-md-6 col-12 mb-3">
            <img src="{{ asset('assets/img/about.jpg') }}" alt="About Image" class="img-fluid">
        </div>
        <div class="col-lg-7 col-md-6 col-12">
            <div class="tm-about-img-text">
                <p class="mb-4">
                    Gallery-App adalah website berbagi foto yang memudahkan Anda mengunggah dan menikmati gambar serta video berkualitas tinggi. Kami menawarkan pengalaman bebas iklan, sehingga Anda dapat menikmati setiap gambar dengan nyaman tanpa gangguan.
                </p>
                <p>
                    Terima kasih telah mengunjungi Gallery-App. Kami menyediakan platform yang ramah pengguna, tempat di mana Anda dapat berbagi foto, menemukan inspirasi, dan bergabung dengan komunitas global yang penuh kreativitas.
                </p>
            </div>
        </div>
    </div>

    <div class="row tm-mb-50">
        <div class="col-md-6 col-12">
            <div class="tm-about-2-col">
                <h2 class="tm-text-primary mb-4">
                    Pengalaman Pengguna yang Sederhana
                </h2>
                <p class="mb-4">
                    Dengan desain minimalis dan intuitif, Gallery-App dirancang untuk memberikan pengalaman berbagi foto dan video yang mudah dan cepat. Platform ini bebas dari iklan agar Anda dapat fokus pada konten tanpa gangguan.
                </p>
                <p>
                    Kami berkomitmen untuk memberikan akses mudah kepada setiap pengguna, baik untuk tujuan pribadi maupun profesional. Semua fitur di Gallery-App dapat digunakan dengan lancar di berbagai perangkat, dari desktop hingga mobile.
                </p>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="tm-about-2-col">
                <h2 class="tm-text-primary mb-4">
                    Keterlibatan Komunitas
                </h2>
                <p class="mb-4">
                    Di Gallery-App, kami percaya pada kekuatan komunitas. Anda dapat mengunggah foto-foto Anda sendiri, berbagi cerita melalui gambar, dan terhubung dengan penggemar foto lainnya di seluruh dunia.
                </p>
                <p>
                    Gabung dengan kami untuk berbagi lebih banyak gambar, mendapatkan inspirasi dari sesama pengguna, dan menjelajahi berbagai koleksi foto serta video berkualitas tinggi.
                </p>
            </div>
        </div>
    </div> <!-- row -->

    <div class="row tm-mb-50">
        <div class="col-md-4 col-12">
            <div class="tm-about-3-col">
                <div class="tm-about-icon-container mb-5">
                    <i class="fas fa-desktop fa-3x tm-text-primary"></i>
                </div>
                <h2 class="tm-text-primary mb-4">Kompatibilitas Perangkat</h2>
                <p class="mb-4">Platform ini mendukung berbagai perangkat, baik itu desktop maupun perangkat mobile. Dengan tampilan responsif, Gallery-App dapat diakses dengan lancar di layar mana pun, memberikan pengalaman yang konsisten di semua platform.</p>
                <p>Akses foto dan video Anda kapan saja, di mana saja, tanpa khawatir tentang masalah kompatibilitas perangkat.</p>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="tm-about-3-col">
                <div class="tm-about-icon-container mb-5">
                    <i class="fas fa-mobile-alt fa-3x tm-text-primary"></i>
                </div>
                <h2 class="tm-text-primary mb-4">Pengalaman Mobile Optimal</h2>
                <p class="tm-mb-50">Gallery-App memberikan pengalaman browsing cepat dan efisien di perangkat mobile. Anda bisa dengan mudah mengakses konten favorit Anda dalam ukuran layar yang optimal, baik menggunakan smartphone atau tablet.</p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="tm-about-3-col">
                <div class="tm-about-icon-container mb-5">
                    <i class="fas fa-photo-video fa-3x tm-text-primary"></i>
                </div>
                <h2 class="tm-text-primary mb-4">Konten Berkualitas</h2>
                <p class="mb-4">Kami menyajikan berbagai foto dan video berkualitas tinggi yang dapat Anda nikmati tanpa gangguan. Anda dapat menemukan berbagai koleksi inspiratif, mulai dari seni hingga fotografi profesional.</p>
                <p>Kami terus memperbarui konten kami agar Anda selalu memiliki akses ke gambar dan video terbaru dari komunitas Gallery-App.</p>
            </div>
        </div>
    </div>
</div> <!-- container-fluid, tm-container-content -->

@endsection
