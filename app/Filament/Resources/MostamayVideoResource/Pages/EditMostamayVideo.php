<?php

namespace App\Filament\Resources\MostamayVideoResource\Pages;

use App\Filament\Resources\MostamayVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMostamayVideo extends EditRecord
{
    protected static string $resource = MostamayVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
