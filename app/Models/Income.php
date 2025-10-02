<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Income extends Model {
    protected $fillable = ['user_id', 'source', 'amount', 'category', 'frequency', 'income_date', 'is_recurring', 'notes'];
    protected $casts = ['amount' => 'decimal:2', 'income_date' => 'date', 'is_recurring' => 'boolean'];
    public function user() { return $this->belongsTo(User::class); }
}
