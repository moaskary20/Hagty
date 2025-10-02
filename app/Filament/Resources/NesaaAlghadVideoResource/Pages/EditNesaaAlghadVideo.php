<?php

namespace App\Filament\Resources\NesaaAlghadVideoResource\Pages;

use App\Filament\Resources\NesaaAlghadVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNesaaAlghadVideo extends EditRecord
{
    protected static string $resource = NesaaAlghadVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
