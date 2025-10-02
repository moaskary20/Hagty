<?php

namespace App\Filament\Resources\WomenSuccessStoryResource\Pages;

use App\Filament\Resources\WomenSuccessStoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWomenSuccessStories extends ListRecords
{
    protected static string $resource = WomenSuccessStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
