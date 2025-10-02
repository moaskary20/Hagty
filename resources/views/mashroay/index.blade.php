<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشروعي - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-blue-50">
    @include('components.shared-header')

    <section class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white py-24">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">💼 مشروعي</h1>
            <p class="text-xl md:text-2xl">ابدأي مشروعك الخاص بثقة ونجاح</p>
        </div>
    </section>

    @if($ideas->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">💡 أفكار <span style="color: #d94288">مشاريع</span> مبتكرة</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($ideas as $idea)
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-all border-2 border-transparent hover:border-indigo-500">
                    @if($idea->image)
                    <img src="{{ Storage::url($idea->image) }}" alt="{{ $idea->title }}" class="w-full h-40 object-cover rounded-lg mb-4">
                    @else
                    <div class="w-full h-40 bg-gradient-to-r from-indigo-400 to-blue-400 flex items-center justify-center rounded-lg mb-4">
                        <i class="fas fa-lightbulb text-6xl text-white"></i>
                    </div>
                    @endif
                    @if($idea->category)<span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-xs mb-3 inline-block">{{ $idea->category }}</span>@endif
                    <h3 class="font-bold text-xl mb-3">{{ $idea->title }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($idea->description, 120) }}</p>
                    @if($idea->budget_range)<p class="text-sm text-indigo-600 font-semibold mb-4"><i class="fas fa-coins ml-1"></i>{{ $idea->budget_range }}</p>@endif
                    <a href="{{ route('mashroay.idea.show', $idea->id) }}" class="inline-block w-full text-center bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-indigo-700 hover:to-blue-700 transition-all font-bold">
                        <i class="fas fa-arrow-left ml-2"></i>المزيد
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($advices->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">📚 نصائح <span style="color: #d94288">ريادة الأعمال</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($advices as $advice)
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-all">
                    @if($advice->category)<span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs mb-3 inline-block">{{ $advice->category }}</span>@endif
                    <h3 class="font-bold text-lg mb-3">{{ $advice->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($advice->content, 100) }}</p>
                    @if($advice->author)<p class="text-xs text-gray-500 mb-3"><i class="fas fa-user ml-1"></i>{{ $advice->author }}</p>@endif
                    <a href="{{ route('mashroay.advice.show', $advice->id) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm">
                        المزيد <i class="fas fa-arrow-left mr-1"></i>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($plans->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">📝 خطط <span style="color: #d94288">العمل</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($plans as $plan)
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg shadow-lg p-8 hover:shadow-2xl transition-all">
                    <i class="fas fa-file-alt text-4xl text-indigo-600 mb-4"></i>
                    <h3 class="font-bold text-xl mb-3">{{ $plan->plan_name }}</h3>
                    <p class="text-gray-700 mb-4">{{ $plan->description }}</p>
                    @if($plan->template_file)
                    <a href="{{ Storage::url($plan->template_file) }}" download class="block w-full text-center bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition-all font-bold">
                        <i class="fas fa-download ml-2"></i>تحميل النموذج
                    </a>
                    @else
                    <button onclick="alert('لا يوجد ملف متاح للتحميل حالياً')" class="w-full bg-gray-400 text-white px-6 py-3 rounded-lg cursor-not-allowed">
                        <i class="fas fa-exclamation-circle ml-2"></i>غير متوفر
                    </button>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($funding->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">💰 خيارات <span style="color: #d94288">التمويل</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($funding as $fund)
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-all">
                    <h3 class="font-bold text-xl mb-2">{{ $fund->funding_type }}</h3>
                    @if($fund->provider_name)<p class="text-indigo-600 font-semibold mb-3">{{ $fund->provider_name }}</p>@endif
                    <p class="text-gray-600 mb-4">{{ Str::limit($fund->description, 120) }}</p>
                    @if($fund->funding_range)<p class="text-sm text-gray-700 mb-2"><i class="fas fa-money-bill-wave ml-1"></i>{{ $fund->funding_range }}</p>@endif
                    @if($fund->website_url)<a href="{{ $fund->website_url }}" target="_blank" class="text-indigo-600 hover:underline text-sm">زيارة الموقع →</a>@endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($resources->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🌐 الموارد <span style="color: #d94288">والأدوات</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($resources as $resource)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-all border border-gray-200">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-tools text-2xl text-indigo-600 ml-3"></i>
                        <h3 class="font-bold text-lg">{{ $resource->resource_name }}</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($resource->description, 80) }}</p>
                    <div class="flex items-center justify-between">
                        @if($resource->is_free)<span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">مجاني</span>@else<span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-xs">مدفوع</span>@endif
                        @if($resource->resource_url)<a href="{{ $resource->resource_url }}" target="_blank" class="text-indigo-600 hover:underline text-sm">فتح →</a>@endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-indigo-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في مشروعي</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول ريادة الأعمال والمشاريع</p>
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
                   class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
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
