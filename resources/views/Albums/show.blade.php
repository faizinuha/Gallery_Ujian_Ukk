@extends('kerangka.master')

@section('content')
<div class="container por rtl:placeholder:outline-sky-400">
    <h1 class="text-center mb-5">{{ $album->NamaAlbum }}</h1>
    <div class="row">
        @foreach ($album->fotos as $photo)
        <div class="col-md-4 mb-4">
            <div class="album-card shadow-lg rounded">
                <figure class="effect-ming tm-video-item">
                    <img src="{{ asset('storage/' . $photo->LokasiFile) }}"
                         alt="{{ $photo->JudulFoto }}" class="img-fluid rounded photo-first">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>{{ $photo->JudulFoto }}</h2>
                        <a href="{{ route('fotos.show', $photo->FotoID) }}" class="btn btn-light btn-sm">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-black">
                        {{ \Carbon\Carbon::parse($photo->TanggalUnggah)->format('d-m-Y') }}
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    /* Dekorasi untuk gambar pertama */
    .photo-first img {
        border-radius: 20px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .photo-first:hover img {
        transform: scale(1.05);
        box-shadow: 0 8px 15px rgba(0, 0, 255, 0.5); /* Efek bayangan biru saat hover */
    }

    /* Styling untuk gambar lainnya */
    .tm-video-item img {
        border-radius: 15px;
        object-fit: cover;
        width: 100%;
        height: 300px;
        transition: transform 0.3s ease-in-out;
    }

    /* Card Styling */
    .album-card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    .album-card:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    /* Styling for Caption Text */
    .tm-video-item figcaption h2 {
        color: #fff;
        font-size: 1.5rem;
        font-weight: bold;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.6);
    }

    /* Button Styling */
    .tm-video-item a {
        color: #fff;
        background-color: #007bff;
        border-radius: 5px;
        padding: 5px 15px;
        text-decoration: none;
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

        .tm-video-item img {
            height: 250px; /* Menurunkan tinggi gambar pada mobile */
        }
    }
</style>
@endsection
