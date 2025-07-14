<?php
namespace App\Filament\Pages;

use Filament\Pages\Page;

class BazzaratyCalendarPage extends Page
{
    protected static ?string $navigationGroup = 'بزاراتي';
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static string $view = 'filament.pages.bazzaraty.calendar';
    protected static ?string $title = 'تقويم البازارات الشهري';
}
