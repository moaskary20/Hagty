<?php

namespace App\Filament\Resources\Sehati\HospitalDonationResource\Pages;

use App\Filament\Resources\Sehati\HospitalDonationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHospitalDonations extends ListRecords
{
    protected static string $resource = HospitalDonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('إضافة تبرع')
                ->color('success'),
        ];
    }
    
    protected function getHeaderWidgets(): array
    {
        return [
            // يمكن إضافة widgets هنا لاحقاً
        ];
    }
    
    public function getTitle(): string
    {
        return 'التبرعات للمستشفيات';
    }
}
