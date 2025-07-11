<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class BeautyTrendsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?string $navigationLabel = 'صيحات وألوان التجميل';
    protected static ?string $navigationGroup = 'جمالي';
    protected static ?string $title = 'صيحات وألوان التجميل';
    protected static string $view = 'filament.pages.beauty-trends';
}
