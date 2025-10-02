<?php

namespace App\Filament\Resources\CareerAdviceResource\Pages;

use App\Filament\Resources\CareerAdviceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCareerAdvice extends EditRecord
{
    protected static string $resource = CareerAdviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
