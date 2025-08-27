<!-- Umomi Search Form -->
<div class="max-w-4xl mx-auto mb-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">🔍 البحث في قسم أومومتي</h3>
            <p class="text-gray-600">ابحثي عن أطباء نساء، رعاية أسبوعية، وتحضيرات الولادة</p>
        </div>
        
        <form action="{{ route('search') }}" method="GET" class="space-y-4">
            <input type="hidden" name="section" value="umomi">
            
            <!-- Search Query -->
            <div>
                <label for="q" class="block text-sm font-medium text-gray-700 mb-2">كلمة البحث</label>
                <input type="text" 
                       id="q" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="ابحثي عن: طبيب نساء، رعاية أسبوعية، تحضيرات ولادة..."
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right"
                       required>
            </div>
            
            <!-- Search Type -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">نوع البحث</label>
                    <select id="type" name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأنواع</option>
                        <option value="maternity_doctors" {{ request('type') == 'maternity_doctors' ? 'selected' : '' }}>أطباء نساء</option>
                        <option value="weekly_baby_cares" {{ request('type') == 'weekly_baby_cares' ? 'selected' : '' }}>رعاية أسبوعية</option>
                        <option value="delivery_preparations" {{ request('type') == 'delivery_preparations' ? 'selected' : '' }}>تحضيرات الولادة</option>
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
                
                <!-- Specialty Filter -->
                <div>
                    <label for="specialty" class="block text-sm font-medium text-gray-700 mb-2">التخصص</label>
                    <select id="specialty" name="specialty" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع التخصصات</option>
                        <option value="obstetrics" {{ request('specialty') == 'obstetrics' ? 'selected' : '' }}>أمراض النساء والولادة</option>
                        <option value="gynecology" {{ request('specialty') == 'gynecology' ? 'selected' : '' }}>أمراض النساء</option>
                        <option value="fertility" {{ request('specialty') == 'fertility' ? 'selected' : '' }}>العقم والخصوبة</option>
                        <option value="prenatal" {{ request('specialty') == 'prenatal' ? 'selected' : '' }}>رعاية ما قبل الولادة</option>
                    </select>
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
                
                <!-- Week Number Filter (for weekly care) -->
                <div>
                    <label for="week_number" class="block text-sm font-medium text-gray-700 mb-2">رقم الأسبوع</label>
                    <select id="week_number" name="week_number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأسابيع</option>
                        <option value="1-12" {{ request('week_number') == '1-12' ? 'selected' : '' }}>الثلث الأول (1-12 أسبوع)</option>
                        <option value="13-28" {{ request('week_number') == '13-28' ? 'selected' : '' }}>الثلث الثاني (13-28 أسبوع)</option>
                        <option value="29-40" {{ request('week_number') == '29-40' ? 'selected' : '' }}>الثلث الثالث (29-40 أسبوع)</option>
                    </select>
                </div>
            </div>
            
            <!-- Search Button -->
            <div class="text-center pt-4">
                <button type="submit" 
                        class="bg-gradient-to-r from-d94288 to-purple-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-c13a7a hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-d94288 focus:ring-offset-2 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <i class="fas fa-search ml-2"></i>
                    البحث
                </button>
            </div>
            
            <!-- Quick Search Tags -->
            <div class="pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-600 mb-3 text-center">بحث سريع:</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <button type="button" 
                            onclick="setQuickSearch('طبيب نساء', 'maternity_doctors')"
                            class="px-3 py-1 bg-pink-100 text-pink-800 rounded-full text-sm hover:bg-pink-200 transition-colors duration-200">
                        👩‍⚕️ طبيب نساء
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('رعاية أسبوعية', 'weekly_baby_cares')"
                            class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm hover:bg-blue-200 transition-colors duration-200">
                        📅 رعاية أسبوعية
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('تحضيرات الولادة', 'delivery_preparations')"
                            class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm hover:bg-green-200 transition-colors duration-200">
                        🎒 تحضيرات الولادة
                    </button>
                    <button type="button" 
                            onclick="setQuickSearch('متابعة الحمل', 'maternity_doctors')"
                            class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm hover:bg-purple-200 transition-colors duration-200">
                        🤰 متابعة الحمل
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
