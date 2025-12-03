<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قسم الجمال - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/beauty-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/beauty-animations.css') }}">
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
<body class="bg-white min-h-screen">
    <!-- Navigation -->
    @include('components.shared-header')

    <!-- Statistics Section -->
    <section class="py-20 relative overflow-hidden" style="background: linear-gradient(135deg, #9345ab 0%, #7a3690 100%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 text-white animate-fadeInUp">💄 قسم الجمال</h1>
            <p class="text-xl md:text-2xl mb-12 text-white opacity-90 animate-fadeInUp" style="animation-delay: 0.2s;">كل ما تحتاجينه للعناية بجمالك</p>
            
            <!-- Statistics Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl p-6 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.3s;">
                    <div class="text-4xl font-black text-center mb-2" style="color: #9345ab;">{{ $plastic_surgeons->count() }}</div>
                    <div class="text-sm font-bold text-center text-gray-600">جراحي تجميل</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.4s;">
                    <div class="text-4xl font-black text-center mb-2" style="color: #9345ab;">{{ $hair_stylists->count() }}</div>
                    <div class="text-sm font-bold text-center text-gray-600">مصففي شعر</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.5s;">
                    <div class="text-4xl font-black text-center mb-2" style="color: #9345ab;">{{ $beauty_shops->count() }}</div>
                    <div class="text-sm font-bold text-center text-gray-600">متاجر جمال</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.6s;">
                    <div class="text-4xl font-black text-center mb-2" style="color: #9345ab;">{{ $training_videos->count() }}</div>
                    <div class="text-sm font-bold text-center text-gray-600">فيديوهات تدريب</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Form -->
    @include('components.beauty-search-form')

    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- جراحي التجميل -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🔪 جراحي التجميل</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($plastic_surgeons as $surgeon)
                <div class="bg-[#FFFFFF] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $surgeon->first_name }} {{ $surgeon->last_name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $surgeon->clinic_address }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $surgeon->clinic_address }}</div>
                            <div><i class="fas fa-phone ml-2"></i>{{ $surgeon->phone }}</div>
                            @if($surgeon->specialty)
                            <div><i class="fas fa-stethoscope ml-2"></i>{{ $surgeon->specialty }}</div>
                            @endif
                        </div>
                        @if($surgeon->rating)
                        <div class="mt-4">
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $surgeon->rating)
                                        <i class="fas fa-star text-[#A15DBF]"></i>
                                    @elseif($i - 0.5 <= $surgeon->rating)
                                        <i class="fas fa-star-half-alt text-[#A15DBF]"></i>
                                    @else
                                        <i class="far fa-star text-[#A15DBF]"></i>
                                    @endif
                                @endfor
                                <span class="mr-2 text-sm text-[#8B4A9C]">{{ number_format($surgeon->rating, 1) }}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-user-md text-4xl mb-4"></i>
                    <p>لا يوجد جراحي تجميل متاحين حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- مصففي الشعر -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">💇‍♀️ مصففي الشعر</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($hair_stylists as $stylist)
                <div class="bg-[#FFFFFF] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $stylist->name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $stylist->description }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $stylist->address }}</div>
                            <div><i class="fas fa-phone ml-2"></i>{{ $stylist->phone }}</div>
                            @if($stylist->specialty)
                            <div><i class="fas fa-cut ml-2"></i>{{ $stylist->specialty }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-cut text-4xl mb-4"></i>
                    <p>لا يوجد مصففي شعر متاحين حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- متاجر الجمال -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🛍️ متاجر الجمال</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($beauty_shops as $shop)
                <div class="bg-[#FFFFFF] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $shop->brand_name }}</h3>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $shop->location }}</div>
                            @if($shop->shop_url)
                            <div><i class="fas fa-globe ml-2"></i><a href="{{ $shop->shop_url }}" target="_blank" class="text-[#A15DBF] hover:text-[#8B4A9C]">زيارة الموقع</a></div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-shopping-bag text-4xl mb-4"></i>
                    <p>لا توجد متاجر جمال متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- فيديوهات التدريب -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🎥 فيديوهات التدريب</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($training_videos as $video)
                <div class="bg-[#FFFFFF] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $video->عنوان_الفيديو }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $video->وصف_الفيديو }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            <div><i class="fas fa-clock ml-2"></i>{{ $video->مدة_الفيديو }}</div>
                            @if($video->نوع_الفيديو)
                            <div><i class="fas fa-tag ml-2"></i>{{ $video->نوع_الفيديو }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-video text-4xl mb-4"></i>
                    <p>لا توجد فيديوهات تدريب متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

    </div>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#A15DBF] mb-4 animate-fadeInUp">📝 أحدث المقالات في الجمال</h2>
                <p class="text-[#B17DC0] text-lg animate-fadeInUp" style="animation-delay: 0.2s;">نصائح وأفكار مفيدة حول الجمال والعناية الشخصية</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestBlogs as $blog)
                <div class="bg-[#FFFFFF] border-2 border-[#E6A0C3] rounded-2xl shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
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

    <!-- Beauty Interactions JavaScript -->
    <script src="{{ asset('js/beauty-interactions.js') }}"></script>
    
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
