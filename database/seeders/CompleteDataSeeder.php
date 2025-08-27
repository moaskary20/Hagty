<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompleteDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🚀 بدء إنشاء جميع البيانات الشاملة...');

        // 1. فئات الموضة
        $this->createFashionCategories();
        
        // 2. قسم الجمال
        $this->createBeautyData();
        
        // 3. قسم الموضة
        $this->createFashionData();
        
        // 4. قسم الزفاف
        $this->createWeddingData();
        
        // 5. قسم الأطفال
        $this->createBabiesData();
        
        // 6. قسم الصحة
        $this->createHealthData();
        
        // 7. قسم الكورسات التعليمية
        $this->createCoursesData();
        
        // 8. قسم فرحي (الدي جي)
        $this->createJoyData();
        
        // 9. قسم رحلتي
        $this->createRehlaatyData();
        
        // 10. قسم عائلتي
        $this->createFamilyData();
        
        // 11. قسم أومومتي
        $this->createUmomiData();
        
        // 12. قسم أكسسوراتى
        $this->createAccessoratyData();

        $this->command->info('✅ تم إنشاء جميع البيانات الشاملة بنجاح! 🎉');
    }

    private function createFashionCategories()
    {
        $this->command->info('🎨 إنشاء فئات الموضة...');

        $categories = [
            [
                'name' => 'الألوان',
                'description' => 'أحدث ألوان الموضة والتجميل',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'الشعر',
                'description' => 'قصات وتصفيفات الشعر العصرية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'التجميل',
                'description' => 'تقنيات المكياج والعناية بالبشرة',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($categories as $category) {
            DB::table('fashion_trend_categories')->updateOrInsert(
                ['name' => $category['name']],
                $category
            );
        }
    }

    private function createBeautyData()
    {
        $this->command->info('💄 إنشاء بيانات قسم الجمال...');

        // متاجر الجمال
        $beautyShops = [
            [
                'brand_name' => 'صالون الأناقة الملكي',
                'location' => 'شارع النيل، القاهرة',
                'shop_url' => 'https://royal-elegance.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'مركز الجمال المتطور',
                'location' => 'شارع البحر الأعظم، الجيزة',
                'shop_url' => 'https://advanced-beauty.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'صالون السعادة',
                'location' => 'شارع الهرم، الجيزة',
                'shop_url' => 'https://happiness-salon.com',
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

        // مصففي الشعر
        $hairStylists = [
            [
                'name' => 'أحمد محمد',
                'works_images' => json_encode(['/images/hair1.jpg', '/images/hair2.jpg']),
                'location' => 'شارع النيل، القاهرة',
                'phone' => '+201001234567',
                'booking_url' => 'https://ahmed-hair-stylist.com/booking',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'فاطمة علي',
                'works_images' => json_encode(['/images/hair3.jpg', '/images/hair4.jpg']),
                'location' => 'شارع البحر الأعظم، الجيزة',
                'phone' => '+201007654321',
                'booking_url' => 'https://fatima-hair-stylist.com/booking',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ليلى محمود',
                'works_images' => json_encode(['/images/hair5.jpg', '/images/hair6.jpg']),
                'location' => 'شارع الهرم، الجيزة',
                'phone' => '+201003456789',
                'booking_url' => 'https://layla-hair-stylist.com/booking',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($hairStylists as $stylist) {
            DB::table('hair_stylists')->updateOrInsert(
                ['name' => $stylist['name']],
                $stylist
            );
        }

        // أطباء التجميل
        $plasticSurgeons = [
            [
                'name' => 'د. سارة محمد',
                'specialty' => 'جراحة التجميل',
                'clinic_address' => 'شارع النيل، القاهرة',
                'phone' => '+201001234567',
                'booking_url' => 'https://dr-sara-beauty.com/booking',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'د. أحمد خالد',
                'specialty' => 'جراحة التجميل',
                'clinic_address' => 'شارع البحر الأعظم، الجيزة',
                'phone' => '+201007654321',
                'booking_url' => 'https://dr-ahmed-beauty.com/booking',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'د. نورا أحمد',
                'specialty' => 'جراحة التجميل',
                'clinic_address' => 'شارع الهرم، الجيزة',
                'phone' => '+201004567890',
                'booking_url' => 'https://dr-nora-beauty.com/booking',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($plasticSurgeons as $surgeon) {
            DB::table('plastic_surgeons')->updateOrInsert(
                ['name' => $surgeon['name']],
                $surgeon
            );
        }
    }

    private function createFashionData()
    {
        $this->command->info('👠 إنشاء بيانات قسم الموضة...');

        // صيحات الموضة
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

        // فيديوهات الموضة
        $fashionVideos = [
            [
                'title' => 'أحدث صيحات الموضة 2024',
                'video_url' => 'https://www.youtube.com/watch?v=fashion2024',
                'trend_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'تقنيات المكياج الحديثة',
                'video_url' => 'https://www.youtube.com/watch?v=makeup2024',
                'trend_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($fashionVideos as $video) {
            DB::table('fashion_trend_videos')->updateOrInsert(
                ['title' => $video['title']],
                $video
            );
        }

        // كورسات الموضة
        $fashionCourses = [
            [
                'name' => 'كورس تصميم الأزياء',
                'description' => 'تعلم تصميم الأزياء والخياطة من البداية مع المدربة فاطمة علي',
                'short_description' => 'كورس شامل لتعلم تصميم الأزياء',
                'category' => 'تصميم الأزياء',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كورس المكياج الاحترافي',
                'description' => 'تعلم تقنيات المكياج الاحترافية مع المدربة سارة محمد',
                'short_description' => 'كورس شامل للمكياج الاحترافي',
                'category' => 'التجميل',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($fashionCourses as $course) {
            DB::table('forasy_courses')->updateOrInsert(
                ['name' => $course['name']],
                $course
            );
        }
    }

    private function createWeddingData()
    {
        $this->command->info('💒 إنشاء بيانات قسم الزفاف...');

        // مصممي أزياء الزفاف
        $designers = [
            [
                'name' => 'فاطمة أحمد',
                'brand_name' => 'دار فاطمة للأزياء',
                'phone_numbers' => json_encode(['+201001234567']),
                'email' => 'fatima@designer.com',
                'address' => 'شارع النيل، القاهرة',
                'description' => 'مصممة أزياء زفاف مع خبرة 10 سنوات في تصميم الأزياء التقليدية والعصرية',
                'price_range_min' => 3000,
                'price_range_max' => 8000,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'سارة محمد',
                'brand_name' => 'أزياء سارة الملكية',
                'phone_numbers' => json_encode(['+201007654321']),
                'email' => 'sara@designer.com',
                'address' => 'شارع البحر الأعظم، الجيزة',
                'description' => 'متخصصة في أزياء الزفاف الفاخرة مع التركيز على التفاصيل الدقيقة',
                'price_range_min' => 5000,
                'price_range_max' => 12000,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'نورا خالد',
                'brand_name' => 'دار نورا للأناقة',
                'phone_numbers' => json_encode(['+201005432109']),
                'email' => 'nora@designer.com',
                'address' => 'شارع الهرم، الجيزة',
                'description' => 'مصممة مبتكرة في أزياء الزفاف العصرية مع مزيج من الأناقة والحداثة',
                'price_range_min' => 4000,
                'price_range_max' => 10000,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($designers as $designer) {
            DB::table('wedding_dress_designers')->updateOrInsert(
                ['name' => $designer['name']],
                $designer
            );
        }

        // منظمي حفلات الزفاف
        $planners = [
            [
                'name' => 'أحمد علي',
                'phone' => '+201001111111',
                'location' => 'شارع النيل، القاهرة',
                'package' => 'باقة شاملة: 15,000 جنيه',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'محمد خالد',
                'phone' => '+201002222222',
                'location' => 'شارع البحر الأعظم، الجيزة',
                'package' => 'باقة أساسية: 10,000 جنيه',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($planners as $planner) {
            DB::table('wedding_planners')->updateOrInsert(
                ['name' => $planner['name']],
                $planner
            );
        }

        // فنانات المكياج
        $makeupArtists = [
            [
                'name' => 'ليلى أحمد',
                'phone' => '+201003333333',
                'address' => 'شارع النيل، القاهرة',
                'description' => 'مكياج عرائس احترافي مع خبرة 12 سنة',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ريم محمد',
                'phone' => '+201004444444',
                'address' => 'شارع الهرم، الجيزة',
                'description' => 'مكياج عرائس عصرية مع تقنيات حديثة',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($makeupArtists as $artist) {
            DB::table('makeup_artists')->updateOrInsert(
                ['name' => $artist['name']],
                $artist
            );
        }
    }

    private function createBabiesData()
    {
        $this->command->info('👶 إنشاء بيانات قسم الأطفال...');

        $babies = [
            [
                'name' => 'أحمد محمد',
                'birth_date' => '2024-02-15',
                'age' => 1.5,
                'gender' => 'ذكر',
                'mother_name' => 'فاطمة أحمد',
                'father_name' => 'محمد علي',
                'weight' => 12.5,
                'height' => 85,
                'health_info' => 'طفل نشط وصحي، يحب اللعب مع الألعاب الملونة. يتناول الطعام بشكل جيد وينام بانتظام.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'فاطمة علي',
                'birth_date' => '2023-08-20',
                'age' => 2.0,
                'gender' => 'أنثى',
                'mother_name' => 'سارة محمد',
                'father_name' => 'أحمد خالد',
                'weight' => 14.2,
                'height' => 92,
                'health_info' => 'طفلة ذكية ومستقلة، تحب الاستكشاف والتعلم. تتطور بشكل طبيعي وتستجيب للمؤثرات المحيطة.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'علي أحمد',
                'birth_date' => '2024-05-10',
                'age' => 1.0,
                'gender' => 'ذكر',
                'mother_name' => 'نورا محمد',
                'father_name' => 'خالد أحمد',
                'weight' => 11.8,
                'height' => 78,
                'health_info' => 'طفل هادئ ومحب للقراءة، يتعلم بسرعة ويحب الألوان والأشكال. يتفاعل بشكل إيجابي مع البيئة المحيطة.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($babies as $baby) {
            DB::table('babies')->updateOrInsert(
                ['name' => $baby['name']],
                $baby
            );
        }
    }

    private function createHealthData()
    {
        $this->command->info('👨‍⚕️ إنشاء بيانات قسم الصحة...');

        $doctors = [
            [
                'first_name' => 'أحمد',
                'last_name' => 'محمد',
                'specialty' => 'أمراض القلب',
                'clinic_address' => 'شارع النيل، القاهرة',
                'phone' => json_encode(['+201001234567']),
                'booking_url' => 'https://calendly.com/dr-ahmed-mohamed',
                'google_maps_url' => 'https://maps.google.com/?q=شارع+النيل+القاهرة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'فاطمة',
                'last_name' => 'علي',
                'specialty' => 'أمراض النساء والتوليد',
                'clinic_address' => 'شارع البحر الأعظم، الجيزة',
                'phone' => json_encode(['+201007654321']),
                'booking_url' => 'https://calendly.com/dr-fatima-ali',
                'google_maps_url' => 'https://maps.google.com/?q=شارع+البحر+الأعظم+الجيزة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'محمد',
                'last_name' => 'خالد',
                'specialty' => 'طب الأطفال',
                'clinic_address' => 'شارع الهرم، الجيزة',
                'phone' => json_encode(['+201009876543']),
                'booking_url' => 'https://calendly.com/dr-mohamed-khalid',
                'google_maps_url' => 'https://maps.google.com/?q=شارع+الهرم+الجيزة',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($doctors as $doctor) {
            DB::table('doctors')->updateOrInsert(
                ['first_name' => $doctor['first_name'], 'last_name' => $doctor['last_name']],
                $doctor
            );
        }
    }

    private function createCoursesData()
    {
        $this->command->info('📚 إنشاء بيانات الكورسات التعليمية...');

        $courses = [
            [
                'name' => 'كورس التجميل الأساسي',
                'description' => 'تعلم أساسيات التجميل والمكياج من الصفر حتى الاحتراف',
                'instructor' => 'أحمد محمد',
                'duration' => '8 أسابيع',
                'max_students' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كورس تصميم الأزياء',
                'description' => 'تعلم تصميم الأزياء والخياطة من البداية',
                'instructor' => 'فاطمة علي',
                'duration' => '12 أسبوع',
                'max_students' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كورس العناية بالبشرة',
                'description' => 'تعلم أسرار العناية بالبشرة وأنواع البشرة المختلفة',
                'instructor' => 'سارة محمد',
                'duration' => '6 أسابيع',
                'max_students' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كورس المكياج الاحترافي',
                'description' => 'تقنيات المكياج الاحترافية للمناسبات والتصوير',
                'instructor' => 'نورا أحمد',
                'duration' => '10 أسابيع',
                'max_students' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كورس تصفيف الشعر',
                'description' => 'تعلم أحدث تقنيات تصفيف الشعر وقصات الشعر العصرية',
                'instructor' => 'مريم خالد',
                'duration' => '9 أسابيع',
                'max_students' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كورس العناية بالجسم',
                'description' => 'أسرار العناية بالجسم والرشاقة والجمال الطبيعي',
                'instructor' => 'ليلى محمود',
                'duration' => '7 أسابيع',
                'max_students' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($courses as $course) {
            DB::table('courses')->updateOrInsert(
                ['name' => $course['name']],
                $course
            );
        }
    }

    private function createJoyData()
    {
        $this->command->info('🎉 إنشاء بيانات قسم فرحي...');

        // مشغلي الدي جي
        $djPerformers = [
            [
                'name' => 'أحمد الموسيقى',
                'specialty' => 'دي جي حفلات الزفاف',
                'phone_numbers' => json_encode(['+201001234567']),
                'email' => 'ahmed@dj.com',
                'description' => 'خبير في موسيقى حفلات الزفاف مع خبرة 8 سنوات',
                'website_url' => 'https://ahmed-dj.com',
                'instagram_url' => 'https://instagram.com/ahmed-dj',
                'facebook_url' => 'https://facebook.com/ahmed-dj',
                'starting_price' => 2500,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'سارة الصوت',
                'specialty' => 'دي جي حفلات النساء',
                'phone_numbers' => json_encode(['+201007654321']),
                'email' => 'sara@dj.com',
                'description' => 'متخصصة في موسيقى حفلات النساء والمناسبات الخاصة',
                'website_url' => 'https://sara-dj.com',
                'instagram_url' => 'https://instagram.com/sara-dj',
                'facebook_url' => 'https://facebook.com/sara-dj',
                'starting_price' => 2000,
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

        // باقات الدي جي
        $djPackages = [
            [
                'dj_performer_id' => 1,
                'package_name' => 'الباقة الأساسية',
                'package_description' => '3 ساعات من الموسيقى مع المعدات الأساسية',
                'price' => 6000,
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
                'price' => 10000,
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

        // لافتات الدي جي
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
                ['title' => $banner['title']],
                $banner
            );
        }

        // فيديوهات إعلانات الدي جي
        $djVideoAds = [
            [
                'dj_performer_id' => 1,
                'title' => 'أحمد الموسيقى - عرض خاص',
                'video_url' => 'https://www.youtube.com/watch?v=ahmed-dj',
                'description' => 'شاهد أحمد الموسيقى في أحد حفلات الزفاف',
                'skip_after_seconds' => 5,
                'is_sponsored' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dj_performer_id' => 2,
                'title' => 'سارة الصوت - حفلات النساء',
                'video_url' => 'https://www.youtube.com/watch?v=sara-dj',
                'description' => 'تعرفي على سارة الصوت في حفلات النساء',
                'skip_after_seconds' => 5,
                'is_sponsored' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($djVideoAds as $video) {
            DB::table('dj_video_ads')->updateOrInsert(
                ['title' => $video['title']],
                $video
            );
        }
    }

    private function createRehlaatyData()
    {
        $this->command->info('✈️ إنشاء بيانات قسم رحلتي...');

        // الفنادق
        $hotels = [
            [
                'name' => 'فندق النيل رويال',
                'brand' => 'نيل رويال',
                'location' => 'شارع النيل، القاهرة',
                'offers' => 'خصم 20% على الإقامة لمدة أسبوع',
                'status' => 'متاح',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'فندق البحر الأعظم',
                'brand' => 'بحر الأعظم',
                'location' => 'شارع البحر الأعظم، الجيزة',
                'offers' => 'عرض خاص للعائلات',
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

        // مكاتب السياحة
        $tourismOffices = [
            [
                'brand' => 'مكتب السياحة المصرية',
                'address' => 'شارع النيل، القاهرة',
                'phone' => '+201001234567',
                'page_url' => 'https://egypt-tourism.com',
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

        // عروض السفر
        $travelOffers = [
            [
                'title' => 'رحلة الأقصر وأسوان',
                'description' => 'رحلة 5 أيام لزيارة معالم الأقصر وأسوان',
                'destination' => 'الأقصر وأسوان',
                'date' => '2024-04-15',
                'price' => 5000,
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

        // معسكرات النساء
        $womenCamps = [
            [
                'name' => 'معسكر النساء في سيناء',
                'location' => 'شرم الشيخ، سيناء',
                'description' => 'معسكر خاص بالنساء في أجمل شواطئ سيناء',
                'contact' => '+201001234567',
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

        // أحداث التقويم
        $calendarEvents = [
            [
                'name' => 'مهرجان الألوان',
                'date' => '2024-04-15',
                'destination' => 'حديقة الأزهر، القاهرة',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($calendarEvents as $event) {
            DB::table('calendar_events')->updateOrInsert(
                ['name' => $event['name']],
                $event
            );
        }
    }

    private function createFamilyData()
    {
        $this->command->info('👨‍👩‍👧‍👦 إنشاء بيانات قسم عائلتي...');

        // نصائح عائلية
        $familyAdvices = [
            [
                'title' => 'كيفية تقوية الروابط العائلية',
                'content' => 'نصائح عملية لتقوية العلاقات بين أفراد الأسرة',
                'type' => 'مرشد أسري اجتماعي',
                'category' => 'إرشاد أسري',
                'target_audience' => 'الجميع',
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($familyAdvices as $advice) {
            DB::table('family_advice')->updateOrInsert(
                ['title' => $advice['title']],
                $advice
            );
        }

        // أنشطة عائلية - تخطي هذا الجدول لأنه فارغ
        // $familyActivities = [];

        // أماكن التنزه العائلية
        $familyOutingAreas = [
            [
                'name' => 'حديقة الأزهر',
                'type' => 'حديقة',
                'address' => 'حي الأزهر، القاهرة',
                'description' => 'حديقة كبيرة ومناسبة للعائلات',
                'facilities' => json_encode(['مطاعم', 'ملاعب', 'مقاعد']),
                'price_range' => 'مجاني',
                'family_friendly' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($familyOutingAreas as $area) {
            DB::table('family_outing_areas')->updateOrInsert(
                ['name' => $area['name']],
                $area
            );
        }

        // السجلات الصحية العائلية
        $familyHealthRecords = [
            [
                'member_name' => 'أحمد محمد',
                'relationship' => 'الأب',
                'birth_date' => '1989-01-15',
                'blood_type' => 'A+',
                'chronic_diseases' => 'لا توجد',
                'allergies' => 'لا توجد',
                'current_medications' => 'لا توجد',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($familyHealthRecords as $record) {
            DB::table('family_health_records')->updateOrInsert(
                ['member_name' => $record['member_name']],
                $record
            );
        }
    }

    private function createUmomiData()
    {
        $this->command->info('🤱 إنشاء بيانات قسم أومومتي...');

        // أطباء الأمومة
        $maternityDoctors = [
            [
                'name' => 'د. فاطمة أحمد',
                'phone_numbers' => json_encode(['+201001234567']),
                'clinic_name' => 'عيادة الأمومة المتخصصة',
                'clinic_address' => 'شارع النيل، القاهرة',
                'years_of_experience' => 15,
                'consultation_fees' => 500,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'د. سارة محمد',
                'phone_numbers' => json_encode(['+201007654321']),
                'clinic_name' => 'مركز رعاية الأمومة',
                'clinic_address' => 'شارع البحر الأعظم، الجيزة',
                'years_of_experience' => 12,
                'consultation_fees' => 400,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($maternityDoctors as $doctor) {
            DB::table('maternity_doctors')->updateOrInsert(
                ['name' => $doctor['name']],
                $doctor
            );
        }

        // رعاية الطفل الأسبوعية - تخطي هذا الجدول لأنه فارغ
        // $weeklyBabyCares = [];

        // تحضيرات الولادة - تخطي هذا الجدول لأنه فارغ
        // $deliveryPreparations = [];
    }

    private function createAccessoratyData()
    {
        $this->command->info('💎 إنشاء بيانات قسم أكسسوراتى...');

        // الكورسات
        $courses = [
            [
                'name' => 'كورس تصميم الأكسسوارات',
                'description' => 'تعلم تصميم وصناعة الأكسسوارات اليدوية',
                'instructor' => 'أحمد محمد',
                'duration' => '8 أسابيع',
                'max_students' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($courses as $course) {
            DB::table('courses')->updateOrInsert(
                ['name' => $course['name']],
                $course
            );
        }

        // المتاجر
        $shops = [
            [
                'brand_name' => 'متجر الأكسسوارات الملكي',
                'location' => 'شارع النيل، القاهرة',
                'shop_url' => 'https://royal-accessories.com',
                'category' => 'ذهبية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'متجر الإكسسوارات الفاخرة',
                'location' => 'شارع البحر الأعظم، الجيزة',
                'shop_url' => 'https://luxury-accessories.com',
                'category' => 'فضية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'متجر الألماس والأحجار الكريمة',
                'location' => 'شارع الهرم، الجيزة',
                'shop_url' => 'https://diamond-accessories.com',
                'category' => 'ماسية',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($shops as $shop) {
            DB::table('accessoraty_shops')->updateOrInsert(
                ['brand_name' => $shop['brand_name']],
                $shop
            );
        }

        // إعلانات البانر
        $bannerAds = [
            [
                'image' => '/images/accessory-banner.jpg',
                'link' => 'https://royal-accessories.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($bannerAds as $banner) {
            DB::table('accessoraty_banner_ads')->insert($banner);
        }

        // فيديوهات الراعي
        $sponsorVideos = [
            [
                'video_url' => 'https://www.youtube.com/watch?v=accessories',
                'skip_after_seconds' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($sponsorVideos as $video) {
            DB::table('accessoraty_sponsor_videos')->insert($video);
        }
    }
}
