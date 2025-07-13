<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class WeddingPlanner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'brand', 'location', 'google_maps_url', 'phone', 'profile_url', 'package', 'venue',
    ];
}
