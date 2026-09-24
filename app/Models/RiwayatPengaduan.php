<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPengaduan extends Model
{
    protected $table = 'riwayat_pengaduan';

    protected $fillable = [
        'pengaduan_id', 'user_id', 'status', 'catatan',
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
