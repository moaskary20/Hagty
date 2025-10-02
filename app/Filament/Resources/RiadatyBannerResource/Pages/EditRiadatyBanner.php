<?php

namespace App\Filament\Resources\RiadatyBannerResource\Pages;

use App\Filament\Resources\RiadatyBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiadatyBanner extends EditRecord
{
    protected static string $resource = RiadatyBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
