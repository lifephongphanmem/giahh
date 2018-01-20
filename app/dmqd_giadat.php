<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmqd_giadat extends Model
{
    //
    protected $table = 'dmqd_giadat';
    protected $fillable = [
        'id',
        'soquyetdinh',
        'sohieu',
        'mota',
        'ngayquyetdinh',
        'ghichu'
    ];
}
