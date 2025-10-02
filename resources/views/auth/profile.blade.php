<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الملف الشخصي - منصة HAGTY</title>
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

    <!-- Profile Content -->
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <div class="mx-auto h-24 w-24 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-user text-white text-4xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">الملف الشخصي</h1>
                <p class="text-gray-600">إدارة معلومات حسابك الشخصي</p>
            </div>

            @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Profile Information -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">
                        <i class="fas fa-user-edit ml-2"></i>المعلومات الشخصية
                    </h2>

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user ml-2"></i>الاسم الأول
                                </label>
                                <input id="first_name" name="first_name" type="text" required 
                                       class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                       value="{{ $user->first_name }}">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user ml-2"></i>الاسم الأخير
                                </label>
                                <input id="last_name" name="last_name" type="text" required 
                                       class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                       value="{{ $user->last_name }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-envelope ml-2"></i>البريد الإلكتروني
                            </label>
                            <input id="email" name="email" type="email" required 
                                   class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                   value="{{ $user->email }}">
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-phone ml-2"></i>رقم الهاتف
                            </label>
                            <input id="phone" name="phone" type="tel" required 
                                   class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                   value="{{ $user->phone }}">
                        </div>

                        <div class="mb-6">
                            <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-calendar ml-2"></i>تاريخ الميلاد
                            </label>
                            <input id="birth_date" name="birth_date" type="date" required 
                                   class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                   value="{{ $user->birth_date }}">
                        </div>

                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-d94288 to-purple-600 text-white py-4 px-6 rounded-xl hover:from-purple-600 hover:to-d94288 transition-all duration-300 font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-save ml-2"></i>حفظ التغييرات
                        </button>
                    </form>
                </div>

                <!-- Change Password -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">
                        <i class="fas fa-lock ml-2"></i>تغيير كلمة المرور
                    </h2>

                    <form action="{{ route('profile.change-password') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-lock ml-2"></i>كلمة المرور الحالية
                            </label>
                            <input id="current_password" name="current_password" type="password" required 
                                   class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                   placeholder="أدخل كلمة المرور الحالية">
                        </div>

                        <div class="mb-4">
                            <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-key ml-2"></i>كلمة المرور الجديدة
                            </label>
                            <input id="new_password" name="new_password" type="password" required 
                                   class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                   placeholder="أدخل كلمة المرور الجديدة (8 أحرف على الأقل)">
                        </div>

                        <div class="mb-6">
                            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-key ml-2"></i>تأكيد كلمة المرور الجديدة
                            </label>
                            <input id="new_password_confirmation" name="new_password_confirmation" type="password" required 
                                   class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                   placeholder="أعد إدخال كلمة المرور الجديدة">
                        </div>

                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-d94288 to-purple-600 text-white py-4 px-6 rounded-xl hover:from-purple-600 hover:to-d94288 transition-all duration-300 font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-key ml-2"></i>تغيير كلمة المرور
                        </button>
                    </form>
                </div>
            </div>

            <!-- Account Statistics -->
            <div class="mt-8 bg-white rounded-2xl shadow-xl p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-chart-bar ml-2"></i>إحصائيات الحساب
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="text-center p-4 bg-gradient-to-r from-pink-50 to-purple-50 rounded-xl">
                        <div class="w-12 h-12 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-calendar-check text-white"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">تاريخ التسجيل</h3>
                        <p class="text-gray-600">{{ $user->created_at->format('Y/m/d') }}</p>
                    </div>
                    
                    <div class="text-center p-4 bg-gradient-to-r from-pink-50 to-purple-50 rounded-xl">
                        <div class="w-12 h-12 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">آخر تسجيل دخول</h3>
                        <p class="text-gray-600">{{ $user->updated_at->format('Y/m/d') }}</p>
                    </div>
                    
                    <div class="text-center p-4 bg-gradient-to-r from-pink-50 to-purple-50 rounded-xl">
                        <div class="w-12 h-12 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">البريد الإلكتروني</h3>
                        <p class="text-gray-600">{{ $user->email }}</p>
                    </div>
                    
                    <div class="text-center p-4 bg-gradient-to-r from-pink-50 to-purple-50 rounded-xl">
                        <div class="w-12 h-12 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">رقم الهاتف</h3>
                        <p class="text-gray-600">{{ $user->phone }}</p>
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
