<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\album;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
        $a = Album::all(); // Get all albums (all albums)
        $p = Foto::paginate(12); // Get photos with pagination (12 per page)
        return view('dashboard_gallery.home', compact('a', 'p'));
    }

    public function album()
    {
        // Mengambil semua album beserta foto terbaru terkait
        $albums = Album::with(['fotos' => function($query) {
            $query->latest()->limit(1); // Hanya ambil foto terbaru per album
        }])->get();

        return view('dashboard_gallery.albums', compact('albums'));
    }

    public function about()
    {
        return view('dashboard_gallery.about');
    }

    public function fetchImages(Request $request)
{
    $apiKey = '48611530-6f58b2abc5dc5c620a49c38f3';
    $url = 'https://pixabay.com/api/?key=' . $apiKey . '&q=your_search_term&image_type=photo&per_page=20&page=' . $request->page;

    $response = Http::get($url);
    $images = $response->json();

    return response()->json($images);
}

}
