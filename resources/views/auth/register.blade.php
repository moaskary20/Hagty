<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #d94288; }
        .primary-text { color: #d94288; }
        .primary-border { border-color: #d94288; }
        
        /* CSS للـ Header والـ Footer */
        .primary-color {
            color: #d94288;
        }
        
        .menu-item {
            transition: all 0.3s ease;
        }
        
        .menu-item:hover {
            background-color: #d94288;
            color: white;
        }
        
        .auth-btn-primary {
            background: #d94288;
            color: white;
            border: none;
        }
        
        .auth-btn-primary:hover {
            background: #c13a7a;
            color: white;
        }
        
        .auth-btn-secondary {
            background: white;
            color: #d94288;
            border: 2px solid #d94288;
        }
        
        .auth-btn-secondary:hover {
            background: #d94288;
            color: white;
        }
        
        /* CSS للـ Footer */
        .enhanced-footer {
            background: linear-gradient(135deg, #d94288 0%, #8b5cf6 100%);
            position: relative;
        }
        
        .enhanced-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        
        .footer-logo-section {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .footer-logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            color: white;
            box-shadow: 0 10px 30px rgba(251, 191, 36, 0.3);
        }
        
        .footer-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }
        
        .footer-subtitle {
            font-size: 1.1rem;
            color: #e5e7eb;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .footer-section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #fbbf24;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .footer-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #e5e7eb;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 0.5rem;
            border-radius: 0.5rem;
        }
        
        .footer-link:hover {
            color: #fbbf24;
            background: rgba(251, 191, 36, 0.1);
            transform: translateX(-5px);
        }
        
        .footer-contact-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #e5e7eb;
            margin-bottom: 0.75rem;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .footer-contact-item:hover {
            background: rgba(251, 191, 36, 0.1);
            transform: translateX(-5px);
        }
        
        .social-media-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .social-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 1.25rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .social-icon.facebook {
            background: linear-gradient(135deg, #1877f2 0%, #0d6efd 100%);
        }
        
        .social-icon.instagram {
            background: linear-gradient(135deg, #e4405f 0%, #c13584 100%);
        }
        
        .social-icon.tiktok {
            background: linear-gradient(135deg, #000000 0%, #25f4ee 100%);
        }
        
        .social-icon:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        
        .app-download-section-footer {
            text-align: center;
        }
        
        .app-download-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #fbbf24;
            margin-bottom: 1rem;
        }
        
        .download-button-footer {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            text-decoration: none;
            margin: 0.5rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .download-button-footer:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .copyright-text {
            color: #d1d5db;
            margin-bottom: 0.5rem;
        }
        
        .love-text {
            color: #fbbf24;
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-pink-50 to-purple-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="text-2xl font-bold primary-color">HAGTY</div>
                </div>
                
                <!-- Navigation Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4 space-x-reverse">
                        <a href="{{ route('home') }}#home" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الرئيسية</a>
                        <a href="{{ route('section', 'accessoraty') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">أكسسوراتى</a>
                        <a href="{{ route('section', 'health') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الصحة</a>
                        <a href="{{ route('section', 'fashion') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الموضة</a>
                        <a href="{{ route('section', 'babies') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الأطفال</a>
                        <a href="{{ route('section', 'wedding') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الزفاف</a>
                        <a href="{{ route('section', 'beauty') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الجمال</a>
                        <a href="{{ route('section', 'umomi') }}" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">أومومتي</a>
                    </div>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-3 space-x-reverse">
                    <a href="{{ route('login') }}" class="auth-btn-primary px-5 py-2.5 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:ring-offset-2 transition-all duration-300 text-sm font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fas fa-sign-in-alt ml-2"></i>الدخول
                    </a>
                    <a href="{{ route('register') }}" class="auth-btn-secondary px-5 py-2.5 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:ring-offset-2 transition-all duration-300 text-sm font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fas fa-user-plus ml-2"></i>الاشتراك
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Register Form -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="mx-auto h-20 w-20 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-user-plus text-white text-3xl"></i>
                </div>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                    انضم إلى منصة HAGTY
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    أنشئ حسابك الجديد واستمتع بجميع الميزات
                </p>
            </div>

            @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user ml-2"></i>الاسم الأول
                            </label>
                            <input id="first_name" name="first_name" type="text" required 
                                   class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                   placeholder="الاسم الأول"
                                   value="{{ old('first_name') }}">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user ml-2"></i>الاسم الأخير
                            </label>
                            <input id="last_name" name="last_name" type="text" required 
                                   class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                   placeholder="الاسم الأخير"
                                   value="{{ old('last_name') }}">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope ml-2"></i>البريد الإلكتروني
                        </label>
                        <input id="email" name="email" type="email" required 
                               class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                               placeholder="أدخل بريدك الإلكتروني"
                               value="{{ old('email') }}">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-phone ml-2"></i>رقم الهاتف
                        </label>
                        <input id="phone" name="phone" type="tel" required 
                               class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                               placeholder="أدخل رقم هاتفك"
                               value="{{ old('phone') }}">
                    </div>

                    <div>
                        <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-calendar ml-2"></i>تاريخ الميلاد
                        </label>
                        <input id="birth_date" name="birth_date" type="date" required 
                               class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                               value="{{ old('birth_date') }}">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock ml-2"></i>كلمة المرور
                        </label>
                        <input id="password" name="password" type="password" required 
                               class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                               placeholder="أدخل كلمة المرور (8 أحرف على الأقل)">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock ml-2"></i>تأكيد كلمة المرور
                        </label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                               class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                               placeholder="أعد إدخال كلمة المرور">
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required
                           class="h-4 w-4 text-d94288 focus:ring-d94288 border-gray-300 rounded">
                    <label for="terms" class="mr-2 block text-sm text-gray-900">
                        أوافق على 
                        <a href="#" class="font-medium text-d94288 hover:text-purple-600 transition duration-300">
                            الشروط والأحكام
                        </a>
                        و
                        <a href="#" class="font-medium text-d94288 hover:text-purple-600 transition duration-300">
                            سياسة الخصوصية
                        </a>
                    </label>
                </div>

                <div>
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-4 px-6 border border-transparent text-base font-bold rounded-xl text-white bg-gradient-to-r from-d94288 to-purple-600 hover:from-purple-600 hover:to-d94288 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-d94288 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <span class="absolute left-0 inset-y-0 flex items-center pr-4">
                            <i class="fas fa-user-plus text-white text-lg"></i>
                        </span>
                        إنشاء حساب جديد
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        لديك حساب بالفعل؟
                        <a href="{{ route('login') }}" class="font-bold text-d94288 hover:text-purple-600 transition duration-300 underline decoration-2 underline-offset-4 hover:decoration-purple-600">
                            سجل دخولك
                        </a>
                    </p>
                </div>
            </form>

            <!-- Social Register -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-gradient-to-br from-pink-50 to-purple-50 text-gray-500">أو سجل عبر</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <div>
                        <a href="#" class="w-full inline-flex justify-center py-3 px-4 border-2 border-gray-300 rounded-xl shadow-md bg-white text-sm font-semibold text-gray-600 hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 transform hover:-translate-y-0.5">
                            <i class="fab fa-google text-red-500 text-lg ml-2"></i>
                            <span class="mr-2">Google</span>
                        </a>
                    </div>

                    <div>
                        <a href="#" class="w-full inline-flex justify-center py-3 px-4 border-2 border-gray-300 rounded-xl shadow-md bg-white text-sm font-semibold text-gray-600 hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 transform hover:-translate-y-0.5">
                            <i class="fab fa-facebook text-blue-600 text-lg ml-2"></i>
                            <span class="mr-2">Facebook</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.shared-footer')
</body>
</html>
