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
<body class="bg-gradient-to-br from-purple-50 to-pink-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold primary-color">HAGTY</a>
                </div>
                
                <!-- Navigation Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4 space-x-reverse">
                        <a href="{{ route('home') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الرئيسية</a>
                        <a href="{{ route('section', 'accessoraty') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">أكسسوراتى</a>
                        <a href="{{ route('section', 'health') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الصحة</a>
                        <a href="{{ route('section', 'fashion') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الموضة</a>
                        <a href="{{ route('section', 'babies') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الأطفال</a>
                        <a href="{{ route('section', 'wedding') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الزفاف</a>
                        <a href="{{ route('section', 'beauty') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الجمال</a>
                        <a href="{{ route('section', 'umomi') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">أومومتي</a>
                        <a href="{{ route('section', 'rehlaaty') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">رحلتي</a>
                        <a href="{{ route('section', 'family') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">عائلتي</a>
                        <a href="{{ route('section', 'joy') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white bg-pink-100">فرحي</a>
                    </div>
                </div>
                
                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-3 space-x-reverse">
                    @auth
                        <div class="flex items-center space-x-3 space-x-reverse">
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <div class="w-8 h-8 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-700">مرحباً، {{ Auth::user()->first_name ?? Auth::user()->name }}</span>
                            </div>
                            <a href="{{ route('profile') }}" class="auth-btn-primary px-4 py-2.5 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:ring-offset-2 transition-all duration-300 text-sm font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <i class="fas fa-user-edit ml-1"></i>الملف الشخصي
                            </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                               class="bg-white text-gray-600 border border-gray-300 px-4 py-2.5 rounded-xl hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition-all duration-300 text-sm font-semibold shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                <i class="fas fa-sign-out-alt ml-1"></i>تسجيل الخروج
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="auth-btn-primary px-5 py-2.5 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:ring-offset-2 transition-all duration-300 text-sm font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-sign-in-alt ml-2"></i>الدخول
                        </a>
                        <a href="{{ route('register') }}" class="auth-btn-secondary px-5 py-2.5 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:ring-offset-2 transition-all duration-300 text-sm font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-user-plus ml-2"></i>الاشتراك
                        </a>
                    @endauth
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button" class="text-gray-700 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div class="bg-gradient-to-br from-white to-pink-50 border-t border-pink-200 shadow-lg">
                    <!-- Header -->
                    <div class="px-4 py-3 bg-gradient-to-r from-d94288 to-purple-600 text-white">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                <i class="fas fa-bars text-white"></i>
                            </div>
                            <span class="mr-3 font-semibold text-lg">القائمة الرئيسية</span>
                        </div>
                    </div>
                    
                    <!-- Navigation Links -->
                    <div class="px-4 py-2 space-y-1">
                        <a href="{{ route('home') }}" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-home text-white text-sm"></i>
                            </div>
                            <span>الرئيسية</span>
                        </a>
                        
                        <a href="{{ route('section', 'accessoraty') }}" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-gem text-white text-sm"></i>
                            </div>
                            <span>أكسسوراتى</span>
                        </a>
                        
                        <a href="{{ route('section', 'health') }}" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-heartbeat text-white text-sm"></i>
                            </div>
                            <span>الصحة</span>
                        </a>
                        
                        <a href="{{ route('section', 'fashion') }}" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-tshirt text-white text-sm"></i>
                            </div>
                            <span>الموضة</span>
                        </a>
                        
                        <a href="{{ route('section', 'babies') }}" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-baby text-white text-sm"></i>
                            </div>
                            <span>الأطفال</span>
                        </a>
                        
                        <a href="{{ route('section', 'wedding') }}" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-heart text-white text-sm"></i>
                            </div>
                            <span>الزفاف</span>
                        </a>
                        
                        <a href="{{ route('section', 'beauty') }}" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-spa text-white text-sm"></i>
                            </div>
                            <span>الجمال</span>
                        </a>
                        
                        <a href="{{ route('section', 'umomi') }}" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-female text-white text-sm"></i>
                            </div>
                            <span>أومومتي</span>
                        </a>
                        
                        <a href="{{ route('section', 'rehlaaty') }}" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-plane text-white text-sm"></i>
                            </div>
                            <span>رحلتي</span>
                        </a>
                        
                        <a href="{{ route('section', 'family') }}" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-white text-sm"></i>
                            </div>
                            <span>عائلتي</span>
                        </a>
                        
                        <a href="{{ route('section', 'joy') }}" class="mobile-menu-item active">
                            <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-music text-white text-sm"></i>
                            </div>
                            <span>فرحي</span>
                        </a>
                    </div>
                    
                    <!-- Mobile Auth Buttons -->
                    <div class="px-4 py-4 border-t border-pink-200 bg-white bg-opacity-50">
                        @auth
                            <div class="flex items-center mb-4 p-3 bg-gradient-to-r from-d94288 to-purple-600 rounded-xl text-white">
                                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <div class="font-semibold">مرحباً، {{ Auth::user()->first_name ?? Auth::user()->name }}</div>
                                    <div class="text-sm opacity-90">مرحباً بك في HAGTY</div>
                                </div>
                            </div>
                            
                            <a href="{{ route('profile') }}" class="mobile-auth-btn primary">
                                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-edit text-white text-sm"></i>
                                </div>
                                <span>الملف الشخصي</span>
                            </a>
                            
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                               class="mobile-auth-btn secondary">
                                <div class="w-8 h-8 bg-gray-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-sign-out-alt text-white text-sm"></i>
                                </div>
                                <span>تسجيل الخروج</span>
                            </a>
                        @else
                            <div class="text-center mb-4">
                                <div class="w-16 h-16 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-user-plus text-white text-xl"></i>
                                </div>
                                <div class="text-gray-600 font-medium">انضمي إلى مجتمعنا</div>
                            </div>
                            
                            <a href="{{ route('login') }}" class="mobile-auth-btn primary">
                                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-sign-in-alt text-white text-sm"></i>
                                </div>
                                <span>تسجيل الدخول</span>
                            </a>
                            
                            <a href="{{ route('register') }}" class="mobile-auth-btn secondary">
                                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-plus text-d94288 text-sm"></i>
                                </div>
                                <span>إنشاء حساب جديد</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-purple-500 to-pink-600 text-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">🎉 قسم فرحي</h1>
            <p class="text-xl md:text-2xl mb-8">احتفالات وموسيقى وترفيه لجميع المناسبات</p>
            
            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $dj_wedding_packages->count() }}</div>
                    <div class="text-sm">باقة دي جي</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $dj_banners->count() }}</div>
                    <div class="text-sm">لافتة إعلانية</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $dj_video_ads->count() }}</div>
                    <div class="text-sm">إعلان فيديو</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- باقات الدي جي -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🎵 باقات الدي جي</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($dj_wedding_packages as $package)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $package->package_name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($package->package_description, 100) }}</p>
                        <div class="space-y-2 text-sm text-gray-500">
                            @if($package->price)
                            <div><i class="fas fa-tag ml-2"></i>{{ $package->price }} ريال</div>
                            @endif
                            @if($package->duration_hours)
                            <div><i class="fas fa-clock ml-2"></i>{{ $package->duration_hours }} ساعة</div>
                            @endif
                            @if($package->is_popular)
                            <div><i class="fas fa-star ml-2 text-yellow-500"></i>الأكثر شعبية</div>
                            @endif
                            @if($package->includes)
                            <div><i class="fas fa-list ml-2"></i>{{ implode(', ', array_slice($package->includes, 0, 2)) }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
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
