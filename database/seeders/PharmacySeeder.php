<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use Illuminate\Database\Seeder;

class PharmacySeeder extends Seeder
{
    public function run(): void
    {
        $pharmacies = [
            [
                'name' => 'صيدلية النهدي',
                'address' => 'شارع الملك فهد، الرياض',
                'phone' => '0112345678',
                'google_maps_link' => 'https://maps.google.com/place/nahdi-riyadh',
                'online_order_link' => 'https://www.nahdi.sa/ar/order',
            ],
            [
                'name' => 'صيدلية الدواء',
                'address' => 'شارع الأمير سلطان، جدة',
                'phone' => '0126789012',
                'google_maps_link' => 'https://maps.google.com/place/aldawaa-jeddah',
                'online_order_link' => 'https://www.aldawaa.com/order',
            ],
            [
                'name' => 'صيدلية العزيزية',
                'address' => 'حي العزيزية، الدمام',
                'phone' => '0138901234',
                'google_maps_link' => 'https://maps.google.com/place/aziziyah-dammam',
                'online_order_link' => 'https://aziziyah.com/online-order',
            ],
            [
                'name' => 'صيدلية الشفاء',
                'address' => 'شارع الملك عبدالعزيز، مكة المكرمة',
                'phone' => '0125678901',
                'google_maps_link' => 'https://maps.google.com/place/shifa-makkah',
                'online_order_link' => null,
            ],
            [
                'name' => 'صيدلية الحياة',
                'address' => 'شارع الأمير محمد بن سلمان، المدينة المنورة',
                'phone' => '0147890123',
                'google_maps_link' => 'https://maps.google.com/place/hayat-madinah',
                'online_order_link' => 'https://hayat-pharmacy.com/order',
            ],
            [
                'name' => 'صيدلية الخير',
                'address' => 'شارع الملك خالد، الطائف',
                'phone' => '0129012345',
                'google_maps_link' => 'https://maps.google.com/place/khayr-taif',
                'online_order_link' => null,
            ],
            [
                'name' => 'صيدلية الأمل',
                'address' => 'شارع الأمير نايف، الخبر',
                'phone' => '0136789012',
                'google_maps_link' => 'https://maps.google.com/place/amal-khobar',
                'online_order_link' => 'https://amal-pharmacy.sa/order',
            ],
            [
                'name' => 'صيدلية الوطن',
                'address' => 'شارع الملك فيصل، أبها',
                'phone' => '0172345678',
                'google_maps_link' => 'https://maps.google.com/place/watan-abha',
                'online_order_link' => 'https://watan-pharmacy.com/online',
            ],
        ];

        foreach ($pharmacies as $pharmacy) {
            Pharmacy::create($pharmacy);
        }
    }
}
