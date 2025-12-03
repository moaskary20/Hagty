<?php

namespace App\Filament\Resources\MotherhoodGuideResource\Pages;

use App\Filament\Resources\MotherhoodGuideResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMotherhoodGuide extends EditRecord
{
    protected static string $resource = MotherhoodGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
