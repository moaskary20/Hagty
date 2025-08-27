<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourismOffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'address',
        'phone',
        'page_url',
    ];
}
