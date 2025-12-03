<?php

namespace App\Filament\Resources\PediatricDoctorResource\Pages;

use App\Filament\Resources\PediatricDoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPediatricDoctors extends ListRecords
{
    protected static string $resource = PediatricDoctorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
