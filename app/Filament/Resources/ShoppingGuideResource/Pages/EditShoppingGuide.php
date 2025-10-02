<?php

namespace App\Filament\Resources\ShoppingGuideResource\Pages;

use App\Filament\Resources\ShoppingGuideResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShoppingGuide extends EditRecord
{
    protected static string $resource = ShoppingGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
