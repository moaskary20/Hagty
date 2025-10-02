<?php

namespace App\Filament\Resources\DesignIdeaResource\Pages;

use App\Filament\Resources\DesignIdeaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDesignIdeas extends ListRecords
{
    protected static string $resource = DesignIdeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
