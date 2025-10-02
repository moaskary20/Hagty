<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $idea->title }} - مشروعي | HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-blue-50">
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
                    <a href="{{ route('mashroay.index') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2">
                        <i class="fas fa-arrow-right ml-2"></i> العودة لمشروعي
                    </a>
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2">الرئيسية</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Project Idea Details -->
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4">
            <!-- Breadcrumb -->
            <nav class="mb-8 text-sm">
                <a href="{{ route('home') }}" class="text-indigo-600 hover:underline">الرئيسية</a>
                <span class="mx-2">/</span>
                <a href="{{ route('mashroay.index') }}" class="text-indigo-600 hover:underline">مشروعي</a>
                <span class="mx-2">/</span>
                <span class="text-gray-600">{{ $idea->title }}</span>
            </nav>

            <!-- Main Content -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                @if($idea->image)
                <div class="w-full h-96 overflow-hidden">
                    <img src="{{ Storage::url($idea->image) }}" alt="{{ $idea->title }}" class="w-full h-full object-cover">
                </div>
                @else
                <div class="w-full h-96 bg-gradient-to-r from-indigo-400 to-blue-400 flex items-center justify-center">
                    <i class="fas fa-lightbulb text-9xl text-white opacity-50"></i>
                </div>
                @endif

                <div class="p-8 md:p-12">
                    <!-- Category & Budget -->
                    <div class="mb-6 flex flex-wrap gap-3">
                        @if($idea->category)
                        <span class="inline-block bg-indigo-100 text-indigo-800 px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="fas fa-tag ml-2"></i>{{ $idea->category }}
                        </span>
                        @endif
                        @if($idea->budget_range)
                        <span class="inline-block bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="fas fa-coins ml-2"></i>{{ $idea->budget_range }}
                        </span>
                        @endif
                        @if($idea->difficulty_level)
                        <span class="inline-block bg-{{ $idea->difficulty_level == 'سهل' ? 'blue' : ($idea->difficulty_level == 'متوسط' ? 'yellow' : 'red') }}-100 
                                     text-{{ $idea->difficulty_level == 'سهل' ? 'blue' : ($idea->difficulty_level == 'متوسط' ? 'yellow' : 'red') }}-800 
                                     px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="fas fa-chart-line ml-2"></i>{{ $idea->difficulty_level }}
                        </span>
                        @endif
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                        {{ $idea->title }}
                    </h1>

                    <!-- Meta Info -->
                    <div class="flex items-center text-gray-600 text-sm mb-8 pb-8 border-b border-gray-200">
                        <div class="flex items-center ml-6">
                            <i class="far fa-calendar ml-2 text-indigo-600"></i>
                            <span>{{ $idea->created_at->format('Y/m/d') }}</span>
                        </div>
                        @if($idea->target_market)
                        <div class="flex items-center">
                            <i class="fas fa-bullseye ml-2 text-indigo-600"></i>
                            <span>{{ $idea->target_market }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="prose prose-lg max-w-none mb-12">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">نظرة عامة</h2>
                        <div class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">
                            {{ $idea->description }}
                        </div>
                    </div>

                    <!-- Requirements -->
                    @if($idea->requirements)
                    <div class="mb-12 bg-blue-50 rounded-xl p-8">
                        <h3 class="text-2xl font-bold text-blue-900 mb-4 flex items-center">
                            <i class="fas fa-clipboard-list ml-3 text-blue-600"></i>
                            المتطلبات الأساسية
                        </h3>
                        <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                            {{ $idea->requirements }}
                        </div>
                    </div>
                    @endif

                    <!-- Steps -->
                    @if($idea->steps)
                    <div class="mb-12 bg-indigo-50 rounded-xl p-8">
                        <h3 class="text-2xl font-bold text-indigo-900 mb-4 flex items-center">
                            <i class="fas fa-list-ol ml-3 text-indigo-600"></i>
                            خطوات التنفيذ
                        </h3>
                        <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                            {{ $idea->steps }}
                        </div>
                    </div>
                    @endif

                    <!-- Expected ROI -->
                    @if($idea->expected_roi)
                    <div class="mb-12 bg-green-50 rounded-xl p-8">
                        <h3 class="text-2xl font-bold text-green-900 mb-4 flex items-center">
                            <i class="fas fa-chart-line ml-3 text-green-600"></i>
                            العائد المتوقع
                        </h3>
                        <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                            {{ $idea->expected_roi }}
                        </div>
                    </div>
                    @endif

                    <!-- Share Section -->
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">شاركي هذه الفكرة:</h3>
                        <div class="flex gap-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" 
                               class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fab fa-facebook-f ml-2"></i> فيسبوك
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($idea->title) }}" target="_blank"
                               class="bg-sky-500 text-white px-6 py-3 rounded-lg hover:bg-sky-600 transition-colors">
                                <i class="fab fa-twitter ml-2"></i> تويتر
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($idea->title . ' - ' . request()->url()) }}" target="_blank"
                               class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                                <i class="fab fa-whatsapp ml-2"></i> واتساب
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank"
                               class="bg-blue-800 text-white px-6 py-3 rounded-lg hover:bg-blue-900 transition-colors">
                                <i class="fab fa-linkedin-in ml-2"></i> لينكد إن
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-8 text-center">
                <a href="{{ route('mashroay.index') }}" 
                   class="inline-block bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:from-indigo-700 hover:to-blue-700 transition-colors shadow-lg">
                    <i class="fas fa-arrow-right ml-2"></i>
                    العودة إلى مشروعي
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

