<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmLoaiVanBan extends Model
{
    protected $table = 'dmloaivanban';
    protected $filltable = [
                'id',
                'plttqd',
                'level',
                'tenloaivanban',
                'ghichu'
            ];
}
