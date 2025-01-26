<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LikeFoto;
use App\Models\Foto;

class LikeFotoController extends Controller
{
    // Fungsi untuk Like atau Unlike
    public function toggleLike($fotoId)
{
    $foto = Foto::findOrFail($fotoId);
    $user = auth()->user();

    // Cek apakah foto sudah disukai oleh pengguna
    $like = $foto->likes()->where('user_id', $user->id)->first();

    if ($like) {
        // Jika sudah disukai, hapus like
        $foto->likes()->detach($user->id);
        $status = 'unliked';
    } else {
        // Jika belum disukai, tambahkan like
        $foto->likes()->attach($user->id);
        $status = 'liked';
    }

    // Kembalikan status terbaru ke frontend
    return response()->json(['status' => $status]);
}

}
