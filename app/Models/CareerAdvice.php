<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerAdvice extends Model
{
    use HasFactory;

    protected $table = 'career_advices';

    protected $fillable = [
        'title', 'content', 'category', 'author', 'image',
        'is_featured', 'is_active', 'views',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
