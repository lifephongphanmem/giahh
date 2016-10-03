<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThamDinhGiaH extends Model
{
    protected $table = 'thamdinhgiah';
    protected $fillable = [
        'id',
        'mahs',
        'dataold',
        'datanew',
        'thaydoi',
        'thaotac',
        'name',
        'username'
    ];
}
