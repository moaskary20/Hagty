<?php

namespace App\Filament\Resources\CareerConsultationResource\Pages;

use App\Filament\Resources\CareerConsultationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCareerConsultations extends ListRecords
{
    protected static string $resource = CareerConsultationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
