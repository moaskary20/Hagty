<?php

namespace App\Filament\Resources\RiadatyExerciseVideoResource\Pages;

use App\Filament\Resources\RiadatyExerciseVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiadatyExerciseVideo extends EditRecord
{
    protected static string $resource = RiadatyExerciseVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
