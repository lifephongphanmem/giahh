<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaixnk extends Model
{
    protected $table = 'loaixnk';
    protected $filltable = [
        'id',
        'manhom',
        'mapnhom',
        'maloai',
        'tenloai',
        'masoloai',
        'masopnhom',
        'anhien',
        'sapxep',
        'theodoi'
    ];
}
