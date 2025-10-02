<?php

namespace App\Filament\Resources\MostamayVideoResource\Pages;

use App\Filament\Resources\MostamayVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMostamayVideos extends ListRecords
{
    protected static string $resource = MostamayVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
