<?php

namespace App\Filament\Resources\RiadatyVideoResource\Pages;

use App\Filament\Resources\RiadatyVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiadatyVideo extends EditRecord
{
    protected static string $resource = RiadatyVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
