<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'warga_id',
        'rt_id',
        'kategori_id',
        'judul',
        'lokasi',
        'deskripsi',
        'foto',
        'status',
        'catatan',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_id');
    }

    public function riwayat()
    {
        return $this->hasMany(RiwayatPengaduan::class);
    }
}