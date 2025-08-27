<x-filament-panels::page>
<div class="week-by-week-care-main space-y-6 min-h-screen p-4" style="background-color: #1a1a1a;">
    <!-- مقدمة الصفحة -->
    <div class="rounded-xl shadow-lg border border-orange-400 p-6" style="background-color: #2a2a2a;">
        <div class="bg-gradient-to-r from-orange-500 to-red-600 text-white p-4 rounded-t-xl -m-6 mb-6">
            <h2 class="text-xl font-bold">📅 العناية أسبوعياً - تطور طفلك</h2>
        </div>
        <p class="text-gray-300 text-lg mb-4">تابعي تطور طفلك أسبوعاً بأسبوع واتبعي النصائح الغذائية والصحية المهمة لكل مرحلة من مراحل الحمل.</p>
        
        <!-- أدوات التنقل السريع -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <button onclick="scrollToWeeks()" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                📅 الأسابيع
            </button>
            <button onclick="scrollToNutrition()" class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300">
                🥗 التغذية
            </button>
            <button onclick="scrollToWarnings()" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300">
                ⚠️ التحذيرات
            </button>
            <button onclick="openAddWeekModal()" class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-purple-700 transition-all duration-300">
                ➕ إضافة أسبوع
            </button>
        </div>
    </div>

    <!-- قسم الأسابيع -->
    <div id="weeksSection" class="rounded-xl shadow-lg border border-blue-400" style="background-color: #2a2a2a;">
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-6 rounded-t-xl flex justify-between items-center">
            <h2 class="text-xl font-bold">📅 تطور الطفل أسبوعياً</h2>
            <div class="flex gap-2">
                <select id="weekSelector" onchange="selectWeek(this.value)" class="text-black px-3 py-1 rounded-lg">
                    <option value="">اختر الأسبوع...</option>
                    @for($week = 1; $week <= 42; $week++)
                        <option value="{{ $week }}">الأسبوع {{ $week }}</option>
                    @endfor
                </select>
                <button onclick="openAddWeekModal()" class="text-blue-400 px-4 py-2 rounded-lg hover:bg-gray-700 border border-blue-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                    ➕ إضافة
                </button>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="weeksContainer">
                @forelse($weeklyBabyCare as $weekData)
                    <div class="week-card border-2 border-blue-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);" data-week="{{ $weekData->week_number }}">
                        @if($weekData->images && count($weekData->images) > 0)
                            <img src="{{ asset('storage/' . $weekData->images[0]) }}" 
                                 alt="الأسبوع {{ $weekData->week_number }}" 
                                 class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-48 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                                <div class="text-center">
                                    <div class="text-4xl mb-2">👶</div>
                                    <p class="text-blue-400 font-bold">الأسبوع {{ $weekData->week_number }}</p>
                                </div>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-white font-bold text-xl mb-2">الأسبوع {{ $weekData->week_number }}</h3>
                            <h4 class="text-blue-400 font-semibold mb-3">{{ $weekData->title ?? 'تطور الطفل' }}</h4>
                            
                            @if($weekData->baby_size_comparison)
                                <div class="bg-gradient-to-r from-yellow-600 to-yellow-700 text-white px-3 py-1 rounded-full text-sm font-semibold mb-3 inline-block">
                                    📏 حجم الطفل: {{ $weekData->baby_size_comparison }}
                                </div>
                            @endif

                            @if($weekData->baby_weight_range)
                                <div class="mb-3">
                                    <p class="text-blue-400 font-semibold text-sm">⚖️ الوزن المتوقع:</p>
                                    <p class="text-gray-300 text-sm">{{ $weekData->baby_weight_range }}</p>
                                </div>
                            @endif

                            @if($weekData->baby_length_range)
                                <div class="mb-3">
                                    <p class="text-blue-400 font-semibold text-sm">📐 الطول المتوقع:</p>
                                    <p class="text-gray-300 text-sm">{{ $weekData->baby_length_range }}</p>
                                </div>
                            @endif

                            <p class="text-gray-400 text-sm mb-4">{{ Str::limit($weekData->baby_development_description, 120) }}</p>

                            @if($weekData->development_milestones && count($weekData->development_milestones) > 0)
                                <div class="mb-4">
                                    <p class="text-blue-400 font-semibold text-sm mb-2">🎯 معالم التطور:</p>
                                    <ul class="text-gray-300 text-sm space-y-1">
                                        @foreach(array_slice($weekData->development_milestones, 0, 3) as $milestone)
                                            <li class="flex items-start gap-2">
                                                <span class="text-green-400">•</span>
                                                <span>{{ $milestone }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="flex gap-2 mt-4">
                                <button onclick="openWeekDetailsModal('{{ $weekData->id }}')" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                                    👁️ التفاصيل
                                </button>
                                
                                <button onclick="openEditWeekModal('{{ $weekData->id }}')" class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300">
                                    ✏️ تعديل
                                </button>
                                
                                @if($weekData->videos && count($weekData->videos) > 0)
                                    <button onclick="openVideoModal('{{ $weekData->id }}')" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-red-600 hover:to-red-700 transition-all duration-300">
                                        📹 فيديو
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-6xl mb-4">👶</div>
                        <h3 class="text-xl font-bold text-gray-400 mb-2">لا توجد بيانات أسبوعية حالياً</h3>
                        <p class="text-gray-500">سيتم إضافة بيانات الأسابيع قريباً...</p>
                        <button onclick="openAddWeekModal()" class="mt-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-2 rounded-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-300">
                            ➕ إضافة أول أسبوع
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- قسم التغذية -->
    <div id="nutritionSection" class="rounded-xl shadow-lg border border-green-400" style="background-color: #2a2a2a;">
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-6 rounded-t-xl flex justify-between items-center">
            <h2 class="text-xl font-bold">🥗 ماذا يجب أن آكل؟</h2>
            <button onclick="openAddNutritionModal()" class="text-green-400 px-6 py-2 rounded-lg hover:bg-gray-700 border border-green-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                ➕ إضافة نصيحة غذائية
            </button>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($nutritionTips as $tip)
                    <div class="border-2 border-green-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                        @if($tip->images && count($tip->images) > 0)
                            <img src="{{ asset('storage/' . $tip->images[0]) }}" 
                                 alt="{{ $tip->title }}" 
                                 class="w-full h-40 object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-40 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                                <div class="text-4xl">🥗</div>
                            </div>
                        @endif
                        
                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-2">
                                @if($tip->is_recommended)
                                    <span class="bg-gradient-to-r from-green-400 to-green-500 text-white px-2 py-1 rounded-full text-xs font-bold">⭐ موصى به</span>
                                @endif
                                <span class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-2 py-1 rounded-full text-xs">{{ $tip->category ?? 'عام' }}</span>
                            </div>
                            
                            <h3 class="text-white font-bold text-lg mb-2">{{ $tip->title }}</h3>
                            <p class="text-gray-400 text-sm mb-3">{{ Str::limit($tip->description, 100) }}</p>

                            @if($tip->food_items && count($tip->food_items) > 0)
                                <div class="mb-3">
                                    <p class="text-green-400 font-semibold text-sm mb-1">🍎 الأطعمة:</p>
                                    <div class="flex flex-wrap gap-1">
                                        @foreach(array_slice($tip->food_items, 0, 3) as $food)
                                            <span class="bg-gradient-to-r from-green-600 to-green-700 text-white px-2 py-1 rounded text-xs">{{ $food }}</span>
                                        @endforeach
                                        @if(count($tip->food_items) > 3)
                                            <span class="text-green-400 text-xs">+{{ count($tip->food_items) - 3 }} المزيد</span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="flex gap-2 mt-4">
                                <button onclick="openNutritionDetailsModal('{{ $tip->id }}')" class="bg-gradient-to-r from-green-500 to-green-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-green-600 hover:to-green-700 transition-all duration-300">
                                    👁️ التفاصيل
                                </button>
                                <button onclick="openEditNutritionModal('{{ $tip->id }}')" class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300">
                                    ✏️ تعديل
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-6xl mb-4">🥗</div>
                        <h3 class="text-xl font-bold text-gray-400 mb-2">لا توجد نصائح غذائية حالياً</h3>
                        <p class="text-gray-500">سيتم إضافة النصائح الغذائية قريباً...</p>
                        <button onclick="openAddNutritionModal()" class="mt-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-2 rounded-lg hover:from-green-600 hover:to-emerald-700 transition-all duration-300">
                            ➕ إضافة أول نصيحة
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- قسم التحذيرات الصحية -->
    <div id="warningsSection" class="rounded-xl shadow-lg border border-red-400" style="background-color: #2a2a2a;">
        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white p-6 rounded-t-xl flex justify-between items-center">
            <h2 class="text-xl font-bold">⚠️ ما هو ممنوع لصحة الطفل؟</h2>
            <button onclick="openAddWarningModal()" class="text-red-400 px-6 py-2 rounded-lg hover:bg-gray-700 border border-red-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                ➕ إضافة تحذير
            </button>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($healthWarnings as $warning)
                    <div class="border-2 border-red-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                        @if($warning->images && count($warning->images) > 0)
                            <img src="{{ asset('storage/' . $warning->images[0]) }}" 
                                 alt="{{ $warning->title }}" 
                                 class="w-full h-40 object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-40 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                                <div class="text-4xl">⚠️</div>
                            </div>
                        @endif
                        
                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-2">
                                @if($warning->is_critical)
                                    <span class="bg-gradient-to-r from-red-500 to-red-600 text-white px-2 py-1 rounded-full text-xs font-bold animate-pulse">🚨 حرج</span>
                                @endif
                                <span class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-2 py-1 rounded-full text-xs">{{ $warning->warning_type ?? 'تحذير عام' }}</span>
                                @if($warning->risk_level)
                                    <span class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-2 py-1 rounded-full text-xs">مستوى {{ $warning->risk_level }}</span>
                                @endif
                            </div>
                            
                            <h3 class="text-white font-bold text-lg mb-2">{{ $warning->title }}</h3>
                            <p class="text-gray-400 text-sm mb-3">{{ Str::limit($warning->description, 100) }}</p>

                            @if($warning->forbidden_items && count($warning->forbidden_items) > 0)
                                <div class="mb-3">
                                    <p class="text-red-400 font-semibold text-sm mb-1">🚫 ممنوع:</p>
                                    <div class="flex flex-wrap gap-1">
                                        @foreach(array_slice($warning->forbidden_items, 0, 3) as $item)
                                            <span class="bg-gradient-to-r from-red-600 to-red-700 text-white px-2 py-1 rounded text-xs">{{ $item }}</span>
                                        @endforeach
                                        @if(count($warning->forbidden_items) > 3)
                                            <span class="text-red-400 text-xs">+{{ count($warning->forbidden_items) - 3 }} المزيد</span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="flex gap-2 mt-4">
                                <button onclick="openWarningDetailsModal('{{ $warning->id }}')" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-red-600 hover:to-red-700 transition-all duration-300">
                                    👁️ التفاصيل
                                </button>
                                <button onclick="openEditWarningModal('{{ $warning->id }}')" class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300">
                                    ✏️ تعديل
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-6xl mb-4">⚠️</div>
                        <h3 class="text-xl font-bold text-gray-400 mb-2">لا توجد تحذيرات صحية حالياً</h3>
                        <p class="text-gray-500">سيتم إضافة التحذيرات الصحية قريباً...</p>
                        <button onclick="openAddWarningModal()" class="mt-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300">
                            ➕ إضافة أول تحذير
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- مودال إضافة أسبوع جديد -->
    <div id="addWeekModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" onclick="closeOnBackdrop(event, ['addWeekModal'])">
        <div class="bg-gray-800 rounded-xl p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto mx-4" onclick="event.stopPropagation();" style="background-color: #2a2a2a;">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">📅 إضافة أسبوع جديد</h3>
                <button onclick="closeAddWeekModal()" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>
            
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">رقم الأسبوع</label>
                        <select name="week_number" class="w-full rounded-lg border-2 border-blue-400 text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="">اختر الأسبوع...</option>
                            @for($week = 1; $week <= 42; $week++)
                                <option value="{{ $week }}">الأسبوع {{ $week }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">العنوان</label>
                        <input type="text" name="title" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="عنوان الأسبوع...">
                    </div>
                </div>

                <div>
                    <label class="block text-blue-400 text-sm font-semibold mb-2">وصف تطور الطفل</label>
                    <textarea name="baby_development_description" rows="4" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="وصف تطور الطفل في هذا الأسبوع..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">مقارنة الحجم</label>
                        <input type="text" name="baby_size_comparison" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="مثل حبة الأرز...">
                    </div>
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">الوزن المتوقع</label>
                        <input type="text" name="baby_weight_range" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="2-3 جرام">
                    </div>
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">الطول المتوقع</label>
                        <input type="text" name="baby_length_range" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="4-5 ملم">
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-2 px-4 rounded-lg hover:from-blue-600 hover:to-indigo-700 font-semibold transition-all duration-300">
                        ✅ إضافة الأسبوع
                    </button>
                    <button type="button" onclick="closeAddWeekModal()" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white py-2 px-4 rounded-lg hover:from-gray-700 hover:to-gray-800 font-semibold transition-all duration-300">
                        ❌ إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // دوال التنقل
        function scrollToWeeks() {
            document.getElementById('weeksSection').scrollIntoView({ behavior: 'smooth' });
        }

        function scrollToNutrition() {
            document.getElementById('nutritionSection').scrollIntoView({ behavior: 'smooth' });
        }

        function scrollToWarnings() {
            document.getElementById('warningsSection').scrollIntoView({ behavior: 'smooth' });
        }

        // دوال المودالات
        function openAddWeekModal() {
            document.getElementById('addWeekModal').classList.remove('hidden');
        }

        function closeAddWeekModal() {
            document.getElementById('addWeekModal').classList.add('hidden');
        }

        function openAddNutritionModal() {
            // سيتم تنفيذها لاحقاً
            alert('سيتم إضافة مودال النصائح الغذائية قريباً');
        }

        function openAddWarningModal() {
            // سيتم تنفيذها لاحقاً
            alert('سيتم إضافة مودال التحذيرات قريباً');
        }

        // دوال اختيار الأسبوع
        function selectWeek(weekNumber) {
            if (weekNumber) {
                const weekCard = document.querySelector(`[data-week="${weekNumber}"]`);
                if (weekCard) {
                    weekCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    weekCard.classList.add('highlight');
                    setTimeout(() => {
                        weekCard.classList.remove('highlight');
                    }, 2000);
                }
            }
        }

        // دوال التفاصيل
        function openWeekDetailsModal(weekId) {
            alert('سيتم إضافة تفاصيل الأسبوع قريباً - ID: ' + weekId);
        }

        function openNutritionDetailsModal(tipId) {
            alert('سيتم إضافة تفاصيل النصيحة الغذائية قريباً - ID: ' + tipId);
        }

        function openWarningDetailsModal(warningId) {
            alert('سيتم إضافة تفاصيل التحذير قريباً - ID: ' + warningId);
        }

        // دوال التعديل
        function openEditWeekModal(weekId) {
            alert('سيتم إضافة تعديل الأسبوع قريباً - ID: ' + weekId);
        }

        function openEditNutritionModal(tipId) {
            alert('سيتم إضافة تعديل النصيحة الغذائية قريباً - ID: ' + tipId);
        }

        function openEditWarningModal(warningId) {
            alert('سيتم إضافة تعديل التحذير قريباً - ID: ' + warningId);
        }

        // دالة إغلاق المودال عند النقر على الخلفية
        function closeOnBackdrop(event, modals) {
            modals.forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        }
    </script>
    
    <style>
        /* أنماط الحاوي الرئيسي */
        .week-by-week-care-main {
            background-color: #1a1a1a;
            color: #f9fafb;
            min-height: 100vh;
        }
        
        /* تأثير الإبراز للأسبوع المحدد */
        .highlight {
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(59, 130, 246, 0.5);
            border-color: #3b82f6 !important;
        }

        /* أنماط إضافية للتحسينات البصرية */
        .week-card {
            transition: all 0.3s ease;
        }

        .week-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        /* تحسين أنماط المودالات */
        .modal-backdrop {
            backdrop-filter: blur(8px);
        }
        
        /* تحسين أنماط النماذج */
        input, textarea, select {
            transition: all 0.3s ease;
        }
        
        input:focus, textarea:focus, select:focus {
            transform: scale(1.02);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
        }
        
        /* تحسين أنماط الأزرار */
        button {
            transition: all 0.3s ease;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        /* تحسينات إضافية للثيم الداكن */
        .dark-input {
            background-color: #1a1a1a !important;
            border-color: #374151;
            color: #f9fafb;
        }

        .dark-input:focus {
            border-color: #6366f1;
            background-color: #1a1a1a !important;
        }

        .dark-select option {
            background-color: #1a1a1a;
            color: #f9fafb;
        }

        .dark-card {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border: 1px solid #333333;
        }
    </style>
</div>
</x-filament-panels::page>
