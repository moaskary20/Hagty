<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class NesaaAlghadBanner extends Model {
    protected $fillable = ['title', 'banner_image', 'link_url', 'display_order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
