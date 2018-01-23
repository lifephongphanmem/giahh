<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DMThueTN extends Model
{
    protected $table = 'dmthuetn';
    protected $fillable = [
        'id',
        'mahh',
        'manhom',
        'masopnhom',
        'magoc',
        'macapdo',
        'capdo',
        'masp',
        'tenhh',
        'dacdiemkt',
        'dvt',
        'giatu',
        'giaden',
        'gc',
        'thoidiem',
        'sapxep',
        'thuoctn',
        'theodoi'
    ];
}
