@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $foto->JudulFoto }}</h1>
    <p>{{ $foto->DeskripsiFoto }}</p>
    <img src="{{ asset($foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}" class="img-fluid mb-3">

    <h3>Komentar</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('komentar_foto.store', $foto->FotoID) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="IsiKomentar">Tulis Komentar</label>
            <textarea name="IsiKomentar" id="IsiKomentar" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Kirim Komentar</button>
    </form>

    <h4 class="mt-4">Komentar yang telah diberikan</h4>
    <ul class="list-group">
        @foreach($komentars as $komentar)
            <li class="list-group-item">
                <strong>{{ $komentar->user->name }}</strong> ({{ $komentar->TanggalKomentar }})
                <p>{{ $komentar->IsiKomentar }}</p>

                @if($komentar->UserID == Auth::id())
                    <form action="{{ route('komentar_foto.destroy', $komentar->KomentarID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus komentar ini?')">Hapus</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
