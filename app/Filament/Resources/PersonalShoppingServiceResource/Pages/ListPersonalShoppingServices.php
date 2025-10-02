<?php

namespace App\Filament\Resources\PersonalShoppingServiceResource\Pages;

use App\Filament\Resources\PersonalShoppingServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonalShoppingServices extends ListRecords
{
    protected static string $resource = PersonalShoppingServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
