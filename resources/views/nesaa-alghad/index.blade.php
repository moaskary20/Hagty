<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نساء الغد - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nesaa-alghad-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nesaa-alghad-animations.css') }}">
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] min-h-screen">
    @include('components.shared-header')

    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">👩‍🎓 نساء الغد</h1>
            <p class="text-xl md:text-2xl animate-fadeInUp" style="animation-delay: 0.2s;">تمكين المرأة وبناء مستقبل مشرق</p>
        </div>
    </section>

    @if($programs->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🎓 برامج <span style="color: #d94288">تعليمية</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($programs as $program)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">{{ $program->program_name }}</h3>
                        <p class="text-pink-600 text-sm mb-3">{{ $program->category }}</p>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($program->description, 100) }}</p>
                        @if($program->duration_hours)<p class="text-xs text-gray-500 mb-2"><i class="far fa-clock ml-1"></i>{{ $program->duration_hours }} ساعة</p>@endif
                        @if($program->price)<p class="text-lg font-bold" style="color: #d94288">{{ number_format($program->price) }} جنيه</p>@endif
                        @if($program->website_url)
                        <a href="{{ $program->website_url }}" target="_blank" class="mt-4 inline-block bg-gradient-to-r from-pink-600 to-rose-600 text-white px-4 py-2 rounded-lg hover:from-pink-700 hover:to-rose-700 transition-all font-bold">احجزي الآن</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($stories->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">💡 قصص <span style="color: #d94288">نجاح ملهمة</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($stories as $story)
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition-all">
                    <i class="fas fa-star text-4xl text-yellow-500 mb-4"></i>
                    <h3 class="font-bold text-xl mb-2">{{ $story->title }}</h3>
                    <p class="text-pink-600 font-semibold mb-3">{{ $story->woman_name }} - {{ $story->achievement }}</p>
                    <p class="text-gray-700 leading-relaxed mb-4">{{ Str::limit($story->story, 150) }}</p>
                    <a href="{{ route('nesaa-alghad.story.show', $story->id) }}" class="text-pink-600 hover:text-pink-800 font-semibold">اقرأ القصة كاملة →</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($skills->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">👩‍💼 مهارات <span style="color: #d94288">القيادة</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($skills as $skill)
                <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-lg shadow-lg p-6 hover:shadow-xl transition-all">
                    <i class="fas fa-crown text-4xl text-pink-600 mb-4"></i>
                    <h3 class="font-bold text-xl mb-2">{{ $skill->skill_name }}</h3>
                    <span class="bg-pink-100 text-pink-800 px-2 py-1 rounded text-xs mb-3 inline-block">{{ $skill->category }}</span>
                    <p class="text-gray-600 text-sm">{{ Str::limit($skill->description, 100) }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($initiatives->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🌍 مبادرات <span style="color: #d94288">تمكين المرأة</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($initiatives as $initiative)
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition-all border-l-4 border-pink-600">
                    <h3 class="font-bold text-2xl mb-3">{{ $initiative->initiative_name }}</h3>
                    <p class="text-pink-600 font-semibold mb-3">{{ $initiative->organizer }}</p>
                    <p class="text-gray-700 mb-4">{{ $initiative->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500"><i class="fas fa-users ml-1"></i>{{ $initiative->members_count }} عضو</span>
                        @if($initiative->website_url)<a href="{{ $initiative->website_url }}" target="_blank" class="text-pink-600 hover:underline text-sm">زيارة الموقع →</a>@endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($resources->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">✨ موارد <span style="color: #d94288">وأدوات عملية</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($resources as $resource)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-all border border-gray-200">
                    <h3 class="font-bold text-lg mb-2">{{ $resource->resource_name }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($resource->description, 80) }}</p>
                    <div class="flex items-center justify-between">
                        @if($resource->is_free)<span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">مجاني</span>@endif
                        @if($resource->resource_url)<a href="{{ $resource->resource_url }}" target="_blank" class="text-pink-600 hover:underline text-sm">الوصول →</a>@endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-pink-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في نساء الغد</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول التطوير والتمكين النسائي</p>
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

    <!-- Nesaa Alghad Interactions JavaScript -->
    <script src="{{ asset('js/nesaa-alghad-interactions.js') }}"></script>
</body>
</html>
