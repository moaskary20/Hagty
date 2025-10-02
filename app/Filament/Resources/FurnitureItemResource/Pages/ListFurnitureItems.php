<?php

namespace App\Filament\Resources\FurnitureItemResource\Pages;

use App\Filament\Resources\FurnitureItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFurnitureItems extends ListRecords
{
    protected static string $resource = FurnitureItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
