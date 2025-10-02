<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class WomenInitiative extends Model {
    protected $fillable = ['initiative_name', 'description', 'organizer', 'initiative_type', 'contact_email', 'website_url', 'members_count', 'image', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
