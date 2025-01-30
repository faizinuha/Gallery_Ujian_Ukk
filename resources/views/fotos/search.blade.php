@extends('kerangka.master') <!-- Sesuaikan dengan layout kamu -->

@section('content')
<div class="container">
    <h1>Hasil Pencarian untuk "{{ $query }}"</h1>

    @if ($fotos->isEmpty())
        <p>Tidak ada hasil yang ditemukan.</p>
    @else
        <div class="row">
            @foreach ($fotos as $foto)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $foto->LokasiFile) }}" class="card-img-top" alt="{{ $foto->JudulFoto }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $foto->JudulFoto }}</h5>
                            <p class="card-text">{{ $foto->DeskripsiFoto }}</p>
                            <a href="{{ route('fotos.show', $foto->FotoID) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection