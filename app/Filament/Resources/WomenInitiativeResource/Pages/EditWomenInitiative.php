<?php

namespace App\Filament\Resources\WomenInitiativeResource\Pages;

use App\Filament\Resources\WomenInitiativeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWomenInitiative extends EditRecord
{
    protected static string $resource = WomenInitiativeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
