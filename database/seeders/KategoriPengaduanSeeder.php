<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriPengaduan;

class KategoriPengaduanSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Kebersihan', 'deskripsi' => 'Masalah kebersihan lingkungan'],
            ['nama_kategori' => 'Infrastruktur', 'deskripsi' => 'Kerusakan jalan, jembatan, drainase'],
            ['nama_kategori' => 'Keamanan', 'deskripsi' => 'Masalah keamanan kampung'],
            ['nama_kategori' => 'Fasilitas Umum', 'deskripsi' => 'Fasilitas umum kampung'],
            ['nama_kategori' => 'Lingkungan', 'deskripsi' => 'Pencemaran dan lingkungan hidup'],
            ['nama_kategori' => 'Lainnya', 'deskripsi' => 'Pengaduan lainnya'],
        ];

        foreach ($kategori as $k) {
            KategoriPengaduan::create($k);
        }
    }
}