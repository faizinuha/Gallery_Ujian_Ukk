<div>
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

    <!-- Menampilkan daftar komentar -->
    @foreach ($comments as $comment)
        <div class="mb-3 border-bottom pb-2">
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
