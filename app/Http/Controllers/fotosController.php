<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KomentarFoto;

class FotosController extends Controller
{
   
    // Menampilkan daftar foto berdasarkan Album dan User yang sedang login
    public function index()
    {
        $fotos = Foto::where('UserID', Auth::id())->get();
        return view('fotos.index', compact('fotos'));
    }

    // Menampilkan form untuk membuat foto baru
    public function create()
    {
        // Mengambil semua album yang dimiliki oleh user yang sedang login
        $albums = Album::where('UserID', Auth::id())->get();
        return view('fotos.create', compact('albums'));
    }

    // Menyimpan foto yang baru dibuat
    public function store(Request $request)
    {
        $request->validate([
            'JudulFoto' => 'required|string|max:255',
            'DeskripsiFoto' => 'required',
            'TanggalUnggah' => 'required|date',
            'LokasiFile' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image files
            'AlbumID' => 'required|exists:albums,AlbumID',
        ]);

        // Handle file upload
        if ($request->hasFile('LokasiFile')) {
            $file = $request->file('LokasiFile');
            $filePath = $file->store('fotos', 'public');  // Store the file in storage/app/public/fotos directory
        }

        Foto::create([
            'JudulFoto' => $request->JudulFoto,
            'DeskripsiFoto' => $request->DeskripsiFoto,
            'TanggalUnggah' => $request->TanggalUnggah,
            'LokasiFile' => $filePath ?? null,  // Store the file path
            'AlbumID' => $request->AlbumID,
            'UserID' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Foto berhasil diunggah!');
    }

    // Menampilkan detail foto berdasarkan ID
    public function show($id)
    {
        $foto = Foto::findOrFail($id);
        $komentars = KomentarFoto::where('FotoID', $id)->get(); // Mengambil semua komentar untuk foto tertentu
        return view('fotos.show', compact('foto', 'komentars')); // Pastikan untuk memakai plural untuk komentar
    }

    // Menampilkan form untuk mengedit foto
    public function edit($id)
    {
        $foto = Foto::findOrFail($id);

        // Pastikan foto milik user yang sedang login
        if ($foto->UserID !== Auth::id()) {
            return redirect()->route('fotos.index')->with('error', 'Unauthorized access');
        }

        // Mengambil album yang dimiliki oleh user
        $albums = Album::where('UserID', Auth::id())->get();
        return view('fotos.edit', compact('foto', 'albums'));
    }

    // Memperbarui data foto
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'JudulFoto' => 'required|string|max:255',
            'DeskripsiFoto' => 'required',
            'TanggalUnggah' => 'required|date',
            'LokasiFile' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validate image files if provided
            'AlbumID' => 'required|exists:albums,AlbumID', // Ensure AlbumID exists in the albums table
        ]);

        // Find the photo by ID
        $foto = Foto::findOrFail($id);

        // Make sure the photo belongs to the currently logged-in user
        if ($foto->UserID !== Auth::id()) {
            return redirect()->route('fotos.index')->with('error', 'Unauthorized access');
        }

        // Handle file upload if a new file is uploaded
        if ($request->hasFile('LokasiFile')) {
            // Delete the old file if it exists
            if (file_exists(storage_path('app/public/' . $foto->LokasiFile))) {
                unlink(storage_path('app/public/' . $foto->LokasiFile));
            }

            // Store the new file
            $file = $request->file('LokasiFile');
            $filePath = $file->store('fotos', 'public');
        } else {
            // Retain the old file if no new file is uploaded
            $filePath = $foto->LokasiFile;
        }

        // Update the photo data
        $foto->update([
            'JudulFoto' => $request->JudulFoto,
            'DeskripsiFoto' => $request->DeskripsiFoto,
            'TanggalUnggah' => $request->TanggalUnggah,
            'LokasiFile' => $filePath, // Store the new file path or retain the old one
            'AlbumID' => $request->AlbumID,
        ]);

        // Redirect to the photos index with a success message
        return redirect()->route('fotos.index')->with('success', 'Foto berhasil diperbarui!');
    }

    // Menghapus foto
    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);

        // Pastikan foto milik user yang sedang login
        if ($foto->UserID !== Auth::id()) {
            return redirect()->route('fotos.index')->with('error', 'Unauthorized access');
        }

        $foto->delete();
        return redirect()->route('fotos.index')->with('success', 'Foto berhasil dihapus!');
    }
}
