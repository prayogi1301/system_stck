<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisk extends Model
{
    protected $fillable = [
        'najen', 'golkend', 'napkb', 'ket'
    ];

    public function tipes()
    {
        return $this->belongsToMany(Tipe::class);
    }
}
