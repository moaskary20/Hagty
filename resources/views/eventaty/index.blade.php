<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ايفينتاتى - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/eventaty-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/eventaty-animations.css') }}">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #A15DBF; }
        .primary-text { color: #A15DBF; }
        .primary-border { border-color: #A15DBF; }
        
        .event-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(161, 93, 191, 0.2);
            border-color: #A15DBF;
        }
        
        .banner-slider {
            animation: slide 20s linear infinite;
        }
        
        @keyframes slide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] min-h-screen">
    <!-- Navigation -->
    @include('components.shared-header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">🎉 ايفينتاتى</h1>
            <p class="text-xl md:text-2xl mb-8 animate-fadeInUp" style="animation-delay: 0.2s;">اكتشفي أفضل الفعاليات والتجمعات الاجتماعية</p>
            
            <!-- Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12">
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.3s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $events->total() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">فعالية متاحة</div>
                </div>
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.4s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $featuredEvents->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">فعالية مميزة</div>
                </div>
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.5s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $banners->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">عرض خاص</div>
                </div>
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.6s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $videos->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">فيديو ترويجي</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Banners Section -->
    @if($banners->count() > 0)
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="flex space-x-4 space-x-reverse banner-slider">
                    @foreach($banners as $banner)
                    <div class="flex-shrink-0 w-full md:w-1/2 lg:w-1/3">
                        <a href="{{ $banner->link_url ?? '#' }}" class="block rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all">
                            <img src="{{ Storage::url($banner->banner_image) }}" alt="{{ $banner->title }}" class="w-full h-48 object-cover">
                            <div class="p-4 bg-white">
                                <h3 class="font-bold text-lg mb-2">{{ $banner->title }}</h3>
                                @if($banner->offer_description)
                                <p class="text-sm text-gray-600">{{ $banner->offer_description }}</p>
                                @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @foreach($banners as $banner)
                    <div class="flex-shrink-0 w-full md:w-1/2 lg:w-1/3">
                        <a href="{{ $banner->link_url ?? '#' }}" class="block rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all">
                            <img src="{{ Storage::url($banner->banner_image) }}" alt="{{ $banner->title }}" class="w-full h-48 object-cover">
                            <div class="p-4 bg-white">
                                <h3 class="font-bold text-lg mb-2">{{ $banner->title }}</h3>
                                @if($banner->offer_description)
                                <p class="text-sm text-gray-600">{{ $banner->offer_description }}</p>
                                @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Search Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('eventaty.search') }}" method="GET" class="bg-white rounded-lg shadow-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">البحث</label>
                        <input type="text" name="search" placeholder="ابحث عن فعالية..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">نوع الفعالية</label>
                        <select name="event_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                            <option value="">الكل</option>
                            <option value="حفلة">حفلة</option>
                            <option value="مؤتمر">مؤتمر</option>
                            <option value="ورشة عمل">ورشة عمل</option>
                            <option value="ندوة">ندوة</option>
                            <option value="معرض">معرض</option>
                            <option value="احتفالية">احتفالية</option>
                            <option value="تجمع اجتماعي">تجمع اجتماعي</option>
                            <option value="أخرى">أخرى</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">من تاريخ</label>
                        <input type="date" name="date_from" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-2 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-all">
                            <i class="fas fa-search ml-2"></i>
                            بحث
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Featured Events -->
    @if($featuredEvents->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    ✨ الفعاليات <span class="text-d94288">المميزة</span>
                </h2>
                <p class="text-gray-600 text-lg">أفضل الفعاليات المختارة خصيصاً لك</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredEvents as $event)
                <div class="event-card bg-white rounded-lg overflow-hidden shadow-lg">
                    <div class="relative">
                        <img src="{{ $event->image ? Storage::url($event->image) : 'https://via.placeholder.com/400x300?text=Event' }}" 
                             alt="{{ $event->title }}" 
                             class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-sm font-bold">
                            ⭐ مميزة
                        </div>
                    </div>
                    <div class="p-6">
                        <span class="inline-block bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs font-semibold mb-3">
                            {{ $event->event_type }}
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $event->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit($event->description, 100) }}</p>
                        
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <i class="far fa-calendar ml-2"></i>
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->format('Y/m/d - H:i') }}</span>
                        </div>
                        
                        @if($event->location)
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <i class="fas fa-map-marker-alt ml-2"></i>
                            <span>{{ $event->location }}</span>
                        </div>
                        @endif

                        <div class="flex items-center justify-between mb-4">
                            <div class="text-2xl font-bold text-d94288">
                                {{ $event->price ? number_format($event->price) . ' جنيه' : 'مجاناً' }}
                            </div>
                            @if($event->max_attendees)
                            <div class="text-sm text-gray-500">
                                {{ $event->availableSeats() }} مقعد متاح
                            </div>
                            @endif
                        </div>

                        <a href="{{ route('eventaty.show', $event->id) }}" 
                           class="block w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white text-center px-4 py-3 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-all">
                            عرض التفاصيل
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- All Events -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    📅 كل <span class="text-d94288">الفعاليات</span>
                </h2>
                <p class="text-gray-600 text-lg">اكتشف جميع الفعاليات المتاحة</p>
            </div>

            @if($events->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($events as $event)
                <div class="event-card bg-white rounded-lg overflow-hidden shadow-lg">
                    <div class="relative">
                        <img src="{{ $event->image ? Storage::url($event->image) : 'https://via.placeholder.com/400x300?text=Event' }}" 
                             alt="{{ $event->title }}" 
                             class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <span class="inline-block bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs font-semibold mb-3">
                            {{ $event->event_type }}
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $event->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit($event->description, 100) }}</p>
                        
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <i class="far fa-calendar ml-2"></i>
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->format('Y/m/d - H:i') }}</span>
                        </div>
                        
                        @if($event->location)
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <i class="fas fa-map-marker-alt ml-2"></i>
                            <span>{{ $event->location }}</span>
                        </div>
                        @endif

                        <div class="flex items-center justify-between mb-4">
                            <div class="text-2xl font-bold text-d94288">
                                {{ $event->price ? number_format($event->price) . ' جنيه' : 'مجاناً' }}
                            </div>
                            @if($event->max_attendees)
                            <div class="text-sm text-gray-500">
                                {{ $event->availableSeats() }} مقعد متاح
                            </div>
                            @endif
                        </div>

                        <a href="{{ route('eventaty.show', $event->id) }}" 
                           class="block w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white text-center px-4 py-3 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-all">
                            عرض التفاصيل
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $events->links() }}
            </div>
            @else
            <div class="text-center py-12">
                <div class="text-6xl mb-4">📅</div>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">لا توجد فعاليات حالياً</h3>
                <p class="text-gray-500">تابعنا لمعرفة الفعاليات الجديدة</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-orange-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في ايفينتاتى</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول تنظيم وإدارة الفعاليات</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestBlogs as $blog)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    @if($blog->featured_image)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ \Illuminate\Support\Str::startsWith($blog->featured_image, ['http', 'https']) ? $blog->featured_image : Storage::url($blog->featured_image) }}" 
                                 alt="{{ $blog->title }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-block bg-orange-100 text-orange-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-orange-600 transition-colors duration-300">
                                {{ $blog->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $blog->excerpt }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-eye ml-1"></i>
                                <span>{{ $blog->views_count }} مشاهدة</span>
                                <i class="fas fa-clock mr-2 ml-4"></i>
                                <span>{{ $blog->reading_time }} دقيقة قراءة</span>
                            </div>
                            
                            <a href="{{ route('articles.show', $blog->slug) }}" 
                               class="inline-flex items-center text-orange-600 hover:text-orange-700 font-semibold transition-colors duration-300">
                                اقرأ المزيد
                                <i class="fas fa-arrow-left mr-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('articles.index') }}" 
                   class="inline-flex items-center bg-gradient-to-r from-orange-600 to-red-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-orange-700 hover:to-red-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')

    <!-- Eventaty Interactions JavaScript -->
    <script src="{{ asset('js/eventaty-interactions.js') }}"></script>
</body>
</html>

