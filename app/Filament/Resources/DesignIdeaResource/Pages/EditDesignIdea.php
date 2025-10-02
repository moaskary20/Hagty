<?php

namespace App\Filament\Resources\DesignIdeaResource\Pages;

use App\Filament\Resources\DesignIdeaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDesignIdea extends EditRecord
{
    protected static string $resource = DesignIdeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
