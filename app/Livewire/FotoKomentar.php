<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KomentarFoto;
use Illuminate\Support\Facades\Auth;

class FotoKomentar extends Component
{
    public $fotoId;
    public $userId;
    public $IsiKomentar;

    protected $rules = [
        'IsiKomentar' => 'required|max:255',
    ];

    public function mount($fotoId, $userId)
    {
        $this->fotoId = $fotoId;
        $this->userId = $userId;
    }

    public function addComment()
    {
        $this->validate();

        KomentarFoto::create([
            'FotoID' => $this->fotoId,
            'UserID' => $this->userId,
            'IsiKomentar' => $this->IsiKomentar,
            'TanggalKomentar' => now(),
        ]);

        $this->IsiKomentar = '';
        session()->flash('success', 'Komentar berhasil ditambahkan.');
    }

    public function render()
    {
        return view('livewire.foto-komentar');
    }
}
