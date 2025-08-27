<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتائج البحث في قسم الصحة - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #d94288; }
        .primary-text { color: #d94288; }
        .primary-border { border-color: #d94288; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="primary-bg text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold">HAGTY</a>
                </div>
                <div class="hidden md:flex space-x-8 space-x-reverse">
                    <a href="{{ route('home') }}" class="hover:text-pink-200 transition duration-300">الرئيسية</a>
                    <a href="{{ route('section', 'health') }}" class="hover:text-pink-200 transition duration-300 font-bold">الصحة</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Search Results -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Search Form -->
        @include('components.health-search-form')

        <!-- Results Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">🔍 نتائج البحث في قسم الصحة</h1>
                <p class="text-gray-600 mb-4">نتائج البحث عن: <span class="font-semibold text-d94288">{{ $query }}</span></p>
                <p class="text-sm text-gray-500">تم العثور على {{ $totalResults }} نتيجة</p>
            </div>
        </div>

        <!-- Results -->
        <div class="space-y-8">
            <!-- Doctors -->
            @if($results['doctors']->count() > 0)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">👨‍⚕️ الأطباء ({{ $results['doctors']->count() }})</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($results['doctors'] as $doctor)
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                        <div class="flex items-center mb-3">
                            <img src="{{ $doctor->image_url }}" alt="{{ $doctor->full_name }}" class="w-12 h-12 rounded-full mr-3">
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ $doctor->full_name }}</h3>
                                <p class="text-sm text-gray-600">{{ $doctor->specialty }}</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">{{ $doctor->clinic_address }}</p>
                        @if($doctor->booking_url)
                        <a href="{{ $doctor->booking_url }}" target="_blank" class="text-d94288 text-sm hover:underline">حجز موعد</a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Hospitals -->
            @if($results['hospitals']->count() > 0)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">🏥 المستشفيات ({{ $results['hospitals']->count() }})</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($results['hospitals'] as $hospital)
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                        <h3 class="font-semibold text-gray-800 mb-2">{{ $hospital->name }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ $hospital->specialty }}</p>
                        <p class="text-sm text-gray-600 mb-2">{{ $hospital->address }}</p>
                        <p class="text-sm text-gray-600 mb-2">الهاتف: {{ $hospital->phone }}</p>
                        @if($hospital->booking_link)
                        <a href="{{ $hospital->booking_link }}" target="_blank" class="text-d94288 text-sm hover:underline">حجز موعد</a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Pharmacies -->
            @if($results['pharmacies']->count() > 0)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">💊 الصيدليات ({{ $results['pharmacies']->count() }})</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($results['pharmacies'] as $pharmacy)
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                        <h3 class="font-semibold text-gray-800 mb-2">{{ $pharmacy->name }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ $pharmacy->address }}</p>
                        <p class="text-sm text-gray-600 mb-2">الهاتف: {{ $pharmacy->phone }}</p>
                        @if($pharmacy->online_order_link)
                        <a href="{{ $pharmacy->online_order_link }}" target="_blank" class="text-d94288 text-sm hover:underline">طلب أونلاين</a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Health Tips -->
            @if($results['health_tips']->count() > 0)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">💡 النصائح الصحية ({{ $results['health_tips']->count() }})</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($results['health_tips'] as $tip)
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                        <h3 class="font-semibold text-gray-800 mb-2">{{ $tip->title }}</h3>
                        @if($tip->description)
                        <p class="text-sm text-gray-600 mb-2">{{ $tip->description }}</p>
                        @endif
                        <p class="text-sm text-gray-500">النوع: {{ $tip->type }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- No Results -->
            @if($totalResults == 0)
            <div class="bg-white rounded-lg shadow-md p-8 text-center">
                <div class="text-6xl mb-4">🔍</div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">لم يتم العثور على نتائج</h2>
                <p class="text-gray-600 mb-6">جرب البحث بكلمات مختلفة أو تصفح جميع المحتويات</p>
                <a href="{{ route('section', 'health') }}" class="bg-d94288 text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                    تصفح قسم الصحة
                </a>
            </div>
            @endif
        </div>
    </div>
</body>
</html>
