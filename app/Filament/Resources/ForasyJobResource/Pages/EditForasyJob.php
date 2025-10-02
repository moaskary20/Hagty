<?php

namespace App\Filament\Resources\ForasyJobResource\Pages;

use App\Filament\Resources\ForasyJobResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditForasyJob extends EditRecord
{
    protected static string $resource = ForasyJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
