<?php

namespace App\Filament\Resources\ModaTipResource\Pages;

use App\Filament\Resources\ModaTipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModaTips extends ListRecords
{
    protected static string $resource = ModaTipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
