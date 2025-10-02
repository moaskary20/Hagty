<?php

namespace App\Filament\Resources\FundingOptionResource\Pages;

use App\Filament\Resources\FundingOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFundingOption extends EditRecord
{
    protected static string $resource = FundingOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
