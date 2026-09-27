<?php

use App\Models\Informasi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function createRwInformationAdmin(): User
{
    return User::factory()->create(['role' => 'rw']);
}

test('RW dapat membuat informasi tanpa gambar', function () {
    $user = createRwInformationAdmin();

    $this->actingAs($user)
        ->post(route('rw.informasi.store'), [
            'judul' => 'Pengumuman RW',
            'isi' => 'Informasi untuk warga.',
            'tanggal' => '2026-09-28',
            'status' => 'dipublikasikan',
        ])
        ->assertRedirect(route('rw.informasi.index'));

    $this->assertDatabaseHas('informasi', [
        'judul' => 'Pengumuman RW',
        'gambar' => null,
        'user_id' => $user->id,
    ]);
});

test('RW dapat memperbarui informasi tanpa mengganti gambar', function () {
    $user = createRwInformationAdmin();
    $informasi = Informasi::create([
        'user_id' => $user->id,
        'judul' => 'Pengumuman lama',
        'isi' => 'Isi lama.',
        'gambar' => 'informasi/lama.jpg',
        'tanggal' => '2026-09-28',
        'status' => 'draft',
    ]);

    $this->actingAs($user)
        ->put(route('rw.informasi.update', $informasi), [
            'judul' => 'Pengumuman diperbarui',
            'isi' => 'Isi baru.',
            'tanggal' => '2026-09-29',
            'status' => 'dipublikasikan',
        ])
        ->assertRedirect(route('rw.informasi.index'));

    $this->assertDatabaseHas('informasi', [
        'id' => $informasi->id,
        'judul' => 'Pengumuman diperbarui',
        'gambar' => 'informasi/lama.jpg',
    ]);
});