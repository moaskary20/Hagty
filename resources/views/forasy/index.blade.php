<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فورصى - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forasy-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forasy-animations.css') }}">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #A15DBF; }
        .primary-text { color: #A15DBF; }
        .primary-border { border-color: #A15DBF; }
    </style>
</head>
<body class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] min-h-screen">
    @include('components.shared-header')

    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">💼 فورصى</h1>
            <p class="text-xl md:text-2xl mb-8 animate-fadeInUp" style="animation-delay: 0.2s;">فرص عمل ونصائح مهنية لمستقبل أفضل</p>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12">
                <div class="bg-[#FFFFFF] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.3s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $jobs->total() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">فرصة عمل</div>
                </div>
                <div class="bg-[#FFFFFF] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.4s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $featuredJobs->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">وظيفة مميزة</div>
                </div>
                <div class="bg-[#FFFFFF] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.5s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $advices->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">نصيحة مهنية</div>
                </div>
                <div class="bg-[#FFFFFF] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.6s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $banners->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">عرض خاص</div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Search Form -->
    @include('components.forasy-search-form')

    <!-- Featured Jobs -->
    @if($featuredJobs->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center">
                ✨ الوظائف <span style="color: #d94288">المميزة</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredJobs as $job)
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all border-2 border-transparent hover:border-blue-500">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            @if($job->company_logo)
                            <img src="{{ Storage::url($job->company_logo) }}" alt="{{ $job->company_name }}" class="w-16 h-16 rounded-full mr-4">
                            @else
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-building text-2xl text-blue-600"></i>
                            </div>
                            @endif
                            <div>
                                <h3 class="font-bold text-lg">{{ $job->title }}</h3>
                                <p class="text-gray-600 text-sm">{{ $job->company_name }}</p>
                            </div>
                        </div>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-gray-600 text-sm">
                                <i class="fas fa-map-marker-alt ml-2"></i>
                                <span>{{ $job->location ?? 'غير محدد' }}</span>
                            </div>
                            <div class="flex items-center text-gray-600 text-sm">
                                <i class="fas fa-briefcase ml-2"></i>
                                <span>{{ $job->job_type }}</span>
                            </div>
                            @if($job->salary_range)
                            <div class="flex items-center text-gray-600 text-sm">
                                <i class="fas fa-dollar-sign ml-2"></i>
                                <span>{{ $job->salary_range }}</span>
                            </div>
                            @endif
                        </div>

                        <a href="{{ route('forasy.jobs.show', $job->id) }}" 
                           class="block w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-center px-4 py-3 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all">
                            عرض التفاصيل
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Career Advice -->
    @if($advices->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center">
                💡 نصائح <span style="color: #d94288">مهنية</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($advices as $advice)
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all">
                    @if($advice->image)
                    <img src="{{ Storage::url($advice->image) }}" alt="{{ $advice->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        @if($advice->category)
                        <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold mb-3">
                            {{ $advice->category }}
                        </span>
                        @endif
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $advice->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($advice->content, 150) }}</p>
                        
                        <div class="flex items-center justify-between">
                            @if($advice->author)
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-user ml-1"></i>
                                {{ $advice->author }}
                            </div>
                            @endif
                            <a href="{{ route('forasy.advices.show', $advice->id) }}" 
                               class="text-blue-600 hover:text-blue-800 font-semibold">
                                اقرأ المزيد →
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- All Jobs -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center">
                💼 جميع <span style="color: #d94288">الوظائف</span>
            </h2>

            @if($jobs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($jobs as $job)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="font-bold text-lg mb-1">{{ $job->title }}</h3>
                                <p class="text-gray-600 text-sm mb-2">{{ $job->company_name }}</p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">{{ $job->job_type }}</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">{{ $job->experience_level }}</span>
                                    @if($job->location)
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">
                                        <i class="fas fa-map-marker-alt"></i> {{ $job->location }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <p class="text-gray-700 text-sm mb-4 line-clamp-2">{{ Str::limit($job->description, 120) }}</p>
                        
                        <div class="flex items-center justify-between">
                            @if($job->deadline)
                            <div class="text-xs text-gray-500">
                                <i class="far fa-calendar ml-1"></i>
                                آخر موعد: {{ $job->deadline->format('Y/m/d') }}
                            </div>
                            @endif
                            <a href="{{ route('forasy.jobs.show', $job->id) }}" 
                               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all text-sm">
                                التفاصيل والتقديم
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $jobs->links() }}
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">لا توجد وظائف متاحة حالياً</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-indigo-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في فورصى</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول الفرص المهنية والتطوير الوظيفي</p>
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
                            <span class="inline-block bg-indigo-100 text-indigo-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-indigo-600 transition-colors duration-300">
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
                               class="inline-flex items-center text-indigo-600 hover:text-indigo-700 font-semibold transition-colors duration-300">
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
                   class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')

    <!-- Forasy Interactions JavaScript -->
    <script src="{{ asset('js/forasy-interactions.js') }}"></script>
</body>
</html>

