<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class FashionTrendsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static string $view = 'filament.pages.fashion-trends';
    protected static ?string $navigationGroup = 'اكسسوراتى';
    protected static ?string $title = 'صيحات الموضة';
    protected static ?string $navigationLabel = 'صيحات الموضة';
}
