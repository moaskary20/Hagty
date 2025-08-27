<!-- Health Search Form -->
<div class="max-w-4xl mx-auto mb-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">🔍 البحث في قسم الصحة</h3>
            <p class="text-gray-600">ابحثي عن الأطباء، المستشفيات، الصيدليات، والنصائح الصحية</p>
        </div>
        
        <form action="{{ route('search') }}" method="GET" class="space-y-4">
            <input type="hidden" name="section" value="health">
            
            <!-- Search Query -->
            <div>
                <label for="q" class="block text-sm font-medium text-gray-700 mb-2">كلمة البحث</label>
                <input type="text" 
                       id="q" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="ابحثي عن: طبيب، تخصص طبي، مستشفى، صيدلية، نصيحة صحية..."
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right"
                       required>
            </div>
            
            <!-- Search Type -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">نوع البحث</label>
                    <select id="type" name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأنواع</option>
                        <option value="doctors" {{ request('type') == 'doctors' ? 'selected' : '' }}>أطباء</option>
                        <option value="hospitals" {{ request('type') == 'hospitals' ? 'selected' : '' }}>مستشفيات</option>
                        <option value="pharmacies" {{ request('type') == 'pharmacies' ? 'selected' : '' }}>صيدليات</option>
                        <option value="health_tips" {{ request('type') == 'health_tips' ? 'selected' : '' }}>نصائح صحية</option>
                    </select>
                </div>
                
                <!-- Specialty Filter -->
                <div>
                    <label for="specialty" class="block text-sm font-medium text-gray-700 mb-2">التخصص الطبي</label>
                    <select id="specialty" name="specialty" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع التخصصات</option>
                        <option value="cardiology" {{ request('specialty') == 'cardiology' ? 'selected' : '' }}>أمراض القلب</option>
                        <option value="dermatology" {{ request('specialty') == 'dermatology' ? 'selected' : '' }}>أمراض الجلد</option>
                        <option value="neurology" {{ request('specialty') == 'neurology' ? 'selected' : '' }}>أمراض الأعصاب</option>
                        <option value="orthopedics" {{ request('specialty') == 'orthopedics' ? 'selected' : '' }}>جراحة العظام</option>
                        <option value="pediatrics" {{ request('specialty') == 'pediatrics' ? 'selected' : '' }}>طب الأطفال</option>
                        <option value="gynecology" {{ request('specialty') == 'gynecology' ? 'selected' : '' }}>أمراض النساء</option>
                        <option value="ophthalmology" {{ request('specialty') == 'ophthalmology' ? 'selected' : '' }}>طب العيون</option>
                        <option value="dentistry" {{ request('specialty') == 'dentistry' ? 'selected' : '' }}>طب الأسنان</option>
                    </select>
                </div>
                
                <!-- Location Filter -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-2">الموقع</label>
                    <input type="text" 
                           id="location" 
                           name="location" 
                           value="{{ request('location') }}"
                           placeholder="أدخلي المدينة أو المنطقة..."
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                </div>
            </div>
            
            <!-- Advanced Filters -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Rating Filter -->
                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">التقييم</label>
                    <select id="rating" name="rating" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع التقييمات</option>
                        <option value="5" {{ request('rating') == '5' ? 'selected' : '' }}>5 نجوم</option>
                        <option value="4" {{ request('rating') == '4' ? 'selected' : '' }}>4 نجوم وأعلى</option>
                        <option value="3" {{ request('rating') == '3' ? 'selected' : '' }}>3 نجوم وأعلى</option>
                    </select>
                </div>
                
                <!-- Emergency Filter -->
                <div>
                    <label for="emergency" class="block text-sm font-medium text-gray-700 mb-2">خدمات الطوارئ</label>
                    <select id="emergency" name="emergency" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الخدمات</option>
                        <option value="yes" {{ request('emergency') == 'yes' ? 'selected' : '' }}>متوفر</option>
                        <option value="no" {{ request('emergency') == 'no' ? 'selected' : '' }}>غير متوفر</option>
                    </select>
                </div>
            </div>
            
            <!-- Search Button -->
            <div class="text-center pt-4">
                <button type="submit" 
                        class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-purple-600 hover:to-pink-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <i class="fas fa-search ml-2"></i>
                    البحث
                </button>
            </div>
            
            <!-- Quick Search Tags -->
            <div class="pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-600 mb-3 text-center">بحث سريع:</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <button type="button" 
                            onclick="setQuickSearch('طبيب قلب', 'doctors')"
                            class="px-3 py-1 bg-pink-100 text-pink-800 rounded-full text-sm hover:bg-pink-200 transition-colors duration-200">
                        ❤️ طبيب قلب
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('مستشفى', 'hospitals')"
                            class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm hover:bg-purple-200 transition-colors duration-200">
                        🏥 مستشفى
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('صيدلية', 'pharmacies')"
                            class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm hover:bg-blue-200 transition-colors duration-200">
                        💊 صيدلية
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('نصيحة صحية', 'health_tips')"
                            class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm hover:bg-green-200 transition-colors duration-200">
                        💡 نصيحة صحية
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function setQuickSearch(query, type) {
    document.getElementById('q').value = query;
    document.getElementById('type').value = type;
    document.querySelector('form').submit();
}
</script>
