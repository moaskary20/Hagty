<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class FamilyAdvice extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'عائلتى';
    protected static ?string $title = 'نصائح عائلية';
    protected static ?string $navigationLabel = 'نصائح عائلية';
    protected static string $view = 'filament.pages.family-advice';
    protected static ?int $navigationSort = 3;

    public static function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\FamilyAdviceModalWidget::class,
        ];
    }
}
