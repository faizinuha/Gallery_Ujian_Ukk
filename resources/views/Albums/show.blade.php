@extends('kerangka.master')

@section('content')

<div class="container">
    <h1 class="text-center mb-5 display-4 text-primary font-weight-bold">{{ $album->NamaAlbum }}</h1>

    <div class="row">
        @foreach ($album->fotos as $photo)
        <div class="col-md-4 mb-4">
            <div class="album-card shadow-lg rounded overflow-hidden">
                <figure class="effect-ming tm-video-item position-relative">
                    <img src="{{ asset('storage/' . $photo->LokasiFile) }}"
                         alt="{{ $photo->JudulFoto }}"
                         class="img-fluid rounded img-hover">

                    <figcaption class="d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-white">{{ $photo->JudulFoto }}</h2>
                        <a href="{{ route('fotos.show', $photo->FotoID) }}" class="btn btn-light btn-sm mt-2">View more</a>
                    </figcaption>
                </figure>
                <div class="Gras p-3 text-center">
                    <span class="tm-text-gray-black">
                        📅 Tanggal Post: {{ \Carbon\Carbon::parse($photo->TanggalUnggah)->format('d-m-Y') }}
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    /* Styling judul album */
    h1 {
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    /* Dekorasi untuk teks tanggal */
    .Gras {
        font-weight: bold;
        font-size: 1rem;
        color: black;
        text-align: center;
        background: rgba(255, 255, 255, 0.8);
        padding: 10px;
        border-radius: 5px;
    }

    /* Efek hover pada gambar */
    .img-hover {
        border-radius: 15px;
        object-fit: cover;
        width: 100%;
        height: 300px;

    }

    .img-hover:hover {
        transform: scale(1.07);
        box-shadow: 0 10px 20px rgba(0, 0, 255, 0.4);
    }

    /* Styling card */
    .album-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        background: linear-gradient(to top, #f8f9fa, #ffffff);
    }

    .album-card:hover {
        transform: scale(1.02);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
    }

    /* Styling caption */
    .tm-video-item figcaption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        padding: 15px;
        text-align: center;
        transition: opacity 0.3s ease-in-out;
        opacity: 0;
    }

    .tm-video-item:hover figcaption {
        opacity: 1;
    }

    .tm-video-item figcaption h2 {
        font-size: 1.4rem;
        font-weight: bold;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    /* Styling button */
    .tm-video-item a {
        color: #fff;
        background-color: #007bff;
        border-radius: 8px;
        padding: 6px 15px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
    }

    .tm-video-item a:hover {
        background-color: #0056b3;
        transform: translateY(-3px);
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .album-card {
            margin-bottom: 20px;
        }

        .img-hover {
            height: 250px;
        }

        .Gras {
            font-size: 0.9rem;
        }
    }
</style>

@endsection
