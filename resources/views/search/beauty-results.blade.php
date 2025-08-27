<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتائج البحث - قسم الجمال - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #d94288; }
        .primary-text { color: #d94288; }
        .primary-border { border-color: #d94288; }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 to-violet-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-purple-500 to-violet-600 text-white shadow-xl sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-3xl font-bold hover:text-purple-200 transition duration-300">
                        <i class="fas fa-heart mr-2"></i>HAGTY
                    </a>
                </div>
                <div class="hidden md:flex space-x-8 space-x-reverse">
                    <a href="{{ route('home') }}" class="hover:text-purple-200 transition duration-300">الرئيسية</a>
                    <a href="{{ route('section', 'health') }}" class="hover:text-purple-200 transition duration-300">الصحة</a>
                    <a href="{{ route('section', 'fashion') }}" class="hover:text-purple-200 transition duration-300">الموضة</a>
                    <a href="{{ route('section', 'wedding') }}" class="hover:text-purple-200 transition duration-300">الزفاف</a>
                    <a href="{{ route('section', 'beauty') }}" class="hover:text-purple-200 transition duration-300 font-bold">الجمال</a>
                    <a href="{{ route('section', 'babies') }}" class="hover:text-purple-200 transition duration-300">الأطفال</a>
                    <a href="{{ route('section', 'accessoraty') }}" class="hover:text-purple-200 transition duration-300">أكسسوراتى</a>
                    <a href="{{ route('section', 'umomi') }}" class="hover:text-purple-200 transition duration-300">أومومتي</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Results Header -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-purple-500 to-violet-600 rounded-full mb-6">
                    <i class="fas fa-search text-white text-3xl"></i>
                </div>
                <h1 class="text-4xl font-bold text-gray-800 mb-4">🔍 نتائج البحث في قسم الجمال</h1>
                <p class="text-xl text-gray-600 mb-6">نتائج البحث عن: <span class="font-bold text-purple-600">"{{ $query }}"</span></p>
                <p class="text-lg text-gray-500">تم العثور على <span class="font-bold text-purple-600">{{ $totalResults }}</span> نتيجة</p>
            </div>

            <!-- Back to Beauty Section -->
            <div class="text-center mb-8">
                <a href="{{ route('section', 'beauty') }}" class="inline-flex items-center bg-gradient-to-r from-purple-500 to-violet-600 text-white px-6 py-3 rounded-xl hover:from-violet-600 hover:to-purple-500 transition-all duration-300 font-semibold">
                    <i class="fas fa-arrow-right ml-2"></i>
                    العودة إلى قسم الجمال
                </a>
            </div>
        </div>
    </section>

    <!-- Results Content -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($totalResults > 0)
                <!-- Plastic Surgeons -->
                @if($results['plastic_surgeons']->count() > 0)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">👨‍⚕️ جراحي التجميل</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($results['plastic_surgeons'] as $surgeon)
                        <div class="bg-white rounded-2xl shadow-xl p-8 border border-purple-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-violet-600 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-user-md text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $surgeon->name ?? 'جراح جديد' }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($surgeon->description ?? 'وصف الجراح', 100) }}</p>
                                <div class="flex justify-center space-x-4 space-x-reverse">
                                    <button class="bg-gradient-to-r from-purple-500 to-violet-600 text-white px-4 py-2 rounded-lg hover:from-violet-600 hover:to-purple-500 transition-all duration-300">
                                        <i class="fas fa-phone mr-2"></i>اتصل
                                    </button>
                                    <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-all duration-300">
                                        <i class="fas fa-calendar mr-2"></i>احجز
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Hair Stylists -->
                @if($results['hair_stylists']->count() > 0)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">💇‍♀️ مصففي الشعر</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($results['hair_stylists'] as $stylist)
                        <div class="bg-white rounded-2xl shadow-xl p-8 border border-purple-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-violet-600 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-cut text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $stylist->name ?? 'مصفف جديد' }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($stylist->description ?? 'وصف المصفف', 100) }}</p>
                                <div class="flex justify-center space-x-4 space-x-reverse">
                                    <button class="bg-gradient-to-r from-purple-500 to-violet-600 text-white px-4 py-2 rounded-lg hover:from-violet-600 hover:to-purple-500 transition-all duration-300">
                                        <i class="fas fa-phone mr-2"></i>اتصل
                                    </button>
                                    <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-all duration-300">
                                        <i class="fas fa-calendar mr-2"></i>احجز
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Beauty Shops -->
                @if($results['beauty_shops']->count() > 0)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">💄 محلات التجميل</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($results['beauty_shops'] as $shop)
                        <div class="bg-white rounded-2xl shadow-xl p-8 border border-purple-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-violet-600 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-store text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $shop->name ?? 'محل جديد' }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($shop->description ?? 'وصف المحل', 100) }}</p>
                                <div class="flex justify-center space-x-4 space-x-reverse">
                                    <button class="bg-gradient-to-r from-purple-500 to-violet-600 text-white px-4 py-2 rounded-lg hover:from-violet-600 hover:to-purple-500 transition-all duration-300">
                                        <i class="fas fa-map-marker-alt mr-2"></i>موقع
                                    </button>
                                    <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-all duration-300">
                                        <i class="fas fa-phone mr-2"></i>اتصل
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Beauty Tips -->
                @if($results['beauty_trends']->count() > 0)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">💡 نصائح الجمال</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($results['beauty_trends'] as $tip)
                        <div class="bg-white rounded-2xl shadow-xl p-8 border border-purple-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-violet-600 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-lightbulb text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $tip->tip ?? 'نصيحة جديدة' }}</h3>
                                <div class="flex justify-center space-x-4 space-x-reverse">
                                    <button class="bg-gradient-to-r from-purple-500 to-violet-600 text-white px-4 py-2 rounded-lg hover:from-violet-600 hover:to-purple-500 transition-all duration-300">
                                        <i class="fas fa-eye mr-2"></i>عرض
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            @else
                <!-- No Results -->
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-r from-gray-300 to-gray-400 rounded-full mb-8">
                        <i class="fas fa-search text-white text-6xl"></i>
                    </div>
                    <h2 class="text-4xl font-bold text-gray-600 mb-4">لم يتم العثور على نتائج</h2>
                    <p class="text-xl text-gray-500 mb-8">عذراً، لا توجد نتائج تطابق بحثك: <span class="font-bold text-gray-700">"{{ $query }}"</span></p>
                    <div class="space-y-4">
                        <p class="text-lg text-gray-600">جرب:</p>
                        <ul class="text-gray-500 space-y-2">
                            <li>• استخدام كلمات مختلفة</li>
                            <li>• البحث بكلمات أقل</li>
                            <li>• التأكد من صحة الكتابة</li>
                        </ul>
                    </div>
                    <div class="mt-8">
                        <a href="{{ route('section', 'beauty') }}" class="inline-flex items-center bg-gradient-to-r from-purple-500 to-violet-600 text-white px-8 py-4 rounded-xl hover:from-violet-600 hover:to-purple-500 transition-all duration-300 font-semibold text-lg">
                            <i class="fas fa-arrow-right ml-2"></i>
                            العودة إلى قسم الجمال
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-purple-500 to-violet-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-3xl font-bold mb-4">
                    <i class="fas fa-heart mr-2"></i>HAGTY
                </h3>
                <p class="text-xl mb-6">منصة شاملة لكل احتياجاتك النسائية</p>
                <div class="flex justify-center space-x-6 space-x-reverse">
                    <a href="#" class="hover:text-purple-200 transition duration-300">
                        <i class="fab fa-facebook text-2xl"></i>
                    </a>
                    <a href="#" class="hover:text-purple-200 transition duration-300">
                        <i class="fab fa-instagram text-2xl"></i>
                    </a>
                    <a href="#" class="hover:text-purple-200 transition duration-300">
                        <i class="fab fa-twitter text-2xl"></i>
                    </a>
                    <a href="#" class="hover:text-purple-200 transition duration-300">
                        <i class="fab fa-youtube text-2xl"></i>
                    </a>
                </div>
                <p class="mt-8 text-sm opacity-80">© 2024 منصة HAGTY. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>
</body>
</html>
