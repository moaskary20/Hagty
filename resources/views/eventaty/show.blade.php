<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }} - ايفينتاتى</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #d94288; }
        .primary-text { color: #d94288; }
        .primary-border { border-color: #d94288; }
        
        .gallery-image {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .gallery-image:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 to-pink-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        @php
                            $logoPath = \App\Models\Setting::get('site_logo', 'images/hagty-logo.png');
                            $siteName = \App\Models\Setting::get('site_name', 'HAGTY');
                        @endphp
                        <img src="{{ asset($logoPath) }}" alt="{{ $siteName }}" class="h-12">
                    </a>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="{{ route('eventaty.index') }}" class="text-gray-700 hover:text-d94288 px-3 py-2">
                        <i class="fas fa-arrow-right ml-2"></i>
                        العودة لايفينتاتى
                    </a>
                    @auth
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-d94288 px-3 py-2">الرئيسية</a>
                        <a href="#" class="auth-btn-primary px-6 py-2 rounded-lg">{{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-d94288 px-3 py-2">الرئيسية</a>
                        <a href="{{ route('login') }}" class="auth-btn-secondary px-6 py-2 rounded-lg">تسجيل الدخول</a>
                        <a href="{{ route('register') }}" class="auth-btn-primary px-6 py-2 rounded-lg">إنشاء حساب</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    @if(session('error'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    </div>
    @endif

    <!-- Event Details -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Event Image -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                        <img src="{{ $event->image ? Storage::url($event->image) : 'https://via.placeholder.com/800x400?text=Event' }}" 
                             alt="{{ $event->title }}" 
                             class="w-full h-96 object-cover">
                        @if($event->is_featured)
                        <div class="absolute top-4 right-4 bg-yellow-400 text-yellow-900 px-4 py-2 rounded-full font-bold">
                            ⭐ فعالية مميزة
                        </div>
                        @endif
                    </div>

                    <!-- Event Info -->
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="mb-6">
                            <span class="inline-block bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                                {{ $event->event_type }}
                            </span>
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $event->title }}</h1>
                            
                            <div class="flex flex-wrap gap-6 text-gray-600 mb-6">
                                <div class="flex items-center">
                                    <i class="far fa-calendar ml-2 text-purple-600"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->event_date)->format('Y/m/d') }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-clock ml-2 text-purple-600"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->event_date)->format('H:i') }}</span>
                                </div>
                                @if($event->duration_hours)
                                <div class="flex items-center">
                                    <i class="fas fa-hourglass-half ml-2 text-purple-600"></i>
                                    <span>{{ $event->duration_hours }} ساعة</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="border-t border-gray-200 pt-6 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">📝 عن الفعالية</h2>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $event->description }}</p>
                        </div>

                        @if($event->location)
                        <div class="border-t border-gray-200 pt-6 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">📍 الموقع</h2>
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt ml-3 mt-1 text-purple-600"></i>
                                <div>
                                    <p class="text-gray-700 mb-2">{{ $event->location }}</p>
                                    @if($event->google_maps_url)
                                    <a href="{{ $event->google_maps_url }}" target="_blank" 
                                       class="text-purple-600 hover:text-purple-800 underline">
                                        عرض على الخريطة
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($event->organizer_name)
                        <div class="border-t border-gray-200 pt-6 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">👤 المنظم</h2>
                            <div class="space-y-2">
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-user ml-3 text-purple-600"></i>
                                    <span>{{ $event->organizer_name }}</span>
                                </div>
                                @if($event->organizer_phone)
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-phone ml-3 text-purple-600"></i>
                                    <a href="tel:{{ $event->organizer_phone }}" class="hover:text-purple-600">{{ $event->organizer_phone }}</a>
                                </div>
                                @endif
                                @if($event->organizer_email)
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-envelope ml-3 text-purple-600"></i>
                                    <a href="mailto:{{ $event->organizer_email }}" class="hover:text-purple-600">{{ $event->organizer_email }}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif

                        @if($event->gallery_images && is_array($event->gallery_images) && count($event->gallery_images) > 0)
                        <div class="border-t border-gray-200 pt-6 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">🖼️ معرض الصور</h2>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($event->gallery_images as $image)
                                <img src="{{ Storage::url($image) }}" 
                                     alt="Gallery Image" 
                                     class="gallery-image w-full h-40 object-cover rounded-lg shadow-md">
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($event->terms_conditions)
                        <div class="border-t border-gray-200 pt-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">📋 الشروط والأحكام</h2>
                            <p class="text-gray-700 text-sm">{{ $event->terms_conditions }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Booking Card -->
                    <div class="bg-white rounded-lg shadow-lg p-6 sticky top-24">
                        <div class="text-center mb-6">
                            <div class="text-4xl font-bold text-d94288 mb-2">
                                {{ $event->price ? number_format($event->price) . ' جنيه' : 'مجاناً' }}
                            </div>
                            <div class="text-sm text-gray-500">السعر للفرد</div>
                        </div>

                        @if($event->max_attendees)
                        <div class="bg-purple-50 rounded-lg p-4 mb-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-700">المقاعد المتاحة:</span>
                                <span class="font-bold text-purple-600">{{ $event->availableSeats() }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-purple-600 to-pink-600 h-2 rounded-full" 
                                     style="width: {{ ($event->current_attendees / $event->max_attendees) * 100 }}%"></div>
                            </div>
                            <div class="text-xs text-gray-500 mt-1 text-center">
                                {{ $event->current_attendees }} / {{ $event->max_attendees }} محجوز
                            </div>
                        </div>
                        @endif

                        @if($event->isAvailable())
                        <a href="{{ route('eventaty.booking.form', $event->id) }}" 
                           class="block w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white text-center px-6 py-4 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-all text-lg font-bold mb-4">
                            <i class="fas fa-ticket-alt ml-2"></i>
                            احجز الآن
                        </a>
                        @else
                        <div class="block w-full bg-gray-400 text-white text-center px-6 py-4 rounded-lg text-lg font-bold mb-4 cursor-not-allowed">
                            <i class="fas fa-times-circle ml-2"></i>
                            المقاعد ممتلئة
                        </div>
                        @endif

                        <div class="text-center text-sm text-gray-500 mb-6">
                            <i class="fas fa-shield-alt ml-1"></i>
                            حجز آمن ومضمون
                        </div>

                        @if($event->facebook_url || $event->instagram_url || $event->website_url)
                        <div class="border-t border-gray-200 pt-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 text-center">تابعنا</h3>
                            <div class="flex justify-center space-x-4 space-x-reverse">
                                @if($event->facebook_url)
                                <a href="{{ $event->facebook_url }}" target="_blank" 
                                   class="text-blue-600 hover:text-blue-800 text-2xl">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                @endif
                                @if($event->instagram_url)
                                <a href="{{ $event->instagram_url }}" target="_blank" 
                                   class="text-pink-600 hover:text-pink-800 text-2xl">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                @endif
                                @if($event->website_url)
                                <a href="{{ $event->website_url }}" target="_blank" 
                                   class="text-gray-600 hover:text-gray-800 text-2xl">
                                    <i class="fas fa-globe"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Related Events -->
            @if($relatedEvents->count() > 0)
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                    فعاليات <span class="text-d94288">مشابهة</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedEvents as $relatedEvent)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all">
                        <img src="{{ $relatedEvent->image ? Storage::url($relatedEvent->image) : 'https://via.placeholder.com/400x300?text=Event' }}" 
                             alt="{{ $relatedEvent->title }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-6">
                            <span class="inline-block bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs font-semibold mb-3">
                                {{ $relatedEvent->event_type }}
                            </span>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $relatedEvent->title }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit($relatedEvent->description, 80) }}</p>
                            <div class="flex items-center justify-between mb-4">
                                <div class="text-xl font-bold text-d94288">
                                    {{ $relatedEvent->price ? number_format($relatedEvent->price) . ' جنيه' : 'مجاناً' }}
                                </div>
                            </div>
                            <a href="{{ route('eventaty.show', $relatedEvent->id) }}" 
                               class="block w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white text-center px-4 py-2 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-all">
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

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-4">منصة HAGTY</h3>
                <p class="text-gray-400 mb-6">منصة شاملة لكل احتياجاتك</p>
                <div class="flex justify-center space-x-6 space-x-reverse">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-facebook text-2xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-twitter text-2xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-instagram text-2xl"></i>
                    </a>
                </div>
                <p class="text-gray-500 mt-6">&copy; 2024 HAGTY. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>
</body>
</html>

