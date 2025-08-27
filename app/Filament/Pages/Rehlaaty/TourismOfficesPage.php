<?php
namespace App\Filament\Pages\Rehlaaty;

use Filament\Pages\Page;

class TourismOfficesPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static string $view = 'filament.pages.rehlaaty.tourism-offices';
    protected static ?string $title = 'مكاتب السياحة';
    protected static ?string $navigationLabel = 'مكاتب السياحة';
    protected static ?string $navigationGroup = 'رحلتي';
}
