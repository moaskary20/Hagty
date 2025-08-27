<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class TrainingVideosPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'مكتبة الفيديوهات التدريبية';
    protected static ?string $navigationGroup = 'جمالي';
    protected static ?string $title = 'مكتبة الفيديوهات التدريبية';
    protected static string $view = 'filament.pages.training-videos';

    public function getViewData(): array
    {
        $query = \App\Models\TrainingVideo::query();
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('title', 'like', "%$search%")
                  ->orWhere('sector', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%")
                  ;
        }
        if (request()->filled('sector')) {
            $query->where('sector', request('sector'));
        }
        $videos = $query->orderBy('created_at', 'desc')->get();
        $sectors = \App\Models\TrainingVideo::select('sector')->distinct()->pluck('sector');
        return compact('videos','sectors');
    }
}
