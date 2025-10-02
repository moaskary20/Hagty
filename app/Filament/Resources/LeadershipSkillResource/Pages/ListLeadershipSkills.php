<?php

namespace App\Filament\Resources\LeadershipSkillResource\Pages;

use App\Filament\Resources\LeadershipSkillResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLeadershipSkills extends ListRecords
{
    protected static string $resource = LeadershipSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
