<?php
namespace App\Filament\Pages;

use Filament\Pages\Page;

class BazzaratyInfoPage extends Page
{
    protected static ?string $navigationGroup = 'بزاراتي';
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static string $view = 'filament.pages.bazzaraty.info';
    protected static ?string $title = 'معلومات البازار';
}
