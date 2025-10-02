<?php

namespace App\Filament\Resources\HadietyVideoResource\Pages;

use App\Filament\Resources\HadietyVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHadietyVideo extends EditRecord
{
    protected static string $resource = HadietyVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
