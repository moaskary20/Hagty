<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class CateringServicesPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cake';
    protected static ?string $navigationLabel = 'خدمات الطعام';
    protected static ?string $navigationGroup = 'فرحي';
    protected static ?string $title = 'خدمات الطعام';
    protected static string $view = 'filament.pages.catering-services';

    public function getViewData(): array
    {
        $query = \App\Models\CateringService::query()->with(['menus', 'packages', 'banners', 'videos']);
        
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('company_name', 'like', "%$search%")
                  ->orWhere('contact_person', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%");
        }
        
        $services = $query->where('is_active', true)->orderBy('company_name')->get();
        $banners = \App\Models\CateringBanner::where('is_active', true)->with('cateringService')->get();
        $videos = \App\Models\CateringVideo::where('is_active', true)->with('cateringService')->get();
        $menus = \App\Models\CateringMenu::where('is_available', true)->with('cateringService')->get();
        $packages = \App\Models\CateringPackage::where('is_active', true)->with('cateringService')->get();
        
        return compact('services', 'banners', 'videos', 'menus', 'packages');
    }
}
