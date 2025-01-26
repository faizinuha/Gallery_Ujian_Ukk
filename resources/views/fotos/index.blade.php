@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="P mb-4">Daftar Foto</h1><hr>

    <a href="{{ route('fotos.create') }}" class="btn btn-primary mb-3">Tambah Foto</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <style>

        .p{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
        }
        .container {
            border-radius: 12px;
            padding: 30px;
        }

        .css {
            border-radius: 12px;
            width: 120px;
            height: 160px;
            object-fit: cover;
        }

        table {
            background-color: #333;
            border-radius: 10px;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
        }

        table th {
            color: #fff;
        }

        table tbody tr {
            border-radius: 8px;
        }

        table tbody tr:hover {
            background-color: #666; /* Hover effect for rows */
        }

        .btn {
            border-radius: 50px;
            padding: 8px 15px;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Judul Foto</th>
                <th>Deskripsi</th>
                <th>Tanggal Unggah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fotos as $foto)
                <tr>
                    <td>{{ $foto->JudulFoto }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}" class="img-fluid css">
                    </td>
                    <td>{{ \Carbon\Carbon::parse($foto->TanggalUnggah)->format('d-m-Y') }}</td> <!-- Format date -->
                    <td>
                        <a href="{{ route('fotos.show', $foto->FotoID) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('fotos.edit', $foto->FotoID) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('fotos.destroy', $foto->FotoID) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus foto ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
