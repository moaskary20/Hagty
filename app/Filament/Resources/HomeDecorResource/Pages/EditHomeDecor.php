<?php

namespace App\Filament\Resources\HomeDecorResource\Pages;

use App\Filament\Resources\HomeDecorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomeDecor extends EditRecord
{
    protected static string $resource = HomeDecorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
