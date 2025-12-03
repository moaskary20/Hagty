<?php

namespace App\Filament\Resources\ChildrenHospitalResource\Pages;

use App\Filament\Resources\ChildrenHospitalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChildrenHospital extends EditRecord
{
    protected static string $resource = ChildrenHospitalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
