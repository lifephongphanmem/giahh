<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmThiTruong extends Model
{
    protected $table='dmthitruong';
    protected $fillable=[
      'id',
        'thitruong',
        'ghichu'
    ];
}
