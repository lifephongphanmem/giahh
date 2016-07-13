<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThamDinhGiaDefault extends Model
{
    protected $table = 'thamdinhgia-default';
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
