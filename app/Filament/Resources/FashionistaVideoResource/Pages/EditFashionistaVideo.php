<?php

namespace App\Filament\Resources\FashionistaVideoResource\Pages;

use App\Filament\Resources\FashionistaVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFashionistaVideo extends EditRecord
{
    protected static string $resource = FashionistaVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
