<?php
namespace App\Filament\Pages\Rehlaaty;

use Filament\Pages\Page;

class PromotionVideosPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    protected static string $view = 'filament.pages.rehlaaty.promotion-videos';
    protected static ?string $title = 'فيديوهات ترويجية';
    protected static ?string $navigationLabel = 'فيديوهات ترويجية';
    protected static ?string $navigationGroup = 'رحلتي';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
