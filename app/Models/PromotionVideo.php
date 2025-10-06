<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionVideo extends Model
{
    protected $fillable = [
        'title',
        'url',
        'desc',
    ];
}
