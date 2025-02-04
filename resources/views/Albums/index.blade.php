@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="conta">Daftar Album</h1>
        <hr>
        <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3 custom">Buat Album</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-oke">
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
                        <td class="hover">
                            <a href="{{ route('albums.show', $album->AlbumID) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('albums.edit', $album->AlbumID) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('albums.destroy', $album->AlbumID) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus album ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <style>
        .custom {
            color: white;
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            margin: 4px 2px;
        }

        @media screen and (max-width: 600px) {
            .custom {
                font-size: 14px;
            }
        }

        .conta {
            text-align: center;
            font-size: 25px;
            margin-bottom: 20px;
            margin-top: 20px;
            color: #343a40;
            font-weight: bold;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        @media screen and (max-width: 600px) {
            .conta {
                font-size: 20px;
            }
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .table-oke {
            margin: 20px auto;
            /* Menggabungkan margin-top, margin-left, dan margin-right */
            width: 100%;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .hover{
            background-color: #f1f1f1;
            cursor: pointer;
            margin-top: 10px;
            color: #343a40;
            transition: background-color 0.3s ease-in-out;
            text-decoration: none;
            text-align: center;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
@endsection
