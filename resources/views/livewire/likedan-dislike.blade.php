<div>
    <!-- Menampilkan tombol Like atau Dislike berdasarkan status isLiked -->
    @if ($isLiked)
        <p>{{ $totalLikes }} Likes</p>
        <button wire:click="dislikeFoto" class="btn btn-danger">Dislike</button>
    @else
        <p>{{ $totalLikes }} Likes</p>
        <button wire:click="likeFoto" class="btn btn-primary">Like</button>
    @endif

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session()->has('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
