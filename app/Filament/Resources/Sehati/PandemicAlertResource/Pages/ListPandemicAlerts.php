<?php

namespace App\Filament\Resources\Sehati\PandemicAlertResource\Pages;

use App\Filament\Resources\Sehati\PandemicAlertResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPandemicAlerts extends ListRecords
{
    protected static string $resource = PandemicAlertResource::class;

    protected ?string $heading = 'تنبيهات الجوائح';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('إضافة تنبيه جديد')
                ->color('primary'),
        ];
    }
}
