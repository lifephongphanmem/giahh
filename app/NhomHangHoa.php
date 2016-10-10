<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomHangHoa extends Model
{
    protected $table = 'nhomhanghoa';
    protected $fillable = [
        'id',
        'manhom',
        'tennhom',
        'theodoi'
    ];
}
