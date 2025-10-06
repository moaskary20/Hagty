<?php

namespace App\Filament\Resources\FamilyActivityResource\Pages;

use App\Filament\Resources\FamilyActivityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFamilyActivities extends ListRecords
{
    protected static string $resource = FamilyActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
