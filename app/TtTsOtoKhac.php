<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TtTsOtoKhac extends Model
{
    protected $table = 'tttsotokhac';
    protected $fillable = [
        'id',
        'tents',
        'slts',
        'tskt',
        'tyleclcl',
        'nguyengia',
        'giatricl',
        'mahs'
    ];
}
