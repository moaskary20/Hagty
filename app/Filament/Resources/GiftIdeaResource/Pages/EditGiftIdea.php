<?php

namespace App\Filament\Resources\GiftIdeaResource\Pages;

use App\Filament\Resources\GiftIdeaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGiftIdea extends EditRecord
{
    protected static string $resource = GiftIdeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
