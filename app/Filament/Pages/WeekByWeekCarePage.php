<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\WeeklyBabyCare;
use App\Models\NutritionTip;
use App\Models\HealthWarning;

class WeekByWeekCarePage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static string $view = 'filament.pages.week-by-week-care';

    protected static ?string $title = 'العناية أسبوعياً';

    protected static ?string $navigationLabel = 'العناية أسبوعياً';

    protected static ?string $navigationGroup = 'أومومتي';

    protected static ?int $navigationSort = 2;

    public function getTitle(): string
    {
        return 'العناية أسبوعياً';
    }

    public function getHeading(): string
    {
        return 'العناية أسبوعياً - تطور الطفل والتغذية';
    }

    protected function getViewData(): array
    {
        try {
            $weeklyBabyCare = WeeklyBabyCare::with(['nutritionTips', 'healthWarnings'])
                ->where('is_active', true)
                ->orderBy('week_number')
                ->limit(42) // 42 أسبوع حمل
                ->get();

            $nutritionTips = NutritionTip::with('weeklyBabyCare')
                ->where('is_active', true)
                ->where('is_recommended', true)
                ->orderBy('category')
                ->limit(50)
                ->get();

            $healthWarnings = HealthWarning::with('weeklyBabyCare')
                ->where('is_active', true)
                ->orderBy('risk_level', 'desc')
                ->orderBy('is_critical', 'desc')
                ->limit(30)
                ->get();

            // تجميع البيانات حسب الأسابيع
            $weeklyData = [];
            for ($week = 1; $week <= 42; $week++) {
                $weekData = $weeklyBabyCare->where('week_number', $week)->first();
                $weeklyData[$week] = $weekData ?: null;
            }

            return [
                'weeklyBabyCare' => $weeklyBabyCare ?? collect(),
                'nutritionTips' => $nutritionTips ?? collect(),
                'healthWarnings' => $healthWarnings ?? collect(),
                'weeklyData' => $weeklyData,
            ];
        } catch (\Exception $e) {
            return [
                'weeklyBabyCare' => collect(),
                'nutritionTips' => collect(),
                'healthWarnings' => collect(),
                'weeklyData' => [],
            ];
        }
    }
}
