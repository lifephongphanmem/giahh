<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TtPhongBan extends Model
{
    protected $table = 'ttphongban';
    protected $fillable = [
        'id',
        'ma',
        'ten',
        'diachi',
        'dienthoai',
        'fax',
        'email',
        'website'
    ];
}
