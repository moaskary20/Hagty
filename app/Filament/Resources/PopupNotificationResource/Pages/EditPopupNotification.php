<?php

namespace App\Filament\Resources\PopupNotificationResource\Pages;

use App\Filament\Resources\PopupNotificationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPopupNotification extends EditRecord
{
    protected static string $resource = PopupNotificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
