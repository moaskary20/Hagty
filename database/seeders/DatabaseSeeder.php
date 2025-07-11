<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // حذف المستخدم إذا كان موجودًا مسبقًا لتجنب تكرار البريد
        \App\Models\User::where('email', 'test@example.com')->delete();
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        // تشغيل seeders الموارد الصحية
        $this->call([
            // \Database\Seeders\DoctorSeeder::class,
            HospitalSeeder::class,
            PharmacySeeder::class,
            HealthTipSeeder::class,
            GovInitiativeSeeder::class,
            HospitalDonationSeeder::class,
            PandemicAlertSeeder::class,
            FashionWorldSeeder::class, // إضافة Seeder عالم الموضة
            SponsorVideoSeeder::class, // إضافة Seeder فيديو الراعي
            \Database\Seeders\FashionTrendSeeder::class, // إضافة Seeder صيحات الموضة
            ForasyCourseSeeder::class,
        ]);
    }
}
