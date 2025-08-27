<?php

namespace App\Filament\Pages\MyKitchen;

use Filament\Pages\Page;

class BeTheChefPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'مطبخي';
    protected static ?string $navigationLabel = 'كن أنت الشيف';
    protected static ?string $slug = 'my-kitchen/be-the-chef';
    protected static string $view = 'filament.pages.my-kitchen.be-the-chef';
}
