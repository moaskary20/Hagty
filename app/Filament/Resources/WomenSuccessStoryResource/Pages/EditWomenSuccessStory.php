<?php

namespace App\Filament\Resources\WomenSuccessStoryResource\Pages;

use App\Filament\Resources\WomenSuccessStoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWomenSuccessStory extends EditRecord
{
    protected static string $resource = WomenSuccessStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
