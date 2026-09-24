<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $table = 'rw';

    protected $fillable = [
        'nama_rw', 'alamat',
    ];

    public function rt()
    {
        return $this->hasMany(Rt::class);
    }
}