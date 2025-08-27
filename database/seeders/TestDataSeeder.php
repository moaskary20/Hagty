<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Pharmacy;
use App\Models\HealthTip;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إضافة بيانات الأطباء
        Doctor::create([
            'first_name' => 'أحمد',
            'last_name' => 'محمد',
            'specialty' => 'طبيب قلب',
            'phone' => json_encode(['01234567890', '01098765432']),
            'clinic_address' => 'شارع الجمهورية، القاهرة',
            'google_maps_url' => 'https://maps.google.com/dr-ahmed-mohamed',
            'booking_url' => 'https://booking.dr-ahmed.com',
        ]);

        Doctor::create([
            'first_name' => 'فاطمة',
            'last_name' => 'علي',
            'specialty' => 'طبيب أطفال',
            'phone' => json_encode(['01111111111', '01222222222']),
            'clinic_address' => 'شارع النيل، الجيزة',
            'google_maps_url' => 'https://maps.google.com/dr-fatma-ali',
            'booking_url' => 'https://booking.dr-fatma.com',
        ]);

        Doctor::create([
            'first_name' => 'محمد',
            'last_name' => 'حسن',
            'specialty' => 'طبيب عظام',
            'phone' => json_encode(['01333333333']),
            'clinic_address' => 'شارع الهرم، الجيزة',
            'google_maps_url' => 'https://maps.google.com/dr-mohamed-hassan',
            'booking_url' => 'https://booking.dr-mohamed.com',
        ]);

        Doctor::create([
            'first_name' => 'سارة',
            'last_name' => 'أحمد',
            'specialty' => 'طبيب نساء وتوليد',
            'phone' => json_encode(['01444444444', '01555555555']),
            'clinic_address' => 'شارع المعادي، القاهرة',
            'google_maps_url' => 'https://maps.google.com/dr-sara-ahmed',
            'booking_url' => 'https://booking.dr-sara.com',
        ]);

        Doctor::create([
            'first_name' => 'علي',
            'last_name' => 'محمود',
            'specialty' => 'طبيب عيون',
            'phone' => json_encode(['01666666666']),
            'clinic_address' => 'شارع الدقي، الجيزة',
            'google_maps_url' => 'https://maps.google.com/dr-ali-mahmoud',
            'booking_url' => 'https://booking.dr-ali.com',
        ]);

        // إضافة بيانات المستشفيات
        Hospital::create([
            'name' => 'مستشفى القاهرة التخصصي',
            'specialty' => 'مستشفى عام',
            'address' => 'شارع الجمهورية، وسط البلد، القاهرة',
            'emergency_numbers' => json_encode([
                ['number' => '123', 'description' => 'طوارئ عام'],
                ['number' => '124', 'description' => 'طوارئ قلب'],
                ['number' => '125', 'description' => 'طوارئ أطفال']
            ]),
            'phone' => '0223456789',
            'google_maps_link' => 'https://maps.google.com/cairo-hospital',
            'booking_link' => 'https://booking.cairo-hospital.com',
        ]);

        Hospital::create([
            'name' => 'مستشفى الجيزة الجامعي',
            'specialty' => 'مستشفى جامعي',
            'address' => 'شارع الجامعة، الجيزة',
            'emergency_numbers' => json_encode([
                ['number' => '126', 'description' => 'طوارئ عام'],
                ['number' => '127', 'description' => 'طوارئ جراحة']
            ]),
            'phone' => '0233456789',
            'google_maps_link' => 'https://maps.google.com/giza-hospital',
            'booking_link' => 'https://booking.giza-hospital.com',
        ]);

        Hospital::create([
            'name' => 'مستشفى الأطفال المتخصص',
            'specialty' => 'مستشفى أطفال',
            'address' => 'شارع الطفولة، مصر الجديدة، القاهرة',
            'emergency_numbers' => json_encode([
                ['number' => '128', 'description' => 'طوارئ أطفال'],
                ['number' => '129', 'description' => 'طوارئ حديثي الولادة']
            ]),
            'phone' => '0224456789',
            'google_maps_link' => 'https://maps.google.com/children-hospital',
            'booking_link' => 'https://booking.children-hospital.com',
        ]);

        // إضافة بيانات الصيدليات
        Pharmacy::create([
            'name' => 'صيدلية الشفاء',
            'address' => 'شارع الجمهورية، القاهرة',
            'phone' => '0225556789',
            'google_maps_link' => 'https://maps.google.com/shifa-pharmacy',
            'online_order_link' => 'https://order.shifa-pharmacy.com',
        ]);

        Pharmacy::create([
            'name' => 'صيدلية النهار',
            'address' => 'شارع الهرم، الجيزة',
            'phone' => '0235556789',
            'google_maps_link' => 'https://maps.google.com/nahar-pharmacy',
            'online_order_link' => 'https://order.nahar-pharmacy.com',
        ]);

        Pharmacy::create([
            'name' => 'صيدلية الليل',
            'address' => 'شارع المعادي، القاهرة',
            'phone' => '0245556789',
            'google_maps_link' => 'https://maps.google.com/leil-pharmacy',
            'online_order_link' => 'https://order.leil-pharmacy.com',
        ]);

        Pharmacy::create([
            'name' => 'صيدلية الدواء',
            'address' => 'شارع الدقي، الجيزة',
            'phone' => '0255556789',
            'google_maps_link' => 'https://maps.google.com/dawa-pharmacy',
            'online_order_link' => 'https://order.dawa-pharmacy.com',
        ]);

        // إضافة نصائح صحية
        HealthTip::create([
            'title' => 'أهمية شرب الماء',
            'type' => 'generic',
            'content_type' => 'text',
            'content' => 'يجب شرب 8 أكواب من الماء يومياً للحفاظ على الصحة العامة. الماء يساعد على:
- ترطيب الجسم
- تحسين الهضم
- طرد السموم
- تحسين وظائف الكلى
- المحافظة على نضارة البشرة',
            'doctor_id' => null,
        ]);

        HealthTip::create([
            'title' => 'تمارين القلب المفيدة',
            'type' => 'doctor_sponsored',
            'content_type' => 'text',
            'content' => 'ممارسة التمارين الرياضية بانتظام تقوي القلب وتحسن الدورة الدموية. ينصح بممارسة:
- المشي السريع لمدة 30 دقيقة يومياً
- الجري الخفيف
- السباحة
- ركوب الدراجة
- صعود الدرج',
            'doctor_id' => 1,
        ]);

        HealthTip::create([
            'title' => 'التغذية السليمة للأطفال',
            'type' => 'doctor_sponsored',
            'content_type' => 'text',
            'content' => 'الأطفال يحتاجون لتغذية متوازنة تحتوي على:
- البروتينات (اللحوم، الأسماك، البيض)
- الكربوهيدرات (الأرز، الخبز، البطاطس)
- الفيتامينات والمعادن (الفواكه والخضروات)
- الكالسيوم (الحليب ومنتجات الألبان)
- الدهون الصحية (المكسرات، الأفوكادو)',
            'doctor_id' => 2,
        ]);

        HealthTip::create([
            'title' => 'نصائح للعناية بالعيون',
            'type' => 'doctor_sponsored',
            'content_type' => 'text',
            'content' => 'للحفاظ على صحة العيون:
- فحص العيون دورياً
- تجنب إجهاد العيون أمام الشاشات
- استخدام النظارات الشمسية
- تناول الأطعمة الغنية بفيتامين A
- عدم فرك العيون بقوة',
            'doctor_id' => 5,
        ]);

        HealthTip::create([
            'title' => 'فيديو عن الإسعافات الأولية',
            'type' => 'generic',
            'content_type' => 'video',
            'content' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'doctor_id' => null,
        ]);

        HealthTip::create([
            'title' => 'أهمية النوم الصحي',
            'type' => 'generic',
            'content_type' => 'text',
            'content' => 'النوم الصحي ضروري للصحة العامة:
- النوم 7-9 ساعات يومياً
- تجنب الكافيين قبل النوم
- إطفاء الأجهزة الإلكترونية قبل النوم
- الحفاظ على جو هادئ ومظلم
- تجنب الوجبات الثقيلة قبل النوم',
            'doctor_id' => null,
        ]);

        HealthTip::create([
            'title' => 'نصائح للحامل',
            'type' => 'doctor_sponsored',
            'content_type' => 'text',
            'content' => 'نصائح مهمة للحامل:
- المتابعة الدورية مع الطبيب
- تناول الفيتامينات المخصصة للحامل
- تجنب التدخين والكحول
- ممارسة التمارين الخفيفة
- الحصول على راحة كافية
- تناول الأطعمة الصحية والمتوازنة',
            'doctor_id' => 4,
        ]);

        HealthTip::create([
            'title' => 'فيديو عن تمارين الظهر',
            'type' => 'doctor_sponsored',
            'content_type' => 'video',
            'content' => 'https://www.youtube.com/watch?v=example-back-exercises',
            'doctor_id' => 3,
        ]);

        echo "تم إنشاء البيانات التجريبية بنجاح!\n";
        echo "الأطباء: 5 أطباء\n";
        echo "المستشفيات: 3 مستشفيات\n";
        echo "الصيدليات: 4 صيدليات\n";
        echo "النصائح الصحية: 8 نصائح\n";
    }
}
