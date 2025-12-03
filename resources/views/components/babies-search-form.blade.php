<!-- Babies Search Form -->
<div class="max-w-4xl mx-auto mb-8 mt-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">🔍 البحث في قسم الأطفال</h3>
            <p class="text-gray-600">ابحثي في معلومات الأطفال وصحتهم</p>
        </div>
        
        <form action="{{ route('search.babies') }}" method="GET" class="space-y-4">
            <input type="hidden" name="section" value="babies">
            
            <!-- Search Query -->
            <div>
                <label for="q" class="block text-sm font-medium text-gray-700 mb-2">كلمة البحث</label>
                <input type="text" 
                       id="q" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="ابحثي عن: اسم الطفل، معلوماته الصحية، تطعيمات..."
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right"
                       required>
            </div>
            
            <!-- Search Filters -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">نوع البحث</label>
                    <select id="type" name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأنواع</option>
                        <option value="health_info" {{ request('type') == 'health_info' ? 'selected' : '' }}>معلومات صحية</option>
                        <option value="vaccinations" {{ request('type') == 'vaccinations' ? 'selected' : '' }}>التطعيمات</option>
                        <option value="growth" {{ request('type') == 'growth' ? 'selected' : '' }}>النمو والتطور</option>
                        <option value="nutrition" {{ request('type') == 'nutrition' ? 'selected' : '' }}>التغذية</option>
                    </select>
                </div>
                
                <div>
                    <label for="age_range" class="block text-sm font-medium text-gray-700 mb-2">الفئة العمرية</label>
                    <select id="age_range" name="age_range" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأعمار</option>
                        <option value="0-6months" {{ request('age_range') == '0-6months' ? 'selected' : '' }}>0-6 شهور</option>
                        <option value="6-12months" {{ request('age_range') == '6-12months' ? 'selected' : '' }}>6-12 شهر</option>
                        <option value="1-2years" {{ request('age_range') == '1-2years' ? 'selected' : '' }}>1-2 سنة</option>
                        <option value="2-5years" {{ request('age_range') == '2-5years' ? 'selected' : '' }}>2-5 سنوات</option>
                        <option value="5plus" {{ request('age_range') == '5plus' ? 'selected' : '' }}>5+ سنوات</option>
                    </select>
                </div>
                
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">الجنس</label>
                    <select id="gender" name="gender" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">الكل</option>
                        <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>ذكر</option>
                        <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>أنثى</option>
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
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">معلومات صحية</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">التطعيمات</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">النمو والتطور</span>
                    <span class="bg-gray-100 hover:bg-purple-100 hover:text-purple-700 px-3 py-1 rounded-full text-sm transition-colors duration-200 cursor-pointer">التغذية</span>
                </div>
            </div>
        </form>
    </div>
</div>
