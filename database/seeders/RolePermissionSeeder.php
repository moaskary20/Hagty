<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // إنشاء صلاحيات أساسية
        $permissions = [
            'manage_users',
            'manage_babies',
            'view_admin_dashboard',
            'edit_content',
            'delete_content',
        ];
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // إنشاء أدوار وربطها بالصلاحيات
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo($permissions);

        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->givePermissionTo(['edit_content', 'view_admin_dashboard']);

        $viewer = Role::firstOrCreate(['name' => 'viewer']);
        $viewer->givePermissionTo(['view_admin_dashboard']);
    }
}
