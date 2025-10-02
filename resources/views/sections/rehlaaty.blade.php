<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قسم رحلتي - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #d94288; }
        .primary-text { color: #d94288; }
        .primary-border { border-color: #d94288; }
        
        .primary-color {
            color: #d94288;
        }
        
        .menu-item {
            transition: all 0.3s ease;
        }
        
        .menu-item:hover {
            background-color: #d94288;
            color: white;
            transform: scale(1.05);
        }
        
        /* إزالة التأثيرات الافتراضية للمتصفح */
        a:focus {
            outline: none !important;
        }
        
        /* تخصيص ألوان الأزرار */
        .auth-btn-primary {
            background: #d94288;
            color: white;
            border: none;
        }
        
        .auth-btn-primary:hover {
            background: #c13a7a;
            color: white;
        }
        
        .auth-btn-secondary {
            background: white;
            color: #d94288;
            border: 2px solid #d94288;
        }
        
        .auth-btn-secondary:hover {
            background: #d94288;
            color: white;
            border-color: #d94288;
        }
        
        /* منع ظهور الألوان الافتراضية للمتصفح */
        a:visited {
            color: inherit;
        }
        
        a:active {
            color: inherit;
        }
        
        /* تخصيص ألوان التركيز */
        .auth-btn-primary:focus {
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(217, 66, 136, 0.3) !important;
        }
        
        .auth-btn-secondary:focus {
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(217, 66, 136, 0.3) !important;
        }
        
        /* Mobile Menu Styles */
        .mobile-menu-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            margin: 4px 0;
            border-radius: 12px;
            text-decoration: none;
            color: #374151;
            font-weight: 500;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .mobile-menu-item:hover {
            transform: translateX(-4px);
            box-shadow: 0 4px 12px rgba(217, 66, 136, 0.15);
            background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 100%);
        }
        
        .mobile-menu-item span {
            margin-right: 12px;
            font-size: 16px;
        }
        
        .mobile-auth-btn {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 12px 16px;
            margin: 8px 0;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .mobile-auth-btn.primary {
            background: linear-gradient(135deg, #d94288 0%, #c13a7a 100%);
            color: white;
        }
        
        .mobile-auth-btn.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(217, 66, 136, 0.3);
        }
        
        .mobile-auth-btn.secondary {
            background: white;
            color: #d94288;
            border: 2px solid #d94288;
        }
        
        .mobile-auth-btn.secondary:hover {
            background: #d94288;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(217, 66, 136, 0.2);
        }
        
        .mobile-auth-btn span {
            margin-right: 12px;
        }
        
        /* Mobile Menu Animation */
        #mobile-menu {
            animation: slideDown 0.3s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
    <!-- Navigation -->
    @include('components.shared-header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">✈️ قسم رحلتي</h1>
            <p class="text-xl md:text-2xl mb-8">اكتشفي العالم مع أفضل العروض والوجهات</p>
            
            <!-- Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 mt-12">
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $hotels->count() }}</div>
                    <div class="text-sm">فندق</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $tourism_offices->count() }}</div>
                    <div class="text-sm">مكتب سياحي</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $travel_offers->count() }}</div>
                    <div class="text-sm">عرض سفر</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $women_camps->count() }}</div>
                    <div class="text-sm">معسكر نسائي</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $calendar_events->count() }}</div>
                    <div class="text-sm">حدث</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- الفنادق -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🏨 الفنادق</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($hotels as $hotel)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $hotel->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $hotel->brand }}</p>
                        <div class="space-y-2 text-sm text-gray-500">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $hotel->location }}</div>
                            @if($hotel->offers)
                            <div><i class="fas fa-gift ml-2"></i>{{ $hotel->offers }}</div>
                            @endif
                            @if($hotel->status)
                            <div><i class="fas fa-info-circle ml-2"></i>{{ $hotel->status }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-hotel text-4xl mb-4"></i>
                    <p>لا توجد فنادق متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- المكاتب السياحية -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🏢 المكاتب السياحية</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($tourism_offices as $office)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $office->brand }}</h3>
                        <div class="space-y-2 text-sm text-gray-500">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $office->address }}</div>
                            @if($office->phone)
                            <div><i class="fas fa-phone ml-2"></i>{{ $office->phone }}</div>
                            @endif
                            @if($office->page_url)
                            <div><i class="fas fa-globe ml-2"></i><a href="{{ $office->page_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">زيارة الموقع</a></div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-building text-4xl mb-4"></i>
                    <p>لا توجد مكاتب سياحية متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- عروض السفر -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🎫 عروض السفر</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($travel_offers as $offer)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $offer->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $offer->destination }}</p>
                        @if($offer->description)
                        <p class="text-gray-600 mb-4">{{ Str::limit($offer->description, 100) }}</p>
                        @endif
                        <div class="space-y-2 text-sm text-gray-500">
                            @if($offer->date)
                            <div><i class="fas fa-calendar ml-2"></i>{{ $offer->date }}</div>
                            @endif
                            @if($offer->price)
                            <div><i class="fas fa-tag ml-2"></i>{{ $offer->price }}</div>
                            @endif
                            @if($offer->active)
                            <div><i class="fas fa-check-circle ml-2 text-green-500"></i>متاح</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-plane text-4xl mb-4"></i>
                    <p>لا توجد عروض سفر متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- المعسكرات النسائية -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🏕️ المعسكرات النسائية</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($women_camps as $camp)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $camp->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $camp->location }}</p>
                        @if($camp->description)
                        <p class="text-gray-600 mb-4">{{ Str::limit($camp->description, 100) }}</p>
                        @endif
                        <div class="space-y-2 text-sm text-gray-500">
                            @if($camp->contact)
                            <div><i class="fas fa-phone ml-2"></i>{{ $camp->contact }}</div>
                            @endif
                            @if($camp->status)
                            <div><i class="fas fa-info-circle ml-2"></i>{{ $camp->status }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-campground text-4xl mb-4"></i>
                    <p>لا توجد معسكرات نسائية متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- الأحداث -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">📅 الأحداث</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($calendar_events as $event)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $event->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $event->destination }}</p>
                        <div class="space-y-2 text-sm text-gray-500">
                            @if($event->date)
                            <div><i class="fas fa-calendar ml-2"></i>{{ $event->date }}</div>
                            @endif
                            @if($event->status)
                            <div><i class="fas fa-info-circle ml-2"></i>{{ $event->status }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-calendar-alt text-4xl mb-4"></i>
                    <p>لا توجد أحداث متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

    </div>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في رحلتي</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول السفر والرحلات</p>
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
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-blue-600 transition-colors duration-300">
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
                               class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold transition-colors duration-300">
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
                   class="inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')

    <!-- Mobile Menu JavaScript -->
    <script>
        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
            
            // Close mobile menu when clicking on a link
            const mobileMenuLinks = mobileMenu.querySelectorAll('a');
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                });
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }
    </script>
</body>
</html>
