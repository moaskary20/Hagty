<?php

namespace App\Filament\Resources\PsychologicalSupportResource\Pages;

use App\Filament\Resources\PsychologicalSupportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPsychologicalSupport extends EditRecord
{
    protected static string $resource = PsychologicalSupportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
