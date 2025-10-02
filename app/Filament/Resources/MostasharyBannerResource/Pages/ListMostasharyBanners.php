<?php

namespace App\Filament\Resources\MostasharyBannerResource\Pages;

use App\Filament\Resources\MostasharyBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMostasharyBanners extends ListRecords
{
    protected static string $resource = MostasharyBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
