<?php

namespace App\Filament\Resources\Sehati\PharmacyResource\Pages;

use App\Filament\Resources\Sehati\PharmacyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPharmacies extends ListRecords
{
    protected static string $resource = PharmacyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('إضافة صيدلية')
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
        return 'دليل الصيدليات';
    }
}
