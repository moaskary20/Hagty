<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class BeautyExpertsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'خبراء التجميل';
    protected static ?string $navigationGroup = 'جمالي';
    protected static ?string $title = 'خبراء التجميل';
    protected static string $view = 'filament.pages.beauty-experts';
}
