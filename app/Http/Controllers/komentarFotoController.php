<?php
namespace App\Http\Controllers;

use App\Models\KomentarFoto;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarFotoController extends Controller
{
    public function show($fotoId)
    {
        $foto = Foto::findOrFail($fotoId);
        $komentars = KomentarFoto::where('FotoID', $fotoId)->get();

        return view('fotos.show', compact('foto', 'komentars'));
    }
    // Menambahkan komentar baru ke dalam foto
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
    
        return redirect()->route('fotos.show', $fotoId)
                         ->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function destroy($fotoId, $komentarId)
    {
        // Cek apakah komentar ada dan milik user yang sedang login
        $komentar = KomentarFoto::where('KomentarID', $komentarId)
                                ->where('FotoID', $fotoId)
                                ->first();
    
        if (!$komentar) {
            return redirect()->back()->with('error', 'Komentar tidak ditemukan.');
        }
    
        if ($komentar->UserID == Auth::id()) {
            $komentar->delete();
            return redirect()->route('fotos.show', $fotoId)->with('success', 'Komentar berhasil dihapus!');
        }
    
        return redirect()->route('fotos.show', $fotoId)->with('error', 'Anda tidak dapat menghapus komentar ini.');
    }    

    public function update(Request $request, $fotoId, $komentarId)
    {
        $request->validate([
            'IsiKomentar' => 'required|string|max:1000',
        ]);
    
        $komentar = KomentarFoto::findOrFail($komentarId);
    
        // Pastikan hanya pemilik komentar yang bisa mengedit
        if ($komentar->UserID !== Auth::id()) {
            return redirect()->route('fotos.show', $fotoId)->with('error', 'Anda tidak memiliki izin untuk mengedit komentar ini.');
        }
    
        $komentar->update([
            'IsiKomentar' => $request->IsiKomentar,
            'TanggalKomentar' => now(),
        ]);
    
        return redirect()->route('fotos.show', $fotoId)->with('success', 'Komentar berhasil diperbarui!');
    }
}
