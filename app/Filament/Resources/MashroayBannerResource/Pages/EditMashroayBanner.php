<?php

namespace App\Filament\Resources\MashroayBannerResource\Pages;

use App\Filament\Resources\MashroayBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMashroayBanner extends EditRecord
{
    protected static string $resource = MashroayBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
