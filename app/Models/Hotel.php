<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    protected $fillable = [
        'name',
        'brand',
        'location',
        'offers',
        'status',
    ];
}
