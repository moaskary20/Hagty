<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class NutritionDoctorsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'أطباء التغذية والحمية';
    protected static ?string $navigationGroup = 'جمالي';
    protected static ?string $title = 'أطباء التغذية والحمية';
    protected static string $view = 'filament.pages.nutrition-doctors';

    public function getViewData(): array
    {
        $query = \App\Models\NutritionDoctor::query();
        if (request()->filled('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('title', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%")
                  ->orWhere('clinic_address', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhere('profile_url', 'like', "%$search%")
                  ;
            });
        }
        if (request()->filled('specialty')) {
            $query->where('specialty', request('specialty'));
        }
        $doctors = $query->orderBy('name')->get();
        $specialties = \App\Models\NutritionDoctor::select('specialty')->distinct()->pluck('specialty');
        $tips = \App\Models\NutritionDoctorTip::latest()->get();
        $videos = \App\Models\NutritionDoctorVideoAd::latest()->get();
        return compact('doctors','specialties','tips','videos');
    }
}
