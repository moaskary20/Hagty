<?php

namespace App\Filament\Resources\MotivationalContentResource\Pages;

use App\Filament\Resources\MotivationalContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMotivationalContents extends ListRecords
{
    protected static string $resource = MotivationalContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
