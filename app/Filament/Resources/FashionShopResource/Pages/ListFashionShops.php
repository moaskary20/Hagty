<?php

namespace App\Filament\Resources\FashionShopResource\Pages;

use App\Filament\Resources\FashionShopResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFashionShops extends ListRecords
{
    protected static string $resource = FashionShopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
