<x-filament-panels::page>
<div class="be-ready-to-welcome-main space-y-6 min-h-screen p-4" style="background-color: #1a1a1a;">
    <!-- مقدمة الصفحة -->
    <div class="rounded-xl shadow-lg border border-pink-400 p-6" style="background-color: #2a2a2a;">
        <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white p-4 rounded-t-xl -m-6 mb-6">
            <h2 class="text-xl font-bold">👶 استعدي لاستقبال طفلك</h2>
        </div>
        <p class="text-gray-300 text-lg mb-4">كل ما تحتاجينه للاستعداد ليوم الولادة، من النصائح المهمة إلى حقيبة المستشفى وقائمة مستلزمات الطفل.</p>
        
        <!-- أدوات التنقل السريع -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <button onclick="scrollToPreparations()" class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-purple-700 transition-all duration-300">
                📝 النصائح
            </button>
            <button onclick="scrollToHospitalBags()" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                🧳 حقيبة المستشفى
            </button>
            <button onclick="scrollToBabyShower()" class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300">
                🍼 مستلزمات الطفل
            </button>
            <button onclick="openAddPreparationModal()" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-4 py-2 rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-300">
                ➕ إضافة نصيحة
            </button>
        </div>
    </div>

    <!-- قسم نصائح الاستعداد للولادة -->
    <div id="preparationsSection" class="rounded-xl shadow-lg border border-purple-400" style="background-color: #2a2a2a;">
        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white p-6 rounded-t-xl flex justify-between items-center">
            <h2 class="text-xl font-bold">📝 كيفية الاستعداد لولادة الطفل؟</h2>
            <button onclick="openAddPreparationModal()" class="text-purple-400 px-6 py-2 rounded-lg hover:bg-gray-700 border border-purple-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                ➕ إضافة نصيحة
            </button>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($deliveryPreparations as $preparation)
                    <div class="border-2 border-purple-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                        @if($preparation->images && count($preparation->images) > 0)
                            <img src="{{ asset('storage/' . $preparation->images[0]) }}" 
                                 alt="{{ $preparation->title }}" 
                                 class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-48 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                                <div class="text-6xl">📝</div>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                @if($preparation->is_featured)
                                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-2 py-1 rounded-full text-xs font-bold">⭐ مميز</span>
                                @endif
                                <span class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-2 py-1 rounded-full text-xs">{{ $preparation->category ?? 'عام' }}</span>
                                @if($preparation->importance_level)
                                    <span class="bg-gradient-to-r from-red-500 to-red-600 text-white px-2 py-1 rounded-full text-xs">أهمية {{ $preparation->importance_level }}/5</span>
                                @endif
                            </div>
                            
                            <h3 class="text-white font-bold text-xl mb-2">{{ $preparation->title }}</h3>
                            <p class="text-gray-400 text-sm mb-4">{{ Str::limit($preparation->description, 120) }}</p>

                            @if($preparation->preparation_steps && count($preparation->preparation_steps) > 0)
                                <div class="mb-4">
                                    <p class="text-purple-400 font-semibold text-sm mb-2">🔹 الخطوات:</p>
                                    <ul class="text-gray-300 text-sm space-y-1">
                                        @foreach(array_slice($preparation->preparation_steps, 0, 3) as $step)
                                            <li class="flex items-start gap-2">
                                                <span class="text-purple-400">•</span>
                                                <span>{{ $step }}</span>
                                            </li>
                                        @endforeach
                                        @if(count($preparation->preparation_steps) > 3)
                                            <li class="text-purple-400 text-xs">+{{ count($preparation->preparation_steps) - 3 }} خطوات أخرى</li>
                                        @endif
                                    </ul>
                                </div>
                            @endif

                            @if($preparation->timeline && count($preparation->timeline) > 0)
                                <div class="mb-4">
                                    <p class="text-purple-400 font-semibold text-sm mb-2">⏰ التوقيت:</p>
                                    <div class="flex flex-wrap gap-1">
                                        @foreach(array_slice($preparation->timeline, 0, 3) as $time)
                                            <span class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-2 py-1 rounded text-xs">{{ $time }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="flex gap-2 mt-4">
                                <button onclick="openPreparationDetailsModal('{{ $preparation->id }}')" class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-purple-600 hover:to-purple-700 transition-all duration-300">
                                    👁️ التفاصيل
                                </button>
                                
                                <button onclick="openEditPreparationModal('{{ $preparation->id }}')" class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300">
                                    ✏️ تعديل
                                </button>
                                
                                @if($preparation->videos && count($preparation->videos) > 0)
                                    <button onclick="openVideoModal('{{ $preparation->id }}')" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-red-600 hover:to-red-700 transition-all duration-300">
                                        📹 فيديو
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-6xl mb-4">📝</div>
                        <h3 class="text-xl font-bold text-gray-400 mb-2">لا توجد نصائح حالياً</h3>
                        <p class="text-gray-500">سيتم إضافة نصائح الاستعداد قريباً...</p>
                        <button onclick="openAddPreparationModal()" class="mt-4 bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-6 py-2 rounded-lg hover:from-purple-600 hover:to-indigo-700 transition-all duration-300">
                            ➕ إضافة أول نصيحة
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- قسم حقيبة المستشفى -->
    <div id="hospitalBagsSection" class="rounded-xl shadow-lg border border-blue-400" style="background-color: #2a2a2a;">
        <div class="bg-gradient-to-r from-blue-500 to-cyan-600 text-white p-6 rounded-t-xl flex justify-between items-center">
            <h2 class="text-xl font-bold">🧳 حقيبة يوم الولادة للمستشفى</h2>
            <button onclick="openAddBagModal()" class="text-blue-400 px-6 py-2 rounded-lg hover:bg-gray-700 border border-blue-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                ➕ إضافة حقيبة
            </button>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($hospitalBags as $bag)
                    <div class="border-2 border-blue-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                        @if($bag->images && count($bag->images) > 0)
                            <img src="{{ asset('storage/' . $bag->images[0]) }}" 
                                 alt="{{ $bag->title }}" 
                                 class="w-full h-40 object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-40 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                                <div class="text-4xl">🧳</div>
                            </div>
                        @endif
                        
                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-2 py-1 rounded-full text-xs">{{ $bag->bag_type ?? 'حقيبة عامة' }}</span>
                                @if($bag->priority_level)
                                    <span class="bg-gradient-to-r from-green-500 to-green-600 text-white px-2 py-1 rounded-full text-xs">أولوية {{ $bag->priority_level }}</span>
                                @endif
                            </div>
                            
                            <h3 class="text-white font-bold text-lg mb-2">{{ $bag->title }}</h3>
                            <p class="text-gray-400 text-sm mb-3">{{ Str::limit($bag->description, 100) }}</p>

                            @if($bag->essential_items && count($bag->essential_items) > 0)
                                <div class="mb-3">
                                    <p class="text-blue-400 font-semibold text-sm mb-1">✅ الأساسيات:</p>
                                    <ul class="text-gray-300 text-sm space-y-1">
                                        @foreach(array_slice($bag->essential_items, 0, 3) as $item)
                                            <li class="flex items-start gap-2">
                                                <span class="text-green-400">•</span>
                                                <span>{{ $item }}</span>
                                            </li>
                                        @endforeach
                                        @if(count($bag->essential_items) > 3)
                                            <li class="text-blue-400 text-xs">+{{ count($bag->essential_items) - 3 }} عناصر أخرى</li>
                                        @endif
                                    </ul>
                                </div>
                            @endif

                            @if($bag->when_to_pack)
                                <div class="mb-3">
                                    <p class="text-blue-400 font-semibold text-sm">📅 موعد التحضير:</p>
                                    <p class="text-gray-300 text-sm">{{ $bag->when_to_pack }}</p>
                                </div>
                            @endif

                            <div class="flex gap-2 mt-4">
                                <button onclick="openBagDetailsModal('{{ $bag->id }}')" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                                    👁️ التفاصيل
                                </button>
                                <button onclick="openEditBagModal('{{ $bag->id }}')" class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300">
                                    ✏️ تعديل
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-6xl mb-4">🧳</div>
                        <h3 class="text-xl font-bold text-gray-400 mb-2">لا توجد حقائب حالياً</h3>
                        <p class="text-gray-500">سيتم إضافة قوائم حقائب المستشفى قريباً...</p>
                        <button onclick="openAddBagModal()" class="mt-4 bg-gradient-to-r from-blue-500 to-cyan-600 text-white px-6 py-2 rounded-lg hover:from-blue-600 hover:to-cyan-700 transition-all duration-300">
                            ➕ إضافة أول حقيبة
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- قسم مستلزمات الطفل (Baby Shower List) -->
    <div id="babyShowerSection" class="rounded-xl shadow-lg border border-green-400" style="background-color: #2a2a2a;">
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-6 rounded-t-xl flex justify-between items-center">
            <h2 class="text-xl font-bold">🍼 قائمة مستلزمات الطفل</h2>
            <button onclick="openAddBabyItemModal()" class="text-green-400 px-6 py-2 rounded-lg hover:bg-gray-700 border border-green-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                ➕ إضافة مستلزم
            </button>
        </div>
        
        <div class="p-6">
            <!-- فلاتر الفئات -->
            <div class="mb-6 flex flex-wrap gap-2">
                <button onclick="filterItems('all')" class="filter-btn active bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300">
                    الكل
                </button>
                <button onclick="filterItems('الملابس')" class="filter-btn bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300">
                    👕 الملابس
                </button>
                <button onclick="filterItems('التغذية')" class="filter-btn bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300">
                    🍼 التغذية
                </button>
                <button onclick="filterItems('النوم')" class="filter-btn bg-gradient-to-r from-purple-500 to-purple-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300">
                    😴 النوم
                </button>
                <button onclick="filterItems('النظافة')" class="filter-btn bg-gradient-to-r from-pink-500 to-pink-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300">
                    🧼 النظافة
                </button>
                <button onclick="filterItems('اللعب')" class="filter-btn bg-gradient-to-r from-orange-500 to-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300">
                    🧸 اللعب
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="babyItemsContainer">
                @forelse($babyShowerItems as $item)
                    <div class="baby-item-card border-2 border-green-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);" data-category="{{ $item->category }}">
                        @if($item->images && count($item->images) > 0)
                            <img src="{{ asset('storage/' . $item->images[0]) }}" 
                                 alt="{{ $item->item_name }}" 
                                 class="w-full h-32 object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-32 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                                <div class="text-3xl">🍼</div>
                            </div>
                        @endif
                        
                        <div class="p-4">
                            <div class="flex items-center gap-1 mb-2">
                                @if($item->is_essential)
                                    <span class="bg-gradient-to-r from-red-500 to-red-600 text-white px-2 py-1 rounded-full text-xs font-bold">⭐ ضروري</span>
                                @endif
                                <span class="bg-gradient-to-r from-green-500 to-green-600 text-white px-2 py-1 rounded-full text-xs">{{ $item->category ?? 'عام' }}</span>
                            </div>
                            
                            <h3 class="text-white font-bold text-sm mb-1">{{ $item->item_name }}</h3>
                            <p class="text-gray-400 text-xs mb-2">{{ Str::limit($item->description, 60) }}</p>

                            @if($item->suggested_quantity)
                                <div class="mb-2">
                                    <p class="text-green-400 font-semibold text-xs">🔢 الكمية المقترحة:</p>
                                    <p class="text-gray-300 text-xs">{{ $item->suggested_quantity }}</p>
                                </div>
                            @endif

                            @if($item->price_range)
                                <div class="mb-2">
                                    <p class="text-green-400 font-semibold text-xs">💰 نطاق السعر:</p>
                                    <p class="text-gray-300 text-xs">{{ $item->price_range }}</p>
                                </div>
                            @endif

                            @if($item->importance_rating)
                                <div class="mb-2">
                                    <div class="flex items-center gap-1">
                                        <span class="text-yellow-400 text-xs">⭐</span>
                                        <span class="text-gray-300 text-xs">{{ $item->importance_rating }}/5</span>
                                    </div>
                                </div>
                            @endif

                            <div class="flex gap-1 mt-3">
                                <button onclick="openItemDetailsModal('{{ $item->id }}')" class="bg-gradient-to-r from-green-500 to-green-600 text-white px-2 py-1 rounded-lg text-xs font-semibold hover:from-green-600 hover:to-green-700 transition-all duration-300">
                                    👁️
                                </button>
                                <button onclick="openEditItemModal('{{ $item->id }}')" class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-2 py-1 rounded-lg text-xs font-semibold hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300">
                                    ✏️
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-6xl mb-4">🍼</div>
                        <h3 class="text-xl font-bold text-gray-400 mb-2">لا توجد مستلزمات حالياً</h3>
                        <p class="text-gray-500">سيتم إضافة قائمة مستلزمات الطفل قريباً...</p>
                        <button onclick="openAddBabyItemModal()" class="mt-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-2 rounded-lg hover:from-green-600 hover:to-emerald-700 transition-all duration-300">
                            ➕ إضافة أول مستلزم
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- مودال إضافة نصيحة جديدة -->
    <div id="addPreparationModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" onclick="closeOnBackdrop(event, ['addPreparationModal'])">
        <div class="bg-gray-800 rounded-xl p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto mx-4" onclick="event.stopPropagation();" style="background-color: #2a2a2a;">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">📝 إضافة نصيحة جديدة</h3>
                <button onclick="closeAddPreparationModal()" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>
            
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-purple-400 text-sm font-semibold mb-2">العنوان</label>
                        <input type="text" name="title" class="w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="عنوان النصيحة...">
                    </div>
                    <div>
                        <label class="block text-purple-400 text-sm font-semibold mb-2">الفئة</label>
                        <select name="category" class="w-full rounded-lg border-2 border-purple-400 text-white focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="">اختر الفئة...</option>
                            <option value="نصائح ولادة">نصائح ولادة</option>
                            <option value="تحضيرات نفسية">تحضيرات نفسية</option>
                            <option value="تحضيرات جسدية">تحضيرات جسدية</option>
                            <option value="تحضيرات منزلية">تحضيرات منزلية</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-purple-400 text-sm font-semibold mb-2">الوصف</label>
                    <textarea name="description" rows="4" class="w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="وصف النصيحة..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-purple-400 text-sm font-semibold mb-2">مستوى الأهمية (1-5)</label>
                        <select name="importance_level" class="w-full rounded-lg border-2 border-purple-400 text-white focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="">اختر مستوى الأهمية...</option>
                            <option value="1">1 - منخفض</option>
                            <option value="2">2 - أقل من المتوسط</option>
                            <option value="3">3 - متوسط</option>
                            <option value="4">4 - مهم</option>
                            <option value="5">5 - مهم جداً</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-purple-400 text-sm font-semibold mb-2">نصيحة مميزة؟</label>
                        <div class="flex items-center gap-4 mt-3">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="is_featured" value="1" class="text-purple-500">
                                <span class="text-white text-sm">نعم</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="is_featured" value="0" checked class="text-purple-500">
                                <span class="text-white text-sm">لا</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-purple-500 to-indigo-600 text-white py-2 px-4 rounded-lg hover:from-purple-600 hover:to-indigo-700 font-semibold transition-all duration-300">
                        ✅ إضافة النصيحة
                    </button>
                    <button type="button" onclick="closeAddPreparationModal()" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white py-2 px-4 rounded-lg hover:from-gray-700 hover:to-gray-800 font-semibold transition-all duration-300">
                        ❌ إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- مودال إضافة حقيبة مستشفى جديدة -->
    <div id="addBagModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" onclick="closeOnBackdrop(event, ['addBagModal'])">
        <div class="bg-gray-800 rounded-xl p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto mx-4" onclick="event.stopPropagation();" style="background-color: #2a2a2a;">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">🧳 إضافة حقيبة مستشفى جديدة</h3>
                <button onclick="closeAddBagModal()" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>
            
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">عنوان الحقيبة</label>
                        <input type="text" name="title" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="حقيبة الأم، حقيبة الطفل...">
                    </div>
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">نوع الحقيبة</label>
                        <select name="bag_type" class="w-full rounded-lg border-2 border-blue-400 text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="">اختر نوع الحقيبة...</option>
                            <option value="حقيبة الأم">حقيبة الأم</option>
                            <option value="حقيبة الطفل">حقيبة الطفل</option>
                            <option value="حقيبة المرافق">حقيبة المرافق</option>
                            <option value="حقيبة الطوارئ">حقيبة الطوارئ</option>
                            <option value="حقيبة ما بعد الولادة">حقيبة ما بعد الولادة</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-blue-400 text-sm font-semibold mb-2">وصف الحقيبة</label>
                    <textarea name="description" rows="3" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="وصف محتويات الحقيبة والغرض منها..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">مستوى الأولوية (1-5)</label>
                        <select name="priority_level" class="w-full rounded-lg border-2 border-blue-400 text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="">اختر مستوى الأولوية...</option>
                            <option value="1">1 - منخفض</option>
                            <option value="2">2 - أقل من المتوسط</option>
                            <option value="3">3 - متوسط</option>
                            <option value="4">4 - مهم</option>
                            <option value="5">5 - عاجل جداً</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">الحجم المقترح للحقيبة</label>
                        <select name="bag_size_recommendation" class="w-full rounded-lg border-2 border-blue-400 text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="">اختر الحجم...</option>
                            <option value="صغيرة">صغيرة (حقيبة يد)</option>
                            <option value="متوسطة">متوسطة (حقيبة سفر صغيرة)</option>
                            <option value="كبيرة">كبيرة (حقيبة سفر كبيرة)</option>
                            <option value="عملاقة">عملاقة (حقيبة كبيرة جداً)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-blue-400 text-sm font-semibold mb-2">الأغراض الأساسية (واحد في كل سطر)</label>
                    <div id="essentialItems">
                        <textarea name="essential_items" rows="4" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="مثال:&#10;ملابس داخلية&#10;فوط صحية&#10;مناديل مبللة&#10;شحن الهاتف"></textarea>
                    </div>
                    <p class="text-gray-400 text-xs mt-1">اكتب كل غرض في سطر منفصل</p>
                </div>

                <div>
                    <label class="block text-blue-400 text-sm font-semibold mb-2">الأغراض الاختيارية (واحد في كل سطر)</label>
                    <div id="optionalItems">
                        <textarea name="optional_items" rows="3" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="مثال:&#10;كتاب للقراءة&#10;وجبات خفيفة&#10;كاميرا"></textarea>
                    </div>
                    <p class="text-gray-400 text-xs mt-1">اكتب كل غرض في سطر منفصل</p>
                </div>

                <div>
                    <label class="block text-blue-400 text-sm font-semibold mb-2">نصائح التحضير</label>
                    <textarea name="packing_tips" rows="3" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="نصائح مهمة لتحضير هذه الحقيبة..."></textarea>
                </div>

                <div>
                    <label class="block text-blue-400 text-sm font-semibold mb-2">متى يجب تحضير هذه الحقيبة؟</label>
                    <select name="when_to_pack" class="w-full rounded-lg border-2 border-blue-400 text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;">
                        <option value="">اختر التوقيت...</option>
                        <option value="في الأسبوع 32-34">في الأسبوع 32-34</option>
                        <option value="في الأسبوع 35-36">في الأسبوع 35-36</option>
                        <option value="في الأسبوع 37-38">في الأسبوع 37-38</option>
                        <option value="في الأسبوع 39-40">في الأسبوع 39-40</option>
                        <option value="عند بداية المخاض">عند بداية المخاض</option>
                        <option value="بعد الولادة">بعد الولادة</option>
                    </select>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-blue-500 to-cyan-600 text-white py-2 px-4 rounded-lg hover:from-blue-600 hover:to-cyan-700 font-semibold transition-all duration-300">
                        ✅ إضافة الحقيبة
                    </button>
                    <button type="button" onclick="closeAddBagModal()" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white py-2 px-4 rounded-lg hover:from-gray-700 hover:to-gray-800 font-semibold transition-all duration-300">
                        ❌ إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- مودال إضافة مستلزم طفل جديد -->
    <div id="addBabyItemModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" onclick="closeOnBackdrop(event, ['addBabyItemModal'])">
        <div class="bg-gray-800 rounded-xl p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto mx-4" onclick="event.stopPropagation();" style="background-color: #2a2a2a;">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">🍼 إضافة مستلزم طفل جديد</h3>
                <button onclick="closeAddBabyItemModal()" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>
            
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-green-400 text-sm font-semibold mb-2">اسم المستلزم</label>
                        <input type="text" name="item_name" class="w-full rounded-lg border-2 border-green-400 text-white placeholder-gray-400 focus:border-green-500 focus:ring-green-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="اسم المستلزم...">
                    </div>
                    <div>
                        <label class="block text-green-400 text-sm font-semibold mb-2">الفئة</label>
                        <select name="category" class="w-full rounded-lg border-2 border-green-400 text-white focus:border-green-500 focus:ring-green-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="">اختر الفئة...</option>
                            <option value="الملابس">👕 الملابس</option>
                            <option value="التغذية">🍼 التغذية</option>
                            <option value="النوم">😴 النوم</option>
                            <option value="النظافة">🧼 النظافة</option>
                            <option value="اللعب">🧸 اللعب</option>
                            <option value="السلامة">🛡️ السلامة</option>
                            <option value="التنقل">🚗 التنقل</option>
                            <option value="الصحة">💊 الصحة</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-green-400 text-sm font-semibold mb-2">وصف المستلزم</label>
                    <textarea name="description" rows="3" class="w-full rounded-lg border-2 border-green-400 text-white placeholder-gray-400 focus:border-green-500 focus:ring-green-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="وصف المستلزم وفوائده..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-green-400 text-sm font-semibold mb-2">الكمية المقترحة</label>
                        <input type="number" name="suggested_quantity" class="w-full rounded-lg border-2 border-green-400 text-white placeholder-gray-400 focus:border-green-500 focus:ring-green-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="3">
                    </div>
                    <div>
                        <label class="block text-green-400 text-sm font-semibold mb-2">نطاق السعر</label>
                        <input type="text" name="price_range" class="w-full rounded-lg border-2 border-green-400 text-white placeholder-gray-400 focus:border-green-500 focus:ring-green-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="50-100 ريال">
                    </div>
                    <div>
                        <label class="block text-green-400 text-sm font-semibold mb-2">تقييم الأهمية (1-5)</label>
                        <select name="importance_rating" class="w-full rounded-lg border-2 border-green-400 text-white focus:border-green-500 focus:ring-green-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="">اختر التقييم...</option>
                            <option value="1">1 - اختياري</option>
                            <option value="2">2 - مفيد</option>
                            <option value="3">3 - مهم</option>
                            <option value="4">4 - مهم جداً</option>
                            <option value="5">5 - ضروري</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-green-400 text-sm font-semibold mb-2">المناسب للعمر</label>
                        <select name="age_suitability" class="w-full rounded-lg border-2 border-green-400 text-white focus:border-green-500 focus:ring-green-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="">اختر العمر المناسب...</option>
                            <option value="0-3 شهور">0-3 شهور</option>
                            <option value="3-6 شهور">3-6 شهور</option>
                            <option value="6-12 شهر">6-12 شهر</option>
                            <option value="0-12 شهر">0-12 شهر</option>
                            <option value="من الولادة">من الولادة</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-green-400 text-sm font-semibold mb-2">هل هو ضروري؟</label>
                        <div class="flex items-center gap-4 mt-3">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="is_essential" value="1" class="text-green-500">
                                <span class="text-white text-sm">نعم، ضروري</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="is_essential" value="0" checked class="text-green-500">
                                <span class="text-white text-sm">لا، اختياري</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-green-400 text-sm font-semibold mb-2">أماكن الشراء المقترحة (واحد في كل سطر)</label>
                    <textarea name="where_to_buy" rows="3" class="w-full rounded-lg border-2 border-green-400 text-white placeholder-gray-400 focus:border-green-500 focus:ring-green-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="مثال:&#10;محل الأطفال&#10;الصيدلية&#10;المتاجر الإلكترونية"></textarea>
                    <p class="text-gray-400 text-xs mt-1">اكتب كل مكان في سطر منفصل</p>
                </div>

                <div>
                    <label class="block text-green-400 text-sm font-semibold mb-2">البدائل المتاحة (واحد في كل سطر)</label>
                    <textarea name="alternatives" rows="2" class="w-full rounded-lg border-2 border-green-400 text-white placeholder-gray-400 focus:border-green-500 focus:ring-green-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="البدائل المتاحة لهذا المستلزم..."></textarea>
                </div>

                <div>
                    <label class="block text-green-400 text-sm font-semibold mb-2">ملاحظات السلامة</label>
                    <textarea name="safety_notes" rows="2" class="w-full rounded-lg border-2 border-green-400 text-white placeholder-gray-400 focus:border-green-500 focus:ring-green-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="ملاحظات مهمة حول سلامة الطفل..."></textarea>
                </div>

                <div>
                    <label class="block text-green-400 text-sm font-semibold mb-2">الماركات المقترحة (واحدة في كل سطر)</label>
                    <textarea name="brand_recommendations" rows="2" class="w-full rounded-lg border-2 border-green-400 text-white placeholder-gray-400 focus:border-green-500 focus:ring-green-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="الماركات الموثوقة لهذا المستلزم..."></textarea>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-green-500 to-emerald-600 text-white py-2 px-4 rounded-lg hover:from-green-600 hover:to-emerald-700 font-semibold transition-all duration-300">
                        ✅ إضافة المستلزم
                    </button>
                    <button type="button" onclick="closeAddBabyItemModal()" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white py-2 px-4 rounded-lg hover:from-gray-700 hover:to-gray-800 font-semibold transition-all duration-300">
                        ❌ إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // دوال التنقل
        function scrollToPreparations() {
            document.getElementById('preparationsSection').scrollIntoView({ behavior: 'smooth' });
        }

        function scrollToHospitalBags() {
            document.getElementById('hospitalBagsSection').scrollIntoView({ behavior: 'smooth' });
        }

        function scrollToBabyShower() {
            document.getElementById('babyShowerSection').scrollIntoView({ behavior: 'smooth' });
        }

        // دوال المودالات
        function openAddPreparationModal() {
            document.getElementById('addPreparationModal').classList.remove('hidden');
        }

        function closeAddPreparationModal() {
            document.getElementById('addPreparationModal').classList.add('hidden');
        }

        function openAddBagModal() {
            document.getElementById('addBagModal').classList.remove('hidden');
        }

        function closeAddBagModal() {
            document.getElementById('addBagModal').classList.add('hidden');
        }

        function openAddBabyItemModal() {
            document.getElementById('addBabyItemModal').classList.remove('hidden');
        }

        function closeAddBabyItemModal() {
            document.getElementById('addBabyItemModal').classList.add('hidden');
        }

        // دوال التفاصيل
        function openPreparationDetailsModal(preparationId) {
            alert('سيتم إضافة تفاصيل النصيحة قريباً - ID: ' + preparationId);
        }

        function openBagDetailsModal(bagId) {
            alert('سيتم إضافة تفاصيل الحقيبة قريباً - ID: ' + bagId);
        }

        function openItemDetailsModal(itemId) {
            alert('سيتم إضافة تفاصيل المستلزم قريباً - ID: ' + itemId);
        }

        // دوال التعديل
        function openEditPreparationModal(preparationId) {
            alert('سيتم إضافة تعديل النصيحة قريباً - ID: ' + preparationId);
        }

        function openEditBagModal(bagId) {
            alert('سيتم إضافة تعديل الحقيبة قريباً - ID: ' + bagId);
        }

        function openEditItemModal(itemId) {
            alert('سيتم إضافة تعديل المستلزم قريباً - ID: ' + itemId);
        }

        // دوال الفيديو
        function openVideoModal(id) {
            alert('سيتم إضافة مشغل الفيديو قريباً - ID: ' + id);
        }

        // دوال الفلترة
        function filterItems(category) {
            const allItems = document.querySelectorAll('.baby-item-card');
            const filterButtons = document.querySelectorAll('.filter-btn');
            
            // إزالة التحديد من جميع الأزرار
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // إضافة التحديد للزر المنقور عليه
            event.target.classList.add('active');
            
            allItems.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
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
        .be-ready-to-welcome-main {
            background-color: #1a1a1a;
            color: #f9fafb;
            min-height: 100vh;
        }
        
        /* أنماط الفلاتر */
        .filter-btn.active {
            background: linear-gradient(to right, #10b981, #059669) !important;
            transform: scale(1.05);
        }
        
        /* أنماط البطاقات */
        .baby-item-card {
            transition: all 0.3s ease;
        }

        .baby-item-card:hover {
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
