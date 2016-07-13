<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HsThamDinhGia extends Model
{
    protected $table = 'hsthamdinhgia';
    protected $fillable = [
        'id',
        'diadiem',
        'thoidiem',
        'ppthamdinh',
        'mucdich',
        'dvyeucau',
        'thoihan',
        'sotbkl',
        'hosotdgia',
        'thang',
        'nam',
        'mahuyen',
        'mahs'
    ];
}
