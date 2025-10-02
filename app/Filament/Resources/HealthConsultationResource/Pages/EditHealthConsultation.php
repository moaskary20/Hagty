<?php

namespace App\Filament\Resources\HealthConsultationResource\Pages;

use App\Filament\Resources\HealthConsultationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHealthConsultation extends EditRecord
{
    protected static string $resource = HealthConsultationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
