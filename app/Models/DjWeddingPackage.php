<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DjWeddingPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'dj_performer_id',
        'package_name',
        'package_description',
        'price',
        'duration_hours',
        'includes',
        'is_popular',
        'is_active',
    ];

    protected $casts = [
        'includes' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    // علاقة مع مشغل الدي جي
    public function djPerformer()
    {
        return $this->belongsTo(DjPerformer::class);
    }
}
