<?php

namespace App\Filament\Resources\PediatricDoctorResource\Pages;

use App\Filament\Resources\PediatricDoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPediatricDoctor extends EditRecord
{
    protected static string $resource = PediatricDoctorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
