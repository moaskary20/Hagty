<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PopupNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🔔 إضافة إشعارات الـ popup...');

        // حذف البيانات الموجودة
        DB::table('popup_notifications')->truncate();

        $popups = [
            [
                'title' => '🎉 مرحباً بك في منصة HAGTY',
                'content' => 'اكتشفي عالم من الخدمات والمحتوى المميز المصمم خصيصاً للمرأة العربية. من الجمال والصحة إلى التربية والسفر.',
                'type' => 'image',
                'media_url' => '/images/hagty-welcome.jpg', // يمكن تغيير هذا لمسار صورة حقيقي
                'button_text' => 'ابدئي رحلتك الآن',
                'button_url' => '/register',
                'show_button' => true,
                'is_active' => true,
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
                'display_delay' => 2,
                'display_duration' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '🌟 عرض خاص لمدة محدودة',
                'content' => 'احصلي على خصم 30% على جميع خدمات الجمال والترفيه. العرض ساري حتى نهاية الشهر!',
                'type' => 'image',
                'media_url' => '/images/special-offer.jpg', // يمكن تغيير هذا لمسار صورة حقيقي
                'button_text' => 'اطلبي الخدمة الآن',
                'button_url' => '/beauty',
                'show_button' => true,
                'is_active' => true,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
                'display_delay' => 5,
                'display_duration' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($popups as $popup) {
            DB::table('popup_notifications')->insert($popup);
        }

        $this->command->info('✅ تم إضافة إشعارات الـ popup بنجاح! 🎉');
    }
}