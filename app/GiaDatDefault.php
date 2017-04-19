<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaDatDefault extends Model
{
    protected $table = 'giadatdefault';
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
        'ghichu',
        'mahuyen'
    ];
}
