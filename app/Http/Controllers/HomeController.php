<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\album;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Retrieve albums and photos (modify as needed)
        $albums = Album::all();  // Get all albums
        $photos = Foto::all();  // Get all photos

        // Pass data to the view
        return view('user-management.index', compact('albums', 'photos'));
    }

    // Add your other controller methods here...
    public function dashboard()
    {
        $a = Album::all(); // Get all albums
        $p = Foto::all(); // Get all photos
        return view('dashboard_gallery.home', compact('a', 'p'));
    }

}
