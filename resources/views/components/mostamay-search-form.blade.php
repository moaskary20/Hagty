<!-- Mostamay Search Form -->
<div class="max-w-4xl mx-auto mb-8 mt-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">🔍 البحث في قسم مستماتي</h3>
            <p class="text-gray-600">ابحثي عن الأطباء، المستشفيات، والخدمات الصحية</p>
        </div>
        
        <form action="{{ route('search') }}" method="GET" class="space-y-4">
            <input type="hidden" name="section" value="mostamay">
            
            <!-- Search Query -->
            <div>
                <label for="q" class="block text-sm font-medium text-gray-700 mb-2">كلمة البحث</label>
                <input type="text" 
                       id="q" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="ابحثي عن: طبيب، مستشفى، عيادة..."
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right"
                       required>
            </div>
            
            <!-- Search Type -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">نوع الخدمة</label>
                    <select id="type" name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
                        <option value="">جميع الخدمات</option>
                        <option value="doctors" {{ request('type') == 'doctors' ? 'selected' : '' }}>أطباء</option>
                        <option value="hospitals" {{ request('type') == 'hospitals' ? 'selected' : '' }}>مستشفيات</option>
                        <option value="clinics" {{ request('type') == 'clinics' ? 'selected' : '' }}>عيادات</option>
                    </select>
                </div>
                
                <div>
                    <label for="specialty" class="block text-sm font-medium text-gray-700 mb-2">التخصص</label>
                    <input type="text" 
                           id="specialty" 
                           name="specialty" 
                           value="{{ request('specialty') }}"
                           placeholder="أدخلي التخصص..."
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-right">
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

