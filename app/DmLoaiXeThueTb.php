<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmLoaiXeThueTb extends Model
{
    protected $table = 'dmloaixethuetb';
    protected $filltable = [
        'id',
        'maloai',
        'tenloai',
        'thaotac'
    ];
}
