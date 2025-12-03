<?php

namespace App\Filament\Resources\MaternityHospitalResource\Pages;

use App\Filament\Resources\MaternityHospitalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaternityHospital extends EditRecord
{
    protected static string $resource = MaternityHospitalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
