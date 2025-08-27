<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class FlowerDecoratorsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationLabel = 'ديكورات الزهور والتجهيزات';
    protected static ?string $navigationGroup = 'فرحي';
    protected static ?string $title = 'ديكورات الزهور والتجهيزات';
    protected static string $view = 'filament.pages.flower-decorators';

    public function getViewData(): array
    {
        $query = \App\Models\FlowerDecorator::query()->with(['weddingPackages', 'sponsorBanners', 'videoAds']);
        
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%");
        }
        
        $flowerDecorators = $query->where('is_active', true)->orderBy('name')->get();
        $sponsorBanners = \App\Models\FlowerSponsorBanner::where('is_active', true)->with('flowerDecorator')->get();
        $videoAds = \App\Models\FlowerVideoAd::where('is_active', true)->with('flowerDecorator')->get();
        $packages = \App\Models\FlowerWeddingPackage::where('is_active', true)->with('flowerDecorator')->get();
        
        return compact('flowerDecorators', 'sponsorBanners', 'videoAds', 'packages');
    }
}
