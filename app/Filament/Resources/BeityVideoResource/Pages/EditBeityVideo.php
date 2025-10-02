<?php

namespace App\Filament\Resources\BeityVideoResource\Pages;

use App\Filament\Resources\BeityVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBeityVideo extends EditRecord
{
    protected static string $resource = BeityVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
