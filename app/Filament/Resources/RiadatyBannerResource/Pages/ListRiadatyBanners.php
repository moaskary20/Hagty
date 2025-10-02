<?php

namespace App\Filament\Resources\RiadatyBannerResource\Pages;

use App\Filament\Resources\RiadatyBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRiadatyBanners extends ListRecords
{
    protected static string $resource = RiadatyBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
