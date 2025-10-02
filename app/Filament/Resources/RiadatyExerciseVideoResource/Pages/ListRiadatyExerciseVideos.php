<?php

namespace App\Filament\Resources\RiadatyExerciseVideoResource\Pages;

use App\Filament\Resources\RiadatyExerciseVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRiadatyExerciseVideos extends ListRecords
{
    protected static string $resource = RiadatyExerciseVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
