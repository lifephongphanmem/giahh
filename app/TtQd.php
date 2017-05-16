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
        'tailieu',
        'tailieu1',
        'tailieu2',
        'tailieu3',
        'tailieu4'
    ];
}
