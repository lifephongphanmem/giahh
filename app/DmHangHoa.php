<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmHangHoa extends Model
{
    protected $table = 'dmhanghoa';
    protected $fillable = [
        'id',
        'mahh',
        'masopnhom',
        'masp',
        'tenhh',
        'dacdiemkt',
        'dvt',
        'nsx',
        'gc',
        'thoidiem',
        'sapxep',
        'theodoi'
    ];
}
