<?php

namespace App\Filament\Resources\GoldShopResource\Pages;

use App\Filament\Resources\GoldShopResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGoldShops extends ListRecords
{
    protected static string $resource = GoldShopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
