<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PsychologicalSupport extends Model {
    protected $table = 'psychological_support';
    protected $fillable = ['title', 'description', 'specialist_name', 'specialty', 'contact_email', 'contact_phone', 'booking_url', 'website_url', 'session_fee', 'image', 'is_active'];
    protected $casts = ['is_active' => 'boolean', 'session_fee' => 'decimal:2'];
}
