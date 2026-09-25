<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KasRt;
use App\Models\Rt;
use App\Models\User;

class KasRtSeeder extends Seeder
{
    public function run(): void
    {
        $rt01 = Rt::where('nama_rt', 'RT 01')->first();
        $bendahara = User::where('is_bendahara', true)->first();

        if(!$rt01 || !$bendahara) {
            return;
        }

        $data = [
            ['2026-01-05', 'masuk',  'Iuran Warga',    'Iuran bulan Januari',   500000],
            ['2026-01-10', 'keluar', 'Belanja',        'Beli sapu & alat kebersihan', 75000],
            ['2026-02-05', 'masuk',  'Iuran Warga',    'Iuran bulan Februari',  500000],
            ['2026-02-15', 'keluar', 'Kegiatan',       'Perayaan HUT RT',       250000],
            ['2026-03-05', 'masuk',  'Donasi',      'Donasi dari warga luar', 300000],
        ];

        foreach ($data as $d) {
            KasRt::create([
                'rt_id' => $rt01->id,
                'user_id' => $bendahara->id,
                'tanggal' => $d[0],
                'jenis' => $d[1],
                'kategori' => $d[2],
                'keterangan' => $d[3],
                'jumlah' => $d[4],
            ]);
        }
    }
}
