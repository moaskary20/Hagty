<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <div class="text-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-2">🔍 البحث في قسم الجمال</h3>
        <p class="text-gray-600">ابحث عن جراحي التجميل، مصففي الشعر، محلات التجميل، ونصائح الجمال</p>
    </div>
    
    <form action="{{ route('search.beauty') }}" method="GET" class="space-y-4">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input 
                    type="text" 
                    name="q" 
                    placeholder="ابحث عن جراح تجميل، مصفف شعر، محل تجميل، نصيحة جمال..."
                    value="{{ request('q') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-transparent text-right"
                    required
                >
            </div>
            <div class="md:w-auto">
                <button type="submit" class="w-full md:w-auto bg-d94288 text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300 font-semibold">
                    🔍 بحث
                </button>
            </div>
        </div>
        
        <div class="text-sm text-gray-500 text-center">
            <p>يمكنك البحث بـ:</p>
            <div class="flex flex-wrap justify-center gap-4 mt-2">
                <span class="bg-gray-100 px-3 py-1 rounded-full">جراح تجميل</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full">مصفف شعر</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full">محل تجميل</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full">نصيحة جمال</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full">طبيب بشرة</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full">متخصص أظافر</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full">طبيب تغذية</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full">عيادة سبا</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full">فيديو تدريبي</span>
            </div>
        </div>
    </form>
</div>
