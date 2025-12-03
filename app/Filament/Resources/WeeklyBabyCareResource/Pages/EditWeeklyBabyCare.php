<?php

namespace App\Filament\Resources\WeeklyBabyCareResource\Pages;

use App\Filament\Resources\WeeklyBabyCareResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWeeklyBabyCare extends EditRecord
{
    protected static string $resource = WeeklyBabyCareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
