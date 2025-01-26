@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Foto</h1>
        <form action="{{ route('fotos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="JudulFoto">Judul Foto</label>
                <input type="text" name="JudulFoto" id="JudulFoto" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="DeskripsiFoto">Deskripsi Foto</label>
                <textarea name="DeskripsiFoto" id="DeskripsiFoto" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="TanggalUnggah">Tanggal Unggah</label>
                <input type="date" name="TanggalUnggah" id="TanggalUnggah" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="LokasiFile">Lokasi File</label>
                <input type="file" name="LokasiFile" id="LokasiFile" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="AlbumID">Album</label>
                <select name="AlbumID" id="AlbumID" class="form-control" required>
                    @foreach ($albums as $album)
                        <option value="{{ $album->AlbumID }}">{{ $album->NamaAlbum }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan Foto</button>
        </form>
    </div>
@endsection
