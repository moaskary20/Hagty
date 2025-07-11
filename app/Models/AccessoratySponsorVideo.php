<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoratySponsorVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_url', 'skip_after_seconds'
    ];
}
