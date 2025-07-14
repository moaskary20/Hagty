<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class MyFamilyDay extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-sun';
    protected static ?string $navigationGroup = 'عائلتى';
    protected static ?string $title = 'يوم العائلة';
    protected static ?string $navigationLabel = 'يوم العائلة';
    protected static string $view = 'filament.pages.my-family-day';
    protected static ?int $navigationSort = 2;
}
