<?php

namespace App\Filament\Resources\Sehati\HealthTipResource\Pages;

use App\Filament\Resources\Sehati\HealthTipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHealthTips extends ListRecords
{
    protected static string $resource = HealthTipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('إضافة نصيحة صحية')
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
        return 'النصائح الصحية';
    }
}
