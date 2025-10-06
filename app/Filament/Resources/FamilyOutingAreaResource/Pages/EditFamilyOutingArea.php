<?php

namespace App\Filament\Resources\FamilyOutingAreaResource\Pages;

use App\Filament\Resources\FamilyOutingAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFamilyOutingArea extends EditRecord
{
    protected static string $resource = FamilyOutingAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
