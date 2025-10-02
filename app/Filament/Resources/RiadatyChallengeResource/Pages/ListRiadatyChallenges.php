<?php

namespace App\Filament\Resources\RiadatyChallengeResource\Pages;

use App\Filament\Resources\RiadatyChallengeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRiadatyChallenges extends ListRecords
{
    protected static string $resource = RiadatyChallengeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
