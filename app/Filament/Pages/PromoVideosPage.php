<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class PromoVideosPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
protected static string $view = 'filament.pages.rehlaaty.promo-videos';
    protected static ?string $title = 'فيديوهات ترويجية للعروض والأماكن';
    protected static ?string $navigationLabel = 'فيديوهات ترويجية';
    protected static ?string $slug = 'promo-videos';
    protected static bool $shouldRegisterNavigation = true;
    protected static ?string $navigationGroup = 'رحلتي';
    
}
