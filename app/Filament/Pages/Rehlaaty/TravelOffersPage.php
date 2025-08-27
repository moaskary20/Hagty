<?php
namespace App\Filament\Pages\Rehlaaty;

use Filament\Pages\Page;

class TravelOffersPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-gift';
    protected static string $view = 'filament.pages.rehlaaty.travel-offers';
    protected static ?string $title = 'عروض السفر والباقات';
    protected static ?string $navigationLabel = 'عروض السفر والباقات';
    protected static ?string $navigationGroup = 'رحلتي';
}
