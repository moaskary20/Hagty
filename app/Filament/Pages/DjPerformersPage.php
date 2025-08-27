<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class DjPerformersPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-musical-note';
    protected static ?string $navigationLabel = 'مشغلو الدي جي';
    protected static ?string $navigationGroup = 'فرحي';
    protected static ?string $title = 'مشغلو الدي جي والعازفون';
    protected static string $view = 'filament.pages.dj-performers';

    public function getViewData(): array
    {
        $query = \App\Models\DjPerformer::query()->with(['weddingPackages', 'banners', 'videoAds']);
        
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%");
        }
        
        $djPerformers = $query->where('is_active', true)->orderBy('name')->get();
        $banners = \App\Models\DjBanner::where('is_active', true)->with('djPerformer')->get();
        $videoAds = \App\Models\DjVideoAd::where('is_active', true)->with('djPerformer')->get();
        $packages = \App\Models\DjWeddingPackage::where('is_active', true)->with('djPerformer')->get();
        
        return compact('djPerformers', 'banners', 'videoAds', 'packages');
    }
}
