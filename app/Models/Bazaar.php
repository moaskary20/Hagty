<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bazaar extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'info', 'start_date', 'end_date', 'city', 'location', 'map_url', 'promo', 'discounts'
    ];
}
