<?php

namespace App\Filament\Resources\Sehati\MaternityDoctorResource\Pages;

use App\Filament\Resources\Sehati\MaternityDoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaternityDoctor extends EditRecord
{
    protected static string $resource = MaternityDoctorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('حذف الطبيب')
                ->color('danger'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
