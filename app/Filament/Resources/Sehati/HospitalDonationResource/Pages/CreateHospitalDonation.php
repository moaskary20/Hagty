<?php

namespace App\Filament\Resources\Sehati\HospitalDonationResource\Pages;

use App\Filament\Resources\Sehati\HospitalDonationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHospitalDonation extends CreateRecord
{
    protected static string $resource = HospitalDonationResource::class;
    
    public function getTitle(): string
    {
        return 'إضافة تبرع للمستشفى';
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
