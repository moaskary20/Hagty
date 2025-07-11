<?php
namespace App\Filament\Resources\ForasyCourseResource\Pages;

use App\Filament\Resources\ForasyCourseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateForasyCourse extends CreateRecord
{
    protected static string $resource = ForasyCourseResource::class;
    protected static ?string $title = 'إضافة دورة جديدة';
}
