<?php

namespace App\Filament\Resources\MashroayVideoResource\Pages;

use App\Filament\Resources\MashroayVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMashroayVideo extends EditRecord
{
    protected static string $resource = MashroayVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
