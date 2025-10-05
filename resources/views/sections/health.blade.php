<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قسم الصحة - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/health-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/health-animations.css') }}">
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
<body class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] min-h-screen">
    <!-- Navigation -->
    @include('components.shared-header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Main Title -->
            <h1 class="text-6xl font-bold mb-6 animate-fadeInUp">🏥 قسم الصحة</h1>
            <p class="text-2xl mb-8 animate-fadeInUp" style="animation-delay: 0.2s;">اكتشفي أفضل الأطباء والمستشفيات والصيدليات والنصائح الصحية</p>
            
            <!-- Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.3s;">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-md text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $doctors->count() }}</h3>
                        <p class="text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">طبيب متخصص</p>
                    </div>
                </div>
                    <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.4s;">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-hospital text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $hospitals->count() }}</h3>
                            <p class="text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">مستشفى</p>
                        </div>
                    </div>
                    <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.5s;">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-pills text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $pharmacies->count() }}</h3>
                            <p class="text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">صيدلية</p>
                        </div>
                    </div>
                    <div class="bg-[#FAD6E0] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.6s;">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-lightbulb text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $health_tips->count() }}</h3>
                            <p class="text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">نصيحة صحية</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Form -->
    @include('components.health-search-form')

    <!-- الأطباء المتخصصون -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">الأطباء المتخصصون</h2>
                <p class="text-gray-600">اكتشفي أفضل الأطباء في مختلف التخصصات الطبية</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($doctors ?? [] as $doctor)
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-pink-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user-md text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{ $doctor->first_name ? 'د. ' . $doctor->first_name . ' ' . ($doctor->last_name ?? '') : 'د. غير محدد' }}</h3>
                            <p class="text-pink-600 font-medium">{{ $doctor->specialty }}</p>
                        </div>
                    </div>
                    @if($doctor->clinic_address)
                    <p class="text-gray-600 mb-4">{{ $doctor->clinic_address }}</p>
                    @endif
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $doctor->clinic_address ?? 'عنوان غير محدد' }}</span>
                        @if($doctor->booking_url)
                            <a href="{{ $doctor->booking_url }}" target="_blank" 
                               class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-pink-500 transition-all duration-300">
                                <i class="fas fa-calendar-check ml-2"></i>احجزي موعد
                            </a>
                        @else
                            <button class="bg-gradient-to-r from-gray-400 to-gray-500 text-white px-4 py-2 rounded-lg cursor-not-allowed" disabled>
                                <i class="fas fa-calendar-times ml-2"></i>الحجز غير متاح
                            </button>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-user-md text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا يوجد أطباء متاحون حالياً</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- المستشفيات -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">المستشفيات</h2>
                <p class="text-gray-600">اكتشفي أفضل المستشفيات والمراكز الطبية</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($hospitals ?? [] as $hospital)
                @php $__hospitalIndex = $loop->index; @endphp
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-pink-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 hospital-card {{ $__hospitalIndex >= 6 ? 'hidden' : '' }}">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-hospital text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{ $hospital->name }}</h3>
                            <p class="text-green-600 font-medium">{{ $hospital->type ?? 'مستشفى عام' }}</p>
                        </div>
                    </div>
                    @if($hospital->description)
                    <p class="text-gray-600 mb-4">{{ Str::limit($hospital->description, 100) }}</p>
                    @endif
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $hospital->location ?? 'موقع غير محدد' }}</span>
                        <button class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-2 rounded-lg hover:from-emerald-600 hover:to-green-500 transition-all duration-300">
                            <i class="fas fa-map-marker-alt ml-2"></i>موقع المستشفى
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-hospital text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد مستشفيات متاحة حالياً</p>
                </div>
                @endforelse
            </div>
            @if(($hospitals ?? collect())->count() > 6)
            <div class="text-center mt-8">
                <button id="show-more-hospitals" class="px-6 py-3 rounded-xl font-semibold text-white bg-gradient-to-r from-green-500 to-emerald-600 hover:from-emerald-600 hover:to-green-500 transition-all duration-300 shadow-lg">
                    <i class="fas fa-plus ml-2"></i> عرض المزيد من المستشفيات
                </button>
            </div>
            @endif
        </div>
    </section>

    <!-- الصيدليات -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">الصيدليات</h2>
                <p class="text-gray-600">اكتشفي أفضل الصيدليات والأدوية</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($pharmacies ?? [] as $pharmacy)
                @php $__pharmacyIndex = $loop->index; @endphp
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-pink-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 pharmacy-card {{ $__pharmacyIndex >= 6 ? 'hidden' : '' }}">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-pills text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{ $pharmacy->name }}</h3>
                            <p class="text-blue-600 font-medium">صيدلية</p>
                        </div>
                    </div>
                    @if($pharmacy->description)
                    <p class="text-gray-600 mb-4">{{ Str::limit($pharmacy->description, 100) }}</p>
                    @endif
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $pharmacy->location ?? 'موقع غير محدد' }}</span>
                        <button class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-lg hover:from-indigo-600 hover:to-blue-500 transition-all duration-300">
                            <i class="fas fa-phone ml-2"></i>اتصلي الآن
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-pills text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد صيدليات متاحة حالياً</p>
                </div>
                @endforelse
            </div>
            @if(($pharmacies ?? collect())->count() > 6)
            <div class="text-center mt-8">
                <button id="show-more-pharmacies" class="px-6 py-3 rounded-xl font-semibold text-white bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-indigo-600 hover:to-blue-500 transition-all duration-300 shadow-lg">
                    <i class="fas fa-plus ml-2"></i> عرض المزيد من الصيدليات
                </button>
            </div>
            @endif
        </div>
    </section>

    <!-- النصائح الصحية -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">النصائح الصحية</h2>
                <p class="text-gray-600">نصائح وإرشادات صحية مفيدة</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($health_tips ?? [] as $tip)
                @php $__tipIndex = $loop->index; @endphp
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-pink-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 tip-card {{ $__tipIndex >= 6 ? 'hidden' : '' }}">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-lightbulb text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{ $tip->title }}</h3>
                            <p class="text-yellow-600 font-medium">نصيحة صحية</p>
                        </div>
                    </div>
                    @if($tip->content)
                    <p class="text-gray-600 mb-4">{{ Str::limit($tip->content, 100) }}</p>
                    @endif
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $tip->category ?? 'صحة عامة' }}</span>
                        <button class="bg-gradient-to-r from-yellow-500 to-orange-600 text-white px-4 py-2 rounded-lg hover:from-orange-600 hover:to-yellow-500 transition-all duration-300">
                            <i class="fas fa-book-open ml-2"></i>اقرأي المزيد
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-lightbulb text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد نصائح صحية متاحة حالياً</p>
                </div>
                @endforelse
            </div>
            @if(($health_tips ?? collect())->count() > 6)
            <div class="text-center mt-8">
                <button id="show-more-tips" class="px-6 py-3 rounded-xl font-semibold text-white bg-gradient-to-r from-yellow-500 to-orange-600 hover:from-orange-600 hover:to-yellow-500 transition-all duration-300 shadow-lg">
                    <i class="fas fa-plus ml-2"></i> عرض المزيد من النصائح
                </button>
            </div>
            @endif
        </div>
    </section>

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

        function setupLoadMore(buttonId, itemClass, step) {
            const button = document.getElementById(buttonId);
            if (!button) return;
            const items = Array.from(document.querySelectorAll(itemClass));
            let visible = items.filter(el => !el.classList.contains('hidden')).length;
            const total = items.length;
            if (visible >= total) {
                button.classList.add('hidden');
            }
            button.addEventListener('click', function () {
                let revealed = 0;
                for (const el of items) {
                    if (el.classList.contains('hidden') && revealed < step) {
                        el.classList.remove('hidden');
                        revealed++;
                    }
                }
                visible = items.filter(el => !el.classList.contains('hidden')).length;
                if (visible >= total) {
                    button.classList.add('hidden');
                }
            });
        }
        // Initialize load-more for sections
        setupLoadMore('show-more-hospitals', '.hospital-card', 6);
        setupLoadMore('show-more-pharmacies', '.pharmacy-card', 6);
        setupLoadMore('show-more-tips', '.tip-card', 6);
    </script>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-green-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في الصحة</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول الصحة والعافية</p>
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
                            <span class="inline-block bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-green-600 transition-colors duration-300">
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
                               class="inline-flex items-center text-green-600 hover:text-green-700 font-semibold transition-colors duration-300">
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
                   class="inline-flex items-center bg-gradient-to-r from-green-600 to-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')

    <!-- Health Interactions JavaScript -->
    <script src="{{ asset('js/health-interactions.js') }}"></script>
</body>
</html>
