<?php

namespace App\Http\Controllers;

use App\Models\KomentarFoto;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarFotoController extends Controller
{
    // Menampilkan komentar-komentar pada foto tertentu
    public function show($fotoId)
    {
        $foto = Foto::findOrFail($fotoId);
        $komentars = KomentarFoto::where('FotoID', $fotoId)->get();

        return view('Komentar.show', compact('foto', 'komentars'));
    }

    // Menambahkan komentar pada foto tertentu
    public function store(Request $request, $fotoId)
    {
        $request->validate([
            'IsiKomentar' => 'required|string|max:1000',
        ]);

        KomentarFoto::create([
            'FotoID' => $fotoId,
            'UserID' => Auth::id(),
            'IsiKomentar' => $request->IsiKomentar,
            'TanggalKomentar' => now(),
        ]);

        return redirect()->route('fotos.show', $fotoId)->with('success', 'Komentar berhasil ditambahkan!');
    }


    public function destroy(Foto $foto, KomentarFoto $komentar)
    {
        // Pastikan komentar terkait dengan foto yang benar dan komentar milik pengguna yang sedang login
        if ($komentar->FotoID === $foto->FotoID && $komentar->UserID === Auth::id()) {
            $komentar->delete();  // Hapus komentar jika cocok
        } else {
            // Jika komentar bukan milik pengguna yang sedang login
            return redirect()->route('fotos.show', $foto)->with('error', 'Anda tidak dapat menghapus komentar ini.');
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->route('fotos.show', $foto)->with('success', 'Komentar berhasil dihapus!');
    }
    public function update(Request $request, KomentarFoto $komentarFoto){
        if ($komentarFoto->UserID !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Anda tidak memiliki akses untuk mengedit komentar ini.'], 403);
        }
        $request->validate([
            'IsiKomentar' =>'required|string|max:1000',
        ]);
        $komentarFoto->validate([
            'komentar'  =>'required|string|max:1000',
        ]);
        return response()->json(['success' => true, 'message' => 'Komentar berhasil diubah.']);
    }
}
