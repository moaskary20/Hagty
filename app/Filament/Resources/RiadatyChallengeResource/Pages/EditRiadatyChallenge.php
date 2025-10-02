<?php

namespace App\Filament\Resources\RiadatyChallengeResource\Pages;

use App\Filament\Resources\RiadatyChallengeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiadatyChallenge extends EditRecord
{
    protected static string $resource = RiadatyChallengeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
