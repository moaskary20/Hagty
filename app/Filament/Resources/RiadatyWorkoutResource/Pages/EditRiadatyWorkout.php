<?php

namespace App\Filament\Resources\RiadatyWorkoutResource\Pages;

use App\Filament\Resources\RiadatyWorkoutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiadatyWorkout extends EditRecord
{
    protected static string $resource = RiadatyWorkoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
