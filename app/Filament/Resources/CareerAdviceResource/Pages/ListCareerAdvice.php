<?php

namespace App\Filament\Resources\CareerAdviceResource\Pages;

use App\Filament\Resources\CareerAdviceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCareerAdvice extends ListRecords
{
    protected static string $resource = CareerAdviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
