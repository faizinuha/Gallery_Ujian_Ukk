@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Foto</h1>

    <form action="{{ route('fotos.update', $foto->FotoID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="JudulFoto">Judul Foto</label>
            <input type="text" name="JudulFoto" id="JudulFoto" class="form-control" value="{{ $foto->JudulFoto }}" required>
        </div>

        <div class="form-group">
            <label for="DeskripsiFoto">Deskripsi Foto</label>
            <textarea name="DeskripsiFoto" id="DeskripsiFoto" class="form-control" required>{{ $foto->DeskripsiFoto }}</textarea>
        </div>

        <div class="form-group">
            <label for="TanggalUnggah">Tanggal Unggah</label>
            <input type="date" name="TanggalUnggah" id="TanggalUnggah" class="form-control" value="{{ $foto->TanggalUnggah }}" required>
        </div>

        <div class="form-group">
            <label for="LokasiFile">Lokasi File</label>
            <input type="file" name="LokasiFile" id="LokasiFile" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="AlbumID">Pilih Album</label>
            <select name="AlbumID" id="AlbumID" class="form-control" required>
                @foreach($albums as $album)
                    <option value="{{ $album->AlbumID }}" {{ $foto->AlbumID == $album->AlbumID ? 'selected' : '' }}>{{ $album->NamaAlbum }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Update Foto</button>
    </form>
</div>
@endsection
