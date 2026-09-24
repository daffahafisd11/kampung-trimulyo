<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPengaduan extends Model
{
    protected $table = 'kategori_pengaduan';

    protected $fillable = [
        'nama_kategori', 'deskripsi',
    ];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
