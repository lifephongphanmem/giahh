<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomTn55 extends Model
{
    protected $table = 'nhomtn55';
    protected $fillable = [
        'id',
        'manhom',
        'tennhom',
        'theodoi'
    ];
}
