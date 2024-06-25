<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seri extends Model
{
    protected $fillable = [
        'no_seri',
    ];

    public function tipes()
    {
        return $this->belongsToMany(Tipe::class);
    }
}
