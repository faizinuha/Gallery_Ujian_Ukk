@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Album Baru</h1>
    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="NamaAlbum">Nama Album</label>
            <input type="text" name="NamaAlbum" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Deskripsi">Deskripsi</label>
            <textarea name="Deskripsi" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="TanggalDibuat">Tanggal Dibuat</label>
            <input type="date" name="TanggalDibuat" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
