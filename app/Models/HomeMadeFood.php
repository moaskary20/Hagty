<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeMadeFood extends Model
{
    protected $table = 'home_made_foods';
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'phone',
        'description',
        'specialty',
        'map_url',
        'status',
        'image',
    ];
}
