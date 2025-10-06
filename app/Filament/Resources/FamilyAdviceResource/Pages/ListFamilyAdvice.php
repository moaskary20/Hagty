<?php

namespace App\Filament\Resources\FamilyAdviceResource\Pages;

use App\Filament\Resources\FamilyAdviceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFamilyAdvice extends ListRecords
{
    protected static string $resource = FamilyAdviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
