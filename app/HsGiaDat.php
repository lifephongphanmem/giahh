<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HsGiaDat extends Model
{
    protected $table = 'hsgiadat';
    protected $fillable = [
        'id',
        'mahs',
        'maloaigia',
        'tgnhap',
        'tgapdung',
        'nam',
        'thang',
        'quy',
        'mahuyen',
        'trangthai',
        'phanloai',
        'filedk',
        'filedk1',
        'filedk2',
        'filedk3',
        'filedk4'
        ];
}
