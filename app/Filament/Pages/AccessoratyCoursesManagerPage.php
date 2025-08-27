<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
use App\Models\Course;
use App\Models\Student;
class AccessoratyCoursesManagerPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';
    protected static ?string $navigationLabel = 'إدارة الكورسات والطلاب';
    protected static ?string $navigationGroup = 'اكسسوراتى';
    protected static ?string $title = 'إدارة الكورسات والطلاب';
    protected static string $view = 'filament.pages.accessoraty-courses-manager';
    public function getViewData(): array
    {
        return [
            'courses' => Course::with('students')->get(),
            'students' => Student::with('course')->get(),
        ];
    }
}
