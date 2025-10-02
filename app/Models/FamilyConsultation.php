<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class FamilyConsultation extends Model {
    protected $fillable = ['title', 'description', 'consultant_name', 'specialty', 'contact_email', 'contact_phone', 'booking_url', 'website_url', 'consultation_fee', 'image', 'is_active'];
    protected $casts = ['is_active' => 'boolean', 'consultation_fee' => 'decimal:2'];
}
