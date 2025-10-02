<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class FundingOption extends Model {
    protected $fillable = ['funding_type', 'description', 'provider_name', 'funding_range', 'requirements', 'contact_info', 'website_url', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
