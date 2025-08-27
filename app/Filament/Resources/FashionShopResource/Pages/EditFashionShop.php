<?php

namespace App\Filament\Resources\FashionShopResource\Pages;

use App\Filament\Resources\FashionShopResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFashionShop extends EditRecord
{
    protected static string $resource = FashionShopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
