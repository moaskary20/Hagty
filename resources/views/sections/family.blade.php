<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قسم عائلتي - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/family-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/family-animations.css') }}">
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
            background: linear-gradient(135deg, #FFFFFF 0%, #E6A0C3 100%);
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
<body class="bg-white min-h-screen">
    <!-- Navigation -->
    @include('components.shared-header')

    <!-- Statistics Section -->
    <section class="py-20 relative overflow-hidden" style="background: linear-gradient(135deg, #9345ab 0%, #7a3690 100%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 text-white animate-fadeInUp">👨‍👩‍👧‍👦 قسم عائلتي</h1>
            <p class="text-xl md:text-2xl mb-12 text-white opacity-90 animate-fadeInUp" style="animation-delay: 0.2s;">رعاية شاملة لعائلتك ونصائح مفيدة للحياة الأسرية</p>
            
            <!-- Statistics Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl p-6 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.3s;">
                    <div class="text-4xl font-black text-center mb-2" style="color: #9345ab;">{{ $family_advices->count() }}</div>
                    <div class="text-sm font-bold text-center text-gray-600">نصيحة عائلية</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.4s;">
                    <div class="text-4xl font-black text-center mb-2" style="color: #9345ab;">{{ $family_activities->count() }}</div>
                    <div class="text-sm font-bold text-center text-gray-600">نشاط عائلي</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.5s;">
                    <div class="text-4xl font-black text-center mb-2" style="color: #9345ab;">{{ $family_outing_areas->count() }}</div>
                    <div class="text-sm font-bold text-center text-gray-600">منطقة خروج</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.6s;">
                    <div class="text-4xl font-black text-center mb-2" style="color: #9345ab;">{{ $family_health_records->count() }}</div>
                    <div class="text-sm font-bold text-center text-gray-600">سجل صحي</div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Search Form -->
    @include('components.family-search-form')

    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- النصائح العائلية -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">💡 النصائح العائلية</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($family_advices as $advice)
                <div class="bg-[#FFFFFF] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $advice->title }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ Str::limit($advice->content, 100) }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            @if($advice->expert_name)
                            <div><i class="fas fa-user-tie ml-2"></i>{{ $advice->expert_name }}</div>
                            @endif
                            @if($advice->type)
                            <div><i class="fas fa-tag ml-2"></i>{{ $advice->type }}</div>
                            @endif
                            @if($advice->category)
                            <div><i class="fas fa-folder ml-2"></i>{{ $advice->category }}</div>
                            @endif
                            @if($advice->rating)
                            <div><i class="fas fa-star ml-2 text-[#A15DBF]"></i>{{ $advice->rating }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-lightbulb text-4xl mb-4"></i>
                    <p>لا توجد نصائح عائلية متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- الأنشطة العائلية -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🎯 الأنشطة العائلية</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($family_activities as $activity)
                <div class="bg-[#FFFFFF] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $activity->activity_name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ Str::limit($activity->description, 100) }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            @if($activity->location)
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $activity->location }}</div>
                            @endif
                            @if($activity->category)
                            <div><i class="fas fa-tag ml-2"></i>{{ $activity->category }}</div>
                            @endif
                            @if($activity->cost)
                            <div><i class="fas fa-dollar-sign ml-2"></i>{{ $activity->cost }}</div>
                            @endif
                            @if($activity->age_group)
                            <div><i class="fas fa-users ml-2"></i>{{ $activity->age_group }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-gamepad text-4xl mb-4"></i>
                    <p>لا توجد أنشطة عائلية متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- مناطق الخروج العائلية -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🏞️ مناطق الخروج العائلية</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($family_outing_areas as $area)
                <div class="bg-[#FFFFFF] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $area->name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ Str::limit($area->description, 100) }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            @if($area->address)
                            <div><i class="fas fa-map-marker-alt ml-2"></i>{{ $area->address }}</div>
                            @endif
                            @if($area->type)
                            <div><i class="fas fa-tag ml-2"></i>{{ $area->type }}</div>
                            @endif
                            @if($area->phone)
                            <div><i class="fas fa-phone ml-2"></i>{{ $area->phone }}</div>
                            @endif
                            @if($area->rating)
                            <div><i class="fas fa-star ml-2 text-[#A15DBF]"></i>{{ $area->rating }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-tree text-4xl mb-4"></i>
                    <p>لا توجد مناطق خروج عائلية متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- السجلات الصحية العائلية -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#A15DBF] mb-8 text-center animate-fadeInUp">🏥 السجلات الصحية العائلية</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($family_health_records as $record)
                <div class="bg-[#FFFFFF] border-2 border-[#E6A0C3] rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#A15DBF] mb-2">{{ $record->member_name }}</h3>
                        <p class="text-[#B17DC0] mb-4">{{ $record->relationship }}</p>
                        <div class="space-y-2 text-sm text-[#8B4A9C]">
                            @if($record->birth_date)
                            <div><i class="fas fa-calendar ml-2"></i>{{ $record->birth_date }}</div>
                            @endif
                            @if($record->blood_type)
                            <div><i class="fas fa-tint ml-2"></i>{{ $record->blood_type }}</div>
                            @endif
                            @if($record->family_doctor)
                            <div><i class="fas fa-user-md ml-2"></i>{{ $record->family_doctor }}</div>
                            @endif
                            @if($record->insurance_company)
                            <div><i class="fas fa-shield-alt ml-2"></i>{{ $record->insurance_company }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-[#A15DBF] py-8">
                    <i class="fas fa-heartbeat text-4xl mb-4"></i>
                    <p>لا توجد سجلات صحية عائلية متاحة حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

    </div>

    <!-- Promotional Ads Section -->
    @if($family_promotional_ads && $family_promotional_ads->count() > 0)
    <section class="py-16 bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#A15DBF] mb-4 animate-fadeInUp">🎯 الإعلانات الدعائية</h2>
                <p class="text-[#B17DC0] text-lg animate-fadeInUp" style="animation-delay: 0.2s;">عروض وخدمات مميزة للعائلات</p>
            </div>
            
            <!-- Featured Ads -->
            @php
                $featuredAds = $family_promotional_ads->where('is_featured', true);
                $regularAds = $family_promotional_ads->where('is_featured', false);
            @endphp
            
            @if($featuredAds->count() > 0)
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-[#8B4A9C] mb-6 text-center animate-fadeInUp">⭐ العروض المميزة</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($featuredAds as $ad)
                    <div class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] border-2 border-[#A15DBF] rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 animate-fadeInUp relative">
                        @if($ad->is_featured)
                        <div class="absolute top-3 right-3 z-10">
                            <span class="bg-[#A15DBF] text-white px-3 py-1 rounded-full text-xs font-bold flex items-center">
                                <i class="fas fa-star ml-1"></i>
                                مميز
                            </span>
                        </div>
                        @endif
                        
                        @if($ad->ad_type === 'video' && $ad->video_url)
                        <div class="relative">
                            <div class="aspect-video bg-gray-200">
                                <iframe 
                                    src="{{ $ad->video_url }}" 
                                    class="w-full h-full rounded-t-xl"
                                    frameborder="0" 
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                        @else
                        <div class="relative">
                            <div class="aspect-video bg-gray-200 flex items-center justify-center">
                                @if($ad->image_url)
                                    <img src="{{ $ad->image_url }}" alt="{{ $ad->title }}" class="w-full h-full object-cover rounded-t-xl">
                                @else
                                    <i class="fas fa-image text-[#A15DBF] text-6xl"></i>
                                @endif
                            </div>
                        </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="bg-[#E6A0C3] text-[#A15DBF] px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ ucfirst($ad->category) }}
                                </span>
                                @if($ad->discount_percentage)
                                <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">
                                    -{{ $ad->discount_percentage }}
                                </span>
                                @endif
                            </div>
                            
                            <h3 class="text-xl font-bold text-[#A15DBF] mb-3">{{ $ad->title }}</h3>
                            @if($ad->description)
                                <p class="text-gray-700 mb-4 line-clamp-3">{{ $ad->description }}</p>
                            @endif
                            
                            <div class="flex items-center justify-between mb-4">
                                @if($ad->price)
                                <div class="flex items-center">
                                    <span class="text-lg font-bold text-[#8B4A9C]">{{ number_format($ad->price, 0) }} ج.م</span>
                                </div>
                                @endif
                                
                                @if($ad->end_date)
                                <div class="text-sm text-[#8B4A9C]">
                                    <i class="fas fa-clock ml-1"></i>
                                    ينتهي: {{ $ad->end_date->format('Y-m-d') }}
                                </div>
                                @endif
                            </div>
                            
                            <div class="flex space-x-2 space-x-reverse">
                                @if($ad->link_url)
                                <a href="{{ $ad->link_url }}" class="flex-1 bg-[#A15DBF] text-white px-4 py-2 rounded-lg hover:bg-[#8B4A9C] transition-colors duration-300 text-center text-sm font-semibold">
                                    <i class="fas fa-external-link-alt ml-1"></i>
                                    عرض التفاصيل
                                </a>
                                @endif
                                <button class="bg-[#E6A0C3] text-[#A15DBF] px-4 py-2 rounded-lg hover:bg-[#B17DC0] transition-colors duration-300 text-sm">
                                    <i class="fas fa-share-alt"></i>
                                </button>
                                <button class="bg-[#E6A0C3] text-[#A15DBF] px-4 py-2 rounded-lg hover:bg-[#B17DC0] transition-colors duration-300 text-sm">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            @if($regularAds->count() > 0)
            <div>
                <h3 class="text-2xl font-bold text-[#8B4A9C] mb-6 text-center animate-fadeInUp">🛍️ عروض أخرى</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($regularAds as $ad)
                    <div class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] border-2 border-[#E6A0C3] rounded-lg shadow-md overflow-hidden hover:shadow-lg hover:scale-102 transition-all duration-300 animate-fadeInUp">
                        <div class="relative">
                            <div class="aspect-square bg-gray-200 flex items-center justify-center">
                                @if($ad->image_url)
                                    <img src="{{ $ad->image_url }}" alt="{{ $ad->title }}" class="w-full h-full object-cover">
                                @else
                                    <i class="fas fa-image text-[#A15DBF] text-4xl"></i>
                                @endif
                            </div>
                            @if($ad->discount_percentage)
                            <div class="absolute top-2 left-2">
                                <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">
                                    -{{ $ad->discount_percentage }}
                                </span>
                            </div>
                            @endif
                        </div>
                        
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-2">
                                <span class="bg-[#E6A0C3] text-[#A15DBF] px-2 py-1 rounded-full text-xs font-semibold">
                                    {{ ucfirst($ad->category) }}
                                </span>
                            </div>
                            
                            <h4 class="text-sm font-bold text-[#A15DBF] mb-2 line-clamp-2">{{ $ad->title }}</h4>
                            
                            @if($ad->price)
                            <div class="text-sm font-bold text-[#8B4A9C] mb-2">
                                {{ number_format($ad->price, 0) }} ج.م
                            </div>
                            @endif
                            
                            <div class="flex space-x-1 space-x-reverse">
                                @if($ad->link_url)
                                <a href="{{ $ad->link_url }}" class="flex-1 bg-[#A15DBF] text-white px-3 py-1 rounded text-center text-xs hover:bg-[#8B4A9C] transition-colors duration-300">
                                    عرض
                                </a>
                                @endif
                                <button class="bg-[#E6A0C3] text-[#A15DBF] px-2 py-1 rounded text-xs hover:bg-[#B17DC0] transition-colors duration-300">
                                    <i class="fas fa-share-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#A15DBF] mb-4 animate-fadeInUp">📝 أحدث المقالات في عائلتي</h2>
                <p class="text-[#B17DC0] text-lg animate-fadeInUp" style="animation-delay: 0.2s;">نصائح وأفكار مفيدة حول الحياة العائلية والتربية</p>
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

    <!-- Family Interactions JavaScript -->
    <script src="{{ asset('js/family-interactions.js') }}"></script>
    
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
