<?php

namespace App\Filament\Resources\RiadatyNutritionResource\Pages;

use App\Filament\Resources\RiadatyNutritionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiadatyNutrition extends EditRecord
{
    protected static string $resource = RiadatyNutritionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
