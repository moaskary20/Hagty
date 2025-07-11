<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoratyShop extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_name', 'location', 'shop_url', 'category'
    ];
}
