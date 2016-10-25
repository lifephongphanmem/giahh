<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PNhomThueTN extends Model
{
    protected $table = 'pnhomthuetn';
    protected $fillable = [
        'id',
        'manhom',
        'mapnhom',
        'tenpnhom',
        'masopnhom',
        'theodoi',
        'sapxep'
    ];
}
