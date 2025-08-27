<?php
namespace App\Filament\Resources\ForasyCourseResource\Pages;

use App\Filament\Resources\ForasyCourseResource;
use Filament\Resources\Pages\EditRecord;

class EditForasyCourse extends EditRecord
{
    protected static string $resource = ForasyCourseResource::class;
    protected static ?string $title = 'تعديل بيانات الدورة';
}
