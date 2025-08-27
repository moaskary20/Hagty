<?php

namespace App\Filament\Resources\Sehati\HospitalResource\Pages;

use App\Filament\Resources\Sehati\HospitalResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHospital extends CreateRecord
{
    protected static string $resource = HospitalResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    public function getTitle(): string
    {
        return 'إضافة مستشفى جديد';
    }
}
