<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\MaternityDoctor;
use App\Models\CheckupReminder;
use App\Models\DeliveryAlert;
use App\Models\HospitalAssignment;

class DoctorFollowUpPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static string $view = 'filament.pages.doctor-follow-up';

    protected static ?string $title = 'متابعة الطبيب';

    protected static ?string $navigationLabel = 'متابعة الطبيب';

    protected static ?string $navigationGroup = 'أومومتي';

    protected static ?int $navigationSort = 1;

    public function getTitle(): string
    {
        return 'متابعة الطبيب';
    }

    public function getHeading(): string
    {
        return 'متابعة الطبيب - قائمة أطباء الأمومة';
    }

    protected function getViewData(): array
    {
        try {
            $doctors = MaternityDoctor::with(['checkupReminders', 'deliveryAlerts', 'hospitalAssignments'])
                ->where('is_active', true)
                ->orderBy('is_featured', 'desc')
                ->orderBy('rating', 'desc')
                ->limit(50)
                ->get();

            $checkupReminders = CheckupReminder::with('doctor')
                ->where('is_active', true)
                ->where('reminder_date', '>=', now())
                ->orderBy('reminder_date')
                ->limit(20)
                ->get();

            $deliveryAlerts = DeliveryAlert::with('doctor')
                ->where('is_active', true)
                ->where('delivery_date', '>=', now())
                ->orderBy('delivery_date')
                ->limit(20)
                ->get();

            $hospitalAssignments = HospitalAssignment::with('doctor')
                ->where('is_active', true)
                ->orderBy('is_primary', 'desc')
                ->limit(30)
                ->get();

            return [
                'doctors' => $doctors ?? collect(),
                'checkupReminders' => $checkupReminders ?? collect(),
                'deliveryAlerts' => $deliveryAlerts ?? collect(),
                'hospitalAssignments' => $hospitalAssignments ?? collect(),
            ];
        } catch (\Exception $e) {
            return [
                'doctors' => collect(),
                'checkupReminders' => collect(),
                'deliveryAlerts' => collect(),
                'hospitalAssignments' => collect(),
            ];
        }
    }
}
