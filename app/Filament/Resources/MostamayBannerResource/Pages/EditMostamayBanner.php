<?php

namespace App\Filament\Resources\MostamayBannerResource\Pages;

use App\Filament\Resources\MostamayBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMostamayBanner extends EditRecord
{
    protected static string $resource = MostamayBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
