<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TtTsOtoKhacDefault extends Model
{
    protected $table = 'tttsotokhacdefault';
    protected $fillable = [
        'id',
        'tents',
        'slts',
        'tskt',
        'tyleclcl',
        'nguyengia',
        'giatricl',
        'mahuyen'
    ];
}
