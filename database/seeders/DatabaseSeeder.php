<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        News::factory(20)->create();
        User::create([
            'username' => 'dini',
            'nama_lengkap' => 'Nurandini. P',
            'email' => 'dini@gmail.com',
            'password' => bcrypt('11111'),
        ]);
        // User::create([
        //     'username' => 'pera',
        //     'nama_lengkap' => 'Pera Anggraini',
        //     'email' => 'pera@gmail.com',
        //     'password' => bcrypt('11111'),
        // ]);

        Kategori::create([
            'kategori_news' => 'Tambang',
            'slug' => 'tambang'
        ]);
        Kategori::create([
            'kategori_news' => 'Emas',
            'slug' => 'emas'
        ]);
        Kategori::create([
            'kategori_news' => 'Batu',
            'slug' => 'batu'
        ]);

        // News::create([
        //     'title' => 'Judul Pertama',
        //     'kategori_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'judul-pertama',
        //     'kutipan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam ea nemo quibusdam dignissimos',
        //     'isi_news' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam ea nemo quibusdam dignissimos. Officiis iusto commodi fugiat qui quos molestiae a, laboriosam iste at, modi officia ad facere voluptates! Itaque, ipsum officiis. Architecto recusandae nesciunt autem consequuntur hic. Cumque, quam repellat.</p><p> Voluptatem odit omnis, quidem voluptas optio, doloremque, ducimus aut natus consequuntur iure soluta velit officiis commodi. Deserunt odit possimus temporibus quo ea aperiam tenetur quibusdam inventore consequuntur nostrum maxime veritatis sed doloribus ab nesciunt atque, aut eius alias debitis cum repellendus! Minus eaque debitis fugit, saepe et soluta labore sit quasi aliquam perferendis eligendi necessitatibus? Facilis a similique voluptates</p>.'
        // ]);
        // News::create([
        //     'title' => 'Judul Kedua',
        //     'kategori_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'judul-kedua',
        //     'kutipan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam ea nemo quibusdam dignissimos',
        //     'isi_news' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam ea nemo quibusdam dignissimos. Officiis iusto commodi fugiat qui quos molestiae a, laboriosam iste at, modi officia ad facere voluptates! Itaque, ipsum officiis. Architecto recusandae nesciunt autem consequuntur hic. Cumque, quam repellat.</p><p> Voluptatem odit omnis, quidem voluptas optio, doloremque, ducimus aut natus consequuntur iure soluta velit officiis commodi. Deserunt odit possimus temporibus quo ea aperiam tenetur quibusdam inventore consequuntur nostrum maxime veritatis sed doloribus ab nesciunt atque, aut eius alias debitis cum repellendus! Minus eaque debitis fugit, saepe et soluta labore sit quasi aliquam perferendis eligendi necessitatibus? Facilis a similique voluptates</p>.'
        // ]);
        // News::create([
        //     'title' => 'Judul Ketiga',
        //     'kategori_id' => 2,
        //     'user_id' => 2,
        //     'slug' => 'judul-ketiga',
        //     'kutipan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam ea nemo quibusdam dignissimos',
        //     'isi_news' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam ea nemo quibusdam dignissimos. Officiis iusto commodi fugiat qui quos molestiae a, laboriosam iste at, modi officia ad facere voluptates! Itaque, ipsum officiis. Architecto recusandae nesciunt autem consequuntur hic. Cumque, quam repellat.</p><p> Voluptatem odit omnis, quidem voluptas optio, doloremque, ducimus aut natus consequuntur iure soluta velit officiis commodi. Deserunt odit possimus temporibus quo ea aperiam tenetur quibusdam inventore consequuntur nostrum maxime veritatis sed doloribus ab nesciunt atque, aut eius alias debitis cum repellendus! Minus eaque debitis fugit, saepe et soluta labore sit quasi aliquam perferendis eligendi necessitatibus? Facilis a similique voluptates</p>.'
        // ]);
    }
}
