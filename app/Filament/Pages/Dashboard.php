<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = 'لوحة التحكم';
    
    protected static string $view = 'filament.pages.dashboard';
    
    protected static ?int $navigationSort = 1;
    
    public function getTitle(): string
    {
        return 'لوحة التحكم - منصة HAGTY';
    }
    
    public function getHeading(): string
    {
        return 'مرحباً بك في منصة HAGTY';
    }
    
    public function getSubheading(): ?string
    {
        return 'إدارة شاملة ومتطورة لمنصتك';
    }
}
