<?php

namespace App\Filament\Resources\ForasyJobResource\Pages;

use App\Filament\Resources\ForasyJobResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListForasyJobs extends ListRecords
{
    protected static string $resource = ForasyJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
