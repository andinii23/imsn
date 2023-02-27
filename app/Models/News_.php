<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News
{
    private static $news_posts = [
        [
            "title" => "Judul News Pertama",
            "penulis" => "dini",
            "slug" => "slug-pertama",
            "kutipan" => "ahahha",
            "isi_news" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere recusandae, a sunt maxime modi cum fugiat quod hic odit fuga culpa eveniet dolore voluptas itaque suscipit, quo molestiae ipsum maiores saepe! Tempore praesentium provident ratione? Eius esse beatae sequi atque facere nemo sunt, dolor doloremque quisquam enim ab consequuntur tempore deleniti excepturi distinctio. Assumenda dolorem porro unde quam. Maxime, molestias minima. In accusamus magnam fuga ab, obcaecati possimus architecto impedit commodi, animi nulla rerum doloribus corporis quos, odit laudantium voluptatibus?",
            "news_img" => "img.jpg"
        ],
        [
            "title" => "Judul News Kedua",
            "penulis" => "pera",
            "slug" => "slug-kedua",
            "kutipan" => "ahahha",
            "isi_news" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere recusandae, a sunt maxime modi cum fugiat quod hic odit fuga culpa eveniet dolore voluptas itaque suscipit, quo molestiae ipsum maiores saepe! Tempore praesentium provident ratione? Eius esse beatae sequi atque facere nemo sunt, dolor doloremque quisquam enim ab consequuntur tempore deleniti excepturi distinctio. Assumenda dolorem porro unde quam. Maxime, molestias minima. In accusamus magnam fuga ab, obcaecati possimus architecto impedit commodi, animi nulla rerum doloribus corporis quos, odit laudantium voluptatibus? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere recusandae, a sunt maxime modi cum fugiat quod hic odit fuga culpa eveniet dolore voluptas itaque suscipit, quo molestiae ipsum maiores saepe! Tempore praesentium provident ratione? Eius esse beatae sequi atque facere nemo sunt, dolor doloremque quisquam enim ab consequuntur tempore deleniti excepturi distinctio. Assumenda dolorem porro unde quam. Maxime, molestias minima. In accusamus magnam fuga ab, obcaecati possimus architecto impedit commodi, animi nulla rerum doloribus corporis quos, odit laudantium voluptatibus?",
            "news_img" => "img.jpg"
        ],
    ];

    public static function all()
    {
        return collect(self::$news_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
