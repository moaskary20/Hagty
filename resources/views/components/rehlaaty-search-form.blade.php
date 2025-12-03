<!-- Rehlaaty Search Form -->
<div class="max-w-4xl mx-auto mb-8 mt-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">🔍 البحث في قسم رحلتي</h3>
            <p class="text-gray-600">ابحثي عن الفنادق، المكاتب السياحية، وعروض السفر</p>
        </div>
        
        <form action="{{ route('search') }}" method="GET" class="space-y-4">
            <input type="hidden" name="section" value="rehlaaty">
            
            <!-- Search Query -->
            <div>
                <label for="q" class="block text-sm font-medium text-gray-700 mb-2">كلمة البحث</label>
                <input type="text" 
                       id="q" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="ابحثي عن: فندق، عرض سفر، مكتب سياحي..."
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right"
                       required>
            </div>
            
            <!-- Search Type -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">نوع البحث</label>
                    <select id="type" name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأنواع</option>
                        <option value="hotels" {{ request('type') == 'hotels' ? 'selected' : '' }}>فنادق</option>
                        <option value="tourism_offices" {{ request('type') == 'tourism_offices' ? 'selected' : '' }}>مكاتب سياحية</option>
                        <option value="travel_offers" {{ request('type') == 'travel_offers' ? 'selected' : '' }}>عروض سفر</option>
                        <option value="camps" {{ request('type') == 'camps' ? 'selected' : '' }}>معسكرات نسائية</option>
                    </select>
                </div>
                
                <div>
                    <label for="destination" class="block text-sm font-medium text-gray-700 mb-2">الوجهة</label>
                    <input type="text" 
                           id="destination" 
                           name="destination" 
                           value="{{ request('destination') }}"
                           placeholder="أدخلي الوجهة..."
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                </div>
                
                <div>
                    <label for="price_range" class="block text-sm font-medium text-gray-700 mb-2">السعر</label>
                    <select id="price_range" name="price_range" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأسعار</option>
                        <option value="low" {{ request('price_range') == 'low' ? 'selected' : '' }}>اقتصادي</option>
                        <option value="medium" {{ request('price_range') == 'medium' ? 'selected' : '' }}>متوسط</option>
                        <option value="high" {{ request('price_range') == 'high' ? 'selected' : '' }}>فاخر</option>
                    </select>
                </div>
            </div>
            
            <!-- Search Button -->
            <div class="text-center pt-4">
                <button type="submit" 
                        class="text-white px-10 py-4 rounded-xl font-bold transition-all duration-300 transform hover:scale-105 hover:shadow-2xl shadow-lg"
                        style="background: linear-gradient(135deg, #a15dbf 0%, #8B4A9C 100%);"
                        onmouseover="this.style.background='linear-gradient(135deg, #8B4A9C 0%, #753880 100%)'"
                        onmouseout="this.style.background='linear-gradient(135deg, #a15dbf 0%, #8B4A9C 100%)'">
                    <i class="fas fa-search ml-2"></i>
                    البحث الآن
                </button>
            </div>
        </form>
    </div>
</div>

