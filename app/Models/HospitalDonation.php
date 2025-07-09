<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalDonation extends Model
{
    protected $fillable = [
        'hospital_name',
        'description',
        'donation_link',
        'image',
        'donation_account_number',
        'donation_phone',
        'bank_name',
        'donation_methods',
        'status',
        'target_amount',
        'collected_amount',
        'campaign_end_date'
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
        'collected_amount' => 'decimal:2',
        'campaign_end_date' => 'date',
    ];

    // Accessor للحصول على صورة افتراضية
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        
        // صورة افتراضية للتبرعات
        return 'data:image/svg+xml;base64,' . base64_encode('
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <rect width="100" height="100" fill="#fef3c7"/>
                <g fill="#f59e0b">
                    <path d="M50 20 L60 35 L50 50 L40 35 Z"/>
                    <circle cx="50" cy="65" r="12"/>
                    <rect x="45" y="77" width="10" height="8"/>
                </g>
                <text x="50" y="95" text-anchor="middle" font-family="Arial" font-size="8" fill="#f59e0b">تبرع</text>
            </svg>
        ');
    }

    // Accessor للحصول على نسبة التبرع
    public function getDonationPercentageAttribute()
    {
        if (!$this->target_amount || $this->target_amount == 0) {
            return 0;
        }
        
        $percentage = ($this->collected_amount / $this->target_amount) * 100;
        return min(100, round($percentage, 1));
    }

    // Accessor للحصول على المبلغ المتبقي
    public function getRemainingAmountAttribute()
    {
        if (!$this->target_amount) {
            return 0;
        }
        
        return max(0, $this->target_amount - $this->collected_amount);
    }

    // Accessor للحصول على حالة التبرع بالعربية
    public function getStatusArabicAttribute()
    {
        return match($this->status) {
            'active' => 'نشط',
            'inactive' => 'غير نشط',
            default => 'غير محدد'
        };
    }

    // Accessor للحصول على حالة الحملة
    public function getCampaignStatusAttribute()
    {
        if ($this->campaign_end_date && $this->campaign_end_date->isPast()) {
            return 'منتهية';
        }
        
        if ($this->target_amount && $this->collected_amount >= $this->target_amount) {
            return 'مكتملة';
        }
        
        return 'جارية';
    }

    // Accessor للحصول على المبلغ المجمع مع العملة
    public function getFormattedCollectedAmountAttribute()
    {
        return number_format($this->collected_amount, 2) . ' جنيه';
    }

    // Accessor للحصول على المبلغ المستهدف مع العملة
    public function getFormattedTargetAmountAttribute()
    {
        return $this->target_amount ? number_format($this->target_amount, 2) . ' جنيه' : 'غير محدد';
    }
}
