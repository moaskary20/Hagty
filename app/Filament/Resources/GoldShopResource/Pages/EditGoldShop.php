<?php

namespace App\Filament\Resources\GoldShopResource\Pages;

use App\Filament\Resources\GoldShopResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGoldShop extends EditRecord
{
    protected static string $resource = GoldShopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
