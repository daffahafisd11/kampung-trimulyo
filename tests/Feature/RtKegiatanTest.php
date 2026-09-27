<?php

use App\Models\Kegiatan;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function createRtKegiatanAdmin(): User
{
    $rw = Rw::create(['nama_rw' => 'RW 01']);
    $rt = Rt::create(['rw_id' => $rw->id, 'nama_rt' => 'RT 01']);

    return User::factory()->create([
        'role' => 'rt',
        'rt_id' => $rt->id,
    ]);
}

test('RT dapat membuat kegiatan tanpa gambar', function () {
    $user = createRtKegiatanAdmin();

    $this->actingAs($user)
        ->post(route('rt.kegiatan.store'), [
            'nama_kegiatan' => 'Kerja Bakti',
            'tanggal' => '2026-09-28',
            'waktu_mulai' => '08:00',
            'waktu_selesai' => '10:00',
            'lokasi' => 'Balai RT',
            'deskripsi' => 'Membersihkan lingkungan.',
            'status' => 'aktif',
        ])
        ->assertRedirect(route('rt.kegiatan.index'));

    $this->assertDatabaseHas('kegiatan', [
        'nama_kegiatan' => 'Kerja Bakti',
        'gambar' => null,
        'user_id' => $user->id,
    ]);
});

test('RT dapat memperbarui kegiatan dan kembali ke daftar RT', function () {
    $user = createRtKegiatanAdmin();
    $kegiatan = Kegiatan::create([
        'user_id' => $user->id,
        'nama_kegiatan' => 'Kegiatan lama',
        'tanggal' => '2026-09-28',
        'waktu_mulai' => '08:00',
        'waktu_selesai' => '10:00',
        'lokasi' => 'Balai RT',
        'deskripsi' => 'Deskripsi lama.',
        'status' => 'aktif',
    ]);

    $this->actingAs($user)
        ->put(route('rt.kegiatan.update', $kegiatan), [
            'nama_kegiatan' => 'Kegiatan baru',
            'tanggal' => '2026-09-29',
            'waktu_mulai' => '09:00',
            'waktu_selesai' => '11:00',
            'lokasi' => 'Lapangan RT',
            'deskripsi' => 'Deskripsi baru.',
            'status' => 'aktif',
        ])
        ->assertRedirect(route('rt.kegiatan.index'));

    $this->assertDatabaseHas('kegiatan', [
        'id' => $kegiatan->id,
        'nama_kegiatan' => 'Kegiatan baru',
    ]);
});

test('halaman kegiatan RT menggunakan navigasi dan tautan CRUD RT', function () {
    $user = createRtKegiatanAdmin();

    $this->actingAs($user)
        ->get(route('rt.kegiatan.index'))
        ->assertOk()
        ->assertSee(route('rt.dashboard'), false)
        ->assertSee(route('rt.kegiatan.create'), false);
});