<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قسم الموضة - منصة HAGTY</title>
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
                        <a href="{{ route('section', 'fashion') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white bg-pink-100">الموضة</a>
                        <a href="{{ route('section', 'babies') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الأطفال</a>
                        <a href="{{ route('section', 'wedding') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الزفاف</a>
                        <a href="{{ route('section', 'beauty') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الجمال</a>
                        <a href="{{ route('section', 'umomi') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">أومومتي</a>
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
                        
                        <a href="{{ route('section', 'fashion') }}" class="mobile-menu-item active">
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
    <section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">👗 قسم الموضة</h1>
            <p class="text-xl md:text-2xl mb-8">أحدث صيحات الموضة والأزياء</p>
            
            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $fashion_trends->count() }}</div>
                    <div class="text-sm">صيحات موضة</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $sponsor_videos->count() }}</div>
                    <div class="text-sm">فيديوهات دعائية</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $forasy_courses->count() }}</div>
                    <div class="text-sm">كورسات موضة</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Form -->
    @include('components.fashion-search-form')

    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- صيحات الموضة -->
        <section class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">صيحات الموضة</h2>
                <p class="text-gray-600">اكتشفي أحدث صيحات الموضة والأزياء</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($fashion_trends ?? [] as $trend)
                @php $__trendIndex = $loop->index; @endphp
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 trend-card {{ $__trendIndex >= 6 ? 'hidden' : '' }}">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-tshirt text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{ $trend->title }}</h3>
                            <p class="text-blue-600 font-medium">صيحة موضة</p>
                        </div>
                    </div>
                    @if($trend->content)
                    <p class="text-gray-600 mb-4">{{ Str::limit($trend->content, 100) }}</p>
                    @endif
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $trend->season ?? 'جميع المواسم' }}</span>
                        <button class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-lg hover:from-indigo-600 hover:to-blue-500 transition-all duration-300">
                            <i class="fas fa-eye ml-2"></i>شاهدي المزيد
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-tshirt text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد صيحات موضة متاحة حالياً</p>
                </div>
                @endforelse
            </div>
            @if(($fashion_trends ?? collect())->count() > 6)
            <div class="text-center mt-8">
                <button id="show-more-trends" class="px-6 py-3 rounded-xl font-semibold text-white bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-indigo-600 hover:to-blue-500 transition-all duration-300 shadow-lg">
                    <i class="fas fa-plus ml-2"></i> عرض المزيد من الصيحات
                </button>
            </div>
            @endif
        </section>

        <!-- الفيديوهات الدعائية -->
        <section class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">الفيديوهات الدعائية</h2>
                <p class="text-gray-600">شاهدي أحدث الفيديوهات الدعائية للموضة</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($sponsor_videos ?? [] as $video)
                @php $__videoIndex = $loop->index; @endphp
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 video-card {{ $__videoIndex >= 6 ? 'hidden' : '' }}">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-video text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{ $video->title }}</h3>
                            <p class="text-purple-600 font-medium">فيديو دعائي</p>
                        </div>
                    </div>
                    @if($video->description)
                    <p class="text-gray-600 mb-4">{{ Str::limit($video->description, 100) }}</p>
                    @endif
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $video->duration ?? '00:00' }}</span>
                        <button class="bg-gradient-to-r from-purple-500 to-pink-600 text-white px-4 py-2 rounded-lg hover:from-pink-600 hover:to-purple-500 transition-all duration-300">
                            <i class="fas fa-play ml-2"></i>شاهدي الفيديو
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-video text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد فيديوهات دعائية متاحة حالياً</p>
                </div>
                @endforelse
            </div>
            @if(($sponsor_videos ?? collect())->count() > 6)
            <div class="text-center mt-8">
                <button id="show-more-videos" class="px-6 py-3 rounded-xl font-semibold text-white bg-gradient-to-r from-purple-500 to-pink-600 hover:from-pink-600 hover:to-purple-500 transition-all duration-300 shadow-lg">
                    <i class="fas fa-plus ml-2"></i> عرض المزيد من الفيديوهات
                </button>
            </div>
            @endif
        </section>

        <!-- كورسات الموضة -->
        <section class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">كورسات الموضة</h2>
                <p class="text-gray-600">تعلمي من أفضل المدربين في مجال الموضة</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($forasy_courses ?? [] as $course)
                @php $__courseIndex = $loop->index; @endphp
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 course-card {{ $__courseIndex >= 6 ? 'hidden' : '' }}">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{ $course->name }}</h3>
                            <p class="text-green-600 font-medium">كورس موضة</p>
                        </div>
                    </div>
                    @if($course->description)
                    <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                    @endif
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $course->price ?? 'مجاني' }}</span>
                        <button class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-2 rounded-lg hover:from-emerald-600 hover:to-green-500 transition-all duration-300">
                            <i class="fas fa-play ml-2"></i>ابدأي التعلم
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-graduation-cap text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد كورسات موضة متاحة حالياً</p>
                </div>
                @endforelse
            </div>
            @if(($forasy_courses ?? collect())->count() > 6)
            <div class="text-center mt-8">
                <button id="show-more-courses" class="px-6 py-3 rounded-xl font-semibold text-white bg-gradient-to-r from-green-500 to-emerald-600 hover:from-emerald-600 hover:to-green-500 transition-all duration-300 shadow-lg">
                    <i class="fas fa-plus ml-2"></i> عرض المزيد من الكورسات
                </button>
            </div>
            @endif
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
        setupLoadMore('show-more-trends', '.trend-card', 6);
        setupLoadMore('show-more-videos', '.video-card', 6);
        setupLoadMore('show-more-courses', '.course-card', 6);
    </script>
</body>
</html>
