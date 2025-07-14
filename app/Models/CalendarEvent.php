<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    //
    protected $fillable = [
        'name',
        'date',
        'destination',
        'status',
    ];
}
