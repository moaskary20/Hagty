<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HospitalDonation;

class HospitalDonationSeeder extends Seeder
{
    public function run(): void
    {
        $donations = [
            [
                'hospital_name' => 'مستشفى 57357',
                'description' => 'مستشفى متخصص في علاج أورام الأطفال يحتاج لدعم مستمر لعلاج الأطفال المصابين بالسرطان',
                'donation_link' => 'https://www.57357.org/donate',
                'donation_account_number' => '123456789',
                'donation_phone' => '19357',
                'bank_name' => 'البنك الأهلي المصري',
                'donation_methods' => 'فودافون كاش، اتصالات كاش، حوالة بنكية، بطاقة ائتمان',
                'status' => 'active',
                'target_amount' => 5000000.00,
                'collected_amount' => 3200000.00,
                'campaign_end_date' => '2025-12-31',
            ],
            [
                'hospital_name' => 'مستشفى مجدي يعقوب للقلب',
                'description' => 'مستشفى متخصص في جراحات القلب والأوعية الدموية يقدم خدمات مجانية للمرضى غير القادرين',
                'donation_link' => 'https://www.myf-egypt.org/donate',
                'donation_account_number' => '987654321',
                'donation_phone' => '16000',
                'bank_name' => 'بنك مصر',
                'donation_methods' => 'فودافون كاش، اورانج كاش، حوالة بنكية، تحويل بنكي',
                'status' => 'active',
                'target_amount' => 10000000.00,
                'collected_amount' => 7500000.00,
                'campaign_end_date' => '2025-10-31',
            ],
            [
                'hospital_name' => 'مستشفى بهية لعلاج سرطان الثدي',
                'description' => 'مستشفى متخصص في الكشف المبكر وعلاج سرطان الثدي للسيدات مجاناً',
                'donation_link' => 'https://www.baheyahospital.com/donate',
                'donation_account_number' => '456789123',
                'donation_phone' => '16048',
                'bank_name' => 'بنك القاهرة',
                'donation_methods' => 'فودافون كاش، اتصالات كاش، we pay، حوالة بنكية',
                'status' => 'active',
                'target_amount' => 3000000.00,
                'collected_amount' => 2100000.00,
                'campaign_end_date' => '2025-11-30',
            ],
            [
                'hospital_name' => 'مستشفى أبو الريش للأطفال',
                'description' => 'مستشفى حكومي متخصص في علاج الأطفال يحتاج لدعم في تطوير الخدمات والمعدات',
                'donation_link' => 'https://donate.gov.eg/abuelrish',
                'donation_account_number' => '789123456',
                'donation_phone' => '16900',
                'bank_name' => 'البنك الأهلي المصري',
                'donation_methods' => 'فودافون كاش، اتصالات كاش، حوالة بنكية، paypal',
                'status' => 'active',
                'target_amount' => 2000000.00,
                'collected_amount' => 850000.00,
                'campaign_end_date' => '2025-09-30',
            ],
            [
                'hospital_name' => 'مستشفى الناس للكلى',
                'description' => 'مستشفى متخصص في علاج أمراض الكلى وزراعة الكلى يقدم خدمات للمرضى غير القادرين',
                'donation_link' => 'https://www.elnasshospital.com/donate',
                'donation_account_number' => '321654987',
                'donation_phone' => '19990',
                'bank_name' => 'بنك الإسكندرية',
                'donation_methods' => 'فودافون كاش، اورانج كاش، حوالة بنكية، ماستر كارد',
                'status' => 'active',
                'target_amount' => 1500000.00,
                'collected_amount' => 1200000.00,
                'campaign_end_date' => '2025-08-31',
            ],
            [
                'hospital_name' => 'مستشفى الطوارئ العام',
                'description' => 'مستشفى طوارئ عام يحتاج لدعم عاجل في شراء أجهزة إنعاش وأدوية طوارئ',
                'donation_link' => 'https://emergency.health.gov.eg/donate',
                'donation_account_number' => '654321987',
                'donation_phone' => '123',
                'bank_name' => 'بنك مصر',
                'donation_methods' => 'فودافون كاش، اتصالات كاش، we pay، حوالة بنكية',
                'status' => 'active',
                'target_amount' => 800000.00,
                'collected_amount' => 320000.00,
                'campaign_end_date' => '2025-07-31',
            ],
        ];

        foreach ($donations as $donation) {
            HospitalDonation::create($donation);
        }
    }
}
