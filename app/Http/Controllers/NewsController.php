<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;

class NewsController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('kategori')) {
            $kategori = Kategori::firstWhere('slug', request('kategori'));
            $title = ' by ' . $kategori->kategori_news;
        }
        if (request('penulis')) {
            $penulis = User::firstWhere('username', request('penulis'));
            $title = ' in ' . $penulis->nama_lengkap;
        }

        return view('posts', [
            "judul" => "Semua News" . $title,
            "active" => 'news',
            "posts" => News::latest()->filter(request(['search', 'kategori', 'penulis']))->paginate(7)->withQueryString(),

        ]);
    }

    public function show(News $post)
    {
        return view('post', [
            "judul" => "Single Post",
            "active" => 'news',
            "post" => $post,
        ]);
    }
}
