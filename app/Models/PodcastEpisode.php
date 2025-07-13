<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodcastEpisode extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'episode_number',
        'season_number',
        'host_name',
        'guest_name',
        'guest_bio',
        'audio_url',
        'video_url',
        'thumbnail_image',
        'duration', // in minutes
        'category', // 'pregnancy_tips', 'baby_care', 'motherhood', 'health', 'nutrition'
        'tags',
        'transcript',
        'published_at',
        'is_featured',
        'views_count',
        'downloads_count',
        'is_active'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'views_count' => 'integer',
        'downloads_count' => 'integer',
        'episode_number' => 'integer',
        'season_number' => 'integer',
        'duration' => 'integer',
        'tags' => 'json'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }
}
