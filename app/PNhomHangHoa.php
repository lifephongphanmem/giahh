<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PNhomHangHoa extends Model
{
    protected $table = 'pnhomhanghoa';
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
