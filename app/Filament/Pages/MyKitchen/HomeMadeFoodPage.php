<?php

namespace App\Filament\Pages\MyKitchen;

use Filament\Pages\Page;

class HomeMadeFoodPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationGroup = 'مطبخي';
    protected static ?string $navigationLabel = 'الطعام المنزلي';
    protected static ?string $slug = 'my-kitchen/home-made-food';
    protected static string $view = 'filament.pages.my-kitchen.home-made-food';
}
