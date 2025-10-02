<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CommunityPost extends Model {
    protected $fillable = ['user_id', 'author_name', 'title', 'content', 'post_type', 'image', 'likes_count', 'comments_count', 'is_pinned', 'is_approved', 'is_active'];
    protected $casts = [
        'is_pinned' => 'boolean',
        'is_approved' => 'boolean', 
        'is_active' => 'boolean'
    ];
    public function user() { return $this->belongsTo(User::class); }
}
