<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قسم فرحي - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/joy-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/joy-animations.css') }}">
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
<body class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] min-h-screen">
    <!-- Navigation -->
    @include('components.shared-header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">🎉 قسم فرحي</h1>
            <p class="text-xl md:text-2xl mb-8 animate-fadeInUp" style="animation-delay: 0.2s;">احتفالات وموسيقى وترفيه لجميع المناسبات</p>
            
            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <div class="bg-[#FFFFFF] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.3s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $dj_wedding_packages->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">باقة دي جي</div>
                </div>
                <div class="bg-[#FFFFFF] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.4s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $dj_banners->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">لافتة إعلانية</div>
                </div>
                <div class="bg-[#FFFFFF] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.5s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $dj_video_ads->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">إعلان فيديو</div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Search Form -->
    @include('components.joy-search-form')

    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- باقات الدي جي -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🎵 باقات الدي جي</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($dj_wedding_packages as $package)
                <div class="bg-[#FFFFFF] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $package->package_name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ Str::limit($package->package_description, 100) }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            @if($package->price)
                            <div><i class="fas fa-tag ml-2"></i>{{ $package->price }} ريال</div>
                            @endif
                            @if($package->duration_hours)
                            <div><i class="fas fa-clock ml-2"></i>{{ $package->duration_hours }} ساعة</div>
                            @endif
                            @if($package->is_popular)
                            <div><i class="fas fa-star ml-2 text-[#A15DBF]"></i>الأكثر شعبية</div>
                            @endif
                            @if($package->includes)
                            <div><i class="fas fa-list ml-2"></i>{{ implode(', ', array_slice($package->includes, 0, 2)) }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-music text-4xl mb-4"></i>
                    <p>لا توجد باقات دي جي متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- اللافتات الإعلانية -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🎨 اللافتات الإعلانية</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($dj_banners as $banner)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $banner->title }}</h3>
                        @if($banner->offer_description)
                        <p class="text-gray-600 mb-4">{{ Str::limit($banner->offer_description, 100) }}</p>
                        @endif
                        <div class="space-y-2 text-sm text-gray-500">
                            @if($banner->link_url)
                            <div><i class="fas fa-link ml-2"></i><a href="{{ $banner->link_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">زيارة الموقع</a></div>
                            @endif
                            @if($banner->valid_until)
                            <div><i class="fas fa-calendar ml-2"></i>صالح حتى {{ $banner->valid_until }}</div>
                            @endif
                            @if($banner->is_active)
                            <div><i class="fas fa-check-circle ml-2 text-green-500"></i>نشط</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-image text-4xl mb-4"></i>
                    <p>لا توجد لافتات إعلانية متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- إعلانات الفيديو -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🎬 إعلانات الفيديو</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($dj_video_ads as $video)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $video->title }}</h3>
                        @if($video->description)
                        <p class="text-gray-600 mb-4">{{ Str::limit($video->description, 100) }}</p>
                        @endif
                        <div class="space-y-2 text-sm text-gray-500">
                            @if($video->video_url)
                            <div><i class="fas fa-video ml-2"></i><a href="{{ $video->video_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">مشاهدة الفيديو</a></div>
                            @endif
                            @if($video->skip_after_seconds)
                            <div><i class="fas fa-clock ml-2"></i>تخطي بعد {{ $video->skip_after_seconds }} ثانية</div>
                            @endif
                            @if($video->is_sponsored)
                            <div><i class="fas fa-ad ml-2 text-purple-500"></i>إعلان مدفوع</div>
                            @endif
                            @if($video->is_active)
                            <div><i class="fas fa-check-circle ml-2 text-green-500"></i>نشط</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-video text-4xl mb-4"></i>
                    <p>لا توجد إعلانات فيديو متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

    </div>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-red-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في فرحي</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول الاحتفالات والمناسبات السعيدة</p>
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
                            <span class="inline-block bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-red-600 transition-colors duration-300">
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
                               class="inline-flex items-center text-red-600 hover:text-red-700 font-semibold transition-colors duration-300">
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
                   class="inline-flex items-center bg-gradient-to-r from-red-600 to-pink-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-red-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')

    <!-- Joy Interactions JavaScript -->
    <script src="{{ asset('js/joy-interactions.js') }}"></script>
    
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
