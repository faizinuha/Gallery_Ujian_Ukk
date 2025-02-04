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
            @error('NamaAlbum')
                <div class="alert alert-danger mt-2 " >{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Deskripsi">Deskripsi</label>
                <textarea name="Deskripsi" class="form-control"  required value="{{ old('Deskripsi') }}" ></textarea>
            </div>
            @error('Deskripsi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="TanggalDibuat">Tanggal Dibuat</label>
                <input type="date" name="TanggalDibuat" class="form-control" required>
            </div>
            @error('TanggalDibuat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
