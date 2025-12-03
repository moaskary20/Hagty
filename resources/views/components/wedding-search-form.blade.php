<!-- Wedding Search Form -->
<div class="max-w-4xl mx-auto mb-8 mt-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">🔍 البحث في قسم الزفاف</h3>
            <p class="text-gray-600">ابحث عن مصممي فساتين، منظمي الحفلات، فناني المكياج، وقاعات الحفلات</p>
        </div>
        
        <form action="{{ route('search.wedding') }}" method="GET" class="space-y-4">
            <input type="hidden" name="section" value="wedding">
            
            <!-- Search Query -->
            <div>
                <label for="q" class="block text-sm font-medium text-gray-700 mb-2">كلمة البحث</label>
                <input type="text" 
                       id="q" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="ابحث عن: مصمم فساتين، منظم حفلات، فنان مكياج، قاعة حفلات..."
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right"
                       required>
            </div>
            
            <!-- Search Type -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">نوع الخدمة</label>
                    <select id="type" name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأنواع</option>
                        <option value="wedding_designers" {{ request('type') == 'wedding_designers' ? 'selected' : '' }}>مصممي فساتين</option>
                        <option value="wedding_planners" {{ request('type') == 'wedding_planners' ? 'selected' : '' }}>منظمي حفلات</option>
                        <option value="makeup_artists" {{ request('type') == 'makeup_artists' ? 'selected' : '' }}>فناني مكياج</option>
                        <option value="wedding_venues" {{ request('type') == 'wedding_venues' ? 'selected' : '' }}>قاعات حفلات</option>
                        <option value="photographers" {{ request('type') == 'photographers' ? 'selected' : '' }}>مصورين</option>
                        <option value="catering" {{ request('type') == 'catering' ? 'selected' : '' }}>خدمات التموين</option>
                    </select>
                </div>
                
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-2">الموقع</label>
                    <input type="text" 
                           id="location" 
                           name="location" 
                           value="{{ request('location') }}"
                           placeholder="أدخل المدينة أو المنطقة..."
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
            
            <!-- Quick Search Tags -->
            <div class="pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-600 mb-3 text-center">بحث سريع:</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">مصمم فساتين</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">منظم حفلات</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">فنان مكياج</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">مصفف شعر</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">قاعة حفلات</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">خدمات التموين</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">دي جي</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">مزين زهور</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">مصور زفاف</span>
                </div>
            </div>
        </form>
    </div>
</div>
