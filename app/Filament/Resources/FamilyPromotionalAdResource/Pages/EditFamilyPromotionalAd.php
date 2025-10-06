<?php

namespace App\Filament\Resources\FamilyPromotionalAdResource\Pages;

use App\Filament\Resources\FamilyPromotionalAdResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFamilyPromotionalAd extends EditRecord
{
    protected static string $resource = FamilyPromotionalAdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
