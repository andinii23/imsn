<?php

use App\Models\News;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\AdvisorsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\DivisiMemberController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\DashboardNewsController;
use App\Http\Controllers\KategoriEventController;
use App\Http\Controllers\StrkOrganisasiController;
use App\Http\Controllers\WelcomeMessageController;

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

Route::resource('/dashboard/kategoris', AdminKategoriController::class)->except('show')->middleware('admin');

Route::get('/dashboard/kategoris/checkSlug', [AdminKategoriController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/divisi', DivisiController::class)->except('show');
Route::resource('/dashboard/sejarah', SejarahController::class)->except('show');
Route::resource('/dashboard/about', AboutController::class)->except('show');
Route::resource('/dashboard/visimisi', VisiMisiController::class)->except('show');
Route::resource('/dashboard/contact', ContactController::class)->except('show');
Route::resource('/dashboard/kategorievent', KategoriEventController::class)->except('show');
Route::resource('/dashboard/welcomemessage', WelcomeMessageController::class)->except('show');
Route::resource('/dashboard/strkorganisasi', StrkOrganisasiController::class)->except('show');
Route::resource('/dashboard/partnership', PartnershipController::class)->except('show');
Route::resource('/dashboard/advisors', AdvisorsController::class)->except('show');
Route::resource('/dashboard/divisimember', DivisiMemberController::class)->except('show');
Route::resource('/dashboard/event', EventController::class)->except('show');
