<?php

namespace App\Filament\Resources\HomeDecorResource\Pages;

use App\Filament\Resources\HomeDecorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomeDecors extends ListRecords
{
    protected static string $resource = HomeDecorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
