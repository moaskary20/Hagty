<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class WeddingPhotographersPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationLabel = 'المصورون ومصورو الفيديو';
    protected static ?string $navigationGroup = 'فرحي';
    protected static ?string $title = 'المصورون ومصورو الفيديو';
    protected static string $view = 'filament.pages.wedding-photographers';

    public function getViewData(): array
    {
        $query = \App\Models\WeddingPhotographer::query()->with(['packages', 'banners', 'videos']);
        
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%");
        }
        
        $photographers = $query->where('is_active', true)->orderBy('name')->get();
        $banners = \App\Models\WeddingPhotographerBanner::where('is_active', true)->get();
        $videos = \App\Models\WeddingPhotographerVideo::where('is_active', true)->get();
        $packages = \App\Models\WeddingPhotographerPackage::where('is_active', true)->get();
        
        return compact('photographers', 'banners', 'videos', 'packages');
    }
}
