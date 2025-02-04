@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="text-center">Edit Album</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('albums.update', $album) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="NamaAlbum" class="form-label">Nama Album</label>
                    <input type="text" class="form-control @error('NamaAlbum') is-invalid @enderror"
                           id="NamaAlbum" name="NamaAlbum" value="{{ old('NamaAlbum', $album->NamaAlbum) }}" required>
                    @error('NamaAlbum')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('Deskripsi') is-invalid @enderror"
                              id="Deskripsi" name="Deskripsi" rows="3" required>{{ old('Deskripsi', $album->Deskripsi) }}</textarea>
                    @error('Deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="TanggalDibuat" class="form-label">Tanggal Dibuat</label>
                    <input type="date" class="form-control @error('TanggalDibuat') is-invalid @enderror"
                           id="TanggalDibuat" name="TanggalDibuat" value="{{ old('TanggalDibuat', $album->TanggalDibuat) }}" required>
                    @error('TanggalDibuat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4">Update</button>
                    <a href="{{ route('albums.index') }}" class="btn btn-secondary px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
