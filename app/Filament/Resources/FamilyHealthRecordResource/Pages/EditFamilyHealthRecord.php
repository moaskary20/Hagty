<?php

namespace App\Filament\Resources\FamilyHealthRecordResource\Pages;

use App\Filament\Resources\FamilyHealthRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFamilyHealthRecord extends EditRecord
{
    protected static string $resource = FamilyHealthRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
