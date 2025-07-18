<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catering extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'description',
        'address',
        'phone',
        'image',
        'status',
    ];
}
