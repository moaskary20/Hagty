<?php
namespace App\Filament\Resources\Sehati\DoctorResource\Pages;

use App\Filament\Resources\Sehati\DoctorResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ManageDoctors extends ListRecords
{
    protected static string $resource = DoctorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('إضافة طبيب جديد')
                ->icon('heroicon-o-plus')
                ->color('primary'),
        ];
    }
}
