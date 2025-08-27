<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\WeddingDressDesigner;
use App\Models\DesignerVideoAd;
use App\Models\DesignerBanner;
use App\Models\DesignerOffer;
use App\Models\DesignerReference;

class WeddingDressDesignersPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static string $view = 'filament.pages.wedding-dress-designers';

    protected static ?string $title = 'ورش ومصممو فساتين الزفاف';

    protected static ?string $navigationLabel = 'مصممو فساتين الزفاف';

    protected static ?string $navigationGroup = 'فرحي';

    protected static ?int $navigationSort = 2;

    public function getTitle(): string
    {
        return 'ورش ومصممو فساتين الزفاف';
    }

    public function getHeading(): string
    {
        return 'ورش ومصممو فساتين الزفاف';
    }

    protected function getViewData(): array
    {
        try {
            $designers = WeddingDressDesigner::with(['offers', 'videoAds', 'designBanners', 'references'])
                ->where('is_active', true)
                ->orderBy('is_featured', 'desc')
                ->orderBy('rating', 'desc')
                ->limit(20)
                ->get();

            $videoAds = DesignerVideoAd::with('designer')
                ->where('is_active', true)
                ->where('start_date', '<=', now())
                ->where('end_date', '>=', now())
                ->orderBy('priority_order')
                ->limit(5)
                ->get();

            $banners = DesignerBanner::with('designer')
                ->where('is_active', true)
                ->orderBy('display_order')
                ->limit(10)
                ->get();

            $offers = DesignerOffer::with('designer')
                ->where('is_active', true)
                ->where('start_date', '<=', now())
                ->where('end_date', '>=', now())
                ->orderBy('discount_percentage', 'desc')
                ->limit(15)
                ->get();

            return [
                'designers' => $designers ?? collect(),
                'videoAds' => $videoAds ?? collect(),
                'banners' => $banners ?? collect(),
                'offers' => $offers ?? collect(),
            ];
        } catch (\Exception $e) {
            // في حالة حدوث خطأ، إرجاع مجموعات فارغة
            return [
                'designers' => collect(),
                'videoAds' => collect(),
                'banners' => collect(),
                'offers' => collect(),
            ];
        }
    }
}
