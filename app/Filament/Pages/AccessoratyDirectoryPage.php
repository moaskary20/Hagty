<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\AccessoratyBannerAd;
use App\Models\AccessoratySponsorVideo;
use App\Models\AccessoratyShop;

class AccessoratyDirectoryPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'دليل متاجر الإكسسوارات';
    protected static ?string $navigationGroup = 'اكسسوراتى';
    protected static ?string $title = 'دليل متاجر الإكسسوارات';
    protected static string $view = 'filament.pages.accessoraty-directory';

    public function getViewData(): array
    {
        return [
            'shops' => AccessoratyShop::all(),
            'banners' => AccessoratyBannerAd::all(),
            'videos' => AccessoratySponsorVideo::all(),
        ];
    }
}
