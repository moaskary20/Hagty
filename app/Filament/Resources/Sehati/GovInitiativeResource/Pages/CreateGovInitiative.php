<?php

namespace App\Filament\Resources\Sehati\GovInitiativeResource\Pages;

use App\Filament\Resources\Sehati\GovInitiativeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGovInitiative extends CreateRecord
{
    protected static string $resource = GovInitiativeResource::class;
    
    public function getTitle(): string
    {
        return 'إضافة مبادرة حكومية جديدة';
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
