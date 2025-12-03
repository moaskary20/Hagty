<?php

namespace App\Filament\Resources\MotherhoodGuideResource\Pages;

use App\Filament\Resources\MotherhoodGuideResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMotherhoodGuides extends ListRecords
{
    protected static string $resource = MotherhoodGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
