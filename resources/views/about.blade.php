<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عنا - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about-animations.css') }}">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #A15DBF; }
        .primary-text { color: #A15DBF; }
        .primary-border { border-color: #A15DBF; }
    </style>
</head>
<body class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] min-h-screen">
    @include('components.shared-header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">من نحن؟</h1>
            <p class="text-xl md:text-2xl animate-fadeInUp" style="animation-delay: 0.2s;">منصة شاملة للمرأة العربية - كل ما تحتاجينه في مكان واحد</p>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-[#A15DBF] mb-6 animate-fadeInUp">رؤيتنا</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        نؤمن أن كل امرأة تستحق أن تحصل على جميع الخدمات والمنتجات التي تحتاجها في مكان واحد، 
                        مع ضمان الجودة والموثوقية في كل تفصيل.
                    </p>
                    <p class="text-lg text-gray-600 mb-8">
                        منصة HAGTY هي منصة شاملة مصممة خصيصاً للمرأة العربية، تجمع بين جميع احتياجاتها 
                        اليومية في مكان واحد مريح وسهل الاستخدام.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] p-8 rounded-2xl animate-fadeInUp" style="animation-delay: 0.3s;">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600&h=400&fit=crop&crop=center" 
                         alt="منصة HAGTY" 
                         class="w-full h-64 object-cover rounded-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">خدماتنا</h2>
                <p class="text-lg text-gray-600">نقدم مجموعة شاملة من الخدمات لتلبية جميع احتياجاتك</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] p-6 rounded-xl hover:shadow-lg transition-shadow animate-fadeInUp">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">هديتي</h3>
                    <p class="text-gray-600">أفكار هدايا رائعة ودليل تسوق ذكي</p>
                </div>
                
                <div class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] p-6 rounded-xl hover:shadow-lg transition-shadow animate-fadeInUp" style="animation-delay: 0.1s;">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">بيتي</h3>
                    <p class="text-gray-600">ديكورات وأفكار لتجميل منزلك</p>
                </div>
                
                <div class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] p-6 rounded-xl hover:shadow-lg transition-shadow animate-fadeInUp" style="animation-delay: 0.2s;">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">حساباتى</h3>
                    <p class="text-gray-600">إدارة مالية ذكية ومتطورة</p>
                </div>
                
                <div class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] p-6 rounded-xl hover:shadow-lg transition-shadow animate-fadeInUp" style="animation-delay: 0.3s;">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">رياضتي</h3>
                    <p class="text-gray-600">خطط تدريب وتمارين مخصصة</p>
                </div>
                
                <div class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] p-6 rounded-xl hover:shadow-lg transition-shadow animate-fadeInUp" style="animation-delay: 0.4s;">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">مشروعي</h3>
                    <p class="text-gray-600">أفكار مشاريع ونصائح ريادة أعمال</p>
                </div>
                
                <div class="bg-gradient-to-br from-teal-50 to-cyan-50 p-6 rounded-xl hover:shadow-lg transition-shadow">
                    <div class="text-4xl text-[#A15DBF] mb-4">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">مستشاري</h3>
                    <p class="text-gray-600">استشارات صحية ومهنية وعائلية</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Mission -->
    <section class="py-16 bg-gradient-to-br from-gray-50 to-pink-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">مهمتنا</h2>
                <p class="text-lg text-gray-600">نسعى لتمكين المرأة العربية ومساعدتها في تحقيق أهدافها</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-[#A15DBF] text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">الجودة</h3>
                    <p class="text-gray-600">نقدم خدمات عالية الجودة ومضمونة</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-[#A15DBF] text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">الأمان</h3>
                    <p class="text-gray-600">بياناتك آمنة ومحمية معنا</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-[#A15DBF] text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">الرعاية</h3>
                    <p class="text-gray-600">نحن نهتم بكل تفصيل في رحلتك</p>
                </div>
            </div>
        </div>
    </section>

    @include('components.shared-footer')

    <!-- About Interactions JavaScript -->
    <script src="{{ asset('js/about-interactions.js') }}"></script>
</body>
</html>
