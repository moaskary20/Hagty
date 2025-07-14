<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class MyFamilyHealth extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationGroup = 'عائلتى';
    protected static ?string $title = 'صحة العائلة';
    protected static ?string $navigationLabel = 'صحة العائلة';
    protected static string $view = 'filament.pages.my-family-health';
    protected static ?int $navigationSort = 1;
}
