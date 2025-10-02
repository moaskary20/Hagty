<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'section',
        'author_name',
        'author_email',
        'tags',
        'views_count',
        'is_published',
        'is_featured',
        'allow_comments',
        'published_at',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'allow_comments' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Boot method to auto-generate slug
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
        
        static::updating(function ($blog) {
            if ($blog->isDirty('title') && empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    // Scopes
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
                    ->where('published_at', '<=', now());
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeBySection(Builder $query, string $section): Builder
    {
        return $query->where('section', $section);
    }

    // Accessors
    public function getReadingTimeAttribute(): int
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return max(1, round($wordCount / 200)); // Assuming 200 words per minute
    }

    public function getExcerptAttribute($value): string
    {
        if ($value) {
            return $value;
        }
        
        return Str::limit(strip_tags($this->content), 150);
    }

    // Methods
    public function incrementViews(): void
    {
        $this->increment('views_count');
    }

    public function getSectionNameAttribute(): string
    {
        $sections = [
            'eventaty' => 'ايفينتاتى',
            'hadiety' => 'هديتي',
            'beity' => 'بيتي',
            'hesabaty' => 'حساباتى',
            'riadaty' => 'رياضتي',
            'mashroay' => 'مشروعي',
            'mostashary' => 'مستشاري',
            'mostamay' => 'مستمعي',
            'nesaa-alghad' => 'نساء الغد',
            'accessoraty' => 'أكسسوراتى',
            'courses' => 'الكورسات التعليمية',
            'accessory-stores' => 'متاجر الإكسسوارات',
            'health' => 'الصحة',
            'babies' => 'الأطفال',
            'wedding' => 'الزفاف',
            'beauty' => 'الجمال',
            'umomty' => 'أومومتي',
            'fashion' => 'الموضة',
        ];

        return $sections[$this->section] ?? $this->section;
    }

    // Relationships
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function approvedComments()
    {
        return $this->hasMany(Comment::class)->approved();
    }
}