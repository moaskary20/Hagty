<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventBanner;
use App\Models\EventVideo;
use Carbon\Carbon;

class EventatySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🎉 إنشاء بيانات قسم ايفينتاتى...');

        // إنشاء الفعاليات
        $this->createEvents();

        // إنشاء إعلانات البانر
        $this->createBanners();

        // إنشاء إعلانات الفيديو
        $this->createVideos();

        $this->command->info('✅ تم إنشاء بيانات قسم ايفينتاتى بنجاح! 🎉');
    }

    private function createEvents()
    {
        $this->command->info('📅 إنشاء الفعاليات...');

        $events = [
            [
                'title' => 'حفل افتتاح معرض الأزياء العالمي',
                'description' => 'احضري أكبر معرض للأزياء في القاهرة مع أشهر المصممين العالميين والمحليين. ستشمل الفعالية عروض أزياء حية، ورش عمل تصميم، ومقابلات مع المصممين.',
                'event_type' => 'معرض',
                'location' => 'مركز القاهرة الدولي للمؤتمرات، القاهرة',
                'google_maps_url' => 'https://maps.google.com/?q=Cairo+International+Conference+Center',
                'event_date' => Carbon::now()->addDays(15)->setTime(18, 0),
                'duration_hours' => 4,
                'price' => 250,
                'max_attendees' => 500,
                'current_attendees' => 120,
                'organizer_name' => 'مؤسسة الموضة العالمية',
                'organizer_phone' => '+201001234567',
                'organizer_email' => 'info@fashionevent.com',
                'facebook_url' => 'https://facebook.com/fashionevent',
                'instagram_url' => 'https://instagram.com/fashionevent',
                'website_url' => 'https://fashionevent.com',
                'is_featured' => true,
                'is_active' => true,
                'terms_conditions' => 'يجب إحضار التذكرة المطبوعة أو الإلكترونية. غير قابلة للاسترداد بعد 48 ساعة من الشراء.',
            ],
            [
                'title' => 'ورشة عمل: فن التجميل والعناية بالبشرة',
                'description' => 'ورشة عمل تفاعلية مع خبراء التجميل للتعلم عن أحدث تقنيات العناية بالبشرة والمكياج. تشمل الورشة تطبيق عملي وجلسة أسئلة وأجوبة.',
                'event_type' => 'ورشة عمل',
                'location' => 'فندق فورسيزونز، الجيزة',
                'google_maps_url' => 'https://maps.google.com/?q=Four+Seasons+Giza',
                'event_date' => Carbon::now()->addDays(10)->setTime(10, 0),
                'duration_hours' => 3,
                'price' => 150,
                'max_attendees' => 50,
                'current_attendees' => 35,
                'organizer_name' => 'أكاديمية الجمال المصرية',
                'organizer_phone' => '+201007654321',
                'organizer_email' => 'contact@beautyacademy.com',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'احتفالية اليوم العالمي للمرأة',
                'description' => 'احتفالية خاصة بمناسبة اليوم العالمي للمرأة تتضمن محاضرات ملهمة، عروض فنية، ومعرض للمنتجات النسائية.',
                'event_type' => 'احتفالية',
                'location' => 'مركز الإبداع الفني، القاهرة',
                'google_maps_url' => 'https://maps.google.com/?q=Cairo+Art+Center',
                'event_date' => Carbon::now()->addMonths(1)->setTime(16, 0),
                'duration_hours' => 5,
                'price' => 0, // مجاناً
                'max_attendees' => 300,
                'current_attendees' => 80,
                'organizer_name' => 'مبادرة تمكين المرأة',
                'organizer_phone' => '+201009876543',
                'organizer_email' => 'info@womenempowerment.org',
                'facebook_url' => 'https://facebook.com/womenempowerment',
                'instagram_url' => 'https://instagram.com/womenempowerment',
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'مؤتمر ريادة الأعمال النسائية',
                'description' => 'مؤتمر متخصص في ريادة الأعمال النسائية مع متحدثين من رائدات الأعمال الناجحات في مصر والعالم العربي.',
                'event_type' => 'مؤتمر',
                'location' => 'فندق كمبنسكي، القاهرة',
                'google_maps_url' => 'https://maps.google.com/?q=Kempinski+Cairo',
                'event_date' => Carbon::now()->addDays(20)->setTime(9, 0),
                'duration_hours' => 8,
                'price' => 500,
                'max_attendees' => 200,
                'current_attendees' => 75,
                'organizer_name' => 'شبكة سيدات الأعمال',
                'organizer_phone' => '+201002345678',
                'organizer_email' => 'contact@businesswomen.com',
                'website_url' => 'https://businesswomen.com',
                'is_featured' => true,
                'is_active' => true,
                'terms_conditions' => 'يشمل السعر وجبة غداء ومواد تدريبية. التسجيل المبكر يوفر خصم 20%.',
            ],
            [
                'title' => 'حفلة موسيقية: ليالي التراث العربي',
                'description' => 'أمسية موسيقية ساحرة مع أجمل الأغاني التراثية العربية يقدمها فنانون مميزون في أجواء رائعة.',
                'event_type' => 'حفلة',
                'location' => 'دار الأوبرا المصرية، القاهرة',
                'google_maps_url' => 'https://maps.google.com/?q=Cairo+Opera+House',
                'event_date' => Carbon::now()->addDays(25)->setTime(20, 0),
                'duration_hours' => 3,
                'price' => 300,
                'max_attendees' => 800,
                'current_attendees' => 450,
                'organizer_name' => 'هيئة الأوبرا المصرية',
                'organizer_phone' => '+201003456789',
                'organizer_email' => 'tickets@cairoopera.org',
                'facebook_url' => 'https://facebook.com/cairoopera',
                'instagram_url' => 'https://instagram.com/cairoopera',
                'website_url' => 'https://cairoopera.org',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'ندوة: التكنولوجيا والذكاء الاصطناعي للمرأة',
                'description' => 'ندوة تعليمية حول دور التكنولوجيا والذكاء الاصطناعي في تمكين المرأة وفتح فرص جديدة.',
                'event_type' => 'ندوة',
                'location' => 'جامعة القاهرة، الجيزة',
                'google_maps_url' => 'https://maps.google.com/?q=Cairo+University',
                'event_date' => Carbon::now()->addDays(12)->setTime(14, 0),
                'duration_hours' => 2,
                'price' => 50,
                'max_attendees' => 150,
                'current_attendees' => 90,
                'organizer_name' => 'نادي التكنولوجيا النسائي',
                'organizer_phone' => '+201004567890',
                'organizer_email' => 'info@womenitech.com',
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'تجمع اجتماعي: لقاء رائدات الأعمال',
                'description' => 'لقاء ودي غير رسمي لرائدات الأعمال للتواصل وتبادل الخبرات والأفكار في جو من الألفة والإبداع.',
                'event_type' => 'تجمع اجتماعي',
                'location' => 'كافيه ريتش، الزمالك، القاهرة',
                'google_maps_url' => 'https://maps.google.com/?q=Cafe+Riche+Zamalek',
                'event_date' => Carbon::now()->addDays(8)->setTime(17, 0),
                'duration_hours' => 2,
                'price' => 0,
                'max_attendees' => 30,
                'current_attendees' => 20,
                'organizer_name' => 'مجموعة رائدات',
                'organizer_phone' => '+201005678901',
                'organizer_email' => 'hello@pioneers.com',
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }

        $this->command->info('✅ تم إنشاء ' . count($events) . ' فعالية');
    }

    private function createBanners()
    {
        $this->command->info('🖼️ إنشاء إعلانات البانر...');

        $banners = [
            [
                'event_id' => 1,
                'title' => 'احجزي الآن - معرض الأزياء العالمي',
                'banner_image' => 'event-banners/fashion-expo.jpg', // يجب رفع صورة حقيقية
                'link_url' => '/eventaty/events/1',
                'description' => 'أكبر معرض للأزياء في القاهرة',
                'offer_description' => 'خصم 20% للحجز المبكر',
                'valid_until' => Carbon::now()->addDays(10),
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'event_id' => 2,
                'title' => 'ورشة التجميل - أماكن محدودة',
                'banner_image' => 'event-banners/beauty-workshop.jpg',
                'link_url' => '/eventaty/events/2',
                'description' => 'تعلمي فن التجميل مع الخبراء',
                'offer_description' => 'فقط 15 مقعد متبقي',
                'valid_until' => Carbon::now()->addDays(8),
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'event_id' => null,
                'title' => 'انضمي لمجتمع ايفينتاتى',
                'banner_image' => 'event-banners/join-community.jpg',
                'link_url' => '/register',
                'description' => 'اشتركي الآن واحصلي على تذكرة مجانية لأول فعالية',
                'offer_description' => 'عرض خاص للأعضاء الجدد',
                'valid_until' => Carbon::now()->addMonth(),
                'display_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($banners as $banner) {
            EventBanner::create($banner);
        }

        $this->command->info('✅ تم إنشاء ' . count($banners) . ' بانر إعلاني');
    }

    private function createVideos()
    {
        $this->command->info('🎥 إنشاء إعلانات الفيديو...');

        $videos = [
            [
                'event_id' => 1,
                'title' => 'معرض الأزياء العالمي - نظرة من الداخل',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'شاهدي كواليس معرض الأزياء العالمي ولقاءات مع المصممين',
                'skip_after_seconds' => 5,
                'is_sponsored' => true,
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'event_id' => 4,
                'title' => 'مؤتمر ريادة الأعمال - قصص نجاح ملهمة',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'استمعي لقصص نجاح رائدات الأعمال المميزات',
                'skip_after_seconds' => 5,
                'is_sponsored' => true,
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'event_id' => null,
                'title' => 'ايفينتاتى - منصة الفعاليات النسائية',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'اكتشفي فعاليات مميزة واحجزي مكانك الآن',
                'skip_after_seconds' => 5,
                'is_sponsored' => false,
                'is_active' => true,
                'display_order' => 3,
            ],
        ];

        foreach ($videos as $video) {
            EventVideo::create($video);
        }

        $this->command->info('✅ تم إنشاء ' . count($videos) . ' فيديو إعلاني');
    }
}
