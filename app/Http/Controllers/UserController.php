<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\album;
class UserController extends Controller
{
    // Menampilkan semua pengguna
    public function index()
    {
        // Retrieve albums and photos (modify as needed)
        $albums = album::all();  // Get all albums
        $photos = Foto::all();  // Get all photos

        // Pass data to the view
        return view('user-management.index', compact('albums', 'photos'));
    }
}
