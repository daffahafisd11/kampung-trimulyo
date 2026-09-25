<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rt;
use App\Models\Rw;

class RtSeeder extends Seeder
{
    public function run(): void
    {
        $rw = Rw::first();

        for ($i = 1; $i <= 5; $i++) {
            Rt::create([
                'rw_id' => $rw->id,
                'nama_rt' => 'RT 0' . $i,
            ]);
        }
    }
}
