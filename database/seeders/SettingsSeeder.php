<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إعدادات العلامة التجارية
        Setting::updateOrCreate(
            ['key' => 'site_name'],
            [
                'value' => 'منصة HAGTY',
                'type' => 'text',
                'group' => 'branding'
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'site_logo'],
            [
                'value' => 'images/hagty-logo.png',
                'type' => 'image',
                'group' => 'branding'
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'primary_color'],
            [
                'value' => '#eb6fab',
                'type' => 'color',
                'group' => 'branding'
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'site_description'],
            [
                'value' => 'منصة HAGTY للإدارة والتحكم',
                'type' => 'textarea',
                'group' => 'branding'
            ]
        );

        // إعدادات عامة
        Setting::updateOrCreate(
            ['key' => 'items_per_page'],
            [
                'value' => '10',
                'type' => 'number',
                'group' => 'general'
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'enable_notifications'],
            [
                'value' => '1',
                'type' => 'boolean',
                'group' => 'general'
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'maintenance_mode'],
            [
                'value' => '0',
                'type' => 'boolean',
                'group' => 'general'
            ]
        );
    }
}
