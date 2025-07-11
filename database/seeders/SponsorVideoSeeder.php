<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SponsorVideo;

class SponsorVideoSeeder extends Seeder
{
    public function run(): void
    {
        SponsorVideo::insert([
            [
                'عنوان_الفيديو' => 'فيديو راعي الإكسسوارات 2025',
                'ملف_الفيديو' => 'sponsor-video-2025.mp4',
                'رابط_التحويل' => 'https://sponsor.com',
                'حالة_التفعيل' => true,
                'تاريخ_الانتهاء' => '2025-12-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
