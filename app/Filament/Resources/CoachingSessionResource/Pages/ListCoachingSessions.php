<?php

namespace App\Filament\Resources\CoachingSessionResource\Pages;

use App\Filament\Resources\CoachingSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoachingSessions extends ListRecords
{
    protected static string $resource = CoachingSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
