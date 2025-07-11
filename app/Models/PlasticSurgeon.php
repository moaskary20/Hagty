<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PlasticSurgeon extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'title', 'specialty', 'clinic_address', 'google_maps_url', 'phone', 'profile_url',
    ];
}
