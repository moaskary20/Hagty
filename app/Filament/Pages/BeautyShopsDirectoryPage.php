<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class BeautyShopsDirectoryPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'دليل المتاجر المتخصصة';
    protected static ?string $navigationGroup = 'جمالي';
    protected static ?string $title = 'دليل المتاجر المتخصصة';
    protected static string $view = 'filament.pages.beauty-shops-directory';
}
