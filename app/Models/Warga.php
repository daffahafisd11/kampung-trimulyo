<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga';

    protected $fillable = [
        'user_id', 'rt_id', 'nik', 'nama_lengkap', 'jenis_kelamin', 'tanggal_lahir', 'no_hp', 'alamat',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function umkm()
    {
        return $this->hasMany(Umkm::class);
    }
}