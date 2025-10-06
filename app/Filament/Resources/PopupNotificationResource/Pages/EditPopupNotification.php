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
            Actions\DeleteAction::make()
                ->requiresConfirmation(false)
                ->action(function ($record) {
                    try {
                        $record->delete();
                        \Filament\Notifications\Notification::make()
                            ->title('تم الحذف بنجاح')
                            ->success()
                            ->send();
                        return redirect()->route('filament.admin.resources.popup-notifications.index');
                    } catch (\Exception $e) {
                        \Filament\Notifications\Notification::make()
                            ->title('خطأ في الحذف: ' . $e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }
}
