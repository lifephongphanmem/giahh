<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TtTsNhaDatDefault extends Model
{
    protected $table = 'tttsnhadatdefault';
    protected $fillable = [
        'id',
        'tents',
        'slts',
        'sotang',
        'dientich',
        'tyleclcl',
        'nguyengia',
        'giatricl',
        'mahuyen'
    ];
}
