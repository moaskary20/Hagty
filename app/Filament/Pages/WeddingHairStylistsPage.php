<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class WeddingHairStylistsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-scissors';
    protected static ?string $navigationLabel = 'مصففو الشعر';
    protected static ?string $navigationGroup = 'فرحي';
    protected static ?string $title = 'مصففو الشعر';
    protected static string $view = 'filament.pages.wedding-hair-stylists';

    public function getViewData(): array
    {
        $query = \App\Models\WeddingHairStylist::query();
        
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%")
                  ->orWhere('venue', 'like', "%$search%")
                  ->orWhere('package', 'like', "%$search%");
        }
        
        $stylists = $query->where('is_active', true)->orderBy('name')->get();
        
        return compact('stylists');
    }
}
