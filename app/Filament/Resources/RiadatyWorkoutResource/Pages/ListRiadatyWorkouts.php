<?php

namespace App\Filament\Resources\RiadatyWorkoutResource\Pages;

use App\Filament\Resources\RiadatyWorkoutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRiadatyWorkouts extends ListRecords
{
    protected static string $resource = RiadatyWorkoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
