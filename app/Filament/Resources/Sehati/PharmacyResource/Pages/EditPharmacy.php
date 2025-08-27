<?php

namespace App\Filament\Resources\Sehati\PharmacyResource\Pages;

use App\Filament\Resources\Sehati\PharmacyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPharmacy extends EditRecord
{
    protected static string $resource = PharmacyResource::class;

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
        return 'تعديل الصيدلية';
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getSavedNotificationTitle(): ?string
    {
        return 'تم تحديث الصيدلية بنجاح';
    }
}
