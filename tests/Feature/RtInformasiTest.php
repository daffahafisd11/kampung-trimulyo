<?php

use App\Models\Informasi;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

function createRtAdmin(): User
{
    $rw = Rw::create(['nama_rw' => 'RW 01']);
    $rt = Rt::create(['rw_id' => $rw->id, 'nama_rt' => 'RT 01']);

    return User::factory()->create([
        'role' => 'rt',
        'rt_id' => $rt->id,
    ]);
}

test('RT dapat membuat informasi tanpa gambar dan kembali ke daftar RT', function () {
    $user = createRtAdmin();

    $this->actingAs($user)
        ->post(route('rt.informasi.store'), [
            'judul' => 'Kerja Bakti',
            'isi' => 'Kerja bakti hari Minggu.',
            'tanggal' => '2026-09-28',
            'status' => 'dipublikasikan',
        ])
        ->assertRedirect(route('rt.informasi.index'));

    $this->assertDatabaseHas('informasi', [
        'judul' => 'Kerja Bakti',
        'gambar' => null,
        'user_id' => $user->id,
    ]);
});

test('RT dapat memperbarui informasi tanpa mengganti gambar yang sudah ada', function () {
    Storage::fake('public');
    Storage::disk('public')->put('informasi/lama.jpg', 'existing image');

    $user = createRtAdmin();
    $informasi = Informasi::create([
        'user_id' => $user->id,
        'judul' => 'Pengumuman lama',
        'isi' => 'Isi lama',
        'gambar' => 'informasi/lama.jpg',
        'tanggal' => '2026-09-28',
        'status' => 'draft',
    ]);

    $this->actingAs($user)
        ->put(route('rt.informasi.update', $informasi), [
            'judul' => 'Pengumuman baru',
            'isi' => 'Isi baru',
            'tanggal' => '2026-09-28',
            'status' => 'dipublikasikan',
        ])
        ->assertRedirect(route('rt.informasi.index'));

    $this->assertDatabaseHas('informasi', [
        'id' => $informasi->id,
        'judul' => 'Pengumuman baru',
        'gambar' => 'informasi/lama.jpg',
    ]);
    Storage::disk('public')->assertExists('informasi/lama.jpg');
});

test('halaman informasi RT menggunakan navigasi dan tautan CRUD RT', function () {
    $user = createRtAdmin();

    $this->actingAs($user)
        ->get(route('rt.informasi.index'))
        ->assertOk()
        ->assertSee(route('rt.dashboard'), false)
        ->assertSee(route('rt.informasi.create'), false);
});