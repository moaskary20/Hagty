<?php

namespace App\Filament\Resources\BusinessAdviceResource\Pages;

use App\Filament\Resources\BusinessAdviceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBusinessAdvice extends EditRecord
{
    protected static string $resource = BusinessAdviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
