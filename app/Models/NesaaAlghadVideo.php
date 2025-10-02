<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class NesaaAlghadVideo extends Model {
    protected $fillable = ['title', 'video_url', 'display_order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
