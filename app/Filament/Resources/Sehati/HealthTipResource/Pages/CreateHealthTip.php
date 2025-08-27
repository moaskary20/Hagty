<?php

namespace App\Filament\Resources\Sehati\HealthTipResource\Pages;

use App\Filament\Resources\Sehati\HealthTipResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHealthTip extends CreateRecord
{
    protected static string $resource = HealthTipResource::class;
    
    public function getTitle(): string
    {
        return 'إضافة نصيحة صحية';
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
