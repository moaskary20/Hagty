<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SavingsGoal extends Model {
    protected $fillable = ['user_id', 'goal_name', 'description', 'target_amount', 'current_amount', 'target_date', 'deadline', 'is_completed'];
    protected $casts = ['target_amount' => 'decimal:2', 'current_amount' => 'decimal:2', 'target_date' => 'date', 'deadline' => 'date', 'is_completed' => 'boolean'];
    public function user() { return $this->belongsTo(User::class); }
    public function progress() { return $this->target_amount > 0 ? ($this->current_amount / $this->target_amount) * 100 : 0; }
}
