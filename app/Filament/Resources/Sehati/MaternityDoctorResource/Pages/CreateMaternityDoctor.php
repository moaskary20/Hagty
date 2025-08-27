<?php

namespace App\Filament\Resources\Sehati\MaternityDoctorResource\Pages;

use App\Filament\Resources\Sehati\MaternityDoctorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMaternityDoctor extends CreateRecord
{
    protected static string $resource = MaternityDoctorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
