<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhKiemTra extends Model
{
    protected $table = 'thanhkiemtra';
    protected $fillable = [
        'id',
        'khvb',
        'matkt',
        'doankt',
        'nam',
        'thoidiem',
        'noidung',
        'tailieu',
        'tailieu1',
        'tailieu2',
        'tailieu3',
        'tailieu4',
        'ip1',
        'ip2'
    ];
}
