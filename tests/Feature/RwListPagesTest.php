<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('halaman daftar RW tetap berfungsi saat filter pencarian digunakan', function () {
    $admin = User::factory()->create(['role' => 'rw']);

    $pages = [
        route('rw.rt.index', ['search' => 'RT 01']),
        route('rw.warga.index', ['search' => 'Budi']),
        route('rw.umkm.index', ['search' => 'Warung']),
        route('rw.pengaduan.index', ['search' => 'Jalan']),
    ];

    foreach ($pages as $page) {
        $this->actingAs($admin)->get($page)->assertOk();
    }
});