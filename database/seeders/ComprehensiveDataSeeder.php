<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ComprehensiveDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🚀 بدء إنشاء البيانات الشاملة لجميع الأقسام...');

        // 1. قسم جمالي
        $this->createBeautyData();
        
        // 2. قسم فرحي
        $this->createJoyData();
        
        // 3. قسم رحلتي
        $this->createTravelData();
        
        // 4. قسم أومومتي
        $this->createUmomiData();
        
        // 5. قسم عائلتي
        $this->createFamilyData();

        $this->command->info('✅ تم إنشاء جميع البيانات بنجاح! 🎉');
    }

    private function createBeautyData()
    {
        $this->command->info('💄 إنشاء بيانات قسم جمالي...');

        // إنشاء فئات صيحات الموضة
        $fashionCategories = [
            ['name' => 'الألوان', 'description' => 'أحدث ألوان الموضة والتجميل'],
            ['name' => 'الشعر', 'description' => 'قصات وتصفيفات الشعر العصرية'],
            ['name' => 'المكياج', 'description' => 'تقنيات وأدوات المكياج'],
            ['name' => 'العناية بالبشرة', 'description' => 'منتجات وطرق العناية بالبشرة'],
            ['name' => 'الأزياء', 'description' => 'أحدث صيحات الملابس'],
        ];

        foreach ($fashionCategories as $category) {
            DB::table('fashion_trend_categories')->updateOrInsert(
                ['name' => $category['name']],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // إنشاء صيحات الموضة
        $fashionTrends = [
            [
                'title' => 'ألوان الربيع 2024',
                'content' => 'أحدث ألوان الموضة لربيع 2024: الأخضر الزمردي، الوردي الفوشيا، والأزرق السماوي. هذه الألوان تعكس الطبيعة والحيوية.',
                'category_id' => 1,
                'image' => '/images/spring-colors.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'قصات الشعر العصرية',
                'content' => 'أحدث قصات الشعر للنساء: البوب القصير، الطبقات الطويلة، والغرة الجانبية. قصات تناسب جميع أشكال الوجه.',
                'category_id' => 2,
                'image' => '/images/hair-styles.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'تقنيات المكياج الطبيعي',
                'content' => 'كيفية تطبيق المكياج الطبيعي الذي يبرز جمالك دون مبالغة. نصائح من خبراء التجميل.',
                'category_id' => 3,
                'image' => '/images/natural-makeup.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($fashionTrends as $trend) {
            DB::table('fashion_trends')->updateOrInsert(
                ['title' => $trend['title']],
                $trend
            );
        }

        // إنشاء متاجر الجمال
        $beautyShops = [
            [
                'brand_name' => 'صالون الأناقة الملكي',
                'location' => 'شارع التحلية، الرياض',
                'shop_url' => 'https://elegance-salon.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'مركز الجمال العصري',
                'location' => 'شارع الأمير محمد بن فهد، الدمام',
                'shop_url' => 'https://modern-beauty.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'صالون الجمال الفاخر',
                'location' => 'شارع الملك فهد، جدة',
                'shop_url' => 'https://luxury-beauty.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($beautyShops as $shop) {
            DB::table('beauty_shops')->updateOrInsert(
                ['brand_name' => $shop['brand_name']],
                $shop
            );
        }

        // إنشاء نصائح التجميل
        $beautyTips = [
            [
                'tip' => 'استخدمي واقي الشمس يومياً لحماية بشرتك من الشيخوخة المبكرة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tip' => 'اشربي 8 أكواب من الماء يومياً للحصول على بشرة نضرة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tip' => 'قومي بتقشير بشرتك مرتين أسبوعياً لإزالة الخلايا الميتة',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($beautyTips as $tip) {
            DB::table('beauty_tips')->updateOrInsert(
                ['tip' => $tip['tip']],
                $tip
            );
        }

        // إنشاء فيديوهات تصفيف الشعر
        $hairVideos = [
            [
                'video_title' => 'كيفية عمل كعكة الشعر',
                'video_text' => 'تعلمي كيفية عمل كعكة الشعر بسهولة في المنزل',
                'video_url' => 'https://youtube.com/watch?v=hair-bun-tutorial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'video_title' => 'تصفيفة الشعر الفرنسية',
                'video_text' => 'طريقة عمل التصفيفة الفرنسية الأنيقة',
                'video_url' => 'https://youtube.com/watch?v=french-braid',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($hairVideos as $video) {
            DB::table('hair_blog_videos')->updateOrInsert(
                ['video_title' => $video['video_title']],
                $video
            );
        }

        $this->command->info('✅ تم إنشاء بيانات قسم جمالي بنجاح');
    }

    private function createJoyData()
    {
        $this->command->info('🎉 إنشاء بيانات قسم فرحي...');

        // إنشاء مشغلي الدي جي
        $djPerformers = [
            [
                'name' => 'أحمد الموسيقى',
                'specialty' => 'دي جي حفلات الزفاف',
                'phone_numbers' => json_encode(['+966501234567']),
                'email' => 'ahmed@dj.com',
                'description' => 'خبير في موسيقى حفلات الزفاف مع خبرة 8 سنوات',
                'website_url' => 'https://ahmed-dj.com',
                'instagram_url' => 'https://instagram.com/ahmed-dj',
                'facebook_url' => 'https://facebook.com/ahmed-dj',
                'starting_price' => 500,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'سارة الصوت',
                'specialty' => 'دي جي حفلات النساء',
                'phone_numbers' => json_encode(['+966507654321']),
                'email' => 'sara@dj.com',
                'description' => 'متخصصة في موسيقى حفلات النساء والمناسبات الخاصة',
                'website_url' => 'https://sara-dj.com',
                'instagram_url' => 'https://instagram.com/sara-dj',
                'facebook_url' => 'https://facebook.com/sara-dj',
                'starting_price' => 400,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($djPerformers as $dj) {
            DB::table('dj_performers')->updateOrInsert(
                ['name' => $dj['name']],
                $dj
            );
        }

        // إنشاء باقات الدي جي
        $djPackages = [
            [
                'dj_performer_id' => 1,
                'package_name' => 'الباقة الأساسية',
                'package_description' => '3 ساعات من الموسيقى مع المعدات الأساسية',
                'price' => 1200,
                'duration_hours' => 3,
                'includes' => json_encode(['معدات صوت أساسية', 'قائمة موسيقى متنوعة', 'ميكروفون']),
                'is_popular' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dj_performer_id' => 1,
                'package_name' => 'الباقة المميزة',
                'package_description' => '5 ساعات مع معدات متقدمة وإضاءة',
                'price' => 2000,
                'duration_hours' => 5,
                'includes' => json_encode(['معدات صوت متقدمة', 'إضاءة ملونة', 'ميكروفون لاسلكي', 'قائمة موسيقى مخصصة']),
                'is_popular' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($djPackages as $package) {
            DB::table('dj_wedding_packages')->updateOrInsert(
                ['package_name' => $package['package_name'], 'dj_performer_id' => $package['dj_performer_id']],
                $package
            );
        }

        // إنشاء لافتات الدي جي
        $djBanners = [
            [
                'dj_performer_id' => 1,
                'title' => 'أحمد الموسيقى - حفلات الزفاف',
                'banner_image' => '/images/dj-banner-1.jpg',
                'link_url' => 'https://ahmed-dj.com',
                'offer_description' => 'خصم 20% على باقات حفلات الزفاف',
                'valid_until' => '2024-12-31',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dj_performer_id' => 2,
                'title' => 'سارة الصوت - حفلات النساء',
                'banner_image' => '/images/dj-banner-2.jpg',
                'link_url' => 'https://sara-dj.com',
                'offer_description' => 'باقات خاصة لحفلات النساء',
                'valid_until' => '2024-12-31',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($djBanners as $banner) {
            DB::table('dj_banners')->updateOrInsert(
                ['banner_image' => $banner['banner_image']],
                $banner
            );
        }

        // إنشاء إعلانات فيديو الدي جي
        $djVideos = [
            [
                'dj_performer_id' => 1,
                'title' => 'أحمد الموسيقى - عرض مباشر',
                'video_url' => 'https://youtube.com/watch?v=dj-performance-1',
                'description' => 'عرض مباشر لموسيقى حفلات الزفاف',
                'skip_after_seconds' => 15,
                'is_sponsored' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dj_performer_id' => 2,
                'title' => 'سارة الصوت - حفلة نسائية',
                'video_url' => 'https://youtube.com/watch?v=dj-performance-2',
                'description' => 'موسيقى خاصة لحفلات النساء',
                'skip_after_seconds' => 20,
                'is_sponsored' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($djVideos as $video) {
            DB::table('dj_video_ads')->updateOrInsert(
                ['video_url' => $video['video_url']],
                $video
            );
        }

        $this->command->info('✅ تم إنشاء بيانات قسم فرحي بنجاح');
    }

    private function createTravelData()
    {
        $this->command->info('✈️ إنشاء بيانات قسم رحلتي...');

        // إنشاء مكاتب السياحة
        $tourismOffices = [
            [
                'brand' => 'مكتب السفر المثالي',
                'address' => 'شارع الملك فهد، الرياض',
                'phone' => '+966112345678',
                'page_url' => 'https://perfect-travel.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'مكتب السياحة العالمية',
                'address' => 'شارع التحلية، جدة',
                'phone' => '+966126789012',
                'page_url' => 'https://global-tourism.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($tourismOffices as $office) {
            DB::table('tourism_offices')->updateOrInsert(
                ['brand' => $office['brand']],
                $office
            );
        }

        // إنشاء عروض السفر
        $travelOffers = [
            [
                'destination' => 'إسطنبول، تركيا',
                'date' => '2024-04-15',
                'title' => 'رحلة ربيعية إلى إسطنبول',
                'description' => 'رحلة 7 أيام إلى إسطنبول تشمل زيارة المساجد التاريخية والجسور الشهيرة',
                'image' => '/images/istanbul-spring.jpg',
                'video' => 'https://youtube.com/watch?v=istanbul-tour',
                'price' => 3500,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'destination' => 'ماليزيا',
                'date' => '2024-05-20',
                'title' => 'مغامرة في ماليزيا',
                'description' => 'رحلة 10 أيام تشمل كوالالمبور ولنكاوي وجزر المالديف',
                'image' => '/images/malaysia-adventure.jpg',
                'video' => 'https://youtube.com/watch?v=malaysia-tour',
                'price' => 5500,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($travelOffers as $offer) {
            DB::table('travel_offers')->updateOrInsert(
                ['title' => $offer['title']],
                $offer
            );
        }

        // إنشاء الفنادق
        $hotels = [
            [
                'name' => 'فندق الشرق الفاخر',
                'brand' => 'فاخر',
                'location' => 'وسط المدينة، الرياض',
                'offers' => 'مسبح، صالة رياضية، مطعم، بار، خدمة الغرف',
                'status' => 'متاح',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'فندق البحر الأحمر',
                'brand' => 'مميز',
                'location' => 'شاطئ البحر، جدة',
                'offers' => 'شاطئ خاص، مسبح، مطعم بحري، خدمة الغرف',
                'status' => 'متاح',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($hotels as $hotel) {
            DB::table('hotels')->updateOrInsert(
                ['name' => $hotel['name']],
                $hotel
            );
        }

        // إنشاء مخيمات النساء
        $womenCamps = [
            [
                'name' => 'مخيم السعادة النسائي',
                'location' => 'وادي حنيفة، الرياض',
                'description' => 'مخيم نسائي في الطبيعة مع أنشطة متنوعة: يوجا، مشي، جلسات تأمل، ورش عمل. السعة: 50 شخص',
                'contact' => '+966501234567',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مخيم الطبيعة النسائي',
                'location' => 'جبال السروات، أبها',
                'description' => 'مخيم نسائي في الجبال مع أنشطة: تسلق الجبال، مشي في الطبيعة، جلسات شاي، رسم. السعة: 30 شخص',
                'contact' => '+966507654321',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($womenCamps as $camp) {
            DB::table('women_camps')->updateOrInsert(
                ['name' => $camp['name']],
                $camp
            );
        }

        $this->command->info('✅ تم إنشاء بيانات قسم رحلتي بنجاح');
    }

    private function createUmomiData()
    {
        $this->command->info('🤱 إنشاء بيانات قسم أومومتي...');

        // إنشاء نصائح الخبراء
        $expertAdvice = [
            [
                'title' => 'نصائح للحمل الصحي',
                'description' => 'دليل شامل للحمل الصحي من الشهر الأول حتى الولادة',
                'expert_name' => 'د. فاطمة محمد',
                'expert_specialization' => 'أخصائية نساء وولادة',
                'content_type' => 'text',
                'content' => 'تناولي الفيتامينات بانتظام، مارسي الرياضة الخفيفة، احرصي على الراحة الكافية',
                'category' => 'pregnancy',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'الرضاعة الطبيعية',
                'description' => 'فوائد الرضاعة الطبيعية وكيفية التعامل مع الصعوبات',
                'expert_name' => 'د. نورا أحمد',
                'expert_specialization' => 'أخصائية رضاعة طبيعية',
                'content_type' => 'text',
                'content' => 'الرضاعة الطبيعية تحمي طفلك من الأمراض وتقوي جهازه المناعي',
                'category' => 'breastfeeding',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($expertAdvice as $advice) {
            DB::table('expert_advice')->updateOrInsert(
                ['title' => $advice['title']],
                $advice
            );
        }

        // إنشاء نصائح الجدات
        $grandmaAdvice = [
            [
                'title' => 'وصفات طبيعية للعناية بالطفل',
                'description' => 'نصائح من الجدة أمينة من الحجاز',
                'grandma_name' => 'الجدة أمينة',
                'grandma_age' => 75,
                'advice_text' => 'استخدمي زيت الزيتون لتدليك جسم طفلك، والزعتر لعلاج السعال',
                'advice_type' => 'text',
                'category' => 'baby_care',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'أطعمة تقوية الحامل',
                'description' => 'نصائح من الجدة فاطمة من نجد',
                'grandma_name' => 'الجدة فاطمة',
                'grandma_age' => 70,
                'advice_text' => 'تناولي التمر والعسل واللبن لصحة أفضل لك ولجنينك',
                'advice_type' => 'text',
                'category' => 'pregnancy',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($grandmaAdvice as $advice) {
            DB::table('grandma_advice')->updateOrInsert(
                ['title' => $advice['title']],
                $advice
            );
        }

        // إنشاء حلقات البودكاست
        $podcastEpisodes = [
            [
                'title' => 'رحلة الأمومة',
                'description' => 'حلقة تتحدث عن تجربة الأمومة والتحديات التي تواجهها الأمهات',
                'episode_number' => 1,
                'season_number' => 1,
                'host_name' => 'سارة أحمد',
                'audio_url' => 'https://podcast.com/motherhood-journey',
                'duration' => 45,
                'category' => 'motherhood',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'نصائح التربية',
                'description' => 'نصائح عملية لتربية الأطفال في العصر الحديث',
                'episode_number' => 2,
                'season_number' => 1,
                'host_name' => 'فاطمة محمد',
                'audio_url' => 'https://podcast.com/parenting-tips',
                'duration' => 30,
                'category' => 'baby_care',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($podcastEpisodes as $episode) {
            DB::table('podcast_episodes')->updateOrInsert(
                ['title' => $episode['title']],
                $episode
            );
        }

        // إنشاء سجلات صحة العائلة
        $familyHealthRecords = [
            [
                'member_name' => 'أحمد محمد',
                'relationship' => 'الابن',
                'birth_date' => '2020-03-15',
                'blood_type' => 'O+',
                'chronic_diseases' => 'لا يوجد',
                'allergies' => 'حساسية من المكسرات',
                'current_medications' => 'لا يوجد',
                'family_doctor' => 'د. خالد أحمد',
                'doctor_phone' => '+966501234567',
                'emergency_notes' => 'في حالة الطوارئ اتصل بالطبيب فوراً',
                'height' => 95.5,
                'weight' => 14.2,
                'insurance_company' => 'شركة التأمين الوطنية',
                'insurance_number' => 'INS123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_name' => 'فاطمة محمد',
                'relationship' => 'الابنة',
                'birth_date' => '2018-07-22',
                'blood_type' => 'A+',
                'chronic_diseases' => 'لا يوجد',
                'allergies' => 'لا يوجد',
                'current_medications' => 'لا يوجد',
                'family_doctor' => 'د. سارة خالد',
                'doctor_phone' => '+966507654321',
                'emergency_notes' => 'متابعة دورية كل 6 أشهر',
                'height' => 110.0,
                'weight' => 18.5,
                'insurance_company' => 'شركة التأمين الوطنية',
                'insurance_number' => 'INS123457',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($familyHealthRecords as $record) {
            DB::table('family_health_records')->updateOrInsert(
                ['member_name' => $record['member_name'], 'relationship' => $record['relationship']],
                $record
            );
        }

        $this->command->info('✅ تم إنشاء بيانات قسم أومومتي بنجاح');
    }

    private function createFamilyData()
    {
        $this->command->info('👨‍👩‍👧‍👦 إنشاء بيانات قسم عائلتي...');

        // إنشاء نصائح العائلة
        $familyAdvice = [
            [
                'title' => 'نصائح لتربية الأطفال في العصر الرقمي',
                'type' => 'مرشد أسري اجتماعي',
                'content' => 'كيفية التعامل مع الأطفال في عصر التكنولوجيا وتنظيم وقت استخدام الأجهزة الذكية',
                'expert_name' => 'د. سارة أحمد',
                'expert_credentials' => 'دكتوراه في علم النفس التربوي',
                'contact_info' => 'sara.ahmed@family.com',
                'category' => 'تربية الأطفال',
                'target_audience' => 'الآباء',
                'duration_minutes' => 30,
                'rating' => 4.8,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'كيفية حل المشاكل العائلية',
                'type' => 'مرشد أسري اجتماعي',
                'content' => 'طرق عملية لحل المشاكل العائلية وتعزيز التواصل بين أفراد الأسرة',
                'expert_name' => 'د. محمد علي',
                'expert_credentials' => 'ماجستير في الإرشاد الأسري',
                'contact_info' => 'mohamed.ali@family.com',
                'category' => 'إرشاد أسري',
                'target_audience' => 'الجميع',
                'duration_minutes' => 45,
                'rating' => 4.6,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($familyAdvice as $advice) {
            DB::table('family_advice')->updateOrInsert(
                ['title' => $advice['title']],
                $advice
            );
        }

        // ملاحظة: جدول family_activities فارغ في قاعدة البيانات
        // يمكن إضافة الأعمدة المطلوبة لاحقاً إذا لزم الأمر

        // ملاحظة: جدول family_tips غير موجود في قاعدة البيانات
        // يمكن إضافته لاحقاً إذا لزم الأمر

        $this->command->info('✅ تم إنشاء بيانات قسم عائلتي بنجاح');
    }
}
