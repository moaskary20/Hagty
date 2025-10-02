<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RiadatyNutrition extends Model {
    protected $table = 'riadaty_nutrition';
    protected $fillable = ['title', 'content', 'category', 'image', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
