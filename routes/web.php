<?php

use App\Models\News;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardNewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'judul' => 'Home',
        "active" => 'home',
    ]);
});
Route::get('/about', function () {
    return view('about', [
        'judul' => 'About',
        "active" => 'about',
        'title' => 'About Us',
        'deskripsi' => 'sjnjnsjnsnu jsnjsnjsj jsnsjnsj',

    ]);
});

Route::get('/news', [NewsController::class, 'index']);

//halaman single post
Route::get('posts/{post:slug}', [NewsController::class, 'show']);

Route::get('/event', function () {
    return view('event', [
        'judul' => 'Event',
        "active" => 'event',
    ]);
});
Route::get('/division', function () {
    return view('division', [
        'judul' => 'Divisi',
        "active" => 'divisi',
    ]);
});
Route::get('/kategoris', function () {
    return view('kategoris', [
        'judul' => 'News Kategoris',
        "active" => 'kategori',
        'kategoris' => Kategori::all(),
    ]);
});


Route::get('/penulis/{penulis:username}', function (User $penulis) {
    return view('posts', [
        'judul' => "Postingan dari Penulis : $penulis->nama_lengkap",
        'posts' => $penulis->posts->load('kategori', 'penulis'),
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/news/checkSlug', [DashboardNewsController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/news', DashboardNewsController::class)->middleware('auth');
