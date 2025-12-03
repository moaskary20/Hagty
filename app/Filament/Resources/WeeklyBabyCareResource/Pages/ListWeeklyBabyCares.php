<?php

namespace App\Filament\Resources\WeeklyBabyCareResource\Pages;

use App\Filament\Resources\WeeklyBabyCareResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWeeklyBabyCares extends ListRecords
{
    protected static string $resource = WeeklyBabyCareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
