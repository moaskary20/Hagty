<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForasyJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'company_name', 'company_logo', 'location',
        'job_type', 'experience_level', 'salary_range', 'requirements',
        'responsibilities', 'benefits', 'category', 'contact_email',
        'contact_phone', 'application_url', 'deadline', 'is_featured', 'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'deadline' => 'date',
    ];

    public function banners()
    {
        return $this->hasMany(ForasyBanner::class, 'job_id');
    }

    public function videos()
    {
        return $this->hasMany(ForasyVideo::class, 'job_id');
    }
}
