<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PersonalShoppingService extends Model {
    protected $fillable = ['service_name', 'description', 'price', 'contact_email', 'contact_phone', 'is_active'];
    protected $casts = ['is_active' => 'boolean', 'price' => 'decimal:2'];
}
