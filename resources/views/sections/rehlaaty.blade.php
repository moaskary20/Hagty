<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قسم رحلتي - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rehlaaty-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rehlaaty-animations.css') }}">
    <style>
        body { font-family: 'Tajawal', sans-serif; }
        .primary-bg { background-color: #A15DBF; }
        .primary-text { color: #A15DBF; }
        .primary-border { border-color: #A15DBF; }
        
        .primary-color {
            color: #A15DBF;
        }
        
        .menu-item {
            transition: all 0.3s ease;
        }
        
        .menu-item:hover {
            background-color: #A15DBF;
            color: white;
            transform: scale(1.05);
        }
        
        /* إزالة التأثيرات الافتراضية للمتصفح */
        a:focus {
            outline: none !important;
        }
        
        /* تخصيص ألوان الأزرار */
        .auth-btn-primary {
            background: #A15DBF;
            color: white;
            border: none;
        }
        
        .auth-btn-primary:hover {
            background: #8B4A9C;
            color: white;
        }
        
        .auth-btn-secondary {
            background: white;
            color: #A15DBF;
            border: 2px solid #A15DBF;
        }
        
        .auth-btn-secondary:hover {
            background: #A15DBF;
            color: white;
            border-color: #A15DBF;
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
            box-shadow: 0 0 0 3px rgba(161, 93, 191, 0.3) !important;
        }
        
        .auth-btn-secondary:focus {
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(161, 93, 191, 0.3) !important;
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
            box-shadow: 0 4px 12px rgba(161, 93, 191, 0.15);
            background: linear-gradient(135deg, #FAD6E0 0%, #E6A0C3 100%);
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
            background: linear-gradient(135deg, #A15DBF 0%, #8B4A9C 100%);
            color: white;
        }
        
        .mobile-auth-btn.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(161, 93, 191, 0.3);
        }
        
        .mobile-auth-btn.secondary {
            background: white;
            color: #A15DBF;
            border: 2px solid #A15DBF;
        }
        
        .mobile-auth-btn.secondary:hover {
            background: #A15DBF;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(161, 93, 191, 0.2);
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
<body class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] min-h-screen">
    <!-- Navigation -->
    @include('components.shared-header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">✈️ قسم رحلتي</h1>
            <p class="text-xl md:text-2xl mb-8 animate-fadeInUp" style="animation-delay: 0.2s;">اكتشفي العالم مع أفضل العروض والوجهات</p>
            
            <!-- Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 mt-12">
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.3s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $hotels->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">فندق</div>
                </div>
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.4s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $tourism_offices->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">مكتب سياحي</div>
                </div>
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.5s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $travel_offers->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">عرض سفر</div>
                </div>
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.6s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $women_camps->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">معسكر نسائي</div>
                </div>
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.7s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $calendar_events->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">حدث</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- الفنادق -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🏨 الفنادق</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($hotels as $hotel)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $hotel->name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $hotel->brand }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
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
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-hotel text-4xl mb-4"></i>
                    <p>لا توجد فنادق متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- المكاتب السياحية -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🏢 المكاتب السياحية</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($tourism_offices as $office)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $office->brand }}</h3>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $office->address }}</div>
                            @if($office->phone)
                            <div><i class="fas fa-phone ml-2"></i>{{ $office->phone }}</div>
                            @endif
                            @if($office->page_url)
                            <div><i class="fas fa-globe ml-2"></i><a href="{{ $office->page_url }}" target="_blank" class="text-[#A15DBF] hover:text-[#8B4A9C]">زيارة الموقع</a></div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-building text-4xl mb-4"></i>
                    <p>لا توجد مكاتب سياحية متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- عروض السفر -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🎫 عروض السفر</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($travel_offers as $offer)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $offer->title }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $offer->destination }}</p>
                        @if($offer->description)
                        <p class="text-[#B17DC0] mb-4">{{ Str::limit($offer->description, 100) }}</p>
                        @endif
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            @if($offer->date)
                            <div><i class="fas fa-calendar ml-2"></i>{{ $offer->date }}</div>
                            @endif
                            @if($offer->price)
                            <div><i class="fas fa-tag ml-2"></i>{{ $offer->price }}</div>
                            @endif
                            @if($offer->active)
                            <div><i class="fas fa-check-circle ml-2 text-[#A15DBF]"></i>متاح</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-plane text-4xl mb-4"></i>
                    <p>لا توجد عروض سفر متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- المعسكرات النسائية -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🏕️ المعسكرات النسائية</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($women_camps as $camp)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $camp->name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $camp->location }}</p>
                        @if($camp->description)
                        <p class="text-[#B17DC0] mb-4">{{ Str::limit($camp->description, 100) }}</p>
                        @endif
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
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
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-campground text-4xl mb-4"></i>
                    <p>لا توجد معسكرات نسائية متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- الأحداث -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">📅 الأحداث</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($calendar_events as $event)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $event->name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $event->destination }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
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
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-calendar-alt text-4xl mb-4"></i>
                    <p>لا توجد أحداث متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

    </div>

    <!-- Promotional Videos Section -->
    @if(($promo_videos && $promo_videos->count() > 0) || ($promotion_videos && $promotion_videos->count() > 0))
    <section class="py-16 bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#A15DBF] mb-4 animate-fadeInUp">🎬 الفيديوهات الترويجية</h2>
                <p class="text-[#B17DC0] text-lg animate-fadeInUp" style="animation-delay: 0.2s;">شاهدي أحدث الفيديوهات الترويجية للرحلات والوجهات السياحية</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if($promo_videos && $promo_videos->count() > 0)
                    @foreach($promo_videos as $video)
                    <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                        <div class="relative">
                            <div class="aspect-video bg-gray-200 flex items-center justify-center">
                                @if($video->video_url)
                                    <iframe 
                                        src="{{ $video->video_url }}" 
                                        class="w-full h-full"
                                        frameborder="0" 
                                        allowfullscreen>
                                    </iframe>
                                @else
                                    <i class="fas fa-play-circle text-[#A15DBF] text-6xl"></i>
                                @endif
                            </div>
                            <div class="absolute top-2 right-2">
                                <span class="bg-[#A15DBF] text-white px-2 py-1 rounded-full text-xs font-semibold">
                                    ترويجي
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-[#A15DBF] mb-3">{{ $video->title }}</h3>
                            @if($video->description)
                                <p class="text-gray-700 mb-4 line-clamp-3">{{ $video->description }}</p>
                            @endif
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-[#8B4A9C]">
                                    <i class="fas fa-calendar-alt ml-1"></i>
                                    {{ $video->created_at->format('Y-m-d') }}
                                </span>
                                <div class="flex space-x-2 space-x-reverse">
                                    <button class="bg-[#A15DBF] text-white px-4 py-2 rounded-lg hover:bg-[#8B4A9C] transition-colors duration-300 text-sm">
                                        <i class="fas fa-share-alt ml-1"></i>
                                        مشاركة
                                    </button>
                                    <button class="bg-[#E6A0C3] text-[#A15DBF] px-4 py-2 rounded-lg hover:bg-[#B17DC0] transition-colors duration-300 text-sm">
                                        <i class="fas fa-heart ml-1"></i>
                                        إعجاب
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

                @if($promotion_videos && $promotion_videos->count() > 0)
                    @foreach($promotion_videos as $video)
                    <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                        <div class="relative">
                            <div class="aspect-video bg-gray-200 flex items-center justify-center">
                                @if($video->url)
                                    <iframe 
                                        src="{{ $video->url }}" 
                                        class="w-full h-full"
                                        frameborder="0" 
                                        allowfullscreen>
                                    </iframe>
                                @else
                                    <i class="fas fa-play-circle text-[#A15DBF] text-6xl"></i>
                                @endif
                            </div>
                            <div class="absolute top-2 right-2">
                                <span class="bg-[#8B4A9C] text-white px-2 py-1 rounded-full text-xs font-semibold">
                                    إعلاني
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-[#A15DBF] mb-3">{{ $video->title }}</h3>
                            @if($video->desc)
                                <p class="text-gray-700 mb-4 line-clamp-3">{{ $video->desc }}</p>
                            @endif
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-[#8B4A9C]">
                                    <i class="fas fa-calendar-alt ml-1"></i>
                                    {{ $video->created_at->format('Y-m-d') }}
                                </span>
                                <div class="flex space-x-2 space-x-reverse">
                                    <button class="bg-[#A15DBF] text-white px-4 py-2 rounded-lg hover:bg-[#8B4A9C] transition-colors duration-300 text-sm">
                                        <i class="fas fa-share-alt ml-1"></i>
                                        مشاركة
                                    </button>
                                    <button class="bg-[#E6A0C3] text-[#A15DBF] px-4 py-2 rounded-lg hover:bg-[#B17DC0] transition-colors duration-300 text-sm">
                                        <i class="fas fa-heart ml-1"></i>
                                        إعجاب
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            
            @if(($promo_videos && $promo_videos->count() > 6) || ($promotion_videos && $promotion_videos->count() > 6))
            <div class="text-center mt-8">
                <button class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-8 py-3 rounded-xl font-bold hover:from-[#8B4A9C] hover:to-[#753880] focus:outline-none focus:ring-2 focus:ring-[#A15DBF] focus:ring-offset-2 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <i class="fas fa-play-circle ml-2"></i>
                    عرض جميع الفيديوهات
                </button>
            </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#A15DBF] mb-4 animate-fadeInUp">📝 أحدث المقالات في رحلتي</h2>
                <p class="text-[#B17DC0] text-lg animate-fadeInUp" style="animation-delay: 0.2s;">نصائح وأفكار مفيدة حول السفر والرحلات</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestBlogs as $blog)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-2xl shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    @if($blog->featured_image)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ \Illuminate\Support\Str::startsWith($blog->featured_image, ['http', 'https']) ? $blog->featured_image : Storage::url($blog->featured_image) }}" 
                                 alt="{{ $blog->title }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-block bg-[#E6A0C3] text-[#A15DBF] text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-[#8B4A9C]">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-[#8B4A9C] transition-colors duration-300">
                                {{ $blog->title }}
                            </a>
                        </h3>
                        
                        <p class="text-[#B17DC0] mb-4 line-clamp-3">
                            {{ $blog->excerpt }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-[#8B4A9C]">
                                <i class="fas fa-eye ml-1"></i>
                                <span>{{ $blog->views_count }} مشاهدة</span>
                                <i class="fas fa-clock mr-2 ml-4"></i>
                                <span>{{ $blog->reading_time }} دقيقة قراءة</span>
                            </div>
                            
                            <a href="{{ route('articles.show', $blog->slug) }}" 
                               class="inline-flex items-center text-[#A15DBF] hover:text-[#8B4A9C] font-semibold transition-colors duration-300">
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
                   class="inline-flex items-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-8 py-3 rounded-lg font-bold hover:from-[#8B4A9C] hover:to-[#753880] transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl border-2 border-white" style="color: #ffffff !important; text-shadow: 2px 2px 4px rgba(0,0,0,0.8); font-family: 'Tajawal', sans-serif; text-rendering: optimizeLegibility; -webkit-font-smoothing: antialiased; font-weight: 800;">
                    <i class="fas fa-newspaper ml-2" style="color: #ffffff !important;"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')

    <!-- Rehlaaty Interactions JavaScript -->
    <script src="{{ asset('js/rehlaaty-interactions.js') }}"></script>
    
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
