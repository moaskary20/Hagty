<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowerWeddingPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'flower_decorator_id',
        'package_name',
        'package_description',
        'price',
        'package_type',
        'includes',
        'package_images',
        'is_popular',
        'is_active',
    ];

    protected $casts = [
        'includes' => 'array',
        'package_images' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    // علاقة مع مورد الديكورات
    public function flowerDecorator()
    {
        return $this->belongsTo(FlowerDecorator::class);
    }
}
