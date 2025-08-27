<?php

namespace App\Filament\Pages\MyKitchen;

use Filament\Pages\Page;

class CateringPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'مطبخي';
    protected static ?string $navigationLabel = 'التموين';
    protected static ?string $slug = 'my-kitchen/catering';
    protected static string $view = 'filament.pages.my-kitchen.catering';
}
