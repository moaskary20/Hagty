<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MissingDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🚀 بدء إضافة البيانات المفقودة...');

        // 1. قسم الزفاف - مصممي الأزياء
        $this->createWeddingDesigners();
        
        // 2. قسم الأطفال
        $this->createBabiesData();
        
        // 3. قسم الموضة - صيحات الموضة
        $this->createFashionTrends();
        
        // 4. قسم الصحة - الأطباء
        $this->createDoctors();
        
        // 5. قسم الكورسات التعليمية
        $this->createCourses();

        $this->command->info('✅ تم إضافة جميع البيانات المفقودة بنجاح! 🎉');
    }

    private function createWeddingDesigners()
    {
        $this->command->info('👗 إنشاء بيانات مصممي أزياء الزفاف...');

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

    private function createFashionTrends()
    {
        $this->command->info('👠 إنشاء بيانات صيحات الموضة...');

        $trends = [
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

        foreach ($trends as $trend) {
            DB::table('fashion_trends')->updateOrInsert(
                ['title' => $trend['title']],
                $trend
            );
        }
    }

    private function createDoctors()
    {
        $this->command->info('👨‍⚕️ إنشاء بيانات الأطباء...');

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

    private function createCourses()
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
