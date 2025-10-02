<?php

namespace App\Filament\Resources\FamilyConsultationResource\Pages;

use App\Filament\Resources\FamilyConsultationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFamilyConsultations extends ListRecords
{
    protected static string $resource = FamilyConsultationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
