<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BusinessConsultation extends Model {
    protected $fillable = ['title', 'description', 'consultant_name', 'expertise_area', 'contact_email', 'contact_phone', 'website_url', 'consultation_fee', 'image', 'is_active'];
    protected $casts = ['is_active' => 'boolean', 'consultation_fee' => 'decimal:2'];
}
