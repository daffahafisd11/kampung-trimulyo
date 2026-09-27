<?php

use App\Models\KategoriUmkm;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Umkm;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

function createUmkmOwner(): array
{
    $rw = Rw::create(['nama_rw' => 'RW 01']);
    $rt = Rt::create(['rw_id' => $rw->id, 'nama_rt' => 'RT 01']);
    $user = User::factory()->create(['role' => 'warga']);
    $warga = Warga::create([
        'user_id' => $user->id,
        'rt_id' => $rt->id,
        'nik' => '3374010101010001',
        'nama_lengkap' => 'Budi Santoso',
        'jenis_kelamin' => 'L',
        'tanggal_lahir' => '1990-01-15',
    ]);
    $kategori = KategoriUmkm::create(['nama_kategori' => 'Makanan']);

    return [$user, $warga, $kategori];
}

test('warga dapat mendaftarkan UMKM tanpa foto', function () {
    [$user, $warga, $kategori] = createUmkmOwner();

    $this->actingAs($user)
        ->post(route('warga.umkm.store'), [
            'kategori_id' => $kategori->id,
            'nama_usaha' => 'Warung Budi',
            'deskripsi' => 'Makanan rumahan.',
            'alamat' => 'Kampung Trimulyo',
            'whatsapp' => '081234567890',
        ])
        ->assertRedirect(route('warga.umkm.index'));

    $this->assertDatabaseHas('umkm', [
        'warga_id' => $warga->id,
        'nama_usaha' => 'Warung Budi',
        'foto' => null,
        'status' => 'menunggu_verifikasi',
    ]);
});

test('form edit UMKM mengirim perubahan ke endpoint update', function () {
    [$user, $warga, $kategori] = createUmkmOwner();
    $umkm = Umkm::create([
        'warga_id' => $warga->id,
        'kategori_id' => $kategori->id,
        'nama_usaha' => 'Warung Budi',
        'deskripsi' => 'Makanan rumahan.',
        'alamat' => 'Kampung Trimulyo',
        'whatsapp' => '081234567890',
        'status' => 'menunggu_verifikasi',
    ]);

    $this->actingAs($user)
        ->get(route('warga.umkm.edit', $umkm))
        ->assertOk()
        ->assertSee(route('warga.umkm.update', $umkm), false)
        ->assertSee('Warung Budi');
});

test('warga dapat mengganti foto UMKM dan foto lama dibersihkan', function () {
    Storage::fake('public');
    Storage::disk('public')->put('umkm/lama.jpg', 'existing image');
    [$user, $warga, $kategori] = createUmkmOwner();
    $umkm = Umkm::create([
        'warga_id' => $warga->id,
        'kategori_id' => $kategori->id,
        'nama_usaha' => 'Warung Budi',
        'deskripsi' => 'Makanan rumahan.',
        'alamat' => 'Kampung Trimulyo',
        'whatsapp' => '081234567890',
        'foto' => 'umkm/lama.jpg',
        'status' => 'menunggu_verifikasi',
    ]);

    $this->actingAs($user)
        ->put(route('warga.umkm.update', $umkm), [
            'kategori_id' => $kategori->id,
            'nama_usaha' => 'Warung Budi',
            'deskripsi' => 'Makanan rumahan.',
            'alamat' => 'Kampung Trimulyo',
            'whatsapp' => '081234567890',
            'foto' => UploadedFile::fake()->image('baru.jpg'),
        ])
        ->assertRedirect(route('warga.umkm.index'));

    expect($umkm->fresh()->foto)->not->toBe('umkm/lama.jpg');
    Storage::disk('public')->assertMissing('umkm/lama.jpg');
    Storage::disk('public')->assertExists($umkm->fresh()->foto);
});