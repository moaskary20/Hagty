<?php

namespace App\Filament\Resources\Sehati\GovInitiativeResource\Pages;

use App\Filament\Resources\Sehati\GovInitiativeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGovInitiatives extends ListRecords
{
    protected static string $resource = GovInitiativeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('إضافة مبادرة')
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
        return 'مبادرات الحكومة الصحية';
    }
}
