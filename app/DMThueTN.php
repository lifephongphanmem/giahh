<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DMThueTN extends Model
{
    protected $table = 'dmthuetn';
    protected $fillable = [
        'id',
        'mahh',
        'masopnhom',
        'masp',
        'tenhh',
        'dacdiemkt',
        'dvt',
        'gc',
        'thoidiem',
        'sapxep',
        'thuoctn',
        'theodoi'
    ];
}
