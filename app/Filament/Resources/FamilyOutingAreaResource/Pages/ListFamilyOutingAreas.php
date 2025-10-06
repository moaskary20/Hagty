<?php

namespace App\Filament\Resources\FamilyOutingAreaResource\Pages;

use App\Filament\Resources\FamilyOutingAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFamilyOutingAreas extends ListRecords
{
    protected static string $resource = FamilyOutingAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
