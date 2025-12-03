<!-- Accessoraty Search Form -->
<div class="max-w-4xl mx-auto mb-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">🔍 البحث في قسم أكسسوراتى</h3>
            <p class="text-gray-600">ابحثي عن الكورسات التعليمية، الطلاب، ومتاجر الإكسسوارات</p>
        </div>
        
        <form action="{{ route('search') }}" method="GET" class="space-y-4">
            <input type="hidden" name="section" value="accessoraty">
            
            <!-- Search Query -->
            <div>
                <label for="q" class="block text-sm font-medium text-gray-700 mb-2">كلمة البحث</label>
                <input type="text" 
                       id="q" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="ابحثي عن: كورس تعليمي، طالب، متجر إكسسوارات..."
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right"
                       required>
            </div>
            
            <!-- Search Type -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">نوع البحث</label>
                    <select id="type" name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأنواع</option>
                        <option value="courses" {{ request('type') == 'courses' ? 'selected' : '' }}>كورسات تعليمية</option>
                        <option value="students" {{ request('type') == 'students' ? 'selected' : '' }}>طلاب</option>
                        <option value="shops" {{ request('type') == 'shops' ? 'selected' : '' }}>متاجر إكسسوارات</option>
                    </select>
                </div>
                
                <!-- Category Filter -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">الفئة</label>
                    <select id="category" name="category" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الفئات</option>
                        <option value="beauty" {{ request('category') == 'beauty' ? 'selected' : '' }}>تجميل</option>
                        <option value="fashion" {{ request('category') == 'fashion' ? 'selected' : '' }}>موضة</option>
                        <option value="design" {{ request('category') == 'design' ? 'selected' : '' }}>تصميم</option>
                        <option value="jewelry" {{ request('category') == 'jewelry' ? 'selected' : '' }}>مجوهرات</option>
                        <option value="accessories" {{ request('category') == 'accessories' ? 'selected' : '' }}>إكسسوارات</option>
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
                <!-- Price Filter -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">السعر</label>
                    <select id="price" name="price" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأسعار</option>
                        <option value="free" {{ request('price') == 'free' ? 'selected' : '' }}>مجاني</option>
                        <option value="low" {{ request('price') == 'low' ? 'selected' : '' }}>منخفض (أقل من 100 ريال)</option>
                        <option value="medium" {{ request('price') == 'medium' ? 'selected' : '' }}>متوسط (100-500 ريال)</option>
                        <option value="high" {{ request('price') == 'high' ? 'selected' : '' }}>عالي (أكثر من 500 ريال)</option>
                    </select>
                </div>
                
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
                    <button type="button" 
                            onclick="setQuickSearch('كورس تجميل', 'courses')"
                            class="px-3 py-1 bg-pink-100 text-pink-800 rounded-full text-sm hover:bg-pink-200 transition-colors duration-200">
                        💄 كورس تجميل
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('كورس موضة', 'courses')"
                            class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm hover:bg-purple-200 transition-colors duration-200">
                        👗 كورس موضة
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('متجر إكسسوارات', 'shops')"
                            class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm hover:bg-green-200 transition-colors duration-200">
                        💍 متجر إكسسوارات
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('كورس تصميم', 'courses')"
                            class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm hover:bg-blue-200 transition-colors duration-200">
                        🎨 كورس تصميم
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
