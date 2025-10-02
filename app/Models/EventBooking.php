<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'number_of_tickets',
        'total_amount',
        'booking_status',
        'payment_status',
        'special_requests',
        'booking_reference',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    // العلاقات
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // توليد رقم مرجعي فريد
    public static function generateBookingReference()
    {
        return 'EVT-' . strtoupper(uniqid());
    }
}
