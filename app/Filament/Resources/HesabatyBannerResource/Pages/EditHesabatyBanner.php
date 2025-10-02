<?php

namespace App\Filament\Resources\HesabatyBannerResource\Pages;

use App\Filament\Resources\HesabatyBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHesabatyBanner extends EditRecord
{
    protected static string $resource = HesabatyBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
