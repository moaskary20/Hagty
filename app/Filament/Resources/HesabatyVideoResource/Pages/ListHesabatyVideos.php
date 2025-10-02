<?php

namespace App\Filament\Resources\HesabatyVideoResource\Pages;

use App\Filament\Resources\HesabatyVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHesabatyVideos extends ListRecords
{
    protected static string $resource = HesabatyVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
