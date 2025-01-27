<div>
    <!-- Menampilkan daftar komentar -->
    @foreach ($comments as $comment)
        <div class="comment">
            <!-- Tampilkan form edit hanya untuk komentar yang sedang diedit -->
            @if ($editingCommentId === $comment->KomentarID)
                <form wire:submit.prevent="saveEditComment">
                    <textarea wire:model="editingCommentContent" class="form-control mb-3" rows="2" placeholder="Edit komentar Anda..."></textarea>
                    @error('editingCommentContent')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="btn btn-warning btn-sm">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <button type="button" wire:click="$set('editingCommentId', null)" class="btn btn-secondary btn-sm">
                        Batal
                    </button>
                </form>
            @else
                <!-- Menampilkan komentar -->
                <div class="comment">
                    <strong>{{ $comment->user->username }}:</strong>
                    <p class="mb-1">Context:{{ $comment->IsiKomentar }}</p>
                    <small class="text-muted">{{ $comment->created_at->format('d M Y H:i') }}</small>
        
                    @if ($comment->UserID === auth()->id())
                        {{-- <button wire:click="editComment({{ $comment->KomentarID }})"
                            class="btn btn-link text-primary btn-sm p-0">
                            Edit
                        </button> --}}
                        <button wire:click="deleteComment({{ $comment->KomentarID }})"
                            class="btn btn-link text-danger btn-sm p-0">
                            Hapus
                        </button>
                    @endif
                </div>
            @endif
        </div>
    @endforeach
</div>
