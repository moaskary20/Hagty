<?php

namespace App\Filament\Resources\FamilyPromotionalAdResource\Pages;

use App\Filament\Resources\FamilyPromotionalAdResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFamilyPromotionalAds extends ListRecords
{
    protected static string $resource = FamilyPromotionalAdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
