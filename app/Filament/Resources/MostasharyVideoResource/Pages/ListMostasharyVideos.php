<?php

namespace App\Filament\Resources\MostasharyVideoResource\Pages;

use App\Filament\Resources\MostasharyVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMostasharyVideos extends ListRecords
{
    protected static string $resource = MostasharyVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
