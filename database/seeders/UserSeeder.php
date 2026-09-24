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
        // Super Admin (RW)
        User::firstOrCreate(
            ['email' => 'rw@kampung.test'],
            [
                'name' => 'Super Admin RW',
                'password' => Hash::make('password'),
                'role' => 'rw',
            ]
        );

        // Admin RT 01
        $rt01 = Rt::where('nama_rt', 'RT 01')->first();

        $userRt = User::firstOrCreate(
            ['email' => 'rt01@kampung.test'],
            [
                'name' => 'Admin RT 01',
                'password' => Hash::make('password'),
                'role' => 'rt',
            ]
        );

        // Warga contoh di RT 01
        $userWarga = User::firstOrCreate(
            ['email' => 'warga@kampung.test'],
            [
                'name' => 'Warga Contoh',
                'password' => Hash::make('password'),
                'role' => 'warga',
            ]
        );

        if ($rt01) {
            Warga::updateOrCreate(
                ['user_id' => $userWarga->id],
                [
                    'rt_id' => $rt01->id,
                    'nik' => '3374010101010001',
                    'nama_lengkap' => 'Warga Contoh',
                    'jenis_kelamin' => 'L',
                    'tanggal_lahir' => '1990-01-01',
                    'no_hp' => '081234567890',
                    'alamat' => 'Kampung Trimulyo RT 01',
                ]
            );
        }
    }
}