<?php
namespace App\Filament\Pages\Rehlaaty;

use Filament\Pages\Page;

class CalendarPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static string $view = 'filament.pages.rehlaaty.calendar';
    protected static ?string $title = 'تقويم رحلتي';
    protected static ?string $navigationLabel = 'تقويم رحلتي';
    protected static ?string $navigationGroup = 'رحلتي';
}
