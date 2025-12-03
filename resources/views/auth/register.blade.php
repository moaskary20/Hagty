<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #A15DBF; }
        .primary-text { color: #A15DBF; }
        .primary-border { border-color: #A15DBF; }
        
        /* CSS للـ Header والـ Footer */
        .primary-color {
            color: #A15DBF;
        }
        
        .menu-item {
            transition: all 0.3s ease;
        }
        
        .menu-item:hover {
            background-color: #A15DBF;
            color: white;
        }
        
        .auth-btn-primary {
            background: #A15DBF;
            color: white;
            border: none;
        }
        
        .auth-btn-primary:hover {
            background: #c13a7a;
            color: white;
        }
        
        .auth-btn-secondary {
            background: white;
            color: #A15DBF;
            border: 2px solid #A15DBF;
        }
        
        .auth-btn-secondary:hover {
            background: #A15DBF;
            color: white;
        }
        
        /* Map Styles */
        #map {
            height: 400px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(161, 93, 191, 0.2);
        }
        
        .leaflet-popup-content-wrapper {
            background: linear-gradient(135deg, #a15dbf 0%, #e91e63 100%);
            color: white;
            border-radius: 8px;
        }
        
        .leaflet-popup-content {
            color: white;
            font-family: 'Cairo', sans-serif;
        }
        
        .leaflet-popup-tip {
            background: linear-gradient(135deg, #a15dbf 0%, #e91e63 100%);
        }
        
    </style>
</head>
<body class="bg-gradient-to-br from-pink-50 to-purple-50 min-h-screen">
    <!-- Navigation -->
    @include('components.shared-header')

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

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-venus-mars ml-2"></i>النوع
                            </label>
                            <select id="gender" name="gender" required 
                                    class="appearance-none relative block w-full px-4 py-3 border border-gray-300 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm">
                                <option value="">اختر النوع</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>أنثى</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>ذكر</option>
                            </select>
                        </div>
                        <div>
                            <label for="marital_status" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-heart ml-2"></i>الحالة الاجتماعية
                            </label>
                            <select id="marital_status" name="marital_status" required 
                                    class="appearance-none relative block w-full px-4 py-3 border border-gray-300 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm">
                                <option value="">اختر الحالة الاجتماعية</option>
                                <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>عزباء</option>
                                <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>متزوجة</option>
                                <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>مطلقة</option>
                                <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>أرملة</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-calendar ml-2"></i>تاريخ الميلاد (يجب أن تكون +18)
                        </label>
                        <input id="birth_date" name="birth_date" type="date" required 
                               class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                               value="{{ old('birth_date') }}">
                        <p class="text-xs text-gray-500 mt-1">يجب أن تكون 18 سنة أو أكثر</p>
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-map-marker-alt ml-2"></i>الموقع - انقر على الخريطة لتحديد موقعك
                        </label>
                        
                        <!-- Map Container -->
                        <div id="map" class="w-full h-96 rounded-xl border-2 border-gray-300 mb-3 shadow-lg" style="z-index: 1;"></div>
                        
                        <!-- Location Info -->
                        <div class="bg-purple-50 border border-purple-200 rounded-xl p-4">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-info-circle text-purple-500 text-lg mt-1"></i>
                                <div class="flex-1">
                                    <p class="text-sm text-purple-700 font-medium mb-2">الموقع المحدد:</p>
                                    <input id="location" name="location" type="text" readonly
                                           class="w-full px-3 py-2 border border-purple-200 rounded-lg bg-white text-sm text-gray-700"
                                           placeholder="اضغط على الخريطة لتحديد موقعك">
                                    <input id="latitude" name="latitude" type="hidden">
                                    <input id="longitude" name="longitude" type="hidden">
                                </div>
                            </div>
                            <button type="button" id="getCurrentLocationBtn" class="mt-3 w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-2 px-4 rounded-lg hover:from-purple-600 hover:to-pink-600 transition-all duration-300 flex items-center justify-center gap-2 shadow-md">
                                <i class="fas fa-crosshairs"></i>
                                استخدام موقعي الحالي
                            </button>
                        </div>
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

                    <div>
                        <label for="blood_type" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-tint ml-2"></i>فصيلة الدم
                        </label>
                        <select id="blood_type" name="blood_type" 
                                class="appearance-none relative block w-full px-4 py-3 border border-gray-300 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm">
                            <option value="">اختر فصيلة الدم (اختياري)</option>
                            <option value="A+" {{ old('blood_type') == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ old('blood_type') == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ old('blood_type') == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ old('blood_type') == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ old('blood_type') == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ old('blood_type') == 'AB-' ? 'selected' : '' }}>AB-</option>
                            <option value="O+" {{ old('blood_type') == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ old('blood_type') == 'O-' ? 'selected' : '' }}>O-</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="emergency_contact_name" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user-friends ml-2"></i>اسم جهة الطوارئ
                            </label>
                            <input id="emergency_contact_name" name="emergency_contact_name" type="text" 
                                   class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                   placeholder="اسم جهة الطوارئ"
                                   value="{{ old('emergency_contact_name') }}">
                        </div>
                        <div>
                            <label for="emergency_contact_phone" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-phone ml-2"></i>رقم جهة الطوارئ
                            </label>
                            <input id="emergency_contact_phone" name="emergency_contact_phone" type="tel" 
                                   class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                   placeholder="رقم جهة الطوارئ"
                                   value="{{ old('emergency_contact_phone') }}">
                        </div>
                    </div>

                    <div>
                        <label for="emergency_contact_relation" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-heart ml-2"></i>صلة القرابة
                        </label>
                        <select id="emergency_contact_relation" name="emergency_contact_relation" 
                                class="appearance-none relative block w-full px-4 py-3 border border-gray-300 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm">
                            <option value="">اختر صلة القرابة</option>
                            <option value="mother" {{ old('emergency_contact_relation') == 'mother' ? 'selected' : '' }}>الأم</option>
                            <option value="father" {{ old('emergency_contact_relation') == 'father' ? 'selected' : '' }}>الأب</option>
                            <option value="brother" {{ old('emergency_contact_relation') == 'brother' ? 'selected' : '' }}>الأخ</option>
                            <option value="sister" {{ old('emergency_contact_relation') == 'sister' ? 'selected' : '' }}>الأخت</option>
                            <option value="husband" {{ old('emergency_contact_relation') == 'husband' ? 'selected' : '' }}>الزوج</option>
                            <option value="wife" {{ old('emergency_contact_relation') == 'wife' ? 'selected' : '' }}>الزوجة</option>
                            <option value="son" {{ old('emergency_contact_relation') == 'son' ? 'selected' : '' }}>الابن</option>
                            <option value="daughter" {{ old('emergency_contact_relation') == 'daughter' ? 'selected' : '' }}>الابنة</option>
                            <option value="other" {{ old('emergency_contact_relation') == 'other' ? 'selected' : '' }}>أخرى</option>
                        </select>
                    </div>

                    <div>
                        <label for="job" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-briefcase ml-2"></i>الوظيفة
                        </label>
                        <input id="job" name="job" type="text" 
                               class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                               placeholder="الوظيفة"
                               value="{{ old('job') }}">
                    </div>

                    <div id="childrenSection" style="display: none;">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-baby ml-2"></i>معلومات الأطفال
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="children_count" class="block text-sm font-medium text-gray-600 mb-1">عدد الأطفال</label>
                                <input id="children_count" name="children_count" type="number" min="0" 
                                       class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288 focus:z-10 sm:text-sm"
                                       placeholder="0"
                                       value="{{ old('children_count', 0) }}">
                            </div>
                        </div>
                        <div id="childrenDetails" class="mt-4">
                            <!-- سيتم إضافة تفاصيل الأطفال هنا بواسطة JavaScript -->
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-star ml-2"></i>الاهتمامات
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            <label class="flex items-center">
                                <input type="checkbox" name="interests[]" value="hadiety" class="mr-2 text-d94288 focus:ring-d94288">
                                <span class="text-sm">هديتي</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="interests[]" value="beity" class="mr-2 text-d94288 focus:ring-d94288">
                                <span class="text-sm">بيتي</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="interests[]" value="hesabaty" class="mr-2 text-d94288 focus:ring-d94288">
                                <span class="text-sm">حساباتى</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="interests[]" value="riadaty" class="mr-2 text-d94288 focus:ring-d94288">
                                <span class="text-sm">رياضتي</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="interests[]" value="mashroay" class="mr-2 text-d94288 focus:ring-d94288">
                                <span class="text-sm">مشروعي</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="interests[]" value="mostashary" class="mr-2 text-d94288 focus:ring-d94288">
                                <span class="text-sm">مستشاري</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="interests[]" value="mostamay" class="mr-2 text-d94288 focus:ring-d94288">
                                <span class="text-sm">مستمعي</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="interests[]" value="nesaa-alghad" class="mr-2 text-d94288 focus:ring-d94288">
                                <span class="text-sm">نساء الغد</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="interests[]" value="eventaty" class="mr-2 text-d94288 focus:ring-d94288">
                                <span class="text-sm">ايفينتاتى</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="interests[]" value="forasy" class="mr-2 text-d94288 focus:ring-d94288">
                                <span class="text-sm">فورصى</span>
                            </label>
                        </div>
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
                            class="group relative w-full flex justify-center py-4 px-6 border border-transparent text-base font-bold rounded-xl text-white transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105"
                            style="background: linear-gradient(135deg, #a15dbf 0%, #8B4A9C 100%);"
                            onmouseover="this.style.background='linear-gradient(135deg, #8B4A9C 0%, #753880 100%)'"
                            onmouseout="this.style.background='linear-gradient(135deg, #a15dbf 0%, #8B4A9C 100%)'">
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

                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div>
                        <a href="#" class="w-full inline-flex items-center justify-center py-4 px-4 border-2 border-gray-300 rounded-xl shadow-lg bg-white text-base font-bold text-gray-700 hover:bg-red-50 hover:border-red-300 transition-all duration-300 transform hover:scale-105 hover:shadow-xl gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                            <span>Google</span>
                        </a>
                    </div>

                    <div>
                        <a href="#" class="w-full inline-flex items-center justify-center py-4 px-4 border-2 border-gray-300 rounded-xl shadow-lg bg-white text-base font-bold text-gray-700 hover:bg-blue-50 hover:border-blue-300 transition-all duration-300 transform hover:scale-105 hover:shadow-xl gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#1877F2">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span>Facebook</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.shared-footer')

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <script>
        // Initialize Map
        let map, marker;
        
        document.addEventListener('DOMContentLoaded', function() {
            // Cairo, Egypt as default center
            const defaultLat = 30.0444;
            const defaultLng = 31.2357;
            
            // Create map
            map = L.map('map').setView([defaultLat, defaultLng], 11);
            
            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);
            
            // Add marker
            marker = L.marker([defaultLat, defaultLng], {
                draggable: true
            }).addTo(map);
            
            // Update location on marker drag
            marker.on('dragend', function(e) {
                const position = marker.getLatLng();
                updateLocation(position.lat, position.lng);
            });
            
            // Update location on map click
            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
                updateLocation(e.latlng.lat, e.latlng.lng);
            });
            
            // Get current location button
            document.getElementById('getCurrentLocationBtn').addEventListener('click', function() {
                if (navigator.geolocation) {
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري التحديد...';
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            const lat = position.coords.latitude;
                            const lng = position.coords.longitude;
                            
                            map.setView([lat, lng], 15);
                            marker.setLatLng([lat, lng]);
                            updateLocation(lat, lng);
                            
                            document.getElementById('getCurrentLocationBtn').innerHTML = '<i class="fas fa-crosshairs"></i> استخدام موقعي الحالي';
                        },
                        function(error) {
                            console.error('Error getting location:', error);
                            alert('لا يمكن تحديد موقعك. يرجى النقر على الخريطة لتحديد الموقع يدوياً.');
                            document.getElementById('getCurrentLocationBtn').innerHTML = '<i class="fas fa-crosshairs"></i> استخدام موقعي الحالي';
                        }
                    );
                } else {
                    alert('المتصفح لا يدعم تحديد الموقع.');
                }
            });
        });
        
        function updateLocation(lat, lng) {
            // Update hidden inputs
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
            
            // Get address using reverse geocoding
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&accept-language=ar`)
                .then(response => response.json())
                .then(data => {
                    const address = data.display_name || `${lat.toFixed(6)}, ${lng.toFixed(6)}`;
                    document.getElementById('location').value = address;
                })
                .catch(error => {
                    console.error('Error getting address:', error);
                    document.getElementById('location').value = `${lat.toFixed(6)}, ${lng.toFixed(6)}`;
                });
        }

        // إظهار/إخفاء قسم الأطفال بناءً على الحالة الاجتماعية
        document.getElementById('marital_status').addEventListener('change', function() {
            const childrenSection = document.getElementById('childrenSection');
            if (this.value === 'married' || this.value === 'divorced' || this.value === 'widowed') {
                childrenSection.style.display = 'block';
            } else {
                childrenSection.style.display = 'none';
            }
        });

        // إضافة تفاصيل الأطفال
        document.getElementById('children_count').addEventListener('input', function() {
            const count = parseInt(this.value) || 0;
            const detailsContainer = document.getElementById('childrenDetails');
            detailsContainer.innerHTML = '';

            for (let i = 1; i <= count; i++) {
                const childDiv = document.createElement('div');
                childDiv.className = 'grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 p-4 bg-gray-50 rounded-lg';
                childDiv.innerHTML = `
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">اسم الطفل ${i}</label>
                        <input type="text" name="children_details[${i-1}][name]" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-d94288"
                               placeholder="اسم الطفل">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">النوع</label>
                        <select name="children_details[${i-1}][gender]" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-d94288">
                            <option value="">اختر النوع</option>
                            <option value="male">ذكر</option>
                            <option value="female">أنثى</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">العمر</label>
                        <input type="number" name="children_details[${i-1}][age]" min="0" max="18"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-d94288"
                               placeholder="العمر">
                    </div>
                `;
                detailsContainer.appendChild(childDiv);
            }
        });

        // التحقق من العمر عند تغيير تاريخ الميلاد
        document.getElementById('birth_date').addEventListener('change', function() {
            const birthDate = new Date(this.value);
            const today = new Date();
            const age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            
            if (age < 18) {
                alert('يجب أن تكون 18 سنة أو أكثر للتسجيل');
                this.value = '';
            }
        });
    </script>
</body>
</html>
