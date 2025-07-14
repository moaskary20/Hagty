<?php
namespace App\Filament\Pages\Rehlaaty;

use Filament\Pages\Page;

class HotelsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static string $view = 'filament.pages.rehlaaty.hotels';
    protected static ?string $title = 'الفنادق';
    protected static ?string $navigationLabel = 'الفنادق';
    protected static ?string $navigationGroup = 'رحلتي';
}
