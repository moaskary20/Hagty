<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FamilyActivitiesAndHealthRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🏠 إضافة الأنشطة العائلية والسجلات الصحية...');

        $this->createFamilyActivities();
        $this->createFamilyHealthRecords();

        $this->command->info('✅ تم إضافة البيانات بنجاح! 🎉');
    }

    private function createFamilyActivities()
    {
        $this->command->info('🎯 إضافة الأنشطة العائلية...');

        $activities = [
            [
                'name' => 'رحلة عائلية إلى حديقة الحيوانات',
                'description' => 'رحلة ممتعة إلى حديقة الحيوانات مع الأطفال للتعرف على الحيوانات المختلفة والاستمتاع بالطبيعة.',
                'location' => 'حديقة الحيوانات بالجيزة',
                'date' => now()->addDays(7)->format('Y-m-d'),
                'time' => '10:00',
                'duration' => '4 ساعات',
                'cost' => '150 ج.م للفرد',
                'category' => 'ترفيه',
                'age_group' => 'جميع الأعمار',
                'max_participants' => 20,
                'requirements' => 'ملابس مريحة، كاميرا، مياه',
                'contact_info' => '01234567890',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ورشة طبخ عائلية',
                'description' => 'ورشة طبخ تفاعلية للأطفال والعائلة لتعلم إعداد وجبات صحية ولذيذة.',
                'location' => 'مركز الطهي العائلي',
                'date' => now()->addDays(14)->format('Y-m-d'),
                'time' => '14:00',
                'duration' => '3 ساعات',
                'cost' => '200 ج.م للعائلة',
                'category' => 'تعليمي',
                'age_group' => '5-15 سنة',
                'max_participants' => 15,
                'requirements' => 'مئزر، شعر مربوط',
                'contact_info' => '01234567891',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'نزهة في الحديقة العامة',
                'description' => 'نزهة عائلية في الحديقة العامة مع أنشطة رياضية وألعاب للأطفال.',
                'location' => 'الحديقة الدولية',
                'date' => now()->addDays(3)->format('Y-m-d'),
                'time' => '09:00',
                'duration' => '6 ساعات',
                'cost' => '50 ج.م للفرد',
                'category' => 'رياضي',
                'age_group' => 'جميع الأعمار',
                'max_participants' => 30,
                'requirements' => 'ملابس رياضية، طعام خفيف، مياه',
                'contact_info' => '01234567892',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($activities as $activity) {
            DB::table('family_activities')->insert($activity);
        }
    }

    private function createFamilyHealthRecords()
    {
        $this->command->info('🏥 إضافة السجلات الصحية العائلية...');

        $healthRecords = [
            [
                'member_name' => 'أحمد محمد',
                'relationship' => 'الأب',
                'birth_date' => '1985-06-15',
                'blood_type' => 'O+',
                'chronic_diseases' => 'لا توجد',
                'allergies' => 'لا توجد',
                'current_medications' => 'فيتامين د',
                'family_doctor' => 'د. محمود أحمد',
                'doctor_phone' => '01234567893',
                'emergency_notes' => 'يحتاج متابعة دورية لضغط الدم - الطوارئ: فاطمة محمد 01234567894',
                'height' => 175.5,
                'weight' => 80.0,
                'insurance_company' => 'شركة التأمين الصحي الشاملة',
                'insurance_number' => '123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_name' => 'فاطمة أحمد',
                'relationship' => 'الأم',
                'birth_date' => '1988-03-22',
                'blood_type' => 'A+',
                'chronic_diseases' => 'سكري النوع الثاني',
                'allergies' => 'حساسية من الأسبرين',
                'current_medications' => 'ميتفورمين 500 مج يومياً',
                'family_doctor' => 'د. سارة محمود',
                'doctor_phone' => '01234567895',
                'emergency_notes' => 'متابعة مستوى السكر في الدم يومياً - الطوارئ: أحمد محمد 01234567896',
                'height' => 162.0,
                'weight' => 65.0,
                'insurance_company' => 'شركة التأمين الصحي ABC',
                'insurance_number' => '789012345',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_name' => 'مريم أحمد',
                'relationship' => 'الابنة',
                'birth_date' => '2015-11-08',
                'blood_type' => 'O+',
                'chronic_diseases' => 'لا توجد',
                'allergies' => 'حساسية من المكسرات',
                'current_medications' => 'فيتامينات الأطفال يومياً',
                'family_doctor' => 'د. علي حسن',
                'doctor_phone' => '01234567897',
                'emergency_notes' => 'تحتاج تطعيمات دورية، تجنب المكسرات تماماً - الطوارئ: فاطمة أحمد 01234567898',
                'height' => 120.0,
                'weight' => 22.0,
                'insurance_company' => 'شركة التأمين الصحي العائلي',
                'insurance_number' => '345678901',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($healthRecords as $record) {
            DB::table('family_health_records')->insert($record);
        }
    }
}