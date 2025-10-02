<?php

namespace App\Filament\Resources\MashroayBannerResource\Pages;

use App\Filament\Resources\MashroayBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMashroayBanners extends ListRecords
{
    protected static string $resource = MashroayBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
