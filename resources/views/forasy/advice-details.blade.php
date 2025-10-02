<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $advice->title }} - فورصى</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-50">
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/hagty-logo.png') }}" alt="HAGTY Logo" class="h-12">
                    </a>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="{{ route('forasy.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2">
                        <i class="fas fa-arrow-right ml-2"></i>
                        العودة لفورصى
                    </a>
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2">الرئيسية</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <article class="bg-white rounded-lg shadow-lg overflow-hidden">
                @if($advice->image)
                <img src="{{ Storage::url($advice->image) }}" alt="{{ $advice->title }}" class="w-full h-96 object-cover">
                @endif

                <div class="p-8">
                    <!-- Header -->
                    <div class="mb-6">
                        @if($advice->category)
                        <span class="inline-block bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                            {{ $advice->category }}
                        </span>
                        @endif
                        
                        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $advice->title }}</h1>
                        
                        <div class="flex items-center text-gray-600 text-sm space-x-4 space-x-reverse">
                            @if($advice->author)
                            <div class="flex items-center">
                                <i class="fas fa-user ml-2"></i>
                                <span>{{ $advice->author }}</span>
                            </div>
                            @endif
                            
                            <div class="flex items-center">
                                <i class="fas fa-eye ml-2"></i>
                                <span>{{ $advice->views }} مشاهدة</span>
                            </div>
                            
                            <div class="flex items-center">
                                <i class="far fa-calendar ml-2"></i>
                                <span>{{ $advice->created_at->format('Y/m/d') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="prose prose-lg max-w-none">
                        <div class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">
                            {{ $advice->content }}
                        </div>
                    </div>

                    <!-- Share -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">شارك النصيحة</h3>
                        <div class="flex space-x-4 space-x-reverse">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank"
                               class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all">
                                <i class="fab fa-facebook ml-2"></i>
                                فيسبوك
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($advice->title) }}&url={{ urlencode(url()->current()) }}" 
                               target="_blank"
                               class="bg-sky-500 text-white px-6 py-3 rounded-lg hover:bg-sky-600 transition-all">
                                <i class="fab fa-twitter ml-2"></i>
                                تويتر
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($advice->title . ' - ' . url()->current()) }}" 
                               target="_blank"
                               class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-all">
                                <i class="fab fa-whatsapp ml-2"></i>
                                واتساب
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Related Advices -->
            @if($relatedAdvices->count() > 0)
            <div class="mt-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    نصائح <span style="color: #d94288">مشابهة</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedAdvices as $related)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all">
                        @if($related->image)
                        <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}" class="w-full h-40 object-cover">
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2 line-clamp-2">{{ $related->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($related->content, 100) }}</p>
                            <a href="{{ route('forasy.advices.show', $related->id) }}" 
                               class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                اقرأ المزيد →
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 HAGTY. جميع الحقوق محفوظة.</p>
        </div>
    </footer>
</body>
</html>

