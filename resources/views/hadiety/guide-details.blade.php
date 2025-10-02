<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guide->title }} - هديتي | HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 to-pink-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/hagty-logo.png') }}" alt="HAGTY" class="h-12">
                    </a>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="{{ route('hadiety.index') }}" class="text-gray-700 hover:text-purple-600 px-3 py-2">
                        <i class="fas fa-arrow-right ml-2"></i> العودة لهديتي
                    </a>
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-purple-600 px-3 py-2">الرئيسية</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Guide Details -->
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4">
            <!-- Breadcrumb -->
            <nav class="mb-8 text-sm">
                <a href="{{ route('home') }}" class="text-purple-600 hover:underline">الرئيسية</a>
                <span class="mx-2">/</span>
                <a href="{{ route('hadiety.index') }}" class="text-purple-600 hover:underline">هديتي</a>
                <span class="mx-2">/</span>
                <span class="text-gray-600">{{ $guide->title }}</span>
            </nav>

            <!-- Guide Content -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                @if($guide->image)
                <div class="w-full h-96 overflow-hidden">
                    <img src="{{ Storage::url($guide->image) }}" alt="{{ $guide->title }}" class="w-full h-full object-cover">
                </div>
                @else
                <div class="w-full h-96 bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center">
                    <i class="fas fa-book text-9xl text-white opacity-50"></i>
                </div>
                @endif

                <div class="p-8 md:p-12">
                    <!-- Category Badge -->
                    @if($guide->category)
                    <div class="mb-6">
                        <span class="inline-block bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="fas fa-tag ml-2"></i>{{ $guide->category }}
                        </span>
                    </div>
                    @endif

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                        {{ $guide->title }}
                    </h1>

                    <!-- Meta Info -->
                    <div class="flex items-center text-gray-600 text-sm mb-8 pb-8 border-b border-gray-200">
                        <div class="flex items-center ml-6">
                            <i class="far fa-calendar ml-2 text-purple-600"></i>
                            <span>{{ $guide->created_at->format('Y/m/d') }}</span>
                        </div>
                        @if($guide->author)
                        <div class="flex items-center">
                            <i class="far fa-user ml-2 text-purple-600"></i>
                            <span>{{ $guide->author }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="prose prose-lg max-w-none">
                        <div class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">
                            {{ $guide->content }}
                        </div>
                    </div>

                    <!-- Tips Section (if available) -->
                    @if($guide->tips)
                    <div class="mt-12 bg-purple-50 rounded-xl p-8">
                        <h3 class="text-2xl font-bold text-purple-900 mb-4 flex items-center">
                            <i class="fas fa-lightbulb ml-3 text-yellow-500"></i>
                            نصائح مفيدة
                        </h3>
                        <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                            {{ $guide->tips }}
                        </div>
                    </div>
                    @endif

                    <!-- Share Section -->
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">شاركي هذا الدليل:</h3>
                        <div class="flex gap-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" 
                               class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fab fa-facebook-f ml-2"></i> فيسبوك
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($guide->title) }}" target="_blank"
                               class="bg-sky-500 text-white px-6 py-3 rounded-lg hover:bg-sky-600 transition-colors">
                                <i class="fab fa-twitter ml-2"></i> تويتر
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($guide->title . ' - ' . request()->url()) }}" target="_blank"
                               class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                                <i class="fab fa-whatsapp ml-2"></i> واتساب
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-8 text-center">
                <a href="{{ route('hadiety.index') }}" 
                   class="inline-block bg-purple-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-purple-700 transition-colors shadow-lg">
                    <i class="fas fa-arrow-right ml-2"></i>
                    العودة إلى هديتي
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-lg">&copy; 2025 HAGTY. جميع الحقوق محفوظة.</p>
        </div>
    </footer>
</body>
</html>

