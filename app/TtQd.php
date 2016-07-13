<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TtQd extends Model
{
    protected $table = 'ttqd';
    protected $fillable = [
        'id',
        'khvb',
        'mattqd',
        'plttqd',
        'nambh',
        'level',
        'dvbanhanh',
        'ngaybh',
        'ngayad',
        'tieude',
        'ghichu',
        'tailieu'
    ];
}
