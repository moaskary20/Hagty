<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class SkinCareDoctorsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'أطباء العناية بالبشرة';
    protected static ?string $navigationGroup = 'جمالي';
    protected static ?string $title = 'أطباء العناية بالبشرة';
    protected static string $view = 'filament.pages.skin-care-doctors';

    public function getViewData(): array
    {
        $query = \App\Models\SkinCareDoctor::query();
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
        $specialties = \App\Models\SkinCareDoctor::select('specialty')->distinct()->pluck('specialty');
        $tips = \App\Models\SkinCareDoctorTip::latest()->get();
        $videos = \App\Models\SkinCareDoctorVideoAd::latest()->get();
        return compact('doctors','specialties','tips','videos');
    }
}
