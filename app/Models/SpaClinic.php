<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SpaClinic extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'specialty', 'center_address', 'google_maps_url', 'phone', 'profile_url',
    ];
}
