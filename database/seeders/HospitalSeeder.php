<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hospitals = [
            [
                'name' => 'مستشفى الملك فهد الجامعي',
                'specialty' => 'عام ومتخصص',
                'address' => 'شارع الملك فهد، الرياض، المملكة العربية السعودية',
                'emergency_numbers' => [
                    ['number' => '920001234', 'description' => 'طوارئ عام'],
                    ['number' => '920001235', 'description' => 'طوارئ قلب'],
                    ['number' => '920001236', 'description' => 'طوارئ أطفال']
                ],
                'phone' => '920001200',
                'google_maps_link' => 'https://maps.google.com/king-fahd-hospital',
                'booking_link' => 'https://booking.kfuh.edu.sa',
            ],
            [
                'name' => 'مستشفى الملك عبدالعزيز',
                'specialty' => 'عام',
                'address' => 'شارع الملك عبدالعزيز، جدة، المملكة العربية السعودية',
                'emergency_numbers' => [
                    ['number' => '920002234', 'description' => 'طوارئ عام'],
                    ['number' => '920002235', 'description' => 'طوارئ نسائية وولادة']
                ],
                'phone' => '920002200',
                'google_maps_link' => 'https://maps.google.com/king-abdulaziz-hospital',
                'booking_link' => 'https://booking.kauh.sa',
            ],
            [
                'name' => 'مستشفى الأطفال التخصصي',
                'specialty' => 'أطفال',
                'address' => 'شارع العروبة، الرياض، المملكة العربية السعودية',
                'emergency_numbers' => [
                    ['number' => '920003234', 'description' => 'طوارئ أطفال'],
                    ['number' => '920003235', 'description' => 'طوارئ حديثي الولادة']
                ],
                'phone' => '920003200',
                'google_maps_link' => 'https://maps.google.com/children-specialist-hospital',
                'booking_link' => 'https://booking.csh.sa',
            ],
            [
                'name' => 'مستشفى القلب التخصصي',
                'specialty' => 'قلب وصدر',
                'address' => 'شارع الأمير محمد بن عبدالعزيز، الرياض، المملكة العربية السعودية',
                'emergency_numbers' => [
                    ['number' => '920004234', 'description' => 'طوارئ قلب'],
                    ['number' => '920004235', 'description' => 'طوارئ صدر']
                ],
                'phone' => '920004200',
                'google_maps_link' => 'https://maps.google.com/heart-specialist-hospital',
                'booking_link' => 'https://booking.hsh.sa',
            ],
            [
                'name' => 'مستشفى العيون التخصصي',
                'specialty' => 'عيون',
                'address' => 'شارع الملك فيصل، الدمام، المملكة العربية السعودية',
                'emergency_numbers' => [
                    ['number' => '920005234', 'description' => 'طوارئ عيون']
                ],
                'phone' => '920005200',
                'google_maps_link' => 'https://maps.google.com/eye-specialist-hospital',
                'booking_link' => 'https://booking.esh.sa',
            ],
            [
                'name' => 'مستشفى الأورام التخصصي',
                'specialty' => 'أورام',
                'address' => 'شارع الملك خالد، الرياض، المملكة العربية السعودية',
                'emergency_numbers' => [
                    ['number' => '920006234', 'description' => 'طوارئ أورام'],
                    ['number' => '920006235', 'description' => 'طوارئ علاج كيماوي']
                ],
                'phone' => '920006200',
                'google_maps_link' => 'https://maps.google.com/cancer-specialist-hospital',
                'booking_link' => 'https://booking.csh.sa',
            ]
        ];

        foreach ($hospitals as $hospital) {
            \App\Models\Hospital::create($hospital);
        }
    }
}
