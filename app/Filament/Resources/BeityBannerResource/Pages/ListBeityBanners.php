<?php

namespace App\Filament\Resources\BeityBannerResource\Pages;

use App\Filament\Resources\BeityBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBeityBanners extends ListRecords
{
    protected static string $resource = BeityBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
