<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = 'umkm';

    protected $fillable = [
        'warga_id',
        'kategori_id',
        'nama_usaha',
        'deskripsi',
        'alamat',
        'whatsapp',
        'foto',
        'status',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriUmkm::class, 'kategori_id');
    }
}
