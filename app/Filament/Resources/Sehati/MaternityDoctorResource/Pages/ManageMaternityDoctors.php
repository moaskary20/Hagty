<?php

namespace App\Filament\Resources\Sehati\MaternityDoctorResource\Pages;

use App\Filament\Resources\Sehati\MaternityDoctorResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ManageMaternityDoctors extends ListRecords
{
    protected static string $resource = MaternityDoctorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('إضافة طبيب أمومة جديد')
                ->icon('heroicon-o-plus')
                ->color('primary'),
        ];
    }
}
