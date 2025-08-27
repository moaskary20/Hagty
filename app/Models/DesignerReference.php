<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignerReference extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_dress_designer_id',
        'reference_type',
        'reference_title',
        'reference_url',
        'reference_description',
        'platform_name',
        'display_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function designer()
    {
        return $this->belongsTo(WeddingDressDesigner::class, 'wedding_dress_designer_id');
    }
}
