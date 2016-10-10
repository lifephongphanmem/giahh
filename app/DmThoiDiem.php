<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmThoiDiem extends Model
{
    protected $table = 'dmthoidiem';
    protected $fillable = [
        'id',
        'mathoidiem',
        'tenthoidiem',
        'tungay',
        'denngay',
        'nhom',
        'plbc'
    ];
}
