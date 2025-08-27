<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class MakeupArtistsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-face-smile';
    protected static ?string $navigationLabel = 'فناني المكياج';
    protected static ?string $navigationGroup = 'فرحي';
    protected static ?string $title = 'فناني المكياج';
    protected static string $view = 'filament.pages.makeup-artists';

    public function getViewData(): array
    {
        $query = \App\Models\MakeupArtist::query();
        
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        }
        
        $artists = $query->where('is_active', true)->orderBy('name')->get();
        
        return compact('artists');
    }
}
