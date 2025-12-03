<?php

namespace App\Filament\Resources\DeliveryPreparationResource\Pages;

use App\Filament\Resources\DeliveryPreparationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeliveryPreparations extends ListRecords
{
    protected static string $resource = DeliveryPreparationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
