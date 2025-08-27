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
<body class="bg-gradient-to-br from-pink-50 to-purple-50 min-h-screen">
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
                        <a href="{{ route('section', 'health') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white bg-pink-100">الصحة</a>
                        <a href="{{ route('section', 'fashion') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الموضة</a>
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
                        
                        <a href="{{ route('section', 'health') }}" class="mobile-menu-item active">
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
    <section class="relative py-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Title -->
            <div class="text-center mb-16">
                <h1 class="text-6xl font-bold text-gray-800 mb-6">🏥 قسم الصحة</h1>
                <p class="text-2xl text-gray-600 mb-8">اكتشفي أفضل الأطباء والمستشفيات والصيدليات والنصائح الصحية</p>
                
                <!-- Statistics -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-pink-100">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-user-md text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $doctors->count() }}</h3>
                            <p class="text-gray-600">طبيب متخصص</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-pink-100">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-hospital text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $hospitals->count() }}</h3>
                            <p class="text-gray-600">مستشفى</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-pink-100">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-pills text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $pharmacies->count() }}</h3>
                            <p class="text-gray-600">صيدلية</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-pink-100">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-lightbulb text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $health_tips->count() }}</h3>
                            <p class="text-gray-600">نصيحة صحية</p>
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
</body>
</html>
