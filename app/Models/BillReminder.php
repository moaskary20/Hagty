<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BillReminder extends Model {
    protected $fillable = ['user_id', 'bill_name', 'amount', 'category', 'due_date', 'frequency', 'is_recurring', 'is_paid', 'notify_before_days', 'notes'];
    protected $casts = ['amount' => 'decimal:2', 'due_date' => 'date', 'is_recurring' => 'boolean', 'is_paid' => 'boolean'];
    public function user() { return $this->belongsTo(User::class); }
}
