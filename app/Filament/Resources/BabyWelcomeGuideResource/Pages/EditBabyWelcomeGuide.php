<?php

namespace App\Filament\Resources\BabyWelcomeGuideResource\Pages;

use App\Filament\Resources\BabyWelcomeGuideResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBabyWelcomeGuide extends EditRecord
{
    protected static string $resource = BabyWelcomeGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
