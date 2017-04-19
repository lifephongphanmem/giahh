<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaDat extends Model
{
    protected $table = 'giadat';
    protected $fillable = [
        'id',
        'maloaigia',
        'mahs',
        'khuvuc',
        'vitri1',
        'vitri2',
        'vitri3',
        'vitri4',
        'vitri5',
        'ghichu'
    ];
}
