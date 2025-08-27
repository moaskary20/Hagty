<?php
namespace App\Filament\Pages;

use Filament\Pages\Page;

class BazzaratyBookingPage extends Page
{
    protected static ?string $navigationGroup = 'بزاراتي';
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static string $view = 'filament.pages.bazzaraty.booking';
    protected static ?string $title = 'الحجز للمشاركين';
}
