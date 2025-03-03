@extends('kerangka.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Catalog-Z</title>
    </head>

    <body>
        <div class="container-fluid tm-container-content tm-mt-60">
            <div class="row mb-4">
                <h2 class="col-12 tm-text-primary">Foto Terbaru</h2>
            </div>
            <div class="row tm-mb-90">
                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                        @foreach ($albums as $index => $album)
                            @if ($index % 2 == 0)
                                <!-- Menampilkan setiap album dengan indeks genap -->
                                @forelse ($album->fotos as $foto)
                                    <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}"
                                        class="img-fluid">
                                @empty
                                    <p>Belum ada foto untuk album ini.</p>
                                @endforelse
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="tm-bg-gray tm-video-details">
                        <p class="mb-4">
                            support Kami <a href="https://saweria.co/C02V" target="_parent" rel="sponsored">donation Saweria
                            </a>
                        </p>
                        <div class="text-center mb-5">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary tm-btn-big">Download</a>
                        </div>
                        <div class="mb-4 d-flex flex-wrap">
                            <div class="mr-4 mb-2">
                                <span class="tm-text-gray-dark">Dimension: </span><span
                                    class="tm-text-primary">1920x1080</span>
                            </div>
                            <div class="mr-4 mb-2">
                                <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">JPG</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h3 class="tm-text-gray-dark mb-3">Creative Command</h3>
                            <p>Gratis Website kamu Menyediakan Semua Gambar Mulai Dari Request dan Lainya No Ads.</p>
                        </div>
                        <div>
                            <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                            <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Cloud</a>
                            <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Bluesky</a>
                            <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Nature</a>
                            <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Anime</a>
                            <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Wallpapers</a>
                            <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Night</a>
                            {{-- <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block"></a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <h2 class="col-12 tm-text-primary">
                    Album Terakhir DI Tambahkan
                </h2>
                <hr>
            </div>

            <div class="row mb-3 tm-gallery">
                @forelse ($albums as $album)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <div class="card shadow-sm rounded-lg border-0">
                            <!-- Card Header: Album Title -->
                            <div class="card-header text-center bg-white border-0">
                                <h3 class="mb-2 font-weight-bold">{{ $album->NamaAlbum }}</h3>
                                <a href="{{ route('albums.show', $album) }}" class="btn btn-primary mt-2 w-75"
                                    style="background-color: #008080; border: none; transition: 0.3s;">
                                    View All
                                </a>
                            </div>

                            <!-- Card Body: Photos -->
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($album->fotos as $index => $photo)
                                        <div class="col-12 mb-3">
                                            <figure class="effect-ming tm-video-item">
                                                <img src="{{ asset('storage/' . $photo->LokasiFile) }}"
                                                    alt="{{ $photo->JudulFoto }}" class="img-fluid rounded shadow-sm"
                                                    style="height: 180px; width: 100%; object-fit: cover;">
                                                <figcaption class="d-flex align-items-center justify-content-center">
                                                    <h5 class="text-white font-weight-bold">{{ $photo->JudulFoto }}</h5>
                                                </figcaption>
                                            </figure>
                                            <div class="text-center text-muted mt-2">
                                                <small>{{ \Carbon\Carbon::parse($photo->TanggalUnggah)->format('d-m-Y') }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center w-100">Belum ada album.</p>
                @endforelse
            </div>

            <style>
                /* Dekorasi untuk gambar pertama */
                .photo-first img {

                    /* Border biru untuk gambar pertama */
                    border-radius: 20px;
                    /* Shadow biru */
                    transition: transform 0.3s ease-in-out;
                }

                .photo-first:hover img {
                    transform: scale(1.05);
                    /* Efek zoom in saat hover */
                }

                /* Styling untuk gambar-gambar lainnya */
                .tm-video-item img {
                    border-radius: 30px;
                    object-fit: cover;
                    width: 100%;
                    height: 200px;
                }

                /* Card Styling */
                .album-card {
                    border-radius: 15px;
                    overflow: hidden;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                .album-card:hover {
                    border: 2px solid #007bff;
                    box-shadow: 0 6px 12px rgba(0, 123, 255, 0.2);
                }

                /* Styling for Caption Text */
                .tm-video-item figcaption h2 {
                    color: #fff;
                    font-size: 1.5rem;
                    font-weight: bold;
                }

                /* Hover Effects */
                .tm-video-item img {
                    transition: transform 0.3s ease-in-out;
                }

                .album-card:hover .tm-video-item img {
                    transform: scale(1.05);
                    /* Zoom in sedikit saat hover */
                }
            </style>
        @endsection
