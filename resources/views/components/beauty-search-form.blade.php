<!-- Beauty Search Form -->
<div class="max-w-4xl mx-auto mb-8 mt-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">🔍 البحث في قسم الجمال</h3>
            <p class="text-gray-600">ابحثي عن جراحي التجميل، مصففي الشعر، محلات التجميل، ونصائح الجمال</p>
        </div>
        
        <form action="{{ route('search.beauty') }}" method="GET" class="space-y-4">
            <input type="hidden" name="section" value="beauty">
            
            <!-- Search Query -->
            <div>
                <label for="q" class="block text-sm font-medium text-gray-700 mb-2">كلمة البحث</label>
                <input type="text" 
                       id="q" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="ابحثي عن: جراح تجميل، مصفف شعر، محل تجميل، نصيحة جمال..."
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right"
                       required>
            </div>
            
            <!-- Search Type -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">نوع البحث</label>
                    <select id="type" name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأنواع</option>
                        <option value="plastic_surgeons" {{ request('type') == 'plastic_surgeons' ? 'selected' : '' }}>جراحي التجميل</option>
                        <option value="beauty_centers" {{ request('type') == 'beauty_centers' ? 'selected' : '' }}>مراكز التجميل</option>
                        <option value="hair_stylists" {{ request('type') == 'hair_stylists' ? 'selected' : '' }}>مصففي الشعر</option>
                        <option value="beauty_tips" {{ request('type') == 'beauty_tips' ? 'selected' : '' }}>نصائح الجمال</option>
                    </select>
                </div>
                
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-2">الموقع</label>
                    <input type="text" 
                           id="location" 
                           name="location" 
                           value="{{ request('location') }}"
                           placeholder="أدخلي المدينة أو المنطقة..."
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                </div>
                
                <div>
                    <label for="specialty" class="block text-sm font-medium text-gray-700 mb-2">التخصص</label>
                    <select id="specialty" name="specialty" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع التخصصات</option>
                        <option value="skin" {{ request('specialty') == 'skin' ? 'selected' : '' }}>البشرة</option>
                        <option value="hair" {{ request('specialty') == 'hair' ? 'selected' : '' }}>الشعر</option>
                        <option value="makeup" {{ request('specialty') == 'makeup' ? 'selected' : '' }}>المكياج</option>
                        <option value="nails" {{ request('specialty') == 'nails' ? 'selected' : '' }}>الأظافر</option>
                        <option value="spa" {{ request('specialty') == 'spa' ? 'selected' : '' }}>السبا</option>
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
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">جراح تجميل</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">مصفف شعر</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">محل تجميل</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">نصيحة جمال</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">طبيب بشرة</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">متخصص أظافر</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">طبيب تغذية</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">عيادة سبا</span>
                </div>
            </div>
        </form>
    </div>
</div>
