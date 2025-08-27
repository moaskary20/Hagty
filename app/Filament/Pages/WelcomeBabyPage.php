<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class WelcomeBabyPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static string $view = 'filament.pages.welcome-baby';
    protected static ?string $navigationGroup = 'أومومتي';
    protected static ?string $title = 'مرحباً بالطفل';
    protected static ?string $navigationLabel = 'مرحباً بالطفل';
    protected static ?int $navigationSort = 5;

    protected static bool $shouldRegisterNavigation = true;
}
