<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    protected $fillable = [
        'user_id', 
        'nama_kegiatan',
        'tanggal', 
        'waktu_mulai', 
        'waktu_selesai',
        'lokasi',
        'deskripsi', 
        'gambar',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
