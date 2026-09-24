<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KasRt extends Model
{
    protected $tabel = 'kas_rt';

    protected $fillable = [
        'rt_id',
        'user_id',
        'tanggal',
        'jenis',
        'kategori',
        'keterangan',
        'jumlah',
    ];
    
    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'decimal:2',
    ];

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
