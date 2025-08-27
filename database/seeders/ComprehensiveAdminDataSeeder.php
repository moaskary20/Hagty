<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ComprehensiveAdminDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('بدء إنشاء البيانات الشاملة للوحة الإدارة...');

        // 1. إنشاء المستخدمين الإداريين
        $this->createAdminUsers();
        
        // 2. إنشاء البيانات الصحية
        $this->createHealthData();
        
        // 3. إنشاء بيانات عالم الموضة
        $this->createFashionData();
        
        // 4. إنشاء بيانات الأكسسوارات
        $this->createAccessoriesData();
        
        // 5. إنشاء بيانات العائلة والأطفال
        $this->createFamilyData();
        
        // 6. إنشاء بيانات المطبخ
        $this->createKitchenData();

        $this->command->info('تم إنشاء جميع البيانات بنجاح! 🎉');
    }

    private function createAdminUsers()
    {
        $this->command->info('إنشاء المستخدمين الإداريين...');
        
        $users = [
            [
                'name' => 'مدير النظام الرئيسي',
                'email' => 'admin@hagty.com',
                'password' => Hash::make('admin123'),
                'is_admin' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'محمد الأسكري',
                'email' => 'mo.askary@gmail.com', 
                'password' => Hash::make('newpassword'),
                'is_admin' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                $user
            );
        }
    }

    private function createHealthData()
    {
        $this->command->info('إنشاء البيانات الصحية...');
        
        // إنشاء المستشفيات
        $hospitals = [
            [
                'name' => 'مستشفى الملك فهد التخصصي',
                'specialty' => 'تخصصات متعددة',
                'address' => 'الرياض، المملكة العربية السعودية',
                'phone' => '+966-11-464-7272',
                'emergency_numbers' => json_encode(['997', '+966-11-464-7272']),
                'google_maps_link' => 'https://goo.gl/maps/kfsh',
                'booking_link' => 'https://kfsh.med.sa/booking',
                'image' => '/images/hospitals/kfsh.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مستشفى الملك خالد الجامعي',
                'specialty' => 'جامعي وتعليمي',
                'address' => 'جدة، المملكة العربية السعودية',
                'phone' => '+966-12-640-1000',
                'emergency_numbers' => json_encode(['997', '+966-12-640-1000']),
                'google_maps_link' => 'https://goo.gl/maps/kauh',
                'booking_link' => 'https://kauh.edu.sa/booking',
                'image' => '/images/hospitals/kauh.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($hospitals as $hospital) {
            DB::table('hospitals')->updateOrInsert(
                ['name' => $hospital['name']],
                $hospital
            );
        }
        
        // إنشاء الصيدليات
        $pharmacies = [
            [
                'name' => 'صيدلية النهدي',
                'address' => 'شارع الملك فهد، الرياض',
                'phone' => '+966-11-299-9999',
                'google_maps_link' => 'https://goo.gl/maps/nahdi',
                'online_order_link' => 'https://nahdi.sa/order',
                'image' => '/images/pharmacies/nahdi.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'صيدلية الدواء',
                'address' => 'شارع التحلية، جدة',
                'phone' => '+966-12-200-0200',
                'google_maps_link' => 'https://goo.gl/maps/aldawaa',
                'online_order_link' => 'https://aldawaa.com/order',
                'image' => '/images/pharmacies/aldawaa.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($pharmacies as $pharmacy) {
            DB::table('pharmacies')->updateOrInsert(
                ['name' => $pharmacy['name']],
                $pharmacy
            );
        }
        
        // إنشاء نصائح صحية
        $healthTips = [
            [
                'title' => 'نصائح للحفاظ على صحة القلب',
                'description' => 'نصائح مهمة للحفاظ على صحة القلب والأوعية الدموية',
                'type' => 'generic',
                'content_type' => 'text',
                'content' => 'تناول الأطعمة الصحية وممارسة الرياضة بانتظام لمدة 30 دقيقة يومياً. تجنب التدخين والإفراط في تناول الملح والسكر.',
                'image' => '/images/health/heart-health.jpg',
                'is_active' => 1,
                'views_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'فوائد شرب الماء للجسم',
                'description' => 'أهمية الماء في الحفاظ على صحة الجسم',
                'type' => 'generic',
                'content_type' => 'text',
                'content' => 'شرب 8 أكواب من الماء يومياً يساعد في الحفاظ على صحة الجسم، ترطيب البشرة، وتحسين وظائف الكلى.',
                'image' => '/images/health/water-benefits.jpg',
                'is_active' => 1,
                'views_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($healthTips as $tip) {
            DB::table('health_tips')->updateOrInsert(
                ['title' => $tip['title']],
                $tip
            );
        }
    }

    private function createFashionData()
    {
        $this->command->info('إنشاء بيانات عالم الموضة...');
        
        // إنشاء فئات صيحات الموضة
        $fashionCategories = [
            [
                'name' => 'الألوان',
                'description' => 'أحدث ألوان الموضة والتنسيق',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'الشعر',
                'description' => 'قصات وتسريحات الشعر العصرية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'الإكسسوارات',
                'description' => 'أحدث الإكسسوارات والمجوهرات',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $categoryIds = [];
        foreach ($fashionCategories as $category) {
            $id = DB::table('fashion_trend_categories')->updateOrInsert(
                ['name' => $category['name']],
                $category
            );
            $categoryIds[$category['name']] = DB::table('fashion_trend_categories')->where('name', $category['name'])->first()->id;
        }
        
        // إنشاء صيحات الموضة
        $fashionTrends = [
            [
                'title' => 'ألوان الربيع 2024',
                'content' => 'أحدث ألوان الموضة لربيع 2024: الأخضر الزمردي، الوردي الفوشيا، والأزرق السماوي',
                'category_id' => $categoryIds['الألوان'],
                'image' => '/images/spring-colors.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'قصات الشعر العصرية',
                'content' => 'أحدث قصات الشعر للنساء: البوب القصير، الطبقات الطويلة، والغرة الجانبية',
                'category_id' => $categoryIds['الشعر'],
                'image' => '/images/hair-styles.jpg',
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
            ]
        ];

        foreach ($beautyShops as $shop) {
            DB::table('beauty_shops')->updateOrInsert(
                ['brand_name' => $shop['brand_name']],
                $shop
            );
        }
    }

    private function createAccessoriesData()  
    {
        $this->command->info('إنشاء بيانات الأكسسوارات...');
        
        // إنشاء متاجر الأكسسوارات
        $accessoratyShops = [
            [
                'brand_name' => 'عالم الإكسسوارات الذهبي',
                'location' => 'شارع التحلية، الرياض',
                'shop_url' => 'https://golden-accessories.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'بوتيك الإكسسوارات العصري',
                'location' => 'شارع الأمير سلطان، جدة',
                'shop_url' => 'https://modern-accessories.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($accessoratyShops as $shop) {
            DB::table('accessoraty_shops')->updateOrInsert(
                ['brand_name' => $shop['brand_name']],
                $shop
            );
        }
    }

    private function createFamilyData()
    {
        $this->command->info('إنشاء بيانات العائلة والأطفال...');
        
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
                'is_featured' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'أنشطة عائلية ممتعة في المنزل',
                'type' => 'مدرب حياة',
                'content' => 'أفكار لأنشطة عائلية تقرب أفراد العائلة من بعضهم: الطبخ معاً، الألعاب التفاعلية، القراءة',
                'expert_name' => 'أ. محمد علي',
                'expert_credentials' => 'مدرب معتمد في التنمية الأسرية',
                'contact_info' => 'mohamed.ali@family.com',
                'category' => 'إرشاد أسري',
                'target_audience' => 'الجميع',
                'duration_minutes' => 25,
                'rating' => 4.6,
                'is_featured' => 0,
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
    }

    private function createKitchenData()
    {
        $this->command->info('إنشاء بيانات المطبخ...');
        
        // إنشاء أماكن الطعام المنزلي
        $homeMadeFoods = [
            [
                'name' => 'مطبخ أم محمد التراثي',
                'location' => 'حي النرجس، الرياض',
                'phone' => '+966-50-123-4567',
                'description' => 'مطبخ منزلي متخصص في الأكلات السعودية التقليدية مثل الكبسة والمندي',
                'specialty' => 'المأكولات السعودية التراثية',
                'map_url' => 'https://goo.gl/maps/traditional-kitchen',
                'image' => '/images/kitchens/traditional.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مطبخ الست فاطمة',
                'location' => 'حي الملقا، الرياض',
                'phone' => '+966-50-234-5678',
                'description' => 'مطبخ منزلي متخصص في الحلويات العربية والمعجنات',
                'specialty' => 'الحلويات والمعجنات',
                'map_url' => 'https://goo.gl/maps/fatma-kitchen',
                'image' => '/images/kitchens/sweets.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($homeMadeFoods as $food) {
            DB::table('home_made_foods')->updateOrInsert(
                ['name' => $food['name']],
                $food
            );
        }
    }
}
