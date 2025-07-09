<?php

namespace App\Filament\Resources\Sehati\PharmacyResource\Pages;

use App\Filament\Resources\Sehati\PharmacyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePharmacy extends CreateRecord
{
    protected static string $resource = PharmacyResource::class;
    
    public function getTitle(): string
    {
        return 'إضافة صيدلية جديدة';
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'تم إضافة الصيدلية بنجاح';
    }
}
