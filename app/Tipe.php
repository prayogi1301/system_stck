<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $fillable = [
        'nama_tipe', 'merk', 'nopol',
        'jenis', 'model',
        'tahun_buat', 'besar_cc', 'no_rangka', 'no_mesin', 'warna', 'bahan_bakar',
        'kepentingan', 'tgl_daftar', 'tgl_cetak', 'tgl_mslaku', 'pemohon',
    ];

    public function nopols()
    {
        return $this->belongsToMany(Nopol::class);
    }

    public function jenisks()
    {
        return $this->belongsToMany(Jenisk::class);
    }

    public function merks()
    {
        return $this->belongsToMany(Merk::class);
    }

    public function dealers()
    {
        return $this->belongsToMany(Dealer::class);
    }
}
