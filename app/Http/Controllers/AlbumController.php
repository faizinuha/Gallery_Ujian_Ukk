<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::where('UserID', Auth::id())->get();
        return view('albums.index', compact('albums'));
    }
    public function create()
    {
        $albums = Album::where('UserID', Auth::id())->get(); // Get the albums for the logged-in user
        return view('albums.create', compact('albums')); // Pass the albums to the view
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'NamaAlbum' => 'required|string|max:255|unique:albums,NamaAlbum',
                'Deskripsi' => 'required|string',
                'TanggalDibuat' => 'required|date',
            ],
            [
                'NamaAlbum.required' => 'Nama album wajib diisi',
                'NamaAlbum.unique' => 'Nama album sudah ada',
                'Deskripsi.required' => 'Deskripsi wajib diisi',
                'TanggalDibuat.required' => 'Tanggal dibuat wajib diisi',
            ]
        );

        Album::create([
            'NamaAlbum' => $validatedData['NamaAlbum'],
            'Deskripsi' => $validatedData['Deskripsi'],
            'TanggalDibuat' => $validatedData['TanggalDibuat'],
            'UserID' => Auth::id(),
        ]);

        return redirect()->route('albums.index')->with('success', 'Album berhasil dibuat!');
    }

    public function show($albumId)
    {
        // Ambil album berdasarkan ID
        $album = Album::with('fotos')->findOrFail($albumId);

        // Kembalikan ke view album.show dengan membawa data album
        return view('albums.show', compact('album'));
    }



    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('albums.edit', compact('album'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaAlbum' => 'required|string|max:255',
            'Deskripsi' => 'required',
            'TanggalDibuat' => 'required|date',
        ]);

        $album = Album::findOrFail($id);
        $album->update($request->all());

        return redirect()->route('albums.index')->with('success', 'Album berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()->route('albums.index')->with('success', 'Album berhasil dihapus!');
    }
}
