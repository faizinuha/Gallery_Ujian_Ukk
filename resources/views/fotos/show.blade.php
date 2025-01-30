@extends('layouts.app')

@section('content')
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Card Foto -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="m-0">Gallery</h5>
                        <strong><h5><a href="{{route('dashboard')}}" class="text-end" style="color: black;  text-decoration: none; ">Back</a></h5></strong>
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

                                <!-- Tombol Download Gambar -->
                                <a href="{{ asset('storage/' . $foto->LokasiFile) }}" download="{{ $foto->JudulFoto }}.jpg"
                                    class="btn btn-primary mt-2 ">
                                    Download Gambar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <!-- Form Tambah Komentar -->
                        <form action="{{ route('komentar_foto.store', $foto->FotoID) }}" method="POST" class="mb-3">
                            @csrf
                            <textarea name="IsiKomentar" class="form-control mb-3" rows="2" placeholder="Tulis komentar Anda..."></textarea>
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i>
                                Kirim</button>
                        </form>

                        <!-- Menampilkan daftar komentar -->
                        @foreach ($komentars as $komentar)
                            <div class="border p-2 mb-2">
                                <strong>{{ $komentar->user->username }}:</strong>
                                <p class="mb-1">Context:{{ $komentar->IsiKomentar }}</p>
                                <small class="text-muted">{{ $komentar->created_at->format('d M Y H:i') }}</small>

                                @if (auth()->id() === $komentar->UserID)
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-warning btn-sm"
                                        onclick="editKomentar({{ $komentar->KomentarID }}, '{{ $komentar->IsiKomentar }}')">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <!-- Form Hapus -->
                                    <form
                                        action="{{ route('komentar_foto.destroy', ['foto' => $foto->FotoID, 'komentar' => $komentar->KomentarID]) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <!-- Modal Edit Komentar -->
                    <div class="modal fade" id="editKomentarModal" tabindex="-1" aria-labelledby="editKomentarModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editKomentarModalLabel">Edit Komentar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editKomentarForm" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <textarea id="editIsiKomentar" name="IsiKomentar" class="form-control mb-3" rows="2"></textarea>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Simpan Perubahan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function editKomentar(id, isi) {
                            // Set nilai textarea di modal dengan isi komentar yang akan diedit
                            document.getElementById('editIsiKomentar').value = isi;

                            // Set action form edit ke route yang sesuai dengan komentar yang dipilih
                            document.getElementById('editKomentarForm').action = `/foto/{{ $foto->FotoID }}/komentar/${id}`;

                            // Tampilkan modal
                            var modal = new bootstrap.Modal(document.getElementById('editKomentarModal'));
                            modal.show();
                        }
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
                        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
                    </script>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h4>Foto Lainya Bisa Ke <a href="{{ route('albums.index') }}">Albums</a> </h4>
    @forelse ($fotos as $foto)
        <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}" class="rounded shadow"
            style="width: 300px; height: 350px; object-fit: cover;">
    @empty
        <p>Masih kosong</p>
    @endforelse
    <hr class="size">

    <style>
        /* Toast Styling */
        .size {
            size: 3cm;
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
