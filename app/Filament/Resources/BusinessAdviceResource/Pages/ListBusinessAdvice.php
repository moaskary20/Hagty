<?php

namespace App\Filament\Resources\BusinessAdviceResource\Pages;

use App\Filament\Resources\BusinessAdviceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBusinessAdvice extends ListRecords
{
    protected static string $resource = BusinessAdviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
