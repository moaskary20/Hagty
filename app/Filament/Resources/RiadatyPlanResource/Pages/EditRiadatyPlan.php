<?php

namespace App\Filament\Resources\RiadatyPlanResource\Pages;

use App\Filament\Resources\RiadatyPlanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiadatyPlan extends EditRecord
{
    protected static string $resource = RiadatyPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
