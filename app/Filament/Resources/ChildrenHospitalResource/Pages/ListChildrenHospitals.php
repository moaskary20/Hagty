<?php

namespace App\Filament\Resources\ChildrenHospitalResource\Pages;

use App\Filament\Resources\ChildrenHospitalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChildrenHospitals extends ListRecords
{
    protected static string $resource = ChildrenHospitalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
