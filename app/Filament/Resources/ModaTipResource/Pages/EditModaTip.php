<?php

namespace App\Filament\Resources\ModaTipResource\Pages;

use App\Filament\Resources\ModaTipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModaTip extends EditRecord
{
    protected static string $resource = ModaTipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
