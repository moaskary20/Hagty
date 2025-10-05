<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قسم الزفاف - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wedding-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wedding-animations.css') }}">
    <style>
        body { font-family: 'Cairo', sans-serif; }
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
        
        /* Mobile menu styles */
        .mobile-menu-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: #374151;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin-bottom: 4px;
        }
        
        .mobile-menu-item:hover {
            background-color: #f3f4f6;
            color: #A15DBF;
            transform: translateX(-4px);
        }
        
        .mobile-menu-item.active {
            background-color: #A15DBF;
            color: white;
        }
        
        .mobile-menu-item span {
            margin-right: 12px;
            font-weight: 500;
        }
        
        .mobile-auth-btn {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 12px 16px;
            margin-bottom: 8px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .mobile-auth-btn.primary {
            background: linear-gradient(135deg, #A15DBF, #8B4A9C);
            color: white;
        }
        
        .mobile-auth-btn.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(161, 93, 191, 0.3);
        }
        
        .mobile-auth-btn.secondary {
            background: white;
            color: #A15DBF;
            border: 2px solid #A15DBF;
        }
        
        .mobile-auth-btn.secondary:hover {
            background: #A15DBF;
            color: white;
        }
        
        .mobile-auth-btn span {
            margin-right: 12px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] min-h-screen">
    <!-- Navigation -->
    @include('components.shared-header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">💒 قسم الزفاف</h1>
            <p class="text-xl md:text-2xl mb-8 animate-fadeInUp" style="animation-delay: 0.2s;">كل ما تحتاجينه لحفل زفاف أحلامك</p>
            
            <!-- Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 mt-12">
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.3s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $wedding_designers->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">مصممي فساتين</div>
                </div>
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.4s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $wedding_planners->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">منظمي حفلات</div>
                </div>
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.5s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $makeup_artists->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">فناني مكياج</div>
                </div>
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.6s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $wedding_venues->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">قاعات حفلات</div>
                </div>
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.7s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $wedding_photographers->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">مصورين</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Form -->
    @include('components.wedding-search-form')

    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- مصممي فساتين الزفاف -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">👗 مصممي فساتين الزفاف</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($wedding_designers as $designer)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $designer->name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $designer->description }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $designer->address }}</div>
                            <div><i class="fas fa-phone ml-2"></i>{{ $designer->whatsapp_number }}</div>
                            @if($designer->website_url)
                            <div><i class="fas fa-globe ml-2"></i><a href="{{ $designer->website_url }}" class="text-[#A15DBF] hover:text-[#8B4A9C]">الموقع الإلكتروني</a></div>
                            @endif
                        </div>
                        @if($designer->specialty)
                        <div class="mt-4">
                            <span class="bg-[#E6A0C3] text-[#A15DBF] px-3 py-1 rounded-full text-sm">{{ $designer->specialty }}</span>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-search text-4xl mb-4"></i>
                    <p>لا توجد مصممات فساتين متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- منظمي الحفلات -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🎉 منظمي الحفلات</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($wedding_planners as $planner)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $planner->name }}</h3>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $planner->location }}</div>
                            <div><i class="fas fa-phone ml-2"></i>{{ $planner->phone }}</div>
                            @if($planner->package)
                            <div><i class="fas fa-gift ml-2"></i>{{ $planner->package }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-calendar text-4xl mb-4"></i>
                    <p>لا يوجد منظمي حفلات متاحين حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- فناني المكياج -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">💄 فناني المكياج</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($makeup_artists as $artist)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $artist->name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $artist->description }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $artist->address }}</div>
                            <div><i class="fas fa-phone ml-2"></i>{{ $artist->phone }}</div>
                            @if($artist->profile_url)
                            <div><i class="fas fa-globe ml-2"></i><a href="{{ $artist->profile_url }}" class="text-[#A15DBF] hover:text-[#8B4A9C]">الملف الشخصي</a></div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-palette text-4xl mb-4"></i>
                    <p>لا يوجد فناني مكياج متاحين حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- قاعات الحفلات -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🏰 قاعات الحفلات</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($wedding_venues as $venue)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $venue->name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $venue->description }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $venue->address }}</div>
                            <div><i class="fas fa-star ml-2"></i>{{ $venue->stars }} نجوم</div>
                            <div><i class="fas fa-users ml-2"></i>سعة {{ $venue->capacity }} شخص</div>
                            <div><i class="fas fa-dollar-sign ml-2"></i>{{ $venue->price_range_min }}-{{ $venue->price_range_max }} ريال للشخص</div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-building text-4xl mb-4"></i>
                    <p>لا توجد قاعات حفلات متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- خدمات التموين -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🍽️ خدمات التموين</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($catering_services as $catering)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $catering->company_name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $catering->description }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $catering->address }}</div>
                            <div><i class="fas fa-phone ml-2"></i>{{ is_array($catering->phone_numbers) ? $catering->phone_numbers[0] : ($catering->phone_numbers ? json_decode($catering->phone_numbers)[0] : 'غير متوفر') }}</div>
                            <div><i class="fas fa-users ml-2"></i>أقل عدد ضيوف: {{ $catering->min_guests }}</div>
                            <div><i class="fas fa-dollar-sign ml-2"></i>أقل طلبية: {{ $catering->min_order_value }} ريال</div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-utensils text-4xl mb-4"></i>
                    <p>لا توجد خدمات تموين متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- المصورين -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">📸 المصورين</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($wedding_photographers as $photographer)
                <div class="bg-[#FAD6E0] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $photographer->name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $photographer->description }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            <div><i class="fas fa-camera ml-2"></i>{{ $photographer->specialty }}</div>
                            <div><i class="fas fa-phone ml-2"></i>{{ is_array($photographer->phone_numbers) ? $photographer->phone_numbers[0] : ($photographer->phone_numbers ? json_decode($photographer->phone_numbers)[0] : 'غير متوفر') }}</div>
                            <div><i class="fas fa-dollar-sign ml-2"></i>{{ $photographer->price_range_min }}-{{ $photographer->price_range_max }} ريال</div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-camera text-4xl mb-4"></i>
                    <p>لا يوجد مصورين متاحين حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

    </div>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#A15DBF] mb-4 animate-fadeInUp">📝 أحدث المقالات في الزفاف</h2>
                <p class="text-[#B17DC0] text-lg animate-fadeInUp" style="animation-delay: 0.2s;">نصائح وأفكار مفيدة حول الزفاف والاحتفالات</p>
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
                   class="inline-flex items-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-8 py-3 rounded-lg font-bold hover:from-[#8B4A9C] hover:to-[#753880] transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl border-2 border-white" style="color: #ffffff !important; text-shadow: 2px 2px 4px rgba(0,0,0,0.8); font-family: 'Cairo', sans-serif; text-rendering: optimizeLegibility; -webkit-font-smoothing: antialiased; font-weight: 800;">
                    <i class="fas fa-newspaper ml-2" style="color: #ffffff !important;"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')

    <!-- Wedding Interactions JavaScript -->
    <script src="{{ asset('js/wedding-interactions.js') }}"></script>
    
    <!-- Mobile Menu JavaScript -->
    <script>
        // Mobile menu functionality
        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener("click", function() {
                mobileMenu.classList.toggle("hidden");
            });
            
            // Close mobile menu when clicking on a link
            const mobileMenuLinks = mobileMenu.querySelectorAll("a");
            mobileMenuLinks.forEach(link => {
                link.addEventListener("click", function() {
                    mobileMenu.classList.add("hidden");
                });
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener("click", function(event) {
                if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add("hidden");
                }
            });
        }
    </script>
</body>
</html>
