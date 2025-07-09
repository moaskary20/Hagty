<?php

namespace App\Filament\Resources\Sehati\HospitalDonationResource\Pages;

use App\Filament\Resources\Sehati\HospitalDonationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHospitalDonation extends EditRecord
{
    protected static string $resource = HospitalDonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('حذف')
                ->color('danger'),
        ];
    }
    
    public function getTitle(): string
    {
        return 'تعديل تبرع المستشفى';
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
