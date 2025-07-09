<?php

namespace App\Filament\Resources\Sehati\HealthTipResource\Pages;

use App\Filament\Resources\Sehati\HealthTipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHealthTip extends EditRecord
{
    protected static string $resource = HealthTipResource::class;

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
        return 'تعديل النصيحة الصحية';
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
