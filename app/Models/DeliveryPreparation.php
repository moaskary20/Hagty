<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPreparation extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'title',
        'description',
        'preparation_steps',
        'tips_and_advice',
        'videos',
        'images',
        'checklist_items',
        'timeline',
        'importance_level',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'preparation_steps' => 'array',
        'tips_and_advice' => 'array',
        'videos' => 'array',
        'images' => 'array',
        'checklist_items' => 'array',
        'timeline' => 'array',
        'importance_level' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function hospitalBags()
    {
        return $this->hasMany(HospitalBag::class);
    }

    public function babyShowerItems()
    {
        return $this->hasMany(BabyShowerItem::class);
    }
}
