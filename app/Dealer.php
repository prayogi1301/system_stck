<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable = [
        'kode_lokasi', 'kode_dealer', 'nama_dealer', 'pemohon', 'alamat'
    ];

    public function tipes()
    {
        return $this->belongsToMany(Tipe::class);
    }
}
