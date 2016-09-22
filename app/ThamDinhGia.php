<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThamDinhGia extends Model
{
    protected $table = 'thamdinhgia';
    protected $fillable = [
        'id',
        'mats',
        'tents',
        'dacdiempl',
        'thongsokt',
        'nguongoc',
        'dvt',
        'sl',
        'nguyengiadenghi',
        'giadenghi',
        'nguyengiathamdinh',
        'giatritstd',
        'giaththamdinh',
        'giakththamdinh',
        'gc',
        'mahs'
    ];
}
