<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class UmomiPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static string $view = 'filament.pages.umomi';

    // إخفاء الصفحة من القائمة الجانبية
    protected static bool $shouldRegisterNavigation = false;

    public function getTitle(): string
    {
        return 'أومومتي - رعاية الأم والطفل';
    }

    public function getHeading(): string
    {
        return 'أومومتي - رعاية الأم والطفل';
    }

    protected function getViewData(): array
    {
        return [
            'greeting' => 'مرحباً بكِ في قسم أومومتي',
            'description' => 'قسم شامل لرعاية الأم والطفل'
        ];
    }
}
