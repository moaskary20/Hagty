<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($participations as $participation)
        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col gap-2 border border-pink-100">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-lg font-bold text-pink-700">{{ $participation->name }}</h3>
                <span class="text-xs bg-pink-100 text-pink-700 px-2 py-1 rounded">{{ $participation->city }}</span>
            </div>
            <div class="text-gray-700 text-sm mb-1">نوع النشاط: {{ $participation->activity_type }}</div>
            <div class="text-xs text-purple-700">البريد الإلكتروني: {{ $participation->email }}</div>
            <div class="text-xs text-pink-700">وصف: {{ $participation->description }}</div>
        </div>
    @endforeach
</div>
