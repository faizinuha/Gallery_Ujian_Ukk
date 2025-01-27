<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KomentarFoto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Komentar extends Component
{
    protected $listeners = ['commentUpdated' => '$refresh'];
    public $fotoId;
    public $userId;
    public $IsiKomentar;
    public $newComment;
    public $editingCommentId = null;
    public $editingCommentContent = '';


    protected $rules = [
        'newComment' => 'required|max:255',
        'editingCommentContent' => 'required|max:255',
    ];

    public function mount($fotoId, $userId)
    {
        $this->fotoId = $fotoId;
        $this->userId = $userId;
    }

    // Menambahkan komentar
    public function addComment()
    {
        $this->validate();

        KomentarFoto::create([
            'FotoID' => $this->fotoId,
            'UserID' => $this->userId,
            'IsiKomentar' => $this->newComment,
            'TanggalKomentar' => now(),
        ]);

        $this->newComment = '';
        session()->flash('success', 'Komentar berhasil ditambahkan.');
    }

    // Mengedit komentar
    public function editComment($commentId)
    {
        logger()->info("Received Comment ID for Editing: {$commentId}");
        $comment = KomentarFoto::find($commentId);
        if ($comment && $comment->UserID === Auth::id()) {
            $this->editingCommentId = $commentId;
            $this->editingCommentContent = $comment->IsiKomentar;
            logger()->info("Editing Comment Content: {$this->editingCommentContent}");
        }
    }

    // Menyimpan perubahan komentar
    public function saveEditComment()
    {
        logger()->info("Save Edit Comment Triggered for ID: {$this->editingCommentId}");

        $this->validate();

        $comment = KomentarFoto::find($this->editingCommentId);
        if ($comment && $comment->UserID === Auth::id()) {
            $comment->update([
                'IsiKomentar' => $this->editingCommentContent,
                'TanggalKomentar' => now(),
            ]);
            logger()->info("Comment Updated: ", $comment->toArray());
            $this->editingCommentId = null;
            session()->flash('success', 'Komentar berhasil diperbarui.');
        } else {
            logger()->error("Edit failed: Unauthorized or Comment not found.");
        }
    }
    // Menghapus komentar
    public function deleteComment($commentId)
    {
        $comment = KomentarFoto::find($commentId);

        if ($comment && $comment->UserID === Auth::id()) {
            $comment->delete();
            session()->flash('success', 'Komentar berhasil dihapus.');
        }

        $this->editingCommentId = null; // Reset state
    }


    public function render()
    {
        $comments = KomentarFoto::with('user')
            ->where('FotoID', $this->fotoId)
            ->orderBy('TanggalKomentar', 'desc')
            ->get();

        Log::info('Comments: ', $comments->toArray());

        return view('livewire.komentar', [
            'comments' => $comments
        ]);
    }
}
