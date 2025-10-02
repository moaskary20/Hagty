<?php

namespace App\Filament\Resources\SponsorBannerResource\Pages;

use App\Filament\Resources\SponsorBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSponsorBanner extends EditRecord
{
    protected static string $resource = SponsorBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
