<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriUmkm;

class KategoriUmkmSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Makanan',
            'Minuman',
            'Fashion',
            'Jasa',
            'Kerajinan',
            'Sembako',
            'Lainnya',
        ];

        foreach ($kategori as $k) {
            KategoriUmkm::create(['nama_kategori' => $k]);
        }
    }
}