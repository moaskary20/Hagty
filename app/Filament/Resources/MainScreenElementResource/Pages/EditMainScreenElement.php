<?php

namespace App\Filament\Resources\MainScreenElementResource\Pages;

use App\Filament\Resources\MainScreenElementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMainScreenElement extends EditRecord
{
    protected static string $resource = MainScreenElementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
