<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EmpowermentResource extends Model {
    protected $table = 'empowerment_resources';
    protected $fillable = ['resource_name', 'description', 'resource_type', 'category', 'resource_url', 'is_free', 'is_active'];
    protected $casts = ['is_free' => 'boolean', 'is_active' => 'boolean'];
}
