<?php

namespace App\Filament\Resources\ForasyBannerResource\Pages;

use App\Filament\Resources\ForasyBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListForasyBanners extends ListRecords
{
    protected static string $resource = ForasyBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
