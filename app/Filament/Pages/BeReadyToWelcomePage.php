<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\DeliveryPreparation;
use App\Models\HospitalBag;
use App\Models\BabyShowerItem;

class BeReadyToWelcomePage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static string $view = 'filament.pages.be-ready-to-welcome';

    protected static ?string $title = 'استعدي لاستقبال...';

    protected static ?string $navigationLabel = 'استعدي لاستقبال...';

    protected static ?string $navigationGroup = 'أومومتي';

    protected static ?int $navigationSort = 3;

    public function getTitle(): string
    {
        return 'استعدي لاستقبال طفلك';
    }

    public function getHeading(): string
    {
        return 'استعدي لاستقبال طفلك - نصائح ومستلزمات الولادة';
    }

    protected function getViewData(): array
    {
        try {
            $deliveryPreparations = DeliveryPreparation::with(['hospitalBags', 'babyShowerItems'])
                ->where('is_active', true)
                ->orderBy('is_featured', 'desc')
                ->orderBy('importance_level', 'desc')
                ->limit(30)
                ->get();

            $hospitalBags = HospitalBag::with('deliveryPreparation')
                ->where('is_active', true)
                ->orderBy('priority_level', 'desc')
                ->limit(20)
                ->get();

            $babyShowerItems = BabyShowerItem::with('deliveryPreparation')
                ->where('is_active', true)
                ->orderBy('is_essential', 'desc')
                ->orderBy('importance_rating', 'desc')
                ->limit(50)
                ->get();

            // تجميع البيانات حسب الفئات
            $preparationsByCategory = $deliveryPreparations->groupBy('category');
            $bagsByType = $hospitalBags->groupBy('bag_type');
            $itemsByCategory = $babyShowerItems->groupBy('category');

            return [
                'deliveryPreparations' => $deliveryPreparations ?? collect(),
                'hospitalBags' => $hospitalBags ?? collect(),
                'babyShowerItems' => $babyShowerItems ?? collect(),
                'preparationsByCategory' => $preparationsByCategory ?? collect(),
                'bagsByType' => $bagsByType ?? collect(),
                'itemsByCategory' => $itemsByCategory ?? collect(),
            ];
        } catch (\Exception $e) {
            return [
                'deliveryPreparations' => collect(),
                'hospitalBags' => collect(),
                'babyShowerItems' => collect(),
                'preparationsByCategory' => collect(),
                'bagsByType' => collect(),
                'itemsByCategory' => collect(),
            ];
        }
    }
}
