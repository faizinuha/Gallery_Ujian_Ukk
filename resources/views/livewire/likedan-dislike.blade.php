<div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Menampilkan jumlah like -->
    <p>{{ $totalLikes }} Likes</p>

    <!-- Menampilkan tombol Like atau Dislike berdasarkan status isLiked -->
    @if (Auth::check())
        @if ($isLiked)
            <button wire:click="dislikeFoto" class="btn btn-danger">
                <i class="fas fa-thumbs-down"></i> Dislike
            </button>
        @else
            <button wire:click="likeFoto" class="btn btn-primary">
                <i class="fas fa-thumbs-up"></i> Like
            </button>
        @endif
    @else
        <p>Login untuk Like</p>
    @endif

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session()->has('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
