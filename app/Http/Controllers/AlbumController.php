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
        $request->validate([
            'NamaAlbum' => 'required|string|max:255',
            'Deskripsi' => 'required',
            'TanggalDibuat' => 'required|date',
        ]);

        Album::create([
            'NamaAlbum' => $request->NamaAlbum,
            'Deskripsi' => $request->Deskripsi,
            'TanggalDibuat' => $request->TanggalDibuat,
            'UserID' => Auth::id(),
        ]);

        return redirect()->route('albums.index')->with('success', 'Album berhasil dibuat!');
    }

    public function show($id)
    {
        $album = Album::findOrFail($id);
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
