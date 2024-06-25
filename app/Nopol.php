<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nopol extends Model
{
    protected $fillable = [
        'nopola', 'nopolb', 'nopolc', 'nopol'
    ];

    public function tipes()
    {
        return $this->belongsToMany(Tipe::class);
    }
}
