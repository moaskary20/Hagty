<?php

namespace App\Filament\Resources\EmpowermentResource\Pages;

use App\Filament\Resources\EmpowermentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmpowerment extends EditRecord
{
    protected static string $resource = EmpowermentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
