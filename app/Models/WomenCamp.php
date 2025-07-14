<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WomenCamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description',
        'contact',
        'status',
    ];
}
