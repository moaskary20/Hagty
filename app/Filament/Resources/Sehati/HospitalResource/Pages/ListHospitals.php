<?php

namespace App\Filament\Resources\Sehati\HospitalResource\Pages;

use App\Filament\Resources\Sehati\HospitalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHospitals extends ListRecords
{
    protected static string $resource = HospitalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('إضافة مستشفى')
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
        return 'دليل المستشفيات';
    }
}
