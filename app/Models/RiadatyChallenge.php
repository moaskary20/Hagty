<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RiadatyChallenge extends Model {
    protected $fillable = ['challenge_name', 'description', 'start_date', 'end_date', 'challenge_type', 'participants_count', 'prizes', 'is_active'];
    protected $casts = ['is_active' => 'boolean', 'start_date' => 'date', 'end_date' => 'date'];
}
