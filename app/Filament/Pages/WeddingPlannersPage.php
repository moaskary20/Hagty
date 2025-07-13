<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class WeddingPlannersPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationLabel = 'منظّمي حفلات الزفاف';
    protected static ?string $navigationGroup = 'فرحي';
    protected static ?string $title = 'منظّمي حفلات الزفاف';
    protected static string $view = 'filament.pages.wedding-planners';

    public function getViewData(): array
    {
        $query = \App\Models\WeddingPlanner::query();
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('brand', 'like', "%$search%")
                  ->orWhere('venue', 'like', "%$search%")
                  ->orWhere('package', 'like', "%$search%")
                  ;
        }
        $planners = $query->orderBy('name')->get();
        return compact('planners');
    }
}
