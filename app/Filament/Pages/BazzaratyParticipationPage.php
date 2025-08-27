<?php
namespace App\Filament\Pages;

use Filament\Pages\Page;

class BazzaratyParticipationPage extends Page
{
    protected static ?string $navigationGroup = 'بزاراتي';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static string $view = 'filament.pages.bazzaraty.participation';
    protected static ?string $title = 'كن جزءًا من البازار';
}
