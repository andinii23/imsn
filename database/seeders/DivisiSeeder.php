<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::create([
            'nama_divisi' => 'Humas',
            'deskripsi' => 'Hubungan Masyarakat'
        ]);
    }
}
