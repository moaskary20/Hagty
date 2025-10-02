<?php

namespace App\Filament\Resources\SelfDevelopmentSkillResource\Pages;

use App\Filament\Resources\SelfDevelopmentSkillResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSelfDevelopmentSkills extends ListRecords
{
    protected static string $resource = SelfDevelopmentSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
