<x-filament-panels::page>
    @php
        $greeting = $greeting ?? 'مرحباً بكِ في قسم أومومتي';
        $description = $description ?? 'قسم شامل لرعاية الأم والطفل';
    @endphp
    
    <div class="space-y-6 min-h-screen p-4" style="background-color: #1a1a1a;">
        
        <!-- ترحيب بالقسم -->
        <div class="rounded-xl shadow-lg border border-pink-400" style="background-color: #2a2a2a;">
            <div class="bg-gradient-to-r from-pink-500 to-rose-500 text-white p-6 rounded-t-xl text-center">
                <h1 class="text-3xl font-bold mb-2">💕 {{ $greeting }}</h1>
                <p class="text-pink-100 text-lg">{{ $description }}</p>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- بطاقة الحمل والولادة -->
                    <div class="bg-gradient-to-br from-pink-600 to-rose-600 text-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 cursor-pointer">
                        <div class="text-4xl mb-3">🤱</div>
                        <h3 class="text-lg font-bold mb-2">الحمل والولادة</h3>
                        <p class="text-sm text-pink-100">متابعة شاملة للحمل ونصائح للولادة</p>
                    </div>

                    <!-- بطاقة رعاية الطفل -->
                    <div class="bg-gradient-to-br from-blue-600 to-indigo-600 text-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 cursor-pointer">
                        <div class="text-4xl mb-3">👶</div>
                        <h3 class="text-lg font-bold mb-2">رعاية الطفل</h3>
                        <p class="text-sm text-blue-100">نصائح ومتابعة نمو وتطور الطفل</p>
                    </div>

                    <!-- بطاقة التغذية -->
                    <div class="bg-gradient-to-br from-green-600 to-emerald-600 text-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 cursor-pointer">
                        <div class="text-4xl mb-3">🍎</div>
                        <h3 class="text-lg font-bold mb-2">التغذية السليمة</h3>
                        <p class="text-sm text-green-100">برامج غذائية للأم والطفل</p>
                    </div>

                    <!-- بطاقة الصحة النفسية -->
                    <div class="bg-gradient-to-br from-purple-600 to-violet-600 text-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 cursor-pointer">
                        <div class="text-4xl mb-3">🧘‍♀️</div>
                        <h3 class="text-lg font-bold mb-2">الصحة النفسية</h3>
                        <p class="text-sm text-purple-100">دعم نفسي ومعنوي للأمهات</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- الخدمات الرئيسية -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <!-- خدمات الحمل -->
            <div class="rounded-xl shadow-lg border border-pink-400" style="background-color: #2a2a2a;">
                <div class="bg-gradient-to-r from-pink-500 to-rose-500 text-white p-4 rounded-t-xl">
                    <h2 class="text-xl font-bold">🤰 خدمات الحمل والولادة</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center p-4 rounded-lg" style="background-color: #333333;">
                        <div class="text-2xl mr-3">📅</div>
                        <div>
                            <h4 class="font-bold text-pink-300">متابعة الحمل</h4>
                            <p class="text-gray-300 text-sm">جدولة المواعيد والفحوصات الدورية</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-4 rounded-lg" style="background-color: #333333;">
                        <div class="text-2xl mr-3">🏥</div>
                        <div>
                            <h4 class="font-bold text-pink-300">دليل المستشفيات</h4>
                            <p class="text-gray-300 text-sm">أفضل مستشفيات الولادة والرعاية</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-4 rounded-lg" style="background-color: #333333;">
                        <div class="text-2xl mr-3">💊</div>
                        <div>
                            <h4 class="font-bold text-pink-300">الأدوية والفيتامينات</h4>
                            <p class="text-gray-300 text-sm">دليل الأدوية الآمنة للحامل</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- خدمات الطفل -->
            <div class="rounded-xl shadow-lg border border-blue-400" style="background-color: #2a2a2a;">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-4 rounded-t-xl">
                    <h2 class="text-xl font-bold">👶 خدمات رعاية الطفل</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center p-4 rounded-lg" style="background-color: #333333;">
                        <div class="text-2xl mr-3">📈</div>
                        <div>
                            <h4 class="font-bold text-blue-300">متابعة النمو</h4>
                            <p class="text-gray-300 text-sm">مراقبة نمو وتطور الطفل</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-4 rounded-lg" style="background-color: #333333;">
                        <div class="text-2xl mr-3">💉</div>
                        <div>
                            <h4 class="font-bold text-blue-300">التطعيمات</h4>
                            <p class="text-gray-300 text-sm">جدول التطعيمات والتذكيرات</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-4 rounded-lg" style="background-color: #333333;">
                        <div class="text-2xl mr-3">🍼</div>
                        <div>
                            <h4 class="font-bold text-blue-300">الرضاعة والتغذية</h4>
                            <p class="text-gray-300 text-sm">دليل الرضاعة وإدخال الطعام</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- المقالات والنصائح -->
        <div class="rounded-xl shadow-lg border border-emerald-400" style="background-color: #2a2a2a;">
            <div class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white p-4 rounded-t-xl flex justify-between items-center">
                <h2 class="text-xl font-bold">📚 مقالات ونصائح مفيدة</h2>
                <button class="text-emerald-400 px-4 py-2 rounded-lg hover:bg-gray-700 border border-emerald-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                    ➕ إضافة مقال
                </button>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- مقال تجريبي 1 -->
                    <div class="border-2 border-emerald-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                        <div class="w-full h-48 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                            <div class="text-6xl">🤱</div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-emerald-300">نصائح للحمل الصحي</h3>
                            <p class="text-gray-300 text-sm mt-2">دليل شامل للعناية بالحامل والجنين خلال فترة الحمل</p>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-xs text-emerald-400">منذ يومين</span>
                                <button class="bg-emerald-600 text-white px-3 py-1 rounded-lg hover:bg-emerald-500 text-sm transition-colors">قراءة المزيد</button>
                            </div>
                        </div>
                    </div>

                    <!-- مقال تجريبي 2 -->
                    <div class="border-2 border-emerald-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                        <div class="w-full h-48 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                            <div class="text-6xl">👶</div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-emerald-300">العناية بالمولود الجديد</h3>
                            <p class="text-gray-300 text-sm mt-2">كل ما تحتاجين معرفته عن العناية بطفلك في الأسابيع الأولى</p>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-xs text-emerald-400">منذ أسبوع</span>
                                <button class="bg-emerald-600 text-white px-3 py-1 rounded-lg hover:bg-emerald-500 text-sm transition-colors">قراءة المزيد</button>
                            </div>
                        </div>
                    </div>

                    <!-- مقال تجريبي 3 -->
                    <div class="border-2 border-emerald-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                        <div class="w-full h-48 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                            <div class="text-6xl">🍎</div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-emerald-300">التغذية السليمة للحامل</h3>
                            <p class="text-gray-300 text-sm mt-2">أهم العناصر الغذائية والفيتامينات المطلوبة أثناء الحمل</p>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-xs text-emerald-400">منذ أسبوعين</span>
                                <button class="bg-emerald-600 text-white px-3 py-1 rounded-lg hover:bg-emerald-500 text-sm transition-colors">قراءة المزيد</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- تطبيقات وأدوات مفيدة -->
        <div class="rounded-xl shadow-lg border border-violet-400" style="background-color: #2a2a2a;">
            <div class="bg-gradient-to-r from-violet-500 to-purple-500 text-white p-4 rounded-t-xl">
                <h2 class="text-xl font-bold">📱 تطبيقات وأدوات مفيدة</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- حاسبة الحمل -->
                    <div class="text-center p-6 rounded-xl hover:shadow-xl transition-all duration-300 cursor-pointer" style="background: linear-gradient(145deg, #333333, #2a2a2a); border: 2px solid #8b5cf6;">
                        <div class="text-4xl mb-3">📅</div>
                        <h4 class="font-bold text-violet-300 mb-2">حاسبة الحمل</h4>
                        <p class="text-gray-300 text-sm">احسبي موعد الولادة المتوقع</p>
                    </div>

                    <!-- متتبع النمو -->
                    <div class="text-center p-6 rounded-xl hover:shadow-xl transition-all duration-300 cursor-pointer" style="background: linear-gradient(145deg, #333333, #2a2a2a); border: 2px solid #8b5cf6;">
                        <div class="text-4xl mb-3">📊</div>
                        <h4 class="font-bold text-violet-300 mb-2">متتبع النمو</h4>
                        <p class="text-gray-300 text-sm">تتبعي نمو طفلك ووزنه</p>
                    </div>

                    <!-- جدول التطعيمات -->
                    <div class="text-center p-6 rounded-xl hover:shadow-xl transition-all duration-300 cursor-pointer" style="background: linear-gradient(145deg, #333333, #2a2a2a); border: 2px solid #8b5cf6;">
                        <div class="text-4xl mb-3">💉</div>
                        <h4 class="font-bold text-violet-300 mb-2">جدول التطعيمات</h4>
                        <p class="text-gray-300 text-sm">تذكيرات مواعيد التطعيمات</p>
                    </div>

                    <!-- يوميات الطفل -->
                    <div class="text-center p-6 rounded-xl hover:shadow-xl transition-all duration-300 cursor-pointer" style="background: linear-gradient(145deg, #333333, #2a2a2a); border: 2px solid #8b5cf6;">
                        <div class="text-4xl mb-3">📔</div>
                        <h4 class="font-bold text-violet-300 mb-2">يوميات الطفل</h4>
                        <p class="text-gray-300 text-sm">سجلي ذكريات طفلك اليومية</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- روابط سريعة -->
        <div class="rounded-xl shadow-lg border border-amber-400" style="background-color: #2a2a2a;">
            <div class="bg-gradient-to-r from-amber-500 to-orange-500 text-white p-4 rounded-t-xl">
                <h2 class="text-xl font-bold">🔗 روابط سريعة</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <a href="#" class="flex flex-col items-center p-4 rounded-lg hover:bg-gray-700 transition-colors" style="background-color: #333333;">
                        <div class="text-2xl mb-2">🏥</div>
                        <span class="text-amber-300 text-sm font-semibold">المستشفيات</span>
                    </a>
                    
                    <a href="#" class="flex flex-col items-center p-4 rounded-lg hover:bg-gray-700 transition-colors" style="background-color: #333333;">
                        <div class="text-2xl mb-2">👩‍⚕️</div>
                        <span class="text-amber-300 text-sm font-semibold">الأطباء</span>
                    </a>
                    
                    <a href="#" class="flex flex-col items-center p-4 rounded-lg hover:bg-gray-700 transition-colors" style="background-color: #333333;">
                        <div class="text-2xl mb-2">💊</div>
                        <span class="text-amber-300 text-sm font-semibold">الصيدليات</span>
                    </a>
                    
                    <a href="#" class="flex flex-col items-center p-4 rounded-lg hover:bg-gray-700 transition-colors" style="background-color: #333333;">
                        <div class="text-2xl mb-2">🛍️</div>
                        <span class="text-amber-300 text-sm font-semibold">متاجر الأطفال</span>
                    </a>
                    
                    <a href="#" class="flex flex-col items-center p-4 rounded-lg hover:bg-gray-700 transition-colors" style="background-color: #333333;">
                        <div class="text-2xl mb-2">📞</div>
                        <span class="text-amber-300 text-sm font-semibold">أرقام طوارئ</span>
                    </a>
                    
                    <a href="#" class="flex flex-col items-center p-4 rounded-lg hover:bg-gray-700 transition-colors" style="background-color: #333333;">
                        <div class="text-2xl mb-2">💬</div>
                        <span class="text-amber-300 text-sm font-semibold">مجتمع الأمهات</span>
                    </a>
                </div>
            </div>
        </div>

        <style>
            /* أنماط إضافية للتحسينات البصرية - ثيم أومومتي */
            body {
                background-color: #1a1a1a;
                color: #f9fafb;
            }
            
            .transition-all {
                transition: all 0.3s ease;
            }
            
            /* تحسين الخطوط العربية */
            * {
                font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            
            /* تحسين البطاقات */
            .hover\:shadow-xl:hover {
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.4), 0 10px 10px -5px rgba(0, 0, 0, 0.3);
            }
            
            /* تحسين شريط التمرير */
            ::-webkit-scrollbar {
                width: 8px;
            }
            
            ::-webkit-scrollbar-track {
                background: #1a1a1a;
            }
            
            ::-webkit-scrollbar-thumb {
                background: #444444;
                border-radius: 4px;
            }
            
            ::-webkit-scrollbar-thumb:hover {
                background: #555555;
            }
            
            /* تأثيرات إضافية */
            .card-gradient {
                background: linear-gradient(145deg, #2a2a2a, #333333);
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.4), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
            }
        </style>
        
    </div> <!-- نهاية div الرئيسي -->
</x-filament-panels::page>
