<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KomentarFoto;
use Illuminate\Support\Facades\Auth;

class Komentar extends Component
{
    public $fotoId;
    public $userId;
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
        $this->validate(['newComment' => 'required|max:255']);

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
        $comment = KomentarFoto::find($commentId);
        if ($comment && $comment->UserID === Auth::id()) {
            $this->editingCommentId = $commentId;
            $this->editingCommentContent = $comment->IsiKomentar;
        }
    }

    // Menyimpan perubahan komentar
    public function saveEditComment()
    {
        $this->validate(['editingCommentContent' => 'required|max:255']);

        $comment = KomentarFoto::find($this->editingCommentId);
        if ($comment && $comment->UserID === Auth::id()) {
            $comment->update([
                'IsiKomentar' => $this->editingCommentContent,
                'TanggalKomentar' => now(),
            ]);
            $this->editingCommentId = null;
            session()->flash('success', 'Komentar berhasil diperbarui.');
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
    }

    public function render()
    {
        $comments = KomentarFoto::with('user')
            ->where('FotoID', $this->fotoId)
            ->orderBy('TanggalKomentar', 'desc')
            ->get();

            return view('livewire.komentar', [
                'comments' => $comments
            ]);
    }
}