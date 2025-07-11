<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FashionTrendVideo extends Model
{
    use HasFactory;
    protected $fillable = ['trend_id', 'title', 'video_url', 'description'];

    public function trend()
    {
        return $this->belongsTo(FashionTrend::class, 'trend_id');
    }
}
