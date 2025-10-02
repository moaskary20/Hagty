<?php

namespace App\Filament\Resources\HadietyBannerResource\Pages;

use App\Filament\Resources\HadietyBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHadietyBanner extends EditRecord
{
    protected static string $resource = HadietyBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
