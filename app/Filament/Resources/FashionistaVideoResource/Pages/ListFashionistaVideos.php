<?php

namespace App\Filament\Resources\FashionistaVideoResource\Pages;

use App\Filament\Resources\FashionistaVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFashionistaVideos extends ListRecords
{
    protected static string $resource = FashionistaVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
