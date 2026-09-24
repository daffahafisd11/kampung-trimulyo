<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriUmkm extends Model
{
    protected $table = 'kategori_umkm';

    protected $fillable = [
        'nama_kategori',
    ];

    public function umkm()
    {
        return $this->hasMany(Umkm::class);
    }
}
