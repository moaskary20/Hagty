<?php

namespace App\Filament\Resources\Sehati\HospitalResource\Pages;

use App\Filament\Resources\Sehati\HospitalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHospital extends EditRecord
{
    protected static string $resource = HospitalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('حذف المستشفى')
                ->color('danger'),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    public function getTitle(): string
    {
        return 'تعديل المستشفى';
    }
}
