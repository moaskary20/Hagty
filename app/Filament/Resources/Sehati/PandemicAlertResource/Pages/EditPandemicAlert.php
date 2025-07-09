<?php

namespace App\Filament\Resources\Sehati\PandemicAlertResource\Pages;

use App\Filament\Resources\Sehati\PandemicAlertResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPandemicAlert extends EditRecord
{
    protected static string $resource = PandemicAlertResource::class;

    protected ?string $heading = 'تعديل التنبيه';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('حذف التنبيه')
                ->color('danger'),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
