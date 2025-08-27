<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class HairStylistsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'مصففو الشعر';
    protected static ?string $navigationGroup = 'جمالي';
    protected static ?string $title = 'مصففو الشعر';
    protected static string $view = 'filament.pages.hair-stylists';
}
