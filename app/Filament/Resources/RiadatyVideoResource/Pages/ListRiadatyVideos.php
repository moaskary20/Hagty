<?php

namespace App\Filament\Resources\RiadatyVideoResource\Pages;

use App\Filament\Resources\RiadatyVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRiadatyVideos extends ListRecords
{
    protected static string $resource = RiadatyVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
