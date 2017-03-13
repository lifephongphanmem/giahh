<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongBoGiaDefault extends Model
{
    protected $table = 'congbogia_default';
    protected $fillable = [
        'id',
        'tents',
        'dacdiempl',
        'thongsokt',
        'nguongoc',
        'dvt',
        'sl',
        'giadenghi',
        'giatritstd',
        'gc',
        'mahuyen'
    ];
}
