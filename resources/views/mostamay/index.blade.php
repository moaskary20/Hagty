<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مستمعي - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mostamay-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mostamay-animations.css') }}">
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] min-h-screen">
    @include('components.shared-header')

    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">🎧 مستمعي</h1>
            <p class="text-xl md:text-2xl animate-fadeInUp" style="animation-delay: 0.2s;">رحلة تطوير الذات والتحفيز المستمر</p>
        </div>
    </section>

    @if($sessions->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🎧 جلسات <span style="color: #d94288">لايف كوتشينج</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($sessions as $session)
                <div class="bg-gradient-to-br from-violet-50 to-purple-50 rounded-lg shadow-lg p-6 hover:shadow-2xl transition-all">
                    <i class="fas fa-headphones text-5xl text-violet-600 mb-4"></i>
                    <h3 class="font-bold text-xl mb-2">{{ $session->title }}</h3>
                    <p class="text-violet-600 text-sm mb-3">{{ $session->coach_name }}</p>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($session->description, 100) }}</p>
                    @if($session->duration_minutes)<p class="text-xs text-gray-500 mb-3"><i class="far fa-clock ml-1"></i>{{ $session->duration_minutes }} دقيقة</p>@endif
                    @if($session->audio_url)
                    <a href="{{ $session->audio_url }}" target="_blank" class="block text-center bg-gradient-to-r from-violet-600 to-purple-600 text-white px-6 py-3 rounded-lg hover:from-violet-700 hover:to-purple-700 transition-all font-bold">
                        <i class="fas fa-play ml-2"></i>استمع الآن
                    </a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($motivational->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">💬 محتوى <span style="color: #d94288">تحفيزي</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($motivational as $content)
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-all">
                    <h3 class="font-bold text-lg mb-3">{{ $content->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($content->content, 120) }}</p>
                    @if($content->author)<p class="text-xs text-violet-600 mb-3"><i class="fas fa-user ml-1"></i>{{ $content->author }}</p>@endif
                    <a href="{{ route('mostamay.motivational.show', $content->id) }}" class="text-violet-700 hover:text-violet-900 font-semibold text-sm">المزيد <i class="fas fa-arrow-left mr-1"></i></a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($skills->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">📝 مهارات <span style="color: #d94288">تطوير الذات</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($skills as $skill)
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-all border-2 border-transparent hover:border-violet-500">
                    <i class="fas fa-chart-line text-4xl text-violet-600 mb-4"></i>
                    <h3 class="font-bold text-xl mb-2">{{ $skill->skill_name }}</h3>
                    <span class="bg-violet-100 text-violet-800 px-2 py-1 rounded text-xs mb-3 inline-block">{{ $skill->category }}</span>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($skill->description, 100) }}</p>
                    <a href="{{ route('mostamay.skill.show', $skill->id) }}" class="text-violet-700 hover:text-violet-900 font-semibold text-sm">المزيد <i class="fas fa-arrow-left mr-1"></i></a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($stories->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">📖 قصص <span style="color: #d94288">النجاح</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($stories as $story)
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition-all">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-quote-left text-3xl text-violet-300 ml-3"></i>
                        <h3 class="font-bold text-xl">{{ $story->title }}</h3>
                    </div>
                    <p class="text-gray-700 mb-4 leading-relaxed">{{ Str::limit($story->story, 200) }}</p>
                    @if($story->person_name)<p class="text-sm text-violet-600 font-semibold">- {{ $story->person_name }}</p>@endif
                    <div class="mt-4">
                        <a href="{{ route('mostamay.story.show', $story->id) }}" class="text-violet-700 hover:text-violet-900 font-semibold text-sm">المزيد <i class="fas fa-arrow-left mr-1"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($posts->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🤝 منشورات <span style="color: #d94288">المجتمع</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                <div class="bg-gradient-to-br from-violet-50 to-purple-50 rounded-lg shadow-md p-6 hover:shadow-lg transition-all">
                    <h3 class="font-bold text-lg mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ Str::limit($post->content, 100) }}</p>
                    <div class="flex items-center justify-between text-xs text-gray-500">
                        <span><i class="fas fa-heart ml-1 text-red-500"></i>{{ $post->likes_count }} إعجاب</span>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في مستمعي</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول التطوير الشخصي والاستماع</p>
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
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-blue-600 transition-colors duration-300">
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
                               class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold transition-colors duration-300">
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
                   class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')

    <!-- Mostamay Interactions JavaScript -->
    <script src="{{ asset('js/mostamay-interactions.js') }}"></script>
</body>
</html>
