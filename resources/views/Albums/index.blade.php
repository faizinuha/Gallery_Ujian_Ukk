@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Album</h1>
    <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3">Buat Album</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Album</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
            <tr>
                <td>{{ $album->NamaAlbum }}</td>
                <td>{{ $album->Deskripsi }}</td>
                <td>{{ $album->TanggalDibuat }}</td>
                <td>
                    <a href="{{ route('albums.show', $album->AlbumID) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('albums.edit', $album->AlbumID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('albums.destroy', $album->AlbumID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus album ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
