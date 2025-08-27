<?php

namespace App\Filament\Resources\Sehati\GovInitiativeResource\Pages;

use App\Filament\Resources\Sehati\GovInitiativeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGovInitiative extends EditRecord
{
    protected static string $resource = GovInitiativeResource::class;

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
        return 'تعديل المبادرة الحكومية';
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
