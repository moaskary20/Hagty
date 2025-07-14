<?php

namespace App\Filament\Pages\MyKitchen;

use Filament\Pages\Page;

class PlateOfTheDayPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-fire';
    protected static ?string $navigationGroup = 'مطبخي';
    protected static ?string $navigationLabel = 'طبق اليوم';
    protected static ?string $slug = 'my-kitchen/plate-of-the-day';
    protected static string $view = 'filament.pages.my-kitchen.plate-of-the-day';
}
