<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccessoratyShop;

class AccessoratyShopTestSeeder extends Seeder
{
    public function run(): void
    {
        AccessoratyShop::create([
            'brand_name' => 'إكسسوارات لمعة',
            'location' => 'القاهرة - مصر الجديدة',
            'shop_url' => 'https://lamaa-accessories.com',
            'category' => 'ذهبية',
        ]);

        AccessoratyShop::create([
            'brand_name' => 'فضة ستايل',
            'location' => 'الإسكندرية - سموحة',
            'shop_url' => 'https://silverstyle-eg.com',
            'category' => 'فضية',
        ]);

        AccessoratyShop::create([
            'brand_name' => 'ماسي جلام',
            'location' => 'الجيزة - المهندسين',
            'shop_url' => 'https://masi-glam.com',
            'category' => 'ماسية',
        ]);
    }
}
