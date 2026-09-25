<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    protected $table = 'rt';

    protected $fillable = [
        'rw_id', 'nama_rt',
    ];

    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }

    public function warga()
    {
        return $this->hasMany(Warga::class);
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function kasRt()
    {
        return $this->hasMany(KasRt::class);
    }

    public function bendahara()
    {
        return $this->hasOne(User::class)
            ->where('is_bendahara', true);
    }
}