<?php

namespace App\Filament\Resources\MostasharyBannerResource\Pages;

use App\Filament\Resources\MostasharyBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMostasharyBanner extends EditRecord
{
    protected static string $resource = MostasharyBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
