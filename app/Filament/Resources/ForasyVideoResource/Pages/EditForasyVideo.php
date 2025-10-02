<?php

namespace App\Filament\Resources\ForasyVideoResource\Pages;

use App\Filament\Resources\ForasyVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditForasyVideo extends EditRecord
{
    protected static string $resource = ForasyVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
