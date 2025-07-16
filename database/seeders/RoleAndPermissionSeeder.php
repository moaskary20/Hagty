<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $admin = Role::create(['name' => 'admin']);
        $manager1 = Role::create(['name' => 'manager1']);
        $manager2 = Role::create(['name' => 'manager2']);
        $manager3 = Role::create(['name' => 'manager3']);
        $manager4 = Role::create(['name' => 'manager4']);

        // Create permissions with Arabic names for sections
        $permissions = [
            'عرض صفحة أطباء التغذية',
            'عرض صفحة عيادات السبا',
            'عرض صفحة فيديوهات التدريب',
            'عرض صفحة أخصائيي الأظافر والرموش',
            'عرض صفحة أطباء الجلدية',
            // أضف باقي الصفحات هنا بالعربي
        ];
        foreach ($permissions as $perm) {
            Permission::create(['name' => $perm]);
        }

        // Give all permissions to admin
        $admin->givePermissionTo(Permission::all());

        // Example: manager1 sees nutrition and spa only
        $manager1->givePermissionTo(['عرض صفحة أطباء التغذية', 'عرض صفحة عيادات السبا']);
        // Example: manager2 sees training only
        $manager2->givePermissionTo(['عرض صفحة فيديوهات التدريب']);
        // Example: manager3 sees nail and skin only
        $manager3->givePermissionTo(['عرض صفحة أخصائيي الأظافر والرموش', 'عرض صفحة أطباء الجلدية']);
        // Example: manager4 sees spa and training only
        $manager4->givePermissionTo(['عرض صفحة عيادات السبا', 'عرض صفحة فيديوهات التدريب']);
    }
}
