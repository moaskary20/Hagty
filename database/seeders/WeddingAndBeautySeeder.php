<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WeddingAndBeautySeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('💒 بدء إضافة بيانات الزفاف والجمال...');
        
        $this->createWeddingData();
        $this->createBeautyData();
        
        $this->command->info('✅ تم إضافة جميع بيانات الزفاف والجمال بنجاح! 🎉');
    }

    private function createWeddingData()
    {
        $this->command->info('💒 إنشاء بيانات الزفاف...');

        // مصممي فساتين الزفاف
        $weddingDesigners = [
            [
                'name' => 'دار الأزياء الملكية',
                'brand_name' => 'Royal Bridal',
                'description' => 'تصميم فساتين زفاف فاخرة ومميزة بأحدث صيحات الموضة',
                'specialty' => 'فساتين كلاسيكية وعصرية',
                'experience_years' => 15,
                'address' => 'الرياض، شارع الملك فهد',
                'phone_numbers' => json_encode(['+966501234567', '+966501234568']),
                'whatsapp_number' => '+966501234567',
                'email' => 'info@royal-bridal.com',
                'website_url' => 'https://royal-bridal.com',
                'instagram_url' => 'https://instagram.com/royal-bridal',
                'facebook_url' => 'https://facebook.com/royal-bridal',
                'price_range_min' => 5000,
                'price_range_max' => 15000,
                'offers_rentals' => true,
                'offers_custom_design' => true,
                'offers_alterations' => true,
                'dress_styles' => json_encode(['كلاسيكية', 'عصرية', 'عربية']),
                'fabric_types' => json_encode(['حرير', 'ساتان', 'تول']),
                'is_featured' => true,
                'rating' => 4.8,
                'total_reviews' => 45,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'استوديو العروس',
                'brand_name' => 'Bride Studio',
                'description' => 'تصميم فساتين زفاف مخصصة تناسب كل عروس',
                'specialty' => 'فساتين مخصصة وبسيطة',
                'experience_years' => 12,
                'address' => 'جدة، شارع التحلية',
                'phone_numbers' => json_encode(['+966502345678', '+966502345679']),
                'whatsapp_number' => '+966502345678',
                'email' => 'info@bride-studio.com',
                'website_url' => 'https://bride-studio.com',
                'instagram_url' => 'https://instagram.com/bride-studio',
                'facebook_url' => 'https://facebook.com/bride-studio',
                'price_range_min' => 3000,
                'price_range_max' => 12000,
                'offers_rentals' => false,
                'offers_custom_design' => true,
                'offers_alterations' => true,
                'dress_styles' => json_encode(['مخصصة', 'بسيطة', 'فاخرة']),
                'fabric_types' => json_encode(['حرير', 'ساتان', 'كريب']),
                'is_featured' => true,
                'rating' => 4.6,
                'total_reviews' => 32,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'دار الأزياء الأنيقة',
                'brand_name' => 'Elegant Bridal',
                'description' => 'تصميم فساتين زفاف أنيقة وعصرية',
                'specialty' => 'فساتين عصرية وبوهيمية',
                'experience_years' => 10,
                'address' => 'الدمام، شارع الملك خالد',
                'phone_numbers' => json_encode(['+966503456789', '+966503456790']),
                'whatsapp_number' => '+966503456789',
                'email' => 'info@elegant-bridal.com',
                'website_url' => 'https://elegant-bridal.com',
                'instagram_url' => 'https://instagram.com/elegant-bridal',
                'facebook_url' => 'https://facebook.com/elegant-bridal',
                'price_range_min' => 4000,
                'price_range_max' => 10000,
                'offers_rentals' => true,
                'offers_custom_design' => false,
                'offers_alterations' => true,
                'dress_styles' => json_encode(['عصرية', 'بوهيمية', 'كلاسيكية']),
                'fabric_types' => json_encode(['حرير', 'ساتان', 'شيفون']),
                'is_featured' => false,
                'rating' => 4.4,
                'total_reviews' => 28,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($weddingDesigners as $designer) {
            DB::table('wedding_dress_designers')->updateOrInsert(
                ['name' => $designer['name']],
                $designer
            );
        }

        // منظمي الحفلات
        $weddingPlanners = [
            [
                'name' => 'منظم الحفلات المثالي',
                'brand' => 'Perfect Planner',
                'location' => 'الرياض',
                'google_maps_url' => 'https://maps.google.com/?q=الرياض',
                'phone' => '+966504567890',
                'profile_url' => 'https://perfect-planner.com',
                'package' => 'باقة كاملة: 5000-20000 ريال',
                'venue' => 'قاعات فاخرة',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'استوديو الحفلات',
                'brand' => 'Party Studio',
                'location' => 'جدة',
                'google_maps_url' => 'https://maps.google.com/?q=جدة',
                'phone' => '+966505678901',
                'profile_url' => 'https://party-studio.com',
                'package' => 'باقة جزئية: 3000-15000 ريال',
                'venue' => 'قاعات عصرية',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($weddingPlanners as $planner) {
            DB::table('wedding_planners')->updateOrInsert(
                ['name' => $planner['name']],
                $planner
            );
        }

        // فناني المكياج
        $makeupArtists = [
            [
                'name' => 'فنانة المكياج سارة',
                'portfolio_images' => json_encode(['/images/makeup/sara1.jpg', '/images/makeup/sara2.jpg']),
                'address' => 'الرياض، شارع الملك فهد',
                'google_maps_url' => 'https://maps.google.com/?q=الرياض',
                'phone' => '+966506789012',
                'profile_url' => 'https://sara-makeup.com',
                'description' => 'مكياج عرائس احترافي ومميز - خبرة 10 سنوات',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'استوديو الجمال',
                'portfolio_images' => json_encode(['/images/makeup/beauty1.jpg', '/images/makeup/beauty2.jpg']),
                'address' => 'جدة، شارع التحلية',
                'google_maps_url' => 'https://maps.google.com/?q=جدة',
                'phone' => '+966507890123',
                'profile_url' => 'https://beauty-studio.com',
                'description' => 'مكياج عرائس عصرية وأنيقة - خبرة 8 سنوات',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($makeupArtists as $artist) {
            DB::table('makeup_artists')->updateOrInsert(
                ['name' => $artist['name']],
                $artist
            );
        }

        // مصففي الشعر للزفاف
        $weddingHairStylists = [
            [
                'name' => 'مصففة الشعر نورة',
                'work_images' => json_encode(['/images/hair/noura1.jpg', '/images/hair/noura2.jpg']),
                'address' => 'الرياض، شارع الملك فهد',
                'google_maps_url' => 'https://maps.google.com/?q=الرياض',
                'phone' => '+966508901234',
                'profile_url' => 'https://noura-hair.com',
                'package' => 'باقة تصفيف عروس: 300-1500 ريال',
                'venue' => 'صالون خاص',
                'description' => 'تصفيف شعر عرائس احترافي - خبرة 12 سنة',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'صالون الشعر الملكي',
                'work_images' => json_encode(['/images/hair/royal1.jpg', '/images/hair/royal2.jpg']),
                'address' => 'جدة، شارع التحلية',
                'google_maps_url' => 'https://maps.google.com/?q=جدة',
                'phone' => '+966509012345',
                'profile_url' => 'https://royal-hair.com',
                'package' => 'باقة فاخرة: 500-2000 ريال',
                'venue' => 'صالون فاخر',
                'description' => 'تصفيف شعر عرائس فاخر ومميز - خبرة 15 سنة',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($weddingHairStylists as $stylist) {
            DB::table('wedding_hair_stylists')->updateOrInsert(
                ['name' => $stylist['name']],
                $stylist
            );
        }

        // قاعات الحفلات
        $weddingVenues = [
            [
                'name' => 'قصر الحفلات الملكي',
                'address' => 'الرياض، شارع الملك فهد',
                'stars' => 5,
                'phone_numbers' => json_encode(['+966501234567', '+966501234568']),
                'hall_images' => json_encode(['/images/venues/royal1.jpg', '/images/venues/royal2.jpg']),
                'outdoor_images' => json_encode(['/images/venues/royal-outdoor1.jpg']),
                'description' => 'قاعة حفلات فاخرة ومميزة بسعة 500 شخص',
                'google_maps_url' => 'https://maps.google.com/?q=الرياض',
                'website_url' => 'https://royal-palace.com',
                'price_range_min' => 150,
                'price_range_max' => 300,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'حديقة الحفلات',
                'address' => 'جدة، شارع التحلية',
                'stars' => 4,
                'phone_numbers' => json_encode(['+966502345678', '+966502345679']),
                'hall_images' => json_encode(['/images/venues/garden1.jpg', '/images/venues/garden2.jpg']),
                'outdoor_images' => json_encode(['/images/venues/garden-outdoor1.jpg', '/images/venues/garden-outdoor2.jpg']),
                'description' => 'قاعة حفلات في الهواء الطلق بسعة 300 شخص',
                'google_maps_url' => 'https://maps.google.com/?q=جدة',
                'website_url' => 'https://garden-events.com',
                'price_range_min' => 100,
                'price_range_max' => 200,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($weddingVenues as $venue) {
            DB::table('wedding_venues')->updateOrInsert(
                ['name' => $venue['name']],
                $venue
            );
        }

        // خدمات التموين
        $cateringServices = [
            [
                'company_name' => 'مطعم الحفلات الفاخر',
                'contact_person' => 'أحمد محمد',
                'address' => 'الرياض، شارع الملك فهد',
                'phone_numbers' => json_encode(['+966503456789', '+966503456790']),
                'email' => 'info@luxury-catering.com',
                'website_url' => 'https://luxury-catering.com',
                'facebook_url' => 'https://facebook.com/luxury-catering',
                'instagram_url' => 'https://instagram.com/luxury-catering',
                'service_images' => json_encode(['/images/catering/luxury1.jpg', '/images/catering/luxury2.jpg']),
                'description' => 'خدمات تموين فاخرة للحفلات - طعام عربي وأوروبي',
                'specialties' => json_encode(['طعام عربي', 'طعام أوروبي', 'حلويات شرقية']),
                'min_order_value' => 5000,
                'min_guests' => 50,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'company_name' => 'استوديو الطعام',
                'contact_person' => 'سارة أحمد',
                'address' => 'جدة، شارع التحلية',
                'phone_numbers' => json_encode(['+966504567890', '+966504567891']),
                'email' => 'info@food-studio.com',
                'website_url' => 'https://food-studio.com',
                'facebook_url' => 'https://facebook.com/food-studio',
                'instagram_url' => 'https://instagram.com/food-studio',
                'service_images' => json_encode(['/images/catering/food1.jpg', '/images/catering/food2.jpg']),
                'description' => 'خدمات تموين عصرية ومبتكرة - طعام عربي وشرقي',
                'specialties' => json_encode(['طعام عربي', 'طعام شرقي', 'حلويات عصرية']),
                'min_order_value' => 3000,
                'min_guests' => 30,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($cateringServices as $catering) {
            DB::table('catering_services')->updateOrInsert(
                ['company_name' => $catering['company_name']],
                $catering
            );
        }

        // ديكورات الزهور
        $flowerDecorators = [
            [
                'name' => 'استوديو الزهور',
                'specialty' => 'زهور وديكورات',
                'phone_numbers' => json_encode(['+966505678901', '+966505678902']),
                'email' => 'info@flower-studio.com',
                'address' => 'الرياض، شارع الملك فهد',
                'description' => 'ديكورات زهور احترافية للحفلات - خبرة 8 سنوات',
                'portfolio_images' => json_encode(['/images/flowers/studio1.jpg', '/images/flowers/studio2.jpg']),
                'website_url' => 'https://flower-studio.com',
                'instagram_url' => 'https://instagram.com/flower-studio',
                'facebook_url' => 'https://facebook.com/flower-studio',
                'starting_price' => 500,
                'services_offered' => json_encode(['باقات عرائس', 'ديكورات قاعات', 'تنسيق طاولات']),
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'حديقة الزهور',
                'specialty' => 'زهور طبيعية',
                'phone_numbers' => json_encode(['+966506789012', '+966506789013']),
                'email' => 'info@flower-garden.com',
                'address' => 'جدة، شارع التحلية',
                'description' => 'ديكورات زهور طبيعية وفاخرة - خبرة 10 سنوات',
                'portfolio_images' => json_encode(['/images/flowers/garden1.jpg', '/images/flowers/garden2.jpg']),
                'website_url' => 'https://flower-garden.com',
                'instagram_url' => 'https://instagram.com/flower-garden',
                'facebook_url' => 'https://facebook.com/flower-garden',
                'starting_price' => 800,
                'services_offered' => json_encode(['زهور طبيعية', 'ديكورات خارجية', 'باقات فاخرة']),
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($flowerDecorators as $decorator) {
            DB::table('flower_decorators')->updateOrInsert(
                ['name' => $decorator['name']],
                $decorator
            );
        }

        // موردي هدايا الزفاف
        $weddingGiftSuppliers = [
            [
                'name' => 'متجر هدايا الزفاف',
                'specialty' => 'هدايا تذكارية',
                'phone_numbers' => json_encode(['+966507890123', '+966507890124']),
                'email' => 'info@wedding-gifts.com',
                'address' => 'الرياض، شارع الملك فهد',
                'description' => 'هدايا زفاف مميزة وعصرية - أدوات منزلية وإكسسوارات',
                'craft_specialties' => json_encode(['حرف يدوية', 'تطريز', 'تنسيق']),
                'portfolio_images' => json_encode(['/images/gifts/shop1.jpg', '/images/gifts/shop2.jpg']),
                'product_categories' => json_encode(['أدوات منزلية', 'إكسسوارات', 'هدايا شخصية']),
                'website_url' => 'https://wedding-gifts.com',
                'instagram_url' => 'https://instagram.com/wedding-gifts',
                'facebook_url' => 'https://facebook.com/wedding-gifts',
                'whatsapp_number' => '+966507890123',
                'min_order_price' => 50,
                'delivery_days' => 3,
                'custom_orders' => true,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'استوديو الهدايا',
                'specialty' => 'هدايا مخصصة',
                'phone_numbers' => json_encode(['+966508901234', '+966508901235']),
                'email' => 'info@gift-studio.com',
                'address' => 'جدة، شارع التحلية',
                'description' => 'هدايا زفاف مخصصة وفاخرة - تصميم حسب الطلب',
                'craft_specialties' => json_encode(['تصميم مخصص', 'حرف يدوية', 'تطريز فاخر']),
                'portfolio_images' => json_encode(['/images/gifts/studio1.jpg', '/images/gifts/studio2.jpg']),
                'product_categories' => json_encode(['هدايا مخصصة', 'هدايا فاخرة', 'هدايا عصرية']),
                'website_url' => 'https://gift-studio.com',
                'instagram_url' => 'https://instagram.com/gift-studio',
                'facebook_url' => 'https://facebook.com/gift-studio',
                'whatsapp_number' => '+966508901234',
                'min_order_price' => 100,
                'delivery_days' => 7,
                'custom_orders' => true,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($weddingGiftSuppliers as $supplier) {
            DB::table('wedding_gift_suppliers')->updateOrInsert(
                ['name' => $supplier['name']],
                $supplier
            );
        }

        // المصورين
        $weddingPhotographers = [
            [
                'name' => 'استوديو التصوير الملكي',
                'specialty' => 'فوتوغرافي وفيديو',
                'description' => 'تصوير زفاف احترافي ومميز - خبرة 12 سنة',
                'phone_numbers' => json_encode(['+966509012345', '+966509012346']),
                'email' => 'info@royal-photography.com',
                'website_url' => 'https://royal-photography.com',
                'instagram_url' => 'https://instagram.com/royal-photography',
                'facebook_url' => 'https://facebook.com/royal-photography',
                'portfolio_images' => json_encode(['/images/photography/royal1.jpg', '/images/photography/royal2.jpg']),
                'portfolio_videos' => json_encode(['https://youtube.com/watch?v=royal1', 'https://youtube.com/watch?v=royal2']),
                'price_range_min' => 2000,
                'price_range_max' => 8000,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'فنان التصوير أحمد',
                'specialty' => 'فوتوغرافي',
                'description' => 'تصوير زفاف عصرية ومبتكرة - خبرة 8 سنوات',
                'phone_numbers' => json_encode(['+966501234567', '+966501234568']),
                'email' => 'ahmed@photography.com',
                'website_url' => 'https://ahmed-photography.com',
                'instagram_url' => 'https://instagram.com/ahmed-photography',
                'facebook_url' => 'https://facebook.com/ahmed-photography',
                'portfolio_images' => json_encode(['/images/photography/ahmed1.jpg', '/images/photography/ahmed2.jpg']),
                'portfolio_videos' => json_encode(['https://youtube.com/watch?v=ahmed1']),
                'price_range_min' => 1500,
                'price_range_max' => 6000,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($weddingPhotographers as $photographer) {
            DB::table('wedding_photographers')->updateOrInsert(
                ['name' => $photographer['name']],
                $photographer
            );
        }

        // عازفي الموسيقى
        $djPerformers = [
            [
                'name' => 'دي جي محمد',
                'specialty' => 'DJ',
                'phone_numbers' => json_encode(['+966501234567', '+966501234568']),
                'email' => 'mohamed@dj.com',
                'description' => 'عازف موسيقى احترافي للحفلات - خبرة 10 سنوات',
                'portfolio_images' => json_encode(['/images/dj/mohamed1.jpg', '/images/dj/mohamed2.jpg']),
                'portfolio_videos' => json_encode(['https://youtube.com/watch?v=mohamed1', 'https://youtube.com/watch?v=mohamed2']),
                'website_url' => 'https://mohamed-dj.com',
                'instagram_url' => 'https://instagram.com/mohamed-dj',
                'facebook_url' => 'https://facebook.com/mohamed-dj',
                'starting_price' => 500,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'فرقة الموسيقى الملكية',
                'specialty' => 'فرقة',
                'phone_numbers' => json_encode(['+966502345678', '+966502345679']),
                'email' => 'info@royal-band.com',
                'description' => 'فرقة موسيقية فاخرة للحفلات - خبرة 15 سنة',
                'portfolio_images' => json_encode(['/images/dj/royal1.jpg', '/images/dj/royal2.jpg']),
                'portfolio_videos' => json_encode(['https://youtube.com/watch?v=royal1', 'https://youtube.com/watch?v=royal2']),
                'website_url' => 'https://royal-band.com',
                'instagram_url' => 'https://instagram.com/royal-band',
                'facebook_url' => 'https://facebook.com/royal-band',
                'starting_price' => 1000,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($djPerformers as $performer) {
            DB::table('dj_performers')->updateOrInsert(
                ['name' => $performer['name']],
                $performer
            );
        }

        $this->command->info('✅ تم إنشاء بيانات الزفاف بنجاح');
    }

    private function createBeautyData()
    {
        $this->command->info('💄 إنشاء بيانات الجمال...');

        // جراحي التجميل
        $plasticSurgeons = [
            [
                'name' => 'د. أحمد محمد',
                'title' => 'استشاري جراحة تجميل',
                'specialty' => 'جراحة تجميل الوجه',
                'clinic_address' => 'الرياض، شارع الملك فهد',
                'google_maps_url' => 'https://maps.google.com/?q=الرياض',
                'phone' => '+966501234567',
                'profile_url' => 'https://dr-ahmed.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'د. سارة أحمد',
                'title' => 'استشارية جراحة تجميل',
                'specialty' => 'جراحة تجميل الجسم',
                'clinic_address' => 'جدة، شارع التحلية',
                'google_maps_url' => 'https://maps.google.com/?q=جدة',
                'phone' => '+966502345678',
                'profile_url' => 'https://dr-sara.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($plasticSurgeons as $surgeon) {
            DB::table('plastic_surgeons')->updateOrInsert(
                ['name' => $surgeon['name']],
                $surgeon
            );
        }

        // مصففي الشعر
        $hairStylists = [
            [
                'name' => 'صالون الشعر الأنيق',
                'works_images' => json_encode(['/images/hair/elegant1.jpg', '/images/hair/elegant2.jpg']),
                'location' => 'الرياض',
                'phone' => '+966503456789',
                'profile_url' => 'https://elegant-hair.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'استوديو الشعر الحديث',
                'works_images' => json_encode(['/images/hair/modern1.jpg', '/images/hair/modern2.jpg']),
                'location' => 'جدة',
                'phone' => '+966504567890',
                'profile_url' => 'https://modern-hair.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($hairStylists as $stylist) {
            DB::table('hair_stylists')->updateOrInsert(
                ['name' => $stylist['name']],
                $stylist
            );
        }

        // أطباء العناية بالبشرة
        $skinCareDoctors = [
            [
                'name' => 'د. فاطمة علي',
                'title' => 'استشارية جلدية',
                'specialty' => 'علاج حب الشباب',
                'clinic_address' => 'الرياض، شارع الملك فهد',
                'google_maps_url' => 'https://maps.google.com/?q=الرياض',
                'phone' => '+966505678901',
                'profile_url' => 'https://dr-fatima.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'د. نورا محمد',
                'title' => 'استشارية جلدية',
                'specialty' => 'تجديد البشرة',
                'clinic_address' => 'جدة، شارع التحلية',
                'google_maps_url' => 'https://maps.google.com/?q=جدة',
                'phone' => '+966506789012',
                'profile_url' => 'https://dr-nora.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($skinCareDoctors as $doctor) {
            DB::table('skin_care_doctors')->updateOrInsert(
                ['name' => $doctor['name']],
                $doctor
            );
        }

        // متخصصي الأظافر والرموش
        $nailLashSpecialists = [
            [
                'name' => 'صالون الأظافر الجميلة',
                'title' => 'متخصصة تجميل',
                'specialty' => 'تجميل الأظافر والرموش',
                'center_address' => 'الرياض، شارع الملك فهد',
                'google_maps_url' => 'https://maps.google.com/?q=الرياض',
                'phone' => '+966507890123',
                'profile_url' => 'https://beautiful-nails.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'استوديو الرموش',
                'title' => 'متخصصة تجميل',
                'specialty' => 'تجميل الرموش والأظافر',
                'center_address' => 'جدة، شارع التحلية',
                'google_maps_url' => 'https://maps.google.com/?q=جدة',
                'phone' => '+966508901234',
                'profile_url' => 'https://lash-studio.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($nailLashSpecialists as $specialist) {
            DB::table('nail_lash_specialists')->updateOrInsert(
                ['name' => $specialist['name']],
                $specialist
            );
        }

        // أطباء التغذية
        $nutritionDoctors = [
            [
                'name' => 'د. خالد عبدالله',
                'title' => 'استشاري تغذية',
                'specialty' => 'إنقاص الوزن',
                'clinic_address' => 'الرياض، شارع الملك فهد',
                'google_maps_url' => 'https://maps.google.com/?q=الرياض',
                'phone' => '+966509012345',
                'profile_url' => 'https://dr-khalid.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'د. ليلى أحمد',
                'title' => 'استشارية تغذية',
                'specialty' => 'التغذية الرياضية',
                'clinic_address' => 'جدة، شارع التحلية',
                'google_maps_url' => 'https://maps.google.com/?q=جدة',
                'phone' => '+966501234567',
                'profile_url' => 'https://dr-layla.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($nutritionDoctors as $doctor) {
            DB::table('nutrition_doctors')->updateOrInsert(
                ['name' => $doctor['name']],
                $doctor
            );
        }

        // عيادات السبا
        $spaClinics = [
            [
                'name' => 'سبا الفخامة',
                'specialty' => 'عناية بالجسم',
                'center_address' => 'الرياض، شارع الملك فهد',
                'google_maps_url' => 'https://maps.google.com/?q=الرياض',
                'phone' => '+966502345678',
                'profile_url' => 'https://luxury-spa.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'مركز الاسترخاء',
                'specialty' => 'استرخاء وعلاج طبيعي',
                'center_address' => 'جدة، شارع التحلية',
                'google_maps_url' => 'https://maps.google.com/?q=جدة',
                'phone' => '+966503456789',
                'profile_url' => 'https://relaxation-center.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($spaClinics as $spa) {
            DB::table('spa_clinics')->updateOrInsert(
                ['name' => $spa['name']],
                $spa
            );
        }

        // فيديوهات التدريب
        $trainingVideos = [
            [
                'عنوان_الفيديو' => 'كيفية تطبيق المكياج اليومي',
                'وصف_الفيديو' => 'فيديو تعليمي لتطبيق المكياج اليومي بسهولة - مع فنانة المكياج سارة',
                'رابط_الفيديو' => 'https://youtube.com/watch?v=makeup-daily',
                'صورة_الغلاف' => '/images/videos/makeup-daily.jpg',
                'التصنيف' => 'مكياج',
                'النوع' => 'مجاني',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'عنوان_الفيديو' => 'تسريحات الشعر السهلة',
                'وصف_الفيديو' => 'فيديو تعليمي لتسريحات الشعر البسيطة والأنيقة - مع مصففة الشعر نورة',
                'رابط_الفيديو' => 'https://youtube.com/watch?v=hair-styles',
                'صورة_الغلاف' => '/images/videos/hair-styles.jpg',
                'التصنيف' => 'تصفيف شعر',
                'النوع' => 'مجاني',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'عنوان_الفيديو' => 'العناية بالبشرة في المنزل',
                'وصف_الفيديو' => 'فيديو تعليمي للعناية بالبشرة باستخدام مواد طبيعية - مع د. فاطمة علي',
                'رابط_الفيديو' => 'https://youtube.com/watch?v=skincare-home',
                'صورة_الغلاف' => '/images/videos/skincare-home.jpg',
                'التصنيف' => 'عناية بالبشرة',
                'النوع' => 'مجاني',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($trainingVideos as $video) {
            DB::table('training_videos')->updateOrInsert(
                ['عنوان_الفيديو' => $video['عنوان_الفيديو']],
                $video
            );
        }

        $this->command->info('✅ تم إنشاء بيانات الجمال بنجاح');
    }
}
