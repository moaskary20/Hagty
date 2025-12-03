<?php

namespace App\Filament\Resources\SilverShopResource\Pages;

use App\Filament\Resources\SilverShopResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSilverShops extends ListRecords
{
    protected static string $resource = SilverShopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
