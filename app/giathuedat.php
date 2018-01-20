<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giathuedat extends Model
{
    protected $table = 'giathuedat';
    protected $fillable = [
        'id',
        'mahs',
        'maso',
        'tendonvi',
        'mucdich',
        'ngaytu',
        'ngayden',
        'giagoc',
        'giathuedat',
        'trangthai',
        'thang',
        'quy',
        'nam',
        'mahuyen'
    ];
}
