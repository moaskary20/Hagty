<?php

namespace App\Filament\Resources\NesaaAlghadBannerResource\Pages;

use App\Filament\Resources\NesaaAlghadBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNesaaAlghadBanners extends ListRecords
{
    protected static string $resource = NesaaAlghadBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
