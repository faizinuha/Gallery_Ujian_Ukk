@extends('layouts.app')

@section('content')
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0/dist/css/tabler.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0/dist/js/tabler.min.js"></script>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Card Foto -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="m-0">Tampilan | Gallery</h5>
                        {{-- <strong>
                            <h5><a href="{{ route('dashboard') }}" class="text-end"
                                    style="color: black;  text-decoration: none; ">Back</a></h5>
                        </strong> --}}
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
                                @auth
                                    @livewire('likedan-dislike', ['fotoId' => $foto->FotoID, 'userId' => auth()->user()->UserID])
                                @endauth

                                <!-- Tombol Download Gambar -->
                                <a href="{{ asset('storage/' . $foto->LokasiFile) }}" download="{{ $foto->JudulFoto }}.jpg"
                                    class="btn btn-primary mt-2 ">
                                    Download Gambar
                                </a>
                            </div>
                        </div>
                    </div>
                    @if (Auth::check())
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
                    @else
                        <p>Login Terlebih Dahulu <a href="{{ route('register') }}">Gabung!</a></p>
                    @endif

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


    <h4 class="bg-blue bg-gradient p-2 text-white rounded text-center">
        Foto Lainnya Bisa Ke <a href="{{ route('albums.index') }}" class="text-warning fw-bold">Albums</a>
    </h4>

    <hr>

    <div class="masonry">
        @forelse ($fotos as $foto)
            <a href="{{ route('fotos.show', $foto->FotoID) }}">
                <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}">
            </a>

            <span class="tm-text-gray-black oke">
                Tanggal Post: {{ \Carbon\Carbon::parse($foto->TanggalUnggah)->format('d-m-Y') }}
            </span>
            {{-- <span>9,906 views</span> --}}
        @empty
            <p class="text-muted text-center">Masih kosong</p>
        @endforelse
    </div>

    <hr class="my-4">


    <style>
        .oke {
            margin-left: 15px;
        }

        .masonry {
            column-count: 3;
            /* 3 kolom di layar besar */
            column-gap: 15px;
        }

        .masonry img {
            width: 100%;
            border-radius: 5px;
            margin-left: 15px;
            margin-bottom: 15px;
            transition: transform 0.3s ease-in-out;
        }

        /* .masonry img:hover {
                    transform: scale(1.05);
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                } */

        @media (max-width: 768px) {
            .masonry {
                column-count: 2;
            }

            /* 2 kolom di tablet */
        }

        @media (max-width: 480px) {
            .masonry {
                column-count: 1;
            }

            /* 1 kolom di HP */
        }

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
