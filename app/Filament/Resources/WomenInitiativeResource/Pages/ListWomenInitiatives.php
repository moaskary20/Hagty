<?php

namespace App\Filament\Resources\WomenInitiativeResource\Pages;

use App\Filament\Resources\WomenInitiativeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWomenInitiatives extends ListRecords
{
    protected static string $resource = WomenInitiativeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
