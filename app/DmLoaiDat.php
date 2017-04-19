<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmLoaiDat extends Model
{
    protected $table = 'dmloaidat';
    protected $fillable = [
            'id',
            'maloaigia',
            'loaidat',
            'khuvuc',
            'vitri',
            'sapxep',
            'ghichu'
    ];
}
