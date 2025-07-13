<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class SpaClinicsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'عيادات SPA';
    protected static ?string $navigationGroup = 'جمالي';
    protected static ?string $title = 'عيادات SPA';
    protected static string $view = 'filament.pages.spa-clinics';

    public function getViewData(): array
    {
        $query = \App\Models\SpaClinic::query();
        if (request()->filled('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%")
                  ->orWhere('center_address', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhere('profile_url', 'like', "%$search%")
                  ;
            });
        }
        if (request()->filled('specialty')) {
            $query->where('specialty', request('specialty'));
        }
        $clinics = $query->orderBy('name')->get();
        $specialties = \App\Models\SpaClinic::select('specialty')->distinct()->pluck('specialty');
        $tips = \App\Models\SpaClinicTip::latest()->get();
        $videos = \App\Models\SpaClinicVideoAd::latest()->get();
        return compact('clinics','specialties','tips','videos');
    }
}
