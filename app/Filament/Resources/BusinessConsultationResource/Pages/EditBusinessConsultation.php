<?php

namespace App\Filament\Resources\BusinessConsultationResource\Pages;

use App\Filament\Resources\BusinessConsultationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBusinessConsultation extends EditRecord
{
    protected static string $resource = BusinessConsultationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
