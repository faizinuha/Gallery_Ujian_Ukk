<div>
    <!-- Menampilkan pesan sukses atau error -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

     <!-- Form untuk menambahkan komentar -->
    <form wire:submit.prevent="addComment">
        <textarea wire:model="newComment" class="form-control mb-3" rows="2" placeholder="Tulis komentar Anda..."></textarea>
        @error('newComment') <span class="text-danger">{{ $message }}</span> @enderror
        <button type="submit" class="btn btn-success btn-sm">
            <i class="fas fa-paper-plane"></i> Kirim
        </button>
    </form>

    <hr>

    <!-- Form untuk edit komentar jika sedang dalam mode edit -->
    @if ($editingCommentId)
        <form wire:submit.prevent="saveEditComment">
            <textarea wire:model="editingCommentContent" class="form-control mb-3" rows="2" placeholder="Edit komentar Anda..."></textarea>
            @error('editingCommentContent') <span class="text-danger">{{ $message }}</span> @enderror
            <button type="submit" class="btn btn-warning btn-sm">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
            <button type="button" wire:click="$set('editingCommentId', null)" class="btn btn-secondary btn-sm">
                Batal
            </button>
        </form>
    @endif

    <hr>

    <!-- Menampilkan daftar komentar -->
    @foreach ($comments as $comment)
        <div class="mb-3 border-bottom pb-2">
            <strong>{{ $comment->user->name }}:</strong>
            <p class="mb-1">{{ $comment->IsiKomentar }}</p>
            <small class="text-muted">{{ $comment->created_at->format('d M Y H:i') }}</small>

            <!-- Tombol Edit hanya untuk pemilik komentar -->
            @if ($comment->UserID === auth()->id() && !$editingCommentId)
                <button wire:click="editComment({{ $comment->KomentarID }})" class="btn btn-link text-primary btn-sm p-0">
                    Edit
                </button>
            @endif

            <!-- Tombol Hapus hanya untuk pemilik komentar -->
            @if ($comment->UserID === auth()->id())
                <button wire:click="deleteComment({{ $comment->KomentarID }})" class="btn btn-link text-danger btn-sm p-0">
                    Hapus
                </button>
            @endif
        </div>
    @endforeach
</div>
