@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3>{{ __('Dashboard') }}</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Albums Section -->
                    <div class="albums-section mt-5">
                        <h4 class="text-center mb-4">Your Albums</h4>
                        <div class="row">
                            @foreach($albums as $album)
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-sm rounded">
                                        <div class="card-header bg-primary text-white">
                                            <strong>{{ $album->NamaAlbum }}</strong>
                                        </div>
                                        <div class="card-body">
                                            <p>{{ $album->description }}</p>
                                        </div>
                                        {{-- <div class="card-footer text-center">
                                            <a href="{{ route('albums.show', $album->id) }}" class="btn btn-outline-primary btn-sm">View Album</a>
                                        </div> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Photos Section -->
                    <div class="photos-section mt-5">
                        <h4 class="text-center mb-4">Your Photos</h4>
                        <div class="row">
                            @foreach($photos as $photo)
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-sm border-light rounded">
                                        <div class="card-header bg-info text-white">
                                            <strong>{{ $photo->JudulFoto }}</strong>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ asset('storage/' . $photo->LokasiFile) }}" class="img-fluid rounded mb-3">
                                            <p>{{ $photo->DeskripsiFoto }}</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="{{ route('fotos.show', $photo) }}" class="btn btn-outline-info btn-sm">View Photo</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
