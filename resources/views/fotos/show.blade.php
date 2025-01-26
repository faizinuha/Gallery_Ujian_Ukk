@extends('layouts.app')

@section('content')
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    @if (session('success'))
        <!-- Toast Notification -->
        <div class="bs-toast toast fade show bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fas fa-check-circle me-2"></i>
                <strong class="me-auto">Sukses</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Card Foto -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="m-0">{{ $foto->JudulFoto }}</h5>
                        <span class="badge bg-light text-primary">{{ $foto->KategoriFoto }}</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-start">
                            <!-- Gambar -->
                            <div class="me-4">
                                <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}"
                                    class="rounded shadow" style="width: 300px; height: 350px; object-fit: cover;">
                            </div>
                            <!-- Detail Foto -->
                            <div>
                                <p><strong>Judul:</strong> {{ $foto->JudulFoto }}</p>
                                <p><strong>Deskripsi:</strong> {{ $foto->DeskripsiFoto }}</p>
                                <!-- Livewire Like & Dislike Component -->
                                @livewire('likedan-dislike', ['fotoId' => $foto->FotoID, 'userId' => auth()->user()->UserID])
                                <!-- Jumlah Like & Dislike -->

                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <!-- Form Tambah Komentar -->
                        <form action="{{ route('komentar_foto.store', $foto) }}" method="POST">
                            @csrf
                            <textarea name="IsiKomentar" class="form-control mb-3" rows="2" placeholder="Tulis komentar Anda..."></textarea>
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i>
                                Kirim</button>
                        </form>
                        @foreach ($komentars as $comment)
                        <div class="mb-3 border-bottom pb-2">
                            <strong>{{ $comment->user->username }}:</strong>
                            <p class="mb-1">Context:{{ $comment->IsiKomentar }}</p>
                            <small class="text-muted">{{ $comment->created_at->format('d M Y H:i') }}</small>
                            <!-- Tombol Edit Komentar -->
                            @livewire('komentar', ['fotoId' => $foto->FotoID, 'userId' => auth()->user()->UserID])
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Toast Styling */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1055;
        }

        /* Card Styling */
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
        }

        /* Image Responsiveness */
        img.rounded {
            max-width: 100%;
            height: auto;
        }

        /* Komentar Styling */
        .card-footer {
            background-color: #f9f9f9;
        }

        /* Edit Form Styling */
        .form-edit {
            display: none;
        }

        .btn-link {
            text-decoration: none;
        }

        /* Extra Styling */
        .toast-body {
            padding: 10px;
        }

        .mt-2 {
            margin-top: 10px;
        }
    </style>

@endsection
