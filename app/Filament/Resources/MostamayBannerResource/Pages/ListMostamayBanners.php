<?php

namespace App\Filament\Resources\MostamayBannerResource\Pages;

use App\Filament\Resources\MostamayBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMostamayBanners extends ListRecords
{
    protected static string $resource = MostamayBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
