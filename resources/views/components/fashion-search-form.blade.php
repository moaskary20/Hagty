<!-- Fashion Search Form -->
<div class="max-w-4xl mx-auto mb-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">🔍 البحث في قسم الموضة</h3>
            <p class="text-gray-600">ابحثي عن أحدث صيحات الموضة، فيديوهات دعائية، وكورسات الموضة</p>
        </div>
        
        <form action="{{ route('search') }}" method="GET" class="space-y-4">
            <input type="hidden" name="section" value="fashion">
            
            <!-- Search Query -->
            <div>
                <label for="q" class="block text-sm font-medium text-gray-700 mb-2">كلمة البحث</label>
                <input type="text" 
                       id="q" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="ابحثي عن: صيحات موضة، فيديوهات دعائية، كورسات موضة..."
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right"
                       required>
            </div>
            
            <!-- Search Type -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">نوع البحث</label>
                    <select id="type" name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأنواع</option>
                        <option value="fashion_trends" {{ request('type') == 'fashion_trends' ? 'selected' : '' }}>صيحات موضة</option>
                        <option value="sponsor_videos" {{ request('type') == 'sponsor_videos' ? 'selected' : '' }}>فيديوهات دعائية</option>
                        <option value="forasy_courses" {{ request('type') == 'forasy_courses' ? 'selected' : '' }}>كورسات موضة</option>
                    </select>
                </div>
                
                <!-- Season Filter -->
                <div>
                    <label for="season" class="block text-sm font-medium text-gray-700 mb-2">الموسم</label>
                    <select id="season" name="season" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع المواسم</option>
                        <option value="spring" {{ request('season') == 'spring' ? 'selected' : '' }}>الربيع</option>
                        <option value="summer" {{ request('season') == 'summer' ? 'selected' : '' }}>الصيف</option>
                        <option value="autumn" {{ request('season') == 'autumn' ? 'selected' : '' }}>الخريف</option>
                        <option value="winter" {{ request('season') == 'winter' ? 'selected' : '' }}>الشتاء</option>
                    </select>
                </div>
                
                <!-- Category Filter -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">الفئة</label>
                    <select id="category" name="category" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الفئات</option>
                        <option value="clothing" {{ request('category') == 'clothing' ? 'selected' : '' }}>ملابس</option>
                        <option value="accessories" {{ request('category') == 'accessories' ? 'selected' : '' }}>إكسسوارات</option>
                        <option value="shoes" {{ request('category') == 'shoes' ? 'selected' : '' }}>أحذية</option>
                        <option value="makeup" {{ request('category') == 'makeup' ? 'selected' : '' }}>مكياج</option>
                        <option value="hairstyles" {{ request('category') == 'hairstyles' ? 'selected' : '' }}>تسريحات شعر</option>
                    </select>
                </div>
            </div>
            
            <!-- Search Button -->
            <div class="text-center pt-4">
                <button type="submit" 
                        class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-indigo-600 hover:to-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <i class="fas fa-search ml-2"></i>
                    البحث
                </button>
            </div>
            
            <!-- Quick Search Tags -->
            <div class="pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-600 mb-3 text-center">بحث سريع:</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <button type="button" 
                            onclick="setQuickSearch('صيحات موضة', 'fashion_trends')"
                            class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm hover:bg-blue-200 transition-colors duration-200">
                        👗 صيحات موضة
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('فيديوهات دعائية', 'sponsor_videos')"
                            class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm hover:bg-purple-200 transition-colors duration-200">
                        🎥 فيديوهات دعائية
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('كورسات موضة', 'forasy_courses')"
                            class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm hover:bg-indigo-200 transition-colors duration-200">
                        📚 كورسات موضة
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('ملابس صيفية', 'fashion_trends')"
                            class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm hover:bg-green-200 transition-colors duration-200">
                        ☀️ ملابس صيفية
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
