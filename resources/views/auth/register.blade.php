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
                            <i class="fas fa-map-marker-alt ml-2"></i>الموقع (سيتم تحديده تلقائياً)
                        </label>
                        <input id="location" name="location" type="text" readonly
                               class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl bg-gray-100 sm:text-sm"
                               placeholder="سيتم تحديد موقعك تلقائياً">
                        <button type="button" id="getLocationBtn" class="mt-2 text-sm text-d94288 hover:text-purple-600">
                            <i class="fas fa-location-arrow ml-1"></i>تحديد الموقع
                        </button>
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

    <script>
        // تحديد الموقع تلقائياً
        document.getElementById('getLocationBtn').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    
                    // استخدام reverse geocoding للحصول على العنوان
                    fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=ar`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('location').value = data.city + ', ' + data.countryName;
                            // إضافة hidden inputs للإحداثيات
                            addHiddenInput('latitude', latitude);
                            addHiddenInput('longitude', longitude);
                        })
                        .catch(error => {
                            console.error('Error getting location:', error);
                            document.getElementById('location').value = 'الموقع: ' + latitude + ', ' + longitude;
                            addHiddenInput('latitude', latitude);
                            addHiddenInput('longitude', longitude);
                        });
                }, function(error) {
                    console.error('Error getting location:', error);
                    alert('لا يمكن تحديد موقعك. يرجى المحاولة مرة أخرى.');
                });
            } else {
                alert('المتصفح لا يدعم تحديد الموقع.');
            }
        });

        function addHiddenInput(name, value) {
            if (!document.querySelector(`input[name="${name}"]`)) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = name;
                input.value = value;
                document.querySelector('form').appendChild(input);
            }
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
