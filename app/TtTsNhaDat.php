<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TtTsNhaDat extends Model
{
    protected $table = 'tttsnhadat';
    protected $fillable = [
        'id',
        'tents',
        'slts',
        'sotang',
        'dientich',
        'tyleclcl',
        'nguyengia',
        'giatricl',
        'mahs'
    ];
}
