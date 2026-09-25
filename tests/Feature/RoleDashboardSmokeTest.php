<?php

use App\Models\Rt;
use App\Models\Rw;
use App\Models\KasRt;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function createRoleSmokeData(): array
{
    $rw = Rw::create(['nama_rw' => 'RW 01']);
    $rt = Rt::create(['rw_id' => $rw->id, 'nama_rt' => 'RT 01']);

    $rwUser = User::factory()->create(['role' => 'rw']);
    $rtUser = User::factory()->create(['role' => 'rt', 'rt_id' => $rt->id]);
    $wargaUser = User::factory()->create(['role' => 'warga']);
    $warga = Warga::create([
        'user_id' => $wargaUser->id,
        'rt_id' => $rt->id,
        'nik' => '3374010101019999',
        'nama_lengkap' => 'Warga Test',
        'jenis_kelamin' => 'L',
        'tanggal_lahir' => '1990-01-01',
    ]);
    $wargaUser->update(['rt_id' => $rt->id]);
    $wargaUser->refresh();

    $bendahara = User::factory()->create([
        'role' => 'warga',
        'is_bendahara' => true,
        'rt_id' => $rt->id,
    ]);

    return compact('rwUser', 'rtUser', 'wargaUser', 'bendahara', 'rt', 'warga');
}

test('each role can access its dashboard and kas page', function () {
    $users = createRoleSmokeData();

    $this->actingAs($users['rwUser'])
        ->get('/rw/dashboard')->assertOk();
    $this->actingAs($users['rwUser'])
        ->get('/rw/kas')->assertOk();

    $this->actingAs($users['rtUser'])
        ->get('/rt/dashboard')->assertOk();
    $this->actingAs($users['rtUser'])
        ->get('/rt/kas')->assertOk();

    $this->actingAs($users['wargaUser'])
        ->get('/warga/dashboard')->assertOk();
    $this->actingAs($users['wargaUser'])
        ->get('/warga/kas')->assertOk();

    $this->actingAs($users['bendahara'])
        ->get('/bendahara/dashboard')->assertOk();
});

test('bendahara can create a kas transaction and other roles cannot access bendahara area', function () {
    $users = createRoleSmokeData();

    $this->actingAs($users['bendahara'])
        ->post('/bendahara/kas', [
            'tanggal' => '2026-09-25',
            'jenis' => 'masuk',
            'kategori' => 'Iuran warga',
            'keterangan' => 'Iuran September',
            'jumlah' => 100000,
        ])
        ->assertRedirect('/bendahara/kas');

    $this->assertDatabaseHas('kas_rt', [
        'rt_id' => $users['rt']->id,
        'user_id' => $users['bendahara']->id,
        'jumlah' => 100000,
    ]);

    $this->actingAs($users['wargaUser'])
        ->get('/bendahara/dashboard')->assertForbidden();
});

test('rw can delete a kas transaction', function () {
    $users = createRoleSmokeData();
    $kas = KasRt::create([
        'rt_id' => $users['rt']->id,
        'user_id' => $users['bendahara']->id,
        'tanggal' => '2026-09-25',
        'jenis' => 'keluar',
        'kategori' => 'Belanja',
        'keterangan' => 'Pembelian alat kebersihan',
        'jumlah' => 50000,
    ]);

    $this->actingAs($users['rwUser'])
        ->delete("/rw/kas/{$kas->id}")
        ->assertRedirect("/rw/kas/{$users['rt']->id}");

    $this->assertDatabaseMissing('kas_rt', ['id' => $kas->id]);
});

test('rw cannot assign a warga from another rt as bendahara', function () {
    $users = createRoleSmokeData();
    $otherRw = Rw::create(['nama_rw' => 'RW 02']);
    $otherRt = Rt::create(['rw_id' => $otherRw->id, 'nama_rt' => 'RT 02']);
    $otherWarga = User::factory()->create([
        'role' => 'warga',
        'rt_id' => $otherRt->id,
    ]);

    $this->actingAs($users['rwUser'])
        ->put("/rw/bendahara/{$users['rt']->id}", ['user_id' => $otherWarga->id])
        ->assertSessionHasErrors('user_id');

    expect($otherWarga->fresh()->is_bendahara)->toBeFalse();
});
