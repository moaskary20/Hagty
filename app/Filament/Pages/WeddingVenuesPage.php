<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class WeddingVenuesPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'الفنادق والأماكن';
    protected static ?string $navigationGroup = 'فرحي';
    protected static ?string $title = 'الفنادق والأماكن';
    protected static string $view = 'filament.pages.wedding-venues';

    public function getViewData(): array
    {
        $query = \App\Models\WeddingVenue::query()->with(['banners', 'videos', 'menus', 'packages']);
        
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%");
        }
        
        $venues = $query->where('is_active', true)->orderBy('name')->get();
        $banners = \App\Models\WeddingVenueBanner::where('is_active', true)->get();
        $videos = \App\Models\WeddingVenueVideo::where('is_active', true)->get();
        $menus = \App\Models\WeddingVenueMenu::where('is_active', true)->with('venue')->get();
        $packages = \App\Models\WeddingVenuePackage::where('is_active', true)->with('venue')->get();
        
        return compact('venues', 'banners', 'videos', 'menus', 'packages');
    }
}
