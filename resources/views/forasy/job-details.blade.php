<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }} - فورصى</title>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <!-- Company Header -->
                        <div class="flex items-start mb-6">
                            @if($job->company_logo)
                            <img src="{{ Storage::url($job->company_logo) }}" alt="{{ $job->company_name }}" class="w-20 h-20 rounded-lg mr-4">
                            @else
                            <div class="w-20 h-20 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-building text-3xl text-blue-600"></i>
                            </div>
                            @endif
                            <div class="flex-1">
                                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $job->title }}</h1>
                                <p class="text-xl text-gray-600 mb-3">{{ $job->company_name }}</p>
                                
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                                        {{ $job->job_type }}
                                    </span>
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                                        {{ $job->experience_level }}
                                    </span>
                                    @if($job->category)
                                    <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-semibold">
                                        {{ $job->category }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Job Info -->
                        <div class="border-t border-gray-200 pt-6 mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                @if($job->location)
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-map-marker-alt text-blue-600 ml-3 text-xl"></i>
                                    <div>
                                        <div class="text-sm text-gray-500">الموقع</div>
                                        <div class="font-semibold">{{ $job->location }}</div>
                                    </div>
                                </div>
                                @endif

                                @if($job->salary_range)
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-dollar-sign text-green-600 ml-3 text-xl"></i>
                                    <div>
                                        <div class="text-sm text-gray-500">نطاق الراتب</div>
                                        <div class="font-semibold">{{ $job->salary_range }}</div>
                                    </div>
                                </div>
                                @endif

                                @if($job->deadline)
                                <div class="flex items-center text-gray-700">
                                    <i class="far fa-calendar text-red-600 ml-3 text-xl"></i>
                                    <div>
                                        <div class="text-sm text-gray-500">آخر موعد للتقديم</div>
                                        <div class="font-semibold">{{ $job->deadline->format('Y/m/d') }}</div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="border-t border-gray-200 pt-6 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">📋 وصف الوظيفة</h2>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $job->description }}</p>
                        </div>

                        <!-- Requirements -->
                        @if($job->requirements)
                        <div class="border-t border-gray-200 pt-6 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">✅ المتطلبات</h2>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $job->requirements }}</p>
                        </div>
                        @endif

                        <!-- Responsibilities -->
                        @if($job->responsibilities)
                        <div class="border-t border-gray-200 pt-6 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">📌 المسؤوليات</h2>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $job->responsibilities }}</p>
                        </div>
                        @endif

                        <!-- Benefits -->
                        @if($job->benefits)
                        <div class="border-t border-gray-200 pt-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">🎁 المزايا</h2>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $job->benefits }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Apply Card -->
                    <div class="bg-white rounded-lg shadow-lg p-6 sticky top-24 mb-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">التقديم على الوظيفة</h3>
                        
                        @if($job->application_url)
                        <a href="{{ $job->application_url }}" 
                           target="_blank"
                           class="block w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-center px-6 py-4 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all text-lg font-bold mb-4">
                            <i class="fas fa-external-link-alt ml-2"></i>
                            تقدم الآن
                        </a>
                        @endif

                        @if($job->contact_email || $job->contact_phone)
                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <h4 class="font-bold text-gray-900 mb-3">معلومات الاتصال</h4>
                            
                            @if($job->contact_email)
                            <div class="flex items-center text-gray-700 mb-2">
                                <i class="fas fa-envelope ml-2 text-blue-600"></i>
                                <a href="mailto:{{ $job->contact_email }}" class="hover:text-blue-600 text-sm">
                                    {{ $job->contact_email }}
                                </a>
                            </div>
                            @endif

                            @if($job->contact_phone)
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-phone ml-2 text-green-600"></i>
                                <a href="tel:{{ $job->contact_phone }}" class="hover:text-green-600 text-sm">
                                    {{ $job->contact_phone }}
                                </a>
                            </div>
                            @endif
                        </div>
                        @endif

                        <div class="text-center text-sm text-gray-500 mt-4">
                            <i class="fas fa-shield-alt ml-1"></i>
                            معلوماتك محمية ومشفرة
                        </div>
                    </div>

                    <!-- Share -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">شارك الوظيفة</h3>
                        <div class="flex justify-center space-x-4 space-x-reverse">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank"
                               class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition-all">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($job->title) }}&url={{ urlencode(url()->current()) }}" 
                               target="_blank"
                               class="bg-sky-500 text-white p-3 rounded-full hover:bg-sky-600 transition-all">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($job->title . ' - ' . url()->current()) }}" 
                               target="_blank"
                               class="bg-green-600 text-white p-3 rounded-full hover:bg-green-700 transition-all">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Jobs -->
            @if($relatedJobs->count() > 0)
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                    وظائف <span style="color: #d94288">مشابهة</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedJobs as $relatedJob)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $relatedJob->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $relatedJob->company_name }}</p>
                            
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">{{ $relatedJob->job_type }}</span>
                                @if($relatedJob->location)
                                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">
                                    <i class="fas fa-map-marker-alt"></i> {{ $relatedJob->location }}
                                </span>
                                @endif
                            </div>

                            <a href="{{ route('forasy.jobs.show', $relatedJob->id) }}" 
                               class="block w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-center px-4 py-2 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all">
                                عرض التفاصيل
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

