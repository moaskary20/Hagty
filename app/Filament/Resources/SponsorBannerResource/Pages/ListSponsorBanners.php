<?php

namespace App\Filament\Resources\SponsorBannerResource\Pages;

use App\Filament\Resources\SponsorBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSponsorBanners extends ListRecords
{
    protected static string $resource = SponsorBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
