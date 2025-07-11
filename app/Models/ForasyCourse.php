<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForasyCourse extends Model
{
    use HasFactory;
    protected $table = 'forasy_courses';
    protected $fillable = [
        'name',
        'short_description',
        'description',
        'video_url',
        'cover_image',
        'category',
        'is_active',
        'published_at',
    ];
}
