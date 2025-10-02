<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $section_name }} - HAGTY</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <link rel="stylesheet" href="{{ asset('css/auth-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
        
        .primary-color {
            color: #d94288;
        }
        
        .primary-bg {
            background-color: #d94288;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(217, 66, 136, 0.2);
        }
        
        .section-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
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
        
        /* منع ظهور الألوان الافتراضية للمتصفح */
        a:visited {
            color: inherit;
        }
        
        a:active {
            color: inherit;
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
        
        /* خلفية متحركة من القلوب والتاج والنجوم */
        .floating-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
            overflow: hidden;
        }
        
        .floating-icon {
            position: absolute;
            opacity: 0.08;
            animation: float 8s ease-in-out infinite;
        }
        
        .floating-icon.heart {
            color: #d94288;
            font-size: 2.5rem;
        }
        
        .floating-icon.crown {
            color: #d94288;
            font-size: 2.2rem;
        }
        
        .floating-icon.star {
            color: #d94288;
            font-size: 2rem;
        }
        
        .floating-icon.diamond {
            color: #d94288;
            font-size: 2.3rem;
        }
        
        .floating-icon.sparkle {
            color: #d94288;
            font-size: 1.8rem;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.08;
            }
            25% {
                transform: translateY(-30px) rotate(8deg);
                opacity: 0.15;
            }
            50% {
                transform: translateY(-60px) rotate(0deg);
                opacity: 0.12;
            }
            75% {
                transform: translateY(-30px) rotate(-8deg);
                opacity: 0.15;
            }
        }
        
        /* تأخير مختلف لكل أيقونة */
        .floating-icon:nth-child(1) { animation-delay: 0s; }
        .floating-icon:nth-child(2) { animation-delay: 1.5s; }
        .floating-icon:nth-child(3) { animation-delay: 3s; }
        .floating-icon:nth-child(4) { animation-delay: 4.5s; }
        .floating-icon:nth-child(5) { animation-delay: 6s; }
        .floating-icon:nth-child(6) { animation-delay: 7.5s; }
        .floating-icon:nth-child(7) { animation-delay: 1s; }
        .floating-icon:nth-child(8) { animation-delay: 2.5s; }
        .floating-icon:nth-child(9) { animation-delay: 4s; }
        .floating-icon:nth-child(10) { animation-delay: 5.5s; }
        .floating-icon:nth-child(11) { animation-delay: 7s; }
        .floating-icon:nth-child(12) { animation-delay: 8.5s; }
        
        /* حركة أفقية إضافية */
        .floating-icon:nth-child(odd) {
            animation: float-horizontal 12s ease-in-out infinite;
        }
        
        @keyframes float-horizontal {
            0%, 100% {
                transform: translateX(0px) translateY(0px);
            }
            25% {
                transform: translateX(25px) translateY(-30px);
            }
            50% {
                transform: translateX(0px) translateY(-60px);
            }
            75% {
                transform: translateX(-25px) translateY(-30px);
            }
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
<body class="bg-gradient-to-br from-green-50 to-emerald-50 min-h-screen">
    <!-- خلفية متحركة من القلوب والتاج والنجوم -->
    <div class="floating-background">
        <i class="floating-icon heart fas fa-heart" style="top: 10%; left: 5%;"></i>
        <i class="floating-icon crown fas fa-crown" style="top: 15%; left: 85%;"></i>
        <i class="floating-icon star fas fa-star" style="top: 25%; left: 15%;"></i>
        <i class="floating-icon diamond fas fa-gem" style="top: 35%; left: 80%;"></i>
        <i class="floating-icon sparkle fas fa-sparkles" style="top: 45%; left: 10%;"></i>
        <i class="floating-icon heart fas fa-heart" style="top: 55%; left: 90%;"></i>
        <i class="floating-icon crown fas fa-crown" style="top: 65%; left: 20%;"></i>
        <i class="floating-icon star fas fa-star" style="top: 75%; left: 75%;"></i>
        <i class="floating-icon diamond fas fa-gem" style="top: 85%; left: 5%;"></i>
        <i class="floating-icon sparkle fas fa-sparkles" style="top: 20%; left: 60%;"></i>
        <i class="floating-icon heart fas fa-heart" style="top: 40%; left: 40%;"></i>
        <i class="floating-icon crown fas fa-crown" style="top: 60%; left: 50%;"></i>
    </div>
    
    <!-- Navigation -->
    @include('components.shared-header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-pink-500 to-purple-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-4">{{ $section_name }}</h1>
            <p class="text-xl mb-8">كورسات تعليمية احترافية وإكسسوارات عصرية</p>
            <div class="flex justify-center space-x-4 space-x-reverse">
                <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $courses->count() ?? 0 }}</div>
                    <div class="text-sm">كورس تعليمي</div>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $students->count() ?? 0 }}</div>
                    <div class="text-sm">طالبة مسجلة</div>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $shops->count() ?? 0 }}</div>
                    <div class="text-sm">متجر إكسسوارات</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Form -->
    @include('components.accessoraty-search-form')

    <!-- الكورسات التعليمية -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">الكورسات التعليمية</h2>
                <p class="text-gray-600">تعلمي من أفضل المدربين في مجالات التجميل والموضة والتصميم</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($courses ?? [] as $course)
                <div class="section-card card-hover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $course->name }}</h3>
                            <span class="bg-pink-100 text-pink-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $course->students_count }} طالبة</span>
                        </div>
                        @if($course->description)
                        <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                        @endif
                        <div class="flex justify-between items-center">
                            <span class="text-primary-text font-semibold">{{ $course->price ?? 'مجاني' }}</span>
                            <button onclick="Livewire.dispatch('openCourseRegistration', {courseId: {{ $course->id }}, courseName: '{{ $course->name }}'})" 
                                    class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-pink-500 transition-all duration-300">
                                <i class="fas fa-play ml-2"></i>ابدأي التعلم
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-graduation-cap text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد كورسات متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- متاجر الإكسسوارات -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">متاجر الإكسسوارات</h2>
                <p class="text-gray-600">اكتشفي أجمل الإكسسوارات من أفضل المتاجر</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($shops ?? [] as $shop)
                <div class="section-card card-hover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $shop->brand_name }}</h3>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $shop->category }}</span>
                        </div>
                        @if($shop->location)
                        <p class="text-gray-600 mb-4">{{ $shop->location }}</p>
                        @endif
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 text-sm">{{ $shop->location ?? 'موقع غير محدد' }}</span>
                            @if($shop->shop_url)
                                <a href="{{ $shop->shop_url }}" target="_blank" 
                                   class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-2 rounded-lg hover:from-emerald-600 hover:to-green-500 transition-all duration-300">
                                    <i class="fas fa-shopping-bag ml-2"></i>تسوقي الآن
                                </a>
                            @else
                                <button class="bg-gradient-to-r from-gray-400 to-gray-500 text-white px-4 py-2 rounded-lg cursor-not-allowed" disabled>
                                    <i class="fas fa-shopping-bag ml-2"></i>المتجر غير متاح
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-store text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد متاجر متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- إعلانات البانر -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">إعلانات البانر</h2>
                <p class="text-gray-600">اكتشفي أحدث العروض والمنتجات من خلال إعلاناتنا المميزة</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($banners ?? [] as $banner)
                <div class="section-card card-hover">
                    <div class="p-6">
                        @if($banner->image)
                        <div class="mb-4">
                            <img src="{{ $banner->image }}" 
                                 alt="{{ $banner->title }}" 
                                 class="w-full h-48 object-cover rounded-lg"
                                 onerror="this.src='https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=800&h=400&fit=crop'">
                        </div>
                        @else
                        <div class="mb-4">
                            <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=800&h=400&fit=crop" 
                                 alt="إعلان مميز" 
                                 class="w-full h-48 object-cover rounded-lg">
                        </div>
                        @endif
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $banner->title ?? 'إعلان مميز' }}</h3>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">إعلان</span>
                        </div>
                        @if($banner->description)
                        <p class="text-gray-600 mb-4">{{ Str::limit($banner->description, 100) }}</p>
                        @endif
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 text-sm">{{ $banner->location ?? 'موقع غير محدد' }}</span>
                            @if($banner->link)
                            <a href="{{ $banner->link }}" target="_blank" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-lg hover:from-indigo-600 hover:to-blue-500 transition-all duration-300">
                                <i class="fas fa-external-link-alt ml-2"></i>عرض الإعلان
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-ad text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد إعلانات بانر متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- إعلانات الفيديو -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">إعلانات الفيديو</h2>
                <p class="text-gray-600">شاهدي أحدث الإعلانات والفيديوهات المميزة</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($videos ?? [] as $video)
                <div class="section-card card-hover">
                    <div class="p-6">
                        @if($video->thumbnail)
                        <div class="mb-4 relative">
                            <img src="{{ $video->thumbnail }}" 
                                 alt="{{ $video->title }}" 
                                 class="w-full h-48 object-cover rounded-lg"
                                 onerror="this.src='https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=400&h=300&fit=crop'">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 bg-white bg-opacity-80 rounded-full flex items-center justify-center">
                                    <i class="fas fa-play text-d94288 text-2xl"></i>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="mb-4 relative">
                            <img src="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=400&h=300&fit=crop" 
                                 alt="فيديو مميز" 
                                 class="w-full h-48 object-cover rounded-lg">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 bg-white bg-opacity-80 rounded-full flex items-center justify-center">
                                    <i class="fas fa-play text-d94288 text-2xl"></i>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $video->title ?? 'فيديو مميز' }}</h3>
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">فيديو</span>
                        </div>
                        @if($video->description)
                        <p class="text-gray-600 mb-4">{{ Str::limit($video->description, 100) }}</p>
                        @endif
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 text-sm">{{ $video->duration ?? 'مدة غير محددة' }}</span>
                            @if($video->video_url)
                            <a href="{{ $video->video_url }}" target="_blank" class="bg-gradient-to-r from-red-500 to-pink-600 text-white px-4 py-2 rounded-lg hover:from-pink-600 hover:to-red-500 transition-all duration-300">
                                <i class="fas fa-play ml-2"></i>شاهدي الفيديو
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <i class="fas fa-video text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد إعلانات فيديو متاحة حالياً</p>
                </div>
                @endforelse
            </div>
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
    </script>
    
    <!-- Course Registration Modal -->
    @livewire('course-registration-modal')
    
    <!-- Livewire Scripts -->
    @livewireScripts
    
    <!-- Ensure Livewire is loaded -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Wait for Livewire to be ready
            if (typeof Livewire !== 'undefined') {
                console.log('Livewire is loaded and ready!');
            } else {
                console.log('Livewire is not loaded yet, waiting...');
                // Wait a bit more
                setTimeout(function() {
                    if (typeof Livewire !== 'undefined') {
                        console.log('Livewire is now loaded!');
                    } else {
                        console.error('Livewire failed to load!');
                    }
                }, 1000);
            }
        });
        
        // Listen for Livewire events
        document.addEventListener('livewire:init', () => {
            Livewire.on('console-log', (event) => {
                console.log('Livewire Event:', event.message);
            });
            
            Livewire.on('modal-opened', () => {
                console.log('Modal opened event received!');
            });
        });
    </script>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-pink-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في أكسسوراتى</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول الإكسسوارات والموضة</p>
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
                            <span class="inline-block bg-pink-100 text-pink-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-pink-600 transition-colors duration-300">
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
                               class="inline-flex items-center text-pink-600 hover:text-pink-700 font-semibold transition-colors duration-300">
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
                   class="inline-flex items-center bg-gradient-to-r from-pink-600 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-pink-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')
</body>
</html>
