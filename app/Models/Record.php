<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'name',
        'website',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
