<?php

namespace App\Filament\Resources\FamilyConsultationResource\Pages;

use App\Filament\Resources\FamilyConsultationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFamilyConsultation extends EditRecord
{
    protected static string $resource = FamilyConsultationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
