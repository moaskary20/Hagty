<?php

namespace App\Filament\Resources\SelfDevelopmentSkillResource\Pages;

use App\Filament\Resources\SelfDevelopmentSkillResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSelfDevelopmentSkill extends EditRecord
{
    protected static string $resource = SelfDevelopmentSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
