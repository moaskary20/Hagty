<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - منصة HAGTY</title>
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
<body class="bg-gradient-to-br from-pink-50 to-purple-50 min-h-screen">
    @include('components.shared-header')

    <!-- Login Form -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="mx-auto h-20 w-20 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-heart text-white text-3xl"></i>
                </div>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                    مرحباً بك في منصة HAGTY
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    سجل دخولك للوصول إلى جميع الميزات
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

            @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-4">
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
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock ml-2"></i>كلمة المرور
                        </label>
                        <input id="password" name="password" type="password" required 
                               class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                               placeholder="أدخل كلمة المرور">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" 
                               class="h-4 w-4 text-d94288 focus:ring-d94288 border-gray-300 rounded">
                        <label for="remember_me" class="mr-2 block text-sm text-gray-900">
                            تذكرني
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-d94288 hover:text-purple-600 transition duration-300">
                            نسيت كلمة المرور؟
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-4 px-6 border border-transparent text-base font-bold rounded-xl text-white bg-gradient-to-r from-d94288 to-purple-600 hover:from-purple-600 hover:to-d94288 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-d94288 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <span class="absolute left-0 inset-y-0 flex items-center pr-4">
                            <i class="fas fa-sign-in-alt text-white text-lg"></i>
                        </span>
                        تسجيل الدخول
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        ليس لديك حساب؟
                        <a href="{{ route('register') }}" class="font-bold text-d94288 hover:text-purple-600 transition duration-300 underline decoration-2 underline-offset-4 hover:decoration-purple-600">
                            سجل الآن
                        </a>
                    </p>
                </div>
            </form>

            <!-- Social Login -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-gradient-to-br from-pink-50 to-purple-50 text-gray-500">أو سجل دخولك عبر</span>
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

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-d94288 to-purple-600 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-4">
                    <i class="fas fa-heart mr-2"></i>HAGTY
                </h3>
                <p class="text-lg mb-4">منصة شاملة لكل احتياجاتك النسائية</p>
                <div class="flex justify-center space-x-6 space-x-reverse">
                    <a href="#" class="hover:text-pink-200 transition duration-300">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="hover:text-pink-200 transition duration-300">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="hover:text-pink-200 transition duration-300">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="hover:text-pink-200 transition duration-300">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                </div>
                <p class="mt-4 text-sm opacity-80">© 2024 منصة HAGTY. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>
</body>
</html>
