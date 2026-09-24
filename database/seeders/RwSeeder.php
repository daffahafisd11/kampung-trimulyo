<?php

namespace Database\Seeders;

use App\Models\Rw;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RwSeeder extends Seeder
{
    public function run(): void
    {
        Rw::create([
            'nama_rw' => 'RW 02',
            'alamat' => 'Kampung Trimulyo',
        ]);
    }
}
