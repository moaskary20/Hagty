<!-- Hadiety Search Form -->
<div class="max-w-4xl mx-auto mb-8 mt-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">🔍 البحث في قسم هديتي</h3>
            <p class="text-gray-600">ابحثي عن الهدايا والمتاجر وأفكار الهدايا</p>
        </div>
        
        <form action="{{ route('search') }}" method="GET" class="space-y-4">
            <input type="hidden" name="section" value="hadiety">
            
            <!-- Search Query -->
            <div>
                <label for="q" class="block text-sm font-medium text-gray-700 mb-2">كلمة البحث</label>
                <input type="text" 
                       id="q" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="ابحثي عن: هدية، متجر هدايا، أفكار..."
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right"
                       required>
            </div>
            
            <!-- Search Type -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">نوع الهدية</label>
                    <select id="type" name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الأنواع</option>
                        <option value="shops" {{ request('type') == 'shops' ? 'selected' : '' }}>متاجر هدايا</option>
                        <option value="ideas" {{ request('type') == 'ideas' ? 'selected' : '' }}>أفكار هدايا</option>
                        <option value="occasions" {{ request('type') == 'occasions' ? 'selected' : '' }}>مناسبات</option>
                    </select>
                </div>
                
                <div>
                    <label for="occasion" class="block text-sm font-medium text-gray-700 mb-2">المناسبة</label>
                    <select id="occasion" name="occasion" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع المناسبات</option>
                        <option value="birthday" {{ request('occasion') == 'birthday' ? 'selected' : '' }}>عيد ميلاد</option>
                        <option value="wedding" {{ request('occasion') == 'wedding' ? 'selected' : '' }}>زفاف</option>
                        <option value="graduation" {{ request('occasion') == 'graduation' ? 'selected' : '' }}>تخرج</option>
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

