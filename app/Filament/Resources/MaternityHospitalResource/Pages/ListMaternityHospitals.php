<?php

namespace App\Filament\Resources\MaternityHospitalResource\Pages;

use App\Filament\Resources\MaternityHospitalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaternityHospitals extends ListRecords
{
    protected static string $resource = MaternityHospitalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
