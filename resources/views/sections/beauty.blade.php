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
            color: #d94288;
            transform: translateX(-4px);
        }
        
        .mobile-menu-item.active {
            background-color: #d94288;
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
            background: linear-gradient(135deg, #d94288, #c13a7a);
            color: white;
        }
        
        .mobile-auth-btn.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 66, 136, 0.3);
        }
        
        .mobile-auth-btn.secondary {
            background: white;
            color: #d94288;
            border: 2px solid #d94288;
        }
        
        .mobile-auth-btn.secondary:hover {
            background: #d94288;
            color: white;
        }
        
        .mobile-auth-btn span {
            margin-right: 12px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 to-violet-50 min-h-screen">
    <!-- Navigation -->
    @include('components.shared-header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-purple-500 to-violet-600 text-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">💄 قسم الجمال</h1>
            <p class="text-xl md:text-2xl mb-8">كل ما تحتاجينه للعناية بجمالك</p>
            
            <!-- Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12">
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $plastic_surgeons->count() }}</div>
                    <div class="text-sm">جراحي تجميل</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $hair_stylists->count() }}</div>
                    <div class="text-sm">مصففي شعر</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $beauty_shops->count() }}</div>
                    <div class="text-sm">متاجر جمال</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $training_videos->count() }}</div>
                    <div class="text-sm">فيديوهات تدريب</div>
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
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🔪 جراحي التجميل</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($plastic_surgeons as $surgeon)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $surgeon->first_name }} {{ $surgeon->last_name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $surgeon->clinic_address }}</p>
                        <div class="space-y-2 text-sm text-gray-500">
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
                                        <i class="fas fa-star text-yellow-400"></i>
                                    @elseif($i - 0.5 <= $surgeon->rating)
                                        <i class="fas fa-star-half-alt text-yellow-400"></i>
                                    @else
                                        <i class="far fa-star text-yellow-400"></i>
                                    @endif
                                @endfor
                                <span class="mr-2 text-sm text-gray-600">{{ number_format($surgeon->rating, 1) }}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-user-md text-4xl mb-4"></i>
                    <p>لا يوجد جراحي تجميل متاحين حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- مصففي الشعر -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">💇‍♀️ مصففي الشعر</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($hair_stylists as $stylist)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $stylist->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $stylist->description }}</p>
                        <div class="space-y-2 text-sm text-gray-500">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $stylist->address }}</div>
                            <div><i class="fas fa-phone ml-2"></i>{{ $stylist->phone }}</div>
                            @if($stylist->specialty)
                            <div><i class="fas fa-cut ml-2"></i>{{ $stylist->specialty }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-cut text-4xl mb-4"></i>
                    <p>لا يوجد مصففي شعر متاحين حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- متاجر الجمال -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🛍️ متاجر الجمال</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($beauty_shops as $shop)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $shop->brand_name }}</h3>
                        <div class="space-y-2 text-sm text-gray-500">
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $shop->location }}</div>
                            @if($shop->shop_url)
                            <div><i class="fas fa-globe ml-2"></i><a href="{{ $shop->shop_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">زيارة الموقع</a></div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-shopping-bag text-4xl mb-4"></i>
                    <p>لا توجد متاجر جمال متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- فيديوهات التدريب -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🎥 فيديوهات التدريب</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($training_videos as $video)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $video->عنوان_الفيديو }}</h3>
                        <p class="text-gray-600 mb-4">{{ $video->وصف_الفيديو }}</p>
                        <div class="space-y-2 text-sm text-gray-500">
                            <div><i class="fas fa-clock ml-2"></i>{{ $video->مدة_الفيديو }}</div>
                            @if($video->نوع_الفيديو)
                            <div><i class="fas fa-tag ml-2"></i>{{ $video->نوع_الفيديو }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-video text-4xl mb-4"></i>
                    <p>لا توجد فيديوهات تدريب متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

    </div>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-purple-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في الجمال</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول الجمال والعناية الشخصية</p>
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
                            <span class="inline-block bg-purple-100 text-purple-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-purple-600 transition-colors duration-300">
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
                               class="inline-flex items-center text-purple-600 hover:text-purple-700 font-semibold transition-colors duration-300">
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
                   class="inline-flex items-center bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
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
