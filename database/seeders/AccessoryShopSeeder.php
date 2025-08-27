<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccessoryShop;

class AccessoryShopSeeder extends Seeder
{
    public function run(): void
    {
        AccessoryShop::insert([
            [
                'اسم_العلامة_التجارية' => 'إكسسوار ستايل',
                'الموقع' => 'https://maps.google.com/?q=30.0444,31.2357',
                'رابط_المتجر' => 'https://accessorystyle.com',
                'فئة_التاجر' => 'ذهبية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'اسم_العلامة_التجارية' => 'لمسة أناقة',
                'الموقع' => 'https://maps.google.com/?q=29.9773,31.1325',
                'رابط_المتجر' => 'https://touchofelegance.com',
                'فئة_التاجر' => 'فضية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'اسم_العلامة_التجارية' => 'جوهرة الشرق',
                'الموقع' => 'https://maps.google.com/?q=30.0131,31.2089',
                'رابط_المتجر' => 'https://jewelofeast.com',
                'فئة_التاجر' => 'ماسية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
