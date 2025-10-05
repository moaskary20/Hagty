<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مستشاري - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mostashary-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mostashary-animations.css') }}">
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] min-h-screen">
    @include('components.shared-header')

    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">👨‍⚕️ مستشاري</h1>
            <p class="text-xl md:text-2xl animate-fadeInUp" style="animation-delay: 0.2s;">استشارات متخصصة في جميع جوانب حياتك</p>
        </div>
    </section>

    @if($health->count() > 0)
    <section class="py-16 bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 animate-fadeInUp">🩺 استشارات <span class="text-[#A15DBF]">صحية</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($health as $consultant)
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] rounded-lg shadow-lg p-6 hover:shadow-2xl transition-all border-2 border-transparent hover:border-[#A15DBF] animate-fadeInUp">
                    <div class="text-center mb-4">
                        <div class="w-20 h-20 bg-[#FAD6E0] rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-md text-3xl text-[#A15DBF]"></i>
                        </div>
                        <h3 class="font-bold text-xl mb-1">{{ $consultant->consultant_name }}</h3>
                        <p class="text-[#A15DBF] text-sm font-semibold">{{ $consultant->specialty }}</p>
                    </div>
                    <p class="text-gray-600 text-sm mb-4 text-center">{{ Str::limit($consultant->description, 100) }}</p>
                    @if($consultant->consultation_fee)<p class="text-center text-2xl font-bold text-[#A15DBF] mb-4">{{ number_format($consultant->consultation_fee) }} جنيه</p>@endif
                    @if($consultant->booking_url)
                    <a href="{{ $consultant->booking_url }}" target="_blank" class="block text-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-6 py-3 rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all font-bold">احجز استشارة</a>
                    @elseif($consultant->contact_phone)
                    <a href="tel:{{ $consultant->contact_phone }}" class="block text-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-6 py-3 rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all font-bold">اتصل الآن</a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($career->count() > 0)
    <section class="py-16 bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 animate-fadeInUp">💼 استشارات <span class="text-[#A15DBF]">مهنية</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($career as $consultant)
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] rounded-lg shadow-lg p-6 hover:shadow-2xl transition-all animate-fadeInUp">
                    <i class="fas fa-briefcase text-4xl text-[#A15DBF] mb-4"></i>
                    <h3 class="font-bold text-xl mb-2">{{ $consultant->consultant_name }}</h3>
                    <p class="text-[#A15DBF] text-sm mb-3">{{ $consultant->expertise_area }}</p>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($consultant->description, 80) }}</p>
                    @if($consultant->consultation_fee)<p class="text-xl font-bold text-[#A15DBF]">{{ number_format($consultant->consultation_fee) }} جنيه</p>@endif
                    <div class="mt-4">
                        @if($consultant->booking_url)
                        <a href="{{ $consultant->booking_url }}" target="_blank" class="block text-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-4 py-2 rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all font-bold">احجز استشارة</a>
                        @elseif($consultant->contact_phone)
                        <a href="tel:{{ $consultant->contact_phone }}" class="block text-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-4 py-2 rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all font-bold">اتصل الآن</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($family->count() > 0)
    <section class="py-16 bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 animate-fadeInUp">💍 استشارات <span class="text-[#A15DBF]">عائلية وزوجية</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($family as $consultant)
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] rounded-lg shadow-lg p-6 hover:shadow-xl transition-all animate-fadeInUp">
                    <i class="fas fa-heart text-4xl text-[#A15DBF] mb-4"></i>
                    <h3 class="font-bold text-xl mb-2">{{ $consultant->consultant_name }}</h3>
                    <p class="text-[#A15DBF] text-sm mb-3">{{ $consultant->specialty }}</p>
                    <p class="text-gray-700 text-sm mb-4">{{ Str::limit($consultant->description, 80) }}</p>
                    @if($consultant->booking_url)
                    <a href="{{ $consultant->booking_url }}" target="_blank" class="block text-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-4 py-2 rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all font-bold">احجز استشارة</a>
                    @elseif($consultant->contact_phone)
                    <a href="tel:{{ $consultant->contact_phone }}" class="block text-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-4 py-2 rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all font-bold">اتصل الآن</a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($business->count() > 0)
    <section class="py-16 bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 animate-fadeInUp">📈 استشارات <span class="text-[#A15DBF]">الأعمال</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($business as $consultant)
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] rounded-lg shadow-lg p-6 hover:shadow-xl transition-all animate-fadeInUp">
                    <i class="fas fa-chart-line text-4xl text-[#A15DBF] mb-4"></i>
                    <h3 class="font-bold text-xl mb-2">{{ $consultant->consultant_name }}</h3>
                    <p class="text-[#A15DBF] text-sm mb-3">{{ $consultant->expertise_area }}</p>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($consultant->description, 80) }}</p>
                    <div class="space-y-2">
                        @if($consultant->contact_phone)
                        <a href="tel:{{ $consultant->contact_phone }}" class="block text-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-4 py-2 rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all font-bold">
                            <i class="fas fa-phone ml-2"></i> {{ $consultant->contact_phone }}
                        </a>
                        @endif
                        @if($consultant->website_url)
                        <a href="{{ $consultant->website_url }}" target="_blank" class="block text-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-4 py-2 rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all font-bold">
                            <i class="fas fa-globe ml-2"></i> الموقع الإلكتروني
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($psychological->count() > 0)
    <section class="py-16 bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 animate-fadeInUp">🧠 دعم <span class="text-[#A15DBF]">نفسي ومعنوي</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($psychological as $specialist)
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] rounded-lg shadow-lg p-6 hover:shadow-xl transition-all animate-fadeInUp">
                    <i class="fas fa-brain text-4xl text-[#A15DBF] mb-4"></i>
                    <h3 class="font-bold text-xl mb-2">{{ $specialist->specialist_name }}</h3>
                    <p class="text-[#A15DBF] text-sm mb-3">{{ $specialist->specialty }}</p>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($specialist->description, 80) }}</p>
                    @if($specialist->booking_url)
                    <a href="{{ $specialist->booking_url }}" target="_blank" class="block text-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-4 py-2 rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all font-bold">احجز استشارة</a>
                    @elseif($specialist->contact_phone)
                    <a href="tel:{{ $specialist->contact_phone }}" class="block text-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-4 py-2 rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all font-bold">اتصل الآن</a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#A15DBF] mb-4 animate-fadeInUp">📝 أحدث المقالات في مستشاري</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول الاستشارات والتطوير الشخصي</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestBlogs as $blog)
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fadeInUp">
                    @if($blog->featured_image)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ \Illuminate\Support\Str::startsWith($blog->featured_image, ['http', 'https']) ? $blog->featured_image : Storage::url($blog->featured_image) }}" 
                                 alt="{{ $blog->title }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-block bg-[#FAD6E0] text-[#A15DBF] text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-[#A15DBF] transition-colors duration-300">
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
                   class="inline-flex items-center bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-8 py-3 rounded-lg font-semibold hover:from-[#8B4A9C] hover:to-[#753880] transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl" style="color: #ffffff !important; text-shadow: 2px 2px 4px rgba(0,0,0,0.8); font-family: 'Cairo', sans-serif; text-rendering: optimizeLegibility; -webkit-font-smoothing: antialiased; font-weight: 800;">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')

    <!-- Mostashary Interactions JavaScript -->
    <script src="{{ asset('js/mostashary-interactions.js') }}"></script>
</body>
</html>
