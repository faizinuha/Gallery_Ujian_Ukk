<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KomentarFotoController;
use App\Http\Controllers\LikeFotoController;
use App\Http\Controllers\UserController;

// Rute untuk Album
Route::resource('albums', AlbumController::class);

// Rute untuk Foto (Hanya untuk pengguna yang sudah login)
Route::resource('fotos', FotosController::class);
Route::get('/search', [FotosController::class, 'search'])->name('fotos.search');

// Routes untuk komentar
Route::get('foto/{foto}/komentar', [KomentarFotoController::class, 'show'])->name('komentar_foto.show');
Route::post('foto/{foto}/komentar', [KomentarFotoController::class, 'store'])->name('komentar_foto.store')->middleware('auth');
Route::delete('foto/{foto}/komentar/{komentar}', [KomentarFotoController::class, 'destroy'])->name('komentar_foto.destroy')->middleware('auth');
Route::put('foto/{foto}/komentar/{komentar}', [KomentarFotoController::class, 'update'])->name('komentar_foto.update')->middleware('auth');
// Rute untuk Like Foto
Route::post('/fotos/{fotoId}/like', [LikeFotoController::class, 'toggleLike'])->name('fotos.like')->middleware('auth');  // Middleware untuk otentikasi

// Rute untuk Dashboard
Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/album', [HomeController::class, 'album'])->name('album');
Route::get('/dashboardUsers', [HomeController::class, 'index'])->name('dashboardUsers');  // Rute untuk dashboard pengguna

// Rute untuk Otentikasi
Auth::routes();


// Rute untuk About
// Route::get('/about', function () {
//     return view('dashboard_gallery.about');
// });
// Test route (dikomentari, dapat dihapus jika sudah tidak diperlukan)
// Route::get('/', function () {
//     return view('dashboard_gallery.home');
// });
