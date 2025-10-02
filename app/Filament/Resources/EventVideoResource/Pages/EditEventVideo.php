<?php

namespace App\Filament\Resources\EventVideoResource\Pages;

use App\Filament\Resources\EventVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventVideo extends EditRecord
{
    protected static string $resource = EventVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
