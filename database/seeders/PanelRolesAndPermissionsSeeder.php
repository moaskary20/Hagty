<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PanelRolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // التصريحات
        $permissions = [
            // فيديوهات ترويجية
            'view_promo_videos', 'manage_promo_videos',
            // رحلتي
            'view_rehlaaty', 'manage_rehlaaty',
            // المستخدمين
            'view_users', 'manage_users',
            // لوحة التحكم
            'view_dashboard', 'manage_dashboard',
            // الإعدادات
            'view_settings', 'manage_settings',
            // الفنادق
            'view_hotels', 'manage_hotels',
            // البازارات
            'view_bazaars', 'manage_bazaars',
            // عروض السفر
            'view_travel_offers', 'manage_travel_offers',
            // مكاتب السياحة
            'view_tourism_offices', 'manage_tourism_offices',
            // خدمات الطعام
            'view_catering_services', 'manage_catering_services',
            // مصممو فساتين الزفاف
            'view_wedding_dress_designers', 'manage_wedding_dress_designers',
            // مشغلو الدي جي
            'view_dj_performers', 'manage_dj_performers',
            // ديكورات الزهور
            'view_flower_decorators', 'manage_flower_decorators',
            // نصائح عائلية
            'view_family_advice', 'manage_family_advice',
            // صيحات الموضة
            'view_fashion_trends', 'manage_fashion_trends',
            // عيادات SPA
            'view_spa_clinics', 'manage_spa_clinics',
            // أطباء جراحة التجميل
            'view_plastic_surgeons', 'manage_plastic_surgeons',
            // أطباء العناية بالبشرة
            'view_skin_care_doctors', 'manage_skin_care_doctors',
            // أطباء التغذية
            'view_nutrition_doctors', 'manage_nutrition_doctors',
            // مصففو الشعر
            'view_hair_stylists', 'manage_hair_stylists',
            // مشرف عام
            'full_access',
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // الأدوار وربط التصريحات
        $roles = [
            'مدير النظام' => $permissions,
            'مشرف رحلتي' => ['view_rehlaaty', 'manage_rehlaaty'],
            'مشرف فيديوهات' => ['view_promo_videos', 'manage_promo_videos'],
            'مشرف مستخدمين' => ['view_users', 'manage_users'],
        ];
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}
