<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdditionalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('بدء إنشاء البيانات الإضافية للأقسام المتبقية...');

        // 1. بيانات إضافية للأطفال
        $this->createAdditionalBabyData();
        
        // 2. بيانات إضافية للبازارات
        $this->createAdditionalBazaarData();
        
        // 3. بيانات إضافية للجمال
        $this->createAdditionalBeautyData();
        
        // 4. بيانات إضافية للأكسسوارات
        $this->createAdditionalAccessoriesData();

        $this->command->info('تم إنشاء جميع البيانات الإضافية بنجاح! 🎉');
    }

    private function createAdditionalBabyData()
    {
        $this->command->info('إنشاء بيانات إضافية للأطفال...');
        
        // إنشاء نصائح أطباء الأطفال
        $babyDoctorTips = [
            [
                'doctor_name' => 'د. سارة أحمد',
                'doctor_specialization' => 'طب الأطفال العام',
                'doctor_title' => 'أخصائية طب الأطفال',
                'title' => 'نصائح للنوم الصحي للرضع',
                'content' => 'تأكدي من أن طفلك ينام على ظهره في سرير آمن وخالي من الألعاب',
                'medical_category' => 'نصائح صحية',
                'urgency_level' => 'عادي',
                'age_group' => '0-6 أشهر',
                'doctor_image' => '/images/doctors/sara-ahmed.jpg',
                'clinic_name' => 'عيادة الأطفال المتخصصة',
                'contact_info' => '+966-11-123-4567',
                'symptoms' => json_encode(['بكاء', 'قلق']),
                'warnings' => json_encode(['تجنبي النوم على البطن']),
                'requires_consultation' => 0,
                'is_emergency' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_name' => 'د. محمد علي',
                'doctor_specialization' => 'طب الأطفال العام',
                'doctor_title' => 'أخصائي طب الأطفال',
                'title' => 'علامات التسنين عند الرضع',
                'content' => 'احترسي من البكاء الزائد، سيلان اللعاب، ورفض الطعام',
                'medical_category' => 'تسنين',
                'urgency_level' => 'عادي',
                'age_group' => '6-12 شهر',
                'doctor_image' => '/images/doctors/mohamed-ali.jpg',
                'clinic_name' => 'مستشفى الملك فهد',
                'contact_info' => '+966-11-234-5678',
                'symptoms' => json_encode(['بكاء', 'سيلان لعاب', 'رفض طعام']),
                'warnings' => json_encode(['استشيري الطبيب إذا استمر البكاء']),
                'requires_consultation' => 0,
                'is_emergency' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($babyDoctorTips as $tip) {
            DB::table('baby_doctor_tips')->insert($tip);
        }

        // إنشاء نصائح الخبراء للأطفال
        $babyExpertAdvice = [
            [
                'expert_name' => 'د. فاطمة أحمد',
                'expert_title' => 'أخصائية تربية الأطفال',
                'expert_specialization' => 'تربية الأطفال',
                'title' => 'بناء روتين يومي للطفل',
                'content' => 'إنشاء روتين ثابت يساعد الطفل على الشعور بالأمان',
                'category' => 'تربية',
                'target_age' => '0-12 شهر',
                'expert_image' => '/images/experts/fatima-ahmed.jpg',
                'video_url' => 'https://youtube.com/watch?v=baby-routine',
                'rating' => 5,
                'is_featured' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($babyExpertAdvice as $advice) {
            DB::table('baby_expert_advice')->insert($advice);
        }

        // إنشاء معلومات صحية للأطفال
        $babyHealthInfos = [
            [
                'title' => 'جدول التطعيمات الأساسية',
                'content' => 'التطعيمات المطلوبة في السنة الأولى من العمر',
                'category' => 'تطعيمات',
                'age_range' => '0-12 شهر',
                'importance_level' => 'عالية',
                'author' => 'وزارة الصحة السعودية',
                'source' => 'الدليل الصحي للأطفال',
                'image' => '/images/health/vaccination-schedule.jpg',
                'related_links' => json_encode(['https://moh.gov.sa/vaccines']),
                'is_featured' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($babyHealthInfos as $info) {
            DB::table('baby_health_infos')->insert($info);
        }

        // إنشاء خطوات يومية للأطفال
        $babyDaySteps = [
            [
                'title' => 'الخطوة الأولى: الاستيقاظ الصحي',
                'description' => 'تعلم كيفية إيقاظ طفلك بطريقة صحية وآمنة',
                'step_number' => 1,
                'age_group' => '0-6 أشهر',
                'category' => 'صحة',
                'difficulty_level' => 'سهل',
                'image' => '/images/baby-steps/wake-up.jpg',
                'tips' => json_encode(['اتركي طفلك يستيقظ طبيعياً', 'تجنبي الإزعاج المفاجئ']),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($babyDaySteps as $step) {
            DB::table('baby_day_steps')->insert($step);
        }

        // إنشاء نمو شهري للأطفال
        $babyMonthlyGrowths = [
            [
                'month_number' => 6,
                'title' => 'النمو في الشهر السادس',
                'description' => 'مرحلة مهمة في نمو الطفل مع تطورات كبيرة في الحركة والتفاعل',
                'physical_development' => json_encode(['الجلوس مع دعم', 'التقلب', 'الإمساك بالأشياء']),
                'mental_development' => json_encode(['التعرف على الوجوه', 'الاستجابة للأصوات', 'التفاعل مع الألعاب']),
                'social_development' => json_encode(['الابتسام', 'الضحك', 'التفاعل مع الآخرين']),
                'milestones' => json_encode(['الجلوس', 'التقلب', 'الإمساك']),
                'feeding_info' => json_encode(['6 وجبات يومياً', 'بداية الأطعمة الصلبة']),
                'sleep_info' => json_encode(['14-15 ساعة يومياً', 'قيلولتان']),
                'safety_tips' => json_encode(['تأمين المنزل', 'مراقبة الطفل']),
                'weight_range' => '6.5-8.5 كجم',
                'height_range' => '62-68 سم',
                'image' => '/images/growth/month-6.jpg',
                'activities' => json_encode(['ألعاب التفاعل', 'قراءة القصص', 'الغناء']),
                'warning_signs' => json_encode(['عدم الجلوس', 'عدم الاستجابة']),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($babyMonthlyGrowths as $growth) {
            DB::table('baby_monthly_growths')->insert($growth);
        }

        // إنشاء قوائم استحمام الأطفال
        $babyShowerLists = [
            [
                'item_name' => 'ملابس داخلية للرضع',
                'description' => 'ملابس داخلية ناعمة ومريحة للرضع',
                'category' => 'ملابس',
                'priority' => 'عالية',
                'estimated_price' => 150.00,
                'recommended_brand' => 'كارترز',
                'quantity' => 10,
                'size_info' => '0-3 أشهر',
                'age_suitability' => '0-3 أشهر',
                'image' => '/images/baby-shower/underwear.jpg',
                'features' => json_encode(['ناعم', 'مريح', 'قابل للغسل']),
                'buying_tips' => json_encode(['اشتري مقاسات مختلفة', 'اختر الألوان الفاتحة']),
                'season' => 'جميع الفصول',
                'is_essential' => 1,
                'is_luxury' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($babyShowerLists as $list) {
            DB::table('baby_shower_lists')->insert($list);
        }

        // إنشاء عناصر استحمام الأطفال
        $babyShowerItems = [
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($babyShowerItems as $item) {
            DB::table('baby_shower_items')->insert($item);
        }

        // إنشاء السجلات الصحية للأطفال
        $babyHealthRecords = [
            [
                'baby_name' => 'أحمد محمد',
                'birth_date' => '2023-01-15',
                'gender' => 'ذكر',
                'weight' => 7.2,
                'height' => 65.0,
                'blood_type' => 'O+',
                'allergies' => 'لا توجد حساسية معروفة',
                'medical_conditions' => 'لا توجد حالات طبية خاصة',
                'vaccination_record' => json_encode(['BCG', 'DTaP', 'MMR']),
                'notes' => 'طفل بصحة جيدة، نمو طبيعي',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($babyHealthRecords as $record) {
            DB::table('baby_health_records')->insert($record);
        }
    }

    private function createAdditionalBazaarData()
    {
        $this->command->info('إنشاء بيانات إضافية للبازارات...');
        
        // إنشاء مشاركات البازارات
        $bazaarParticipations = [
            [
                'name' => 'أم أحمد',
                'activity_type' => 'أطعمة شعبية',
                'phone' => '+966-50-111-1111',
                'email' => 'am.ahmed@food.com',
                'city' => 'الرياض',
                'description' => 'متخصصة في الأطعمة الشعبية السعودية التقليدية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'فاطمة الخياطة',
                'activity_type' => 'ملابس تقليدية',
                'phone' => '+966-50-222-2222',
                'email' => 'fatima@tailor.com',
                'city' => 'الرياض',
                'description' => 'خياطة الملابس التقليدية السعودية',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($bazaarParticipations as $participation) {
            DB::table('bazaar_participations')->insert($participation);
        }

        // إنشاء حجوزات البازارات
        $bazaarBookings = [
            [
                'bazaar_id' => 1,
                'participant_name' => 'سارة محمد',
                'project_name' => 'زيارة البازار التراثي',
                'phone' => '+966-50-333-3333',
                'email' => 'sara@visitor.com',
                'city' => 'الرياض',
                'location' => 'حي الدرعية',
                'date' => now()->addDays(5)->format('Y-m-d'),
                'days' => 1,
                'notes' => 'زيارة عائلية للبازار',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($bazaarBookings as $booking) {
            DB::table('bazaar_bookings')->insert($booking);
        }
    }

    private function createAdditionalBeautyData()
    {
        $this->command->info('إنشاء بيانات إضافية للجمال...');
        
        // إنشاء فيديوهات صالونات الجمال
        $beautyShopVideos = [
            [
                'beauty_shop_id' => 1,
                'video_url' => 'https://youtube.com/watch?v=hair-styles',
                'skip_after_seconds' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($beautyShopVideos as $video) {
            DB::table('beauty_shop_videos')->insert($video);
        }
    }

    private function createAdditionalAccessoriesData()
    {
        $this->command->info('إنشاء بيانات إضافية للأكسسوارات...');
        
        // إنشاء فيديوهات الراعي للأكسسوارات
        $accessoratySponsorVideos = [
            [
                'video_url' => 'https://youtube.com/watch?v=accessories1',
                'skip_after_seconds' => '8',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($accessoratySponsorVideos as $video) {
            DB::table('accessoraty_sponsor_videos')->insert($video);
        }
    }
}
