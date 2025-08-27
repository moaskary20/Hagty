<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AllSectionsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🚀 بدء إنشاء بيانات جميع الأقسام...');

        // 1. قسم الجمال
        $this->createBeautyData();
        
        // 2. قسم الموضة
        $this->createFashionData();
        
        // 3. قسم الزفاف
        $this->createWeddingData();
        
        // 4. قسم الأطفال
        $this->createBabiesData();
        
        // 5. قسم الصحة
        $this->createHealthData();
        
        // 6. قسم الكورسات التعليمية
        $this->createCoursesData();

        $this->command->info('✅ تم إنشاء جميع البيانات بنجاح! 🎉');
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'فاطمة علي',
                'works_images' => json_encode(['/images/hair3.jpg', '/images/hair4.jpg']),
                'location' => 'شارع البحر الأعظم، الجيزة',
                'phone' => '+201007654321',
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'د. أحمد خالد',
                'specialty' => 'جراحة التجميل',
                'clinic_address' => 'شارع البحر الأعظم، الجيزة',
                'phone' => '+201007654321',
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

        // حذف البيانات الموجودة أولاً
        DB::table('fashion_trend_videos')->delete();
        DB::table('fashion_trends')->delete();

        // إدراج الصيحات
        foreach ($fashionTrends as $trend) {
            DB::table('fashion_trends')->insert($trend);
        }

        // فيديوهات الموضة - بعد إنشاء الصيحات
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
            DB::table('fashion_trend_videos')->insert($video);
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
            ]
        ];

        foreach ($designers as $designer) {
            DB::table('wedding_dress_designers')->updateOrInsert(
                ['name' => $designer['name']],
                $designer
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
                'gender' => 'ذكر',
                'mother_name' => 'فاطمة أحمد',
                'father_name' => 'محمد علي',
                'health_info' => 'طفل نشط وصحي، يحب اللعب مع الألعاب الملونة. يتناول الطعام بشكل جيد وينام بانتظام.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'فاطمة علي',
                'birth_date' => '2023-08-20',
                'gender' => 'أنثى',
                'mother_name' => 'سارة محمد',
                'father_name' => 'أحمد خالد',
                'health_info' => 'طفلة ذكية ومستقلة، تحب الاستكشاف والتعلم. تتطور بشكل طبيعي وتستجيب للمؤثرات المحيطة.',
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'فاطمة',
                'last_name' => 'علي',
                'specialty' => 'أمراض النساء والتوليد',
                'clinic_address' => 'شارع البحر الأعظم، الجيزة',
                'phone' => json_encode(['+201007654321']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'محمد',
                'last_name' => 'خالد',
                'specialty' => 'طب الأطفال',
                'clinic_address' => 'شارع الهرم، الجيزة',
                'phone' => json_encode(['+201009876543']),
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
            ]
        ];

        foreach ($courses as $course) {
            DB::table('courses')->updateOrInsert(
                ['name' => $course['name']],
                $course
            );
        }
    }
}
