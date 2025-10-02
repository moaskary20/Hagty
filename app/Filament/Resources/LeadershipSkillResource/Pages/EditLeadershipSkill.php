<?php

namespace App\Filament\Resources\LeadershipSkillResource\Pages;

use App\Filament\Resources\LeadershipSkillResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLeadershipSkill extends EditRecord
{
    protected static string $resource = LeadershipSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
