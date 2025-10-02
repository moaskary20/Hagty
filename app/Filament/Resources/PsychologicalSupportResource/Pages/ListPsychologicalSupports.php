<?php

namespace App\Filament\Resources\PsychologicalSupportResource\Pages;

use App\Filament\Resources\PsychologicalSupportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPsychologicalSupports extends ListRecords
{
    protected static string $resource = PsychologicalSupportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
