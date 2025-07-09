<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Setting;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // إزالة إمكانية الحذف للوجو
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getSavedNotificationTitle(): ?string
    {
        return 'تم تحديث اللوجو بنجاح';
    }
    
    protected function handleRecordUpdate($record, array $data): Setting
    {
        // إذا تم رفع ملف جديد
        if (isset($data['value']) && !empty($data['value'])) {
            // إضافة storage/ للمسار
            $data['value'] = 'storage/' . $data['value'];
        }
        
        $record->update($data);
        
        return $record;
    }
}
