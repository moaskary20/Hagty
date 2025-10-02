<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventBanner;
use App\Models\EventVideo;
use App\Models\EventBooking;
use App\BlogHelper;
use Illuminate\Http\Request;

class EventatyController extends Controller
{
    use BlogHelper;
    /**
     * عرض صفحة ايفينتاتى الرئيسية
     */
    public function index()
    {
        // جلب الفعاليات النشطة القادمة
        $events = Event::where('is_active', true)
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->paginate(12);

        // جلب الفعاليات المميزة
        $featuredEvents = Event::where('is_active', true)
            ->where('is_featured', true)
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(6)
            ->get();

        // جلب إعلانات البانر النشطة
        $banners = EventBanner::where('is_active', true)
            ->whereNull('valid_until')
            ->orWhere('valid_until', '>=', now())
            ->orderBy('display_order', 'asc')
            ->get();

        // جلب إعلانات الفيديو النشطة
        $videos = EventVideo::where('is_active', true)
            ->orderBy('display_order', 'asc')
            ->get();

        // Get latest 3 blogs for eventaty section
        $latestBlogs = $this->getLatestBlogsForSection('eventaty', 3);

        return view('eventaty.index', compact('events', 'featuredEvents', 'banners', 'videos', 'latestBlogs'));
    }

    /**
     * عرض تفاصيل فعالية محددة
     */
    public function show($id)
    {
        $event = Event::where('is_active', true)
            ->findOrFail($id);

        // الفعاليات ذات الصلة (نفس النوع)
        $relatedEvents = Event::where('is_active', true)
            ->where('event_type', $event->event_type)
            ->where('id', '!=', $event->id)
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        return view('eventaty.show', compact('event', 'relatedEvents'));
    }

    /**
     * نموذج الحجز
     */
    public function bookingForm($id)
    {
        $event = Event::where('is_active', true)
            ->findOrFail($id);

        // التحقق من توفر المقاعد
        if (!$event->isAvailable()) {
            return redirect()->route('eventaty.show', $event->id)
                ->with('error', 'عذراً، لا توجد مقاعد متاحة لهذه الفعالية.');
        }

        return view('eventaty.booking', compact('event'));
    }

    /**
     * معالجة الحجز
     */
    public function storeBooking(Request $request, $id)
    {
        $event = Event::where('is_active', true)
            ->findOrFail($id);

        // التحقق من توفر المقاعد
        if (!$event->isAvailable()) {
            return redirect()->route('eventaty.show', $event->id)
                ->with('error', 'عذراً، لا توجد مقاعد متاحة لهذه الفعالية.');
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'number_of_tickets' => 'required|integer|min:1',
            'special_requests' => 'nullable|string',
        ]);

        // التحقق من عدد التذاكر المتاحة
        if ($event->max_attendees && ($event->current_attendees + $validated['number_of_tickets']) > $event->max_attendees) {
            return redirect()->back()
                ->with('error', 'عذراً، عدد التذاكر المطلوبة أكبر من المقاعد المتاحة.')
                ->withInput();
        }

        // حساب المبلغ الإجمالي
        $totalAmount = ($event->price ?? 0) * $validated['number_of_tickets'];

        // إنشاء الحجز
        $booking = EventBooking::create([
            'event_id' => $event->id,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'number_of_tickets' => $validated['number_of_tickets'],
            'total_amount' => $totalAmount,
            'booking_status' => 'pending',
            'payment_status' => 'pending',
            'special_requests' => $validated['special_requests'] ?? null,
            'booking_reference' => EventBooking::generateBookingReference(),
        ]);

        // تحديث عدد الحضور
        $event->increment('current_attendees', $validated['number_of_tickets']);

        return redirect()->route('eventaty.booking.success', $booking->id)
            ->with('success', 'تم حجز التذاكر بنجاح!');
    }

    /**
     * صفحة نجاح الحجز
     */
    public function bookingSuccess($bookingId)
    {
        $booking = EventBooking::with('event')->findOrFail($bookingId);

        return view('eventaty.booking-success', compact('booking'));
    }

    /**
     * البحث في الفعاليات
     */
    public function search(Request $request)
    {
        $query = Event::where('is_active', true);

        // البحث بالعنوان
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('location', 'like', '%' . $request->search . '%');
            });
        }

        // فلترة بالنوع
        if ($request->filled('event_type')) {
            $query->where('event_type', $request->event_type);
        }

        // فلترة بالتاريخ
        if ($request->filled('date_from')) {
            $query->where('event_date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('event_date', '<=', $request->date_to);
        }

        $events = $query->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->paginate(12);

        $featuredEvents = Event::where('is_active', true)
            ->where('is_featured', true)
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(6)
            ->get();

        $banners = EventBanner::where('is_active', true)
            ->orderBy('display_order', 'asc')
            ->get();

        $videos = EventVideo::where('is_active', true)
            ->orderBy('display_order', 'asc')
            ->get();

        return view('eventaty.index', compact('events', 'featuredEvents', 'banners', 'videos'));
    }
}
