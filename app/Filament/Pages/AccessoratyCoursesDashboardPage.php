<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
use App\Models\Course;
use App\Models\Student;
class AccessoratyCoursesDashboardPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'لوحة تحكم الكورسات التعليمية';
    protected static ?string $navigationGroup = 'اكسسوراتى';
    protected static ?string $title = 'لوحة تحكم الكورسات التعليمية';
    protected static string $view = 'filament.pages.accessoraty-courses-dashboard';
    public function getViewData(): array
    {
        return [
            'courses_count' => Course::count(),
            'students_count' => Student::count(),
            'courses' => Course::withCount('students')->get(),
        ];
    }
}
