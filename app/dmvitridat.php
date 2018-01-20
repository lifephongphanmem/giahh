<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmvitridat extends Model
{
    protected $table = 'dmvitridat';
    protected $fillable = [
        'id',
        'maso',
        'magoc',
        'macapdo',
        'capdo',
        'vitri',
        'hienthi',
        'sapxep',
        'ngaynhap',
        'soquyetdinh',
        'giadat',
        'ghichu',
        'mahuyen'
    ];
}
