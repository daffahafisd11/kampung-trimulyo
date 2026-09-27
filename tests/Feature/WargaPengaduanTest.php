<?php

use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('warga dapat mengganti foto pengaduan dan foto lama dihapus', function () {
    Storage::fake('public');
    Storage::disk('public')->put('pengaduan/lama.jpg', 'existing image');

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
    $kategori = KategoriPengaduan::create(['nama_kategori' => 'Infrastruktur']);
    $pengaduan = Pengaduan::create([
        'warga_id' => $warga->id,
        'rt_id' => $rt->id,
        'kategori_id' => $kategori->id,
        'judul' => 'Jalan rusak',
        'lokasi' => 'Jalan utama',
        'deskripsi' => 'Ada lubang di jalan.',
        'foto' => 'pengaduan/lama.jpg',
        'status' => 'menunggu_verifikasi',
    ]);

    $this->actingAs($user)
        ->put(route('warga.pengaduan.update', $pengaduan), [
            'kategori_id' => $kategori->id,
            'judul' => 'Jalan rusak',
            'lokasi' => 'Jalan utama',
            'deskripsi' => 'Ada lubang besar di jalan.',
            'foto' => UploadedFile::fake()->image('baru.jpg'),
        ])
        ->assertRedirect(route('warga.pengaduan.index'));

    expect($pengaduan->fresh()->foto)->not->toBe('pengaduan/lama.jpg');
    Storage::disk('public')->assertMissing('pengaduan/lama.jpg');
    Storage::disk('public')->assertExists($pengaduan->fresh()->foto);
});