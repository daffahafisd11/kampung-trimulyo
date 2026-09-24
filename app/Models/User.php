<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Kegiatan;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'is_bendahara', 'rt_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime', 'password' => 'hashed', 'is_bendahara' => 'boolean',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', 'password' => 'hashed',
        ];
    }

    public function warga() 
    {
        return $this->hasOne(Warga::class);
    }

    public function informasi()
    {
        return $this->hasMany(Informasi::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function riwayatPengaduan()
    {
        return $this->hasMany(RiwayatPengaduan::class);
    }

    public function isRw(): bool
    {
        return $this->role === 'rw';
    }

    public function isRt(): bool 
    {
        return $this->role === 'rt';
    }

    public function isWarga(): bool
    {
        return $this->role === 'warga';
    }

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }

    public function kasRt()
    {
        return $this->hasMany(KasRt::class);
    }

    public function isBendahara(): bool
    {
        return $this->is_bendahara === true;
    }
}