<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccessoryBannerAd;

class AccessoryBannerAdSeeder extends Seeder
{
    public function run(): void
    {
        AccessoryBannerAd::insert([
            [
                'عنوان_الإعلان' => 'خصم 30% على جميع الإكسسوارات',
                'صور_الإعلان' => json_encode(['banner-accessory-1.jpg', 'banner-accessory-2.jpg']),
                'رابط_الإعلان' => 'https://accessorystyle.com/offer',
                'حالة_التفعيل' => true,
                'تاريخ_الانتهاء' => '2025-12-31',
                'نوع_الإعلان' => 'بانر',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'عنوان_الإعلان' => 'راعي قطاع الإكسسوارات',
                'صور_الإعلان' => json_encode(['sponsor-accessory.jpg']),
                'رابط_الإعلان' => 'https://sponsor.com',
                'حالة_التفعيل' => true,
                'تاريخ_الانتهاء' => null,
                'نوع_الإعلان' => 'راعي',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
