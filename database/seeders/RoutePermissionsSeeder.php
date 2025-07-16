<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class RoutePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = Route::getRoutes();
        $names = [];
        foreach ($routes as $route) {
            $name = $route->getName();
            if ($name && !in_array($name, $names)) {
                $names[] = $name;
            }
        }
        foreach ($names as $name) {
            Permission::firstOrCreate([
                'name' => $name,
                'guard_name' => 'web',
            ]);
        }
    }
}
