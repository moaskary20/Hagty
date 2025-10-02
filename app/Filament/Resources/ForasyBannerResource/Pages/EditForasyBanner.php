<?php

namespace App\Filament\Resources\ForasyBannerResource\Pages;

use App\Filament\Resources\ForasyBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditForasyBanner extends EditRecord
{
    protected static string $resource = ForasyBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
