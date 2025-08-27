<?php
namespace App\Filament\Resources\ForasyCourseResource\Pages;

use App\Filament\Resources\ForasyCourseResource;
use Filament\Resources\Pages\ListRecords;

class ListForasyCourses extends ListRecords
{
    protected static string $resource = ForasyCourseResource::class;
    protected static ?string $title = 'دورات Forasy';
}
