<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BazaarBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'bazaar_id', 'participant_name', 'project_name', 'phone', 'email', 'city', 'location', 'date', 'days', 'notes'
    ];
    public function bazaar() {
        return $this->belongsTo(Bazaar::class);
    }
}
