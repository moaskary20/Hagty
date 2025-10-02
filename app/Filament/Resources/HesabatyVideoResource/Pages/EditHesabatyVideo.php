<?php

namespace App\Filament\Resources\HesabatyVideoResource\Pages;

use App\Filament\Resources\HesabatyVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHesabatyVideo extends EditRecord
{
    protected static string $resource = HesabatyVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
