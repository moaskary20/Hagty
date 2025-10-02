<?php

namespace App\Filament\Resources\FurnitureItemResource\Pages;

use App\Filament\Resources\FurnitureItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFurnitureItem extends EditRecord
{
    protected static string $resource = FurnitureItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
