<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class NailLashSpecialistsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'متخصصو الأظافر والرموش';
    protected static ?string $navigationGroup = 'جمالي';
    protected static ?string $title = 'متخصصو الأظافر والرموش';
    protected static string $view = 'filament.pages.nail-lash-specialists';

    public function getViewData(): array
    {
        $query = \App\Models\NailLashSpecialist::query();
        if (request()->filled('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('title', 'like', "%$search%")
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
        $specialists = $query->orderBy('name')->get();
        $specialties = \App\Models\NailLashSpecialist::select('specialty')->distinct()->pluck('specialty');
        $tips = \App\Models\NailLashSpecialistTip::latest()->get();
        $videos = \App\Models\NailLashSpecialistVideoAd::latest()->get();
        return compact('specialists','specialties','tips','videos');
    }
}
