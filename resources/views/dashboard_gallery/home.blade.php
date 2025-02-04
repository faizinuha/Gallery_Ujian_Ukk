<head>
    @livewireStyles
</head>

<body>
    @yield('content')

    @livewireScripts
</body>

@extends('kerangka.master')

@section('content')
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Terbaru
            </h2>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            @forelse ($p as $a)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-10 mb-3">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset('storage/' . $a->LokasiFile) }}" alt="{{ $a->JudulFoto }}" class="img-fluid" >
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{ $a->JudulFoto }}</h2>
                            <a href="{{ route('fotos.show', $a->FotoID) }}">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-black">
                            {{ \Carbon\Carbon::parse($a->TanggalUnggah)->format('d-m-Y') }}
                        </span>
                        {{-- <span>9,906 views</span> --}}
                    </div>
                </div>
            @empty
            @endforelse
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{ asset('assets/img/img-04.jpg') }}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>Plants</h2>
                        <a href="photo-detail.html">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">14 Oct 2020</span>
                    <span>16,100 views</span>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{ asset('assets/img/img-05.jpg') }}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>Morning</h2>
                        <a href="photo-detail.html">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">12 Oct 2020</span>
                    <span>12,460 views</span>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{ asset('assets/img/img-06.jpg') }}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>Pinky</h2>
                        <a href="photo-detail.html">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">10 Oct 2020</span>
                    <span>11,402 views</span>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{ asset('assets/img/img-01.jpg') }}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>Hangers</h2>
                        <a href="photo-detail.html">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">24 Sep 2020</span>
                    <span>16,008 views</span>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{ asset('assets/img/img-02.jpg') }}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>Perfumes</h2>
                        <a href="photo-detail.html">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">20 Sep 2020</span>
                    <span>12,860 views</span>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{ asset('assets/img/img-07.jpg') }}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>Bus</h2>
                        <a href="photo-detail.html">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">16 Sep 2020</span>
                    <span>10,900 views</span>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{ asset('assets/img/img-08.jpg') }}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>New York</h2>
                        <a href="photo-detail.html">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">12 Sep 2020</span>
                    <span>11,300 views</span>
                </div>
            </div>
        </div> <!-- row -->
        {{-- <div class="row tm-mb-90">
            <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                <!-- Previous Button -->
                <a href="{{ $p->previousPageUrl() }}" class="btn btn-primary tm-btn-prev mb-2 {{ !$p->previousPageUrl() ? 'disabled' : '' }}">
                    Previous
                </a>

                <!-- Page Numbers -->
                <div class="tm-paging d-flex">
                    @foreach ($p->getUrlRange(1, $p->lastPage()) as $page => $url)
                        <a href="{{ $url }}" class="tm-paging-link {{ $page == $p->currentPage() ? 'active' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                <!-- Next Button -->
                <a href="{{ $p->nextPageUrl() }}" class="btn btn-primary tm-btn-next {{ !$p->nextPageUrl() ? 'disabled' : '' }}">
                    Next Page
                </a>
            </div>
        </div> --}}

    </div> <!-- container-fluid, tm-container-content -->
    <style>
        .tm-video-item figcaption h2 {
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>

@endsection
