<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Foto;
use App\Models\LikeFoto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class LikedanDislike extends Component
{
    public $fotoId;
    public $userId;
    public  $isLiked = false;

    public function mount($fotoId, $userId)
    {
        $this->fotoId = $fotoId;
        $this->userId = $userId;

        // Cek apakah foto sudah disukai oleh user
        $this->isLiked = LikeFoto::where('FotoID', $this->fotoId)
                                  ->where('UserID', $this->userId)
                                  ->exists();
    }
    public function likeFoto()
    {
        if (!$this->isLiked) {
            LikeFoto::create([
                'FotoID' => $this->fotoId,
                'UserID' => $this->userId,
                'TanggalLike' => Carbon::now(),
            ]);
            $this->isLiked = true;
        }
    }
     // Fungsi untuk dislike foto
     public function dislikeFoto()
     {
         if ($this->isLiked) {
             LikeFoto::where('FotoID', $this->fotoId)
                     ->where('UserID', $this->userId)
                     ->delete();
             $this->isLiked = false;
         }
     }
    public function render()
    {

        // Ambil data like-like yang ada pada foto tersebut
        $likes = LikeFoto::where('FotoID', $this->fotoId)->get();
        // Ambil jumlah like-like yang ada pada foto tersebut
        $totalLikes = LikeFoto::where('FotoID', $this->fotoId)->count();

        return view('livewire.likedan-dislike', compact(  'likes', 'totalLikes'));
    }
}
