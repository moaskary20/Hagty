<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FashionTrend extends Model
{
    use HasFactory;
    protected $table = 'fashion_trends';
    protected $fillable = [
        'title',
        'content',
        'image',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(FashionTrendCategory::class, 'category_id');
    }

    public function videos()
    {
        return $this->hasMany(FashionTrendVideo::class, 'trend_id');
    }
}
