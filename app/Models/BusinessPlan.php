<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BusinessPlan extends Model {
    protected $fillable = ['plan_name', 'description', 'steps', 'category', 'template_file', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
