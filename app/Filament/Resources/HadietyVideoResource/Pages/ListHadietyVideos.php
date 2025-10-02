<?php

namespace App\Filament\Resources\HadietyVideoResource\Pages;

use App\Filament\Resources\HadietyVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHadietyVideos extends ListRecords
{
    protected static string $resource = HadietyVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
