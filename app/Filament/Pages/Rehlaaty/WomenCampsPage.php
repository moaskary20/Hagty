<?php
namespace App\Filament\Pages\Rehlaaty;

use Filament\Pages\Page;

class WomenCampsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static string $view = 'filament.pages.rehlaaty.women-camps';
    protected static ?string $title = 'مخيمات النساء';
    protected static ?string $navigationLabel = 'مخيمات النساء';
    protected static ?string $navigationGroup = 'رحلتي';
}
