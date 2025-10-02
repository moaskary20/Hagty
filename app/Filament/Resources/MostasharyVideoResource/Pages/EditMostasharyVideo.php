<?php

namespace App\Filament\Resources\MostasharyVideoResource\Pages;

use App\Filament\Resources\MostasharyVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMostasharyVideo extends EditRecord
{
    protected static string $resource = MostasharyVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
