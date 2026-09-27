<?php

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('the public landing page is available to guests', function () {
    $response = $this->get('/');

    $response->assertOk();
});

test('the public landing page searches information content', function () {
    $user = \App\Models\User::factory()->create();
    \App\Models\Informasi::create([
        'user_id' => $user->id,
        'judul' => 'Jadwal layanan warga',
        'isi' => 'Layanan administrasi dibuka hari Senin.',
        'tanggal' => '2026-09-28',
        'status' => 'dipublikasikan',
    ]);

    $this->get('/?search=administrasi')
        ->assertOk()
        ->assertSee('Jadwal layanan warga');
});
