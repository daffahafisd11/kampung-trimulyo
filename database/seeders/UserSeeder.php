<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Warga;
use App\Models\Rt;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ==================== AKUN RW ====================
        User::create([
            'name' => 'Super Admin RW',
            'email' => 'rw@kampung.test',
            'password' => Hash::make('password'),
            'role' => 'rw',
        ]);

        // ==================== AKUN RT ====================
        User::create([
            'name' => 'Admin RT 01',
            'email' => 'rt01@kampung.test',
            'password' => Hash::make('password'),
            'role' => 'rt',
        ]);

        // ==================== AKUN WARGA ====================
        $dataWarga = [
            ['Budi Santoso',   'budi@kampung.test',   '3374010101010001', 'L', '1990-01-15', '081234567001', 'RT 01'],
            ['Siti Aminah',    'siti@kampung.test',   '3374010101010002', 'P', '1992-03-20', '081234567002', 'RT 01'],
            ['Ahmad Fauzi',    'ahmad@kampung.test',  '3374010101010003', 'L', '1988-07-10', '081234567003', 'RT 02'],
            ['Dewi Lestari',   'dewi@kampung.test',   '3374010101010004', 'P', '1995-11-25', '081234567004', 'RT 02'],
            ['Rudi Hartono',   'rudi@kampung.test',   '3374010101010005', 'L', '1985-05-05', '081234567005', 'RT 03'],
            ['Nur Hidayah',    'nur@kampung.test',    '3374010101010006', 'P', '1993-09-12', '081234567006', 'RT 03'],
            ['Joko Widodo',    'joko@kampung.test',   '3374010101010007', 'L', '1980-02-18', '081234567007', 'RT 04'],
            ['Rina Marlina',   'rina@kampung.test',   '3374010101010008', 'P', '1997-06-30', '081234567008', 'RT 04'],
            ['Agus Setiawan',  'agus@kampung.test',   '3374010101010009', 'L', '1991-04-22', '081234567009', 'RT 05'],
            ['Maya Sari',      'maya@kampung.test',   '3374010101010010', 'P', '1994-12-08', '081234567010', 'RT 05'],
        ];

        foreach ($dataWarga as $data) {
            $user = User::create([
                'name'     => $data[0],
                'email'    => $data[1],
                'password' => Hash::make('password'),
                'role'     => 'warga',
            ]);

            $rt = Rt::where('nama_rt', $data[6])->first();

            if ($rt) {
                Warga::create([
                    'user_id'       => $user->id,
                    'rt_id'         => $rt->id,
                    'nik'           => $data[2],
                    'nama_lengkap'  => $data[0],
                    'jenis_kelamin' => $data[3],
                    'tanggal_lahir' => $data[4],
                    'no_hp'         => $data[5],
                    'alamat'        => 'Kampung Trimulyo ' . $data[6],
                ]);
            }
        }

        // ==================== TUNJUK BENDAHARA ====================
        $rt01 = Rt::where('nama_rt', 'RT 01')->first();
        $budi = User::where('email', 'budi@kampung.test')->first();

        if ($rt01 && $budi) {
            $budi->update([
                'is_bendahara' => true,
                'rt_id'        => $rt01->id,
            ]);
        }

        // Set rt_id untuk admin RT 01
        $adminRt = User::where('email', 'rt01@kampung.test')->first();
        if ($rt01 && $adminRt) {
            $adminRt->update(['rt_id' => $rt01->id]);
        }

        $this->command->info('UserSeeder: ' . User::count() . ' user dibuat.');
    }
}