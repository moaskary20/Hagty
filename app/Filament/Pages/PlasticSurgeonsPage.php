<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class PlasticSurgeonsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'أطباء جراحة التجميل';
    protected static ?string $navigationGroup = 'جمالي';
    protected static ?string $title = 'أطباء جراحة التجميل';
    protected static string $view = 'filament.pages.plastic-surgeons';

    public function getViewData(): array
    {
        $query = \App\Models\PlasticSurgeon::query();
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
        $surgeons = $query->orderBy('name')->get();
        $specialties = \App\Models\PlasticSurgeon::select('specialty')->distinct()->pluck('specialty');
        $tips = \App\Models\PlasticSurgeonTip::latest()->get();
        $videos = \App\Models\PlasticSurgeonVideoAd::latest()->get();
        return compact('surgeons','specialties','tips','videos');
    }
}
