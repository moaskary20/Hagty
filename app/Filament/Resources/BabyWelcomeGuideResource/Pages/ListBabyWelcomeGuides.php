<?php

namespace App\Filament\Resources\BabyWelcomeGuideResource\Pages;

use App\Filament\Resources\BabyWelcomeGuideResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBabyWelcomeGuides extends ListRecords
{
    protected static string $resource = BabyWelcomeGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
