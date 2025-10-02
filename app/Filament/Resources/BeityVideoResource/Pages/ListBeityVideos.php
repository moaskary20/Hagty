<?php

namespace App\Filament\Resources\BeityVideoResource\Pages;

use App\Filament\Resources\BeityVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBeityVideos extends ListRecords
{
    protected static string $resource = BeityVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
