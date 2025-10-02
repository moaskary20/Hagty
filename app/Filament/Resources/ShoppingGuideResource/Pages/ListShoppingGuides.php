<?php

namespace App\Filament\Resources\ShoppingGuideResource\Pages;

use App\Filament\Resources\ShoppingGuideResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShoppingGuides extends ListRecords
{
    protected static string $resource = ShoppingGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
