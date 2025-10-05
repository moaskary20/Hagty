<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انضم لنا - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/join-us-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/join-us-animations.css') }}">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #A15DBF; }
        .primary-text { color: #A15DBF; }
        .primary-border { border-color: #A15DBF; }
    </style>
</head>
<body class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] min-h-screen">
    @include('components.shared-header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">انضم إلينا</h1>
            <p class="text-xl md:text-2xl animate-fadeInUp" style="animation-delay: 0.2s;">كن جزءاً من مجتمع HAGTY وقدم خدماتك للنساء العربيات</p>
        </div>
    </section>

    <!-- What We Offer -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#A15DBF] mb-4 animate-fadeInUp">ما نقدمه لك</h2>
                <p class="text-lg text-gray-600">منصة شاملة لمساعدتك في تقديم خدماتك للنساء العربيات</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow animate-fadeInUp">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">جمهور مستهدف</h3>
                    <p class="text-gray-600">الوصول إلى آلاف النساء العربيات المهتمات بخدماتك</p>
                </div>
                
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow animate-fadeInUp">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">نمو الأعمال</h3>
                    <p class="text-gray-600">زيادة مبيعاتك ووصولك إلى عملاء جدد</p>
                </div>
                
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow animate-fadeInUp">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">أدوات متطورة</h3>
                    <p class="text-gray-600">أدوات إدارة متقدمة لتسهيل عملك</p>
                </div>
                
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow animate-fadeInUp">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">دعم فني</h3>
                    <p class="text-gray-600">فريق دعم متخصص لمساعدتك في كل خطوة</p>
                </div>
                
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow animate-fadeInUp">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">أمان وموثوقية</h3>
                    <p class="text-gray-600">بيئة آمنة وموثوقة لجميع المعاملات</p>
                </div>
                
                <div class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow animate-fadeInUp">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">تميز وبروز</h3>
                    <p class="text-gray-600">إبراز خدماتك وتميزها عن المنافسين</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services We Support -->
    <section class="py-16 bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#A15DBF] mb-4 animate-fadeInUp">الخدمات التي ندعمها</h2>
                <p class="text-lg text-gray-600">نرحب بمقدمي الخدمات في جميع المجالات</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- رحلتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'rehlaaty') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=400&fit=crop&crop=center" 
                                 alt="رحلتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">رحلتي</h3>
                    <p class="text-sm text-gray-600 mt-1">اكتشفي العالم</p>
                </div>

                <!-- عائلتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'family') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?w=400&h=400&fit=crop&crop=center" 
                                 alt="عائلتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">عائلتي</h3>
                    <p class="text-sm text-gray-600 mt-1">رعاية العائلة</p>
                </div>

                <!-- أومومتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'umomi') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?w=400&h=400&fit=crop&crop=center" 
                                 alt="أومومتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">أومومتي</h3>
                    <p class="text-sm text-gray-600 mt-1">رعاية الأمومة</p>
                </div>

                <!-- زفافي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'wedding') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=400&h=400&fit=crop&crop=center" 
                                 alt="زفافي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">زفافي</h3>
                    <p class="text-sm text-gray-600 mt-1">يومك الخاص</p>
                </div>

                <!-- جمالي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'beauty') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=400&h=400&fit=crop&crop=center" 
                                 alt="جمالي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">جمالي</h3>
                    <p class="text-sm text-gray-600 mt-1">عناية وجمال</p>
                </div>

                <!-- أكسسوراتى -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'accessoraty') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400&h=400&fit=crop&crop=center" 
                                 alt="أكسسوراتى" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">أكسسوراتى</h3>
                    <p class="text-sm text-gray-600 mt-1">إكسسوارات عصرية</p>
                </div>

                <!-- صحتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'health') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400&h=400&fit=crop&crop=center" 
                                 alt="صحتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">صحتي</h3>
                    <p class="text-sm text-gray-600 mt-1">رعاية صحية</p>
                </div>

                <!-- أطفالي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'babies') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?w=400&h=400&fit=crop&crop=center" 
                                 alt="أطفالي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">أطفالي</h3>
                    <p class="text-sm text-gray-600 mt-1">رعاية الأطفال</p>
                </div>

                <!-- الموضة -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'fashion') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?w=400&h=400&fit=crop&crop=center" 
                                 alt="الموضة" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">الموضة</h3>
                    <p class="text-sm text-gray-600 mt-1">أحدث الصيحات</p>
                </div>

                <!-- فرحي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'joy') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400&h=400&fit=crop&crop=center" 
                                 alt="فرحي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">فرحي</h3>
                    <p class="text-sm text-gray-600 mt-1">مناسبات سعيدة</p>
                </div>

                <!-- ايفينتاتى -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('eventaty.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=400&h=400&fit=crop&crop=center" 
                                 alt="ايفينتاتى" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">ايفينتاتى</h3>
                    <p class="text-sm text-gray-600 mt-1">فعاليات وحفلات</p>
                </div>

                <!-- فورصى -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('forasy.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=400&h=400&fit=crop&crop=center" 
                                 alt="فورصى" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">فورصى</h3>
                    <p class="text-sm text-gray-600 mt-1">فرص عمل</p>
                </div>

                <!-- هديتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('hadiety.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1513885535751-8b9238bd345a?w=400&h=400&fit=crop&crop=center" 
                                 alt="هديتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">هديتي</h3>
                    <p class="text-sm text-gray-600 mt-1">أفكار هدايا</p>
                </div>

                <!-- بيتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('beity.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1484101403633-562f891dc89a?w=400&h=400&fit=crop&crop=center" 
                                 alt="بيتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">بيتي</h3>
                    <p class="text-sm text-gray-600 mt-1">ديكور وأثاث</p>
                </div>

                <!-- حساباتى -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('hesabaty.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=400&h=400&fit=crop&crop=center" 
                                 alt="حساباتى" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">حساباتى</h3>
                    <p class="text-sm text-gray-600 mt-1">إدارة مالية</p>
                </div>

                <!-- رياضتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('riadaty.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?w=400&h=400&fit=crop&crop=center" 
                                 alt="رياضتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">رياضتي</h3>
                    <p class="text-sm text-gray-600 mt-1">لياقة ورياضة</p>
                </div>

                <!-- مشروعي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('mashroay.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&h=400&fit=crop&crop=center" 
                                 alt="مشروعي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">مشروعي</h3>
                    <p class="text-sm text-gray-600 mt-1">ريادة أعمال</p>
                </div>

                <!-- مستشاري -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('mostashary.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop&crop=center" 
                                 alt="مستشاري" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">مستشاري</h3>
                    <p class="text-sm text-gray-600 mt-1">استشارات متنوعة</p>
                </div>

                <!-- مستمعي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('mostamay.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=400&fit=crop&crop=center" 
                                 alt="مستمعي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">مستمعي</h3>
                    <p class="text-sm text-gray-600 mt-1">تطوير ذات</p>
                </div>

                <!-- نساء الغد -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('nesaa-alghad.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400&h=400&fit=crop&crop=center" 
                                 alt="نساء الغد" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">نساء الغد</h3>
                    <p class="text-sm text-gray-600 mt-1">تمكين المرأة</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How to Join -->
    <section class="py-16 bg-gradient-to-br from-gray-50 to-pink-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">كيف تنضم إلينا؟</h2>
                <p class="text-lg text-gray-600">خطوات بسيطة لتصبح جزءاً من مجتمع HAGTY</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-d94288 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">
                        1
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">قدم طلب الانضمام</h3>
                    <p class="text-gray-600">املأ النموذج أدناه بالمعلومات المطلوبة عن خدماتك</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-d94288 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">
                        2
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">مراجعة الطلب</h3>
                    <p class="text-gray-600">سنراجع طلبك ونتواصل معك خلال 48 ساعة</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-d94288 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">
                        3
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">ابدأ عملك</h3>
                    <p class="text-gray-600">بعد الموافقة، ستحصل على حسابك وتبدأ في تقديم خدماتك</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Form -->
    <section class="py-16 bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8]">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-gradient-to-br from-pink-50 to-purple-50 p-8 rounded-2xl">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">قدم طلب الانضمام</h2>
                    <p class="text-lg text-gray-600">املأ النموذج أدناه وسنتواصل معك قريباً</p>
                </div>
                
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="business_name" class="block text-sm font-medium text-gray-700 mb-2">اسم العمل/الخدمة</label>
                            <input type="text" id="business_name" name="business_name" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288">
                        </div>
                        <div>
                            <label for="contact_person" class="block text-sm font-medium text-gray-700 mb-2">اسم المسؤول</label>
                            <input type="text" id="contact_person" name="contact_person" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف</label>
                            <input type="tel" id="phone" name="phone" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288">
                        </div>
                    </div>
                    
                    <div>
                        <label for="service_type" class="block text-sm font-medium text-gray-700 mb-2">نوع الخدمة</label>
                        <select id="service_type" name="service_type" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288">
                            <option value="">اختر نوع الخدمة</option>
                            <option value="gifts">هدايا وتسوق</option>
                            <option value="home">ديكورات منزلية</option>
                            <option value="fitness">رياضة ولياقة</option>
                            <option value="consulting">استشارات مهنية</option>
                            <option value="health">خدمات صحية</option>
                            <option value="education">تعليم وتدريب</option>
                            <option value="events">فعاليات ومناسبات</option>
                            <option value="personal">خدمات شخصية</option>
                            <option value="other">أخرى</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">وصف الخدمة</label>
                        <textarea id="description" name="description" rows="4" required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288"
                                  placeholder="اكتب وصفاً مفصلاً عن الخدمات التي تقدمها..."></textarea>
                    </div>
                    
                    <div>
                        <label for="experience" class="block text-sm font-medium text-gray-700 mb-2">سنوات الخبرة</label>
                        <select id="experience" name="experience" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288">
                            <option value="">اختر سنوات الخبرة</option>
                            <option value="0-1">أقل من سنة</option>
                            <option value="1-3">1-3 سنوات</option>
                            <option value="3-5">3-5 سنوات</option>
                            <option value="5-10">5-10 سنوات</option>
                            <option value="10+">أكثر من 10 سنوات</option>
                        </select>
                    </div>
                    
                    <button type="submit"
                            class="w-full bg-d94288 text-white py-4 px-8 rounded-xl font-semibold text-lg hover:bg-pink-700 transition-colors duration-300">
                        <i class="fas fa-paper-plane ml-2"></i>
                        إرسال طلب الانضمام
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Contact Info -->
    <section class="py-16 bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold mb-4">هل لديك أسئلة؟</h2>
                <p class="text-lg text-gray-300">تواصل معنا وسنكون سعداء لمساعدتك</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <i class="fas fa-phone text-3xl text-d94288 mb-4"></i>
                    <h3 class="text-xl font-bold mb-2">الهاتف</h3>
                    <p class="text-gray-300">+20 123 456 7890</p>
                </div>
                
                <div>
                    <i class="fas fa-envelope text-3xl text-d94288 mb-4"></i>
                    <h3 class="text-xl font-bold mb-2">البريد الإلكتروني</h3>
                    <p class="text-gray-300">partners@hagty.com</p>
                </div>
                
                <div>
                    <i class="fas fa-clock text-3xl text-[#A15DBF] mb-4"></i>
                    <h3 class="text-xl font-bold mb-2">ساعات العمل</h3>
                    <p class="text-gray-300">الأحد - الخميس: 9:00 ص - 6:00 م</p>
                </div>
            </div>
        </div>
    </section>

    @include('components.shared-footer')

    <!-- Join Us Interactions JavaScript -->
    <script src="{{ asset('js/join-us-interactions.js') }}"></script>
</body>
</html>
