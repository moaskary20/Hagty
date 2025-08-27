<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($bookings as $booking)
        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col gap-2 border border-pink-100">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-lg font-bold text-pink-700">{{ $booking->participant_name }}</h3>
                <span class="text-xs bg-pink-100 text-pink-700 px-2 py-1 rounded">{{ $booking->city }}</span>
            </div>
            <div class="text-gray-700 text-sm mb-1">مشروع: {{ $booking->project_name }}</div>
            <div class="flex gap-2 text-xs text-gray-500">
                <span>تاريخ الحجز: {{ $booking->date }}</span>
                <span>عدد الأيام: {{ $booking->days }}</span>
            </div>
            <div class="text-xs text-purple-700">بازار: {{ $booking->bazaar->name ?? '-' }}</div>
            <div class="text-xs text-pink-700">ملاحظات: {{ $booking->notes }}</div>
        </div>
    @endforeach
</div>
