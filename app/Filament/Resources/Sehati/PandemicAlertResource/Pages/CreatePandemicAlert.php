<?php

namespace App\Filament\Resources\Sehati\PandemicAlertResource\Pages;

use App\Filament\Resources\Sehati\PandemicAlertResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePandemicAlert extends CreateRecord
{
    protected static string $resource = PandemicAlertResource::class;
    
    protected ?string $heading = 'إضافة تنبيه جديد';
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
