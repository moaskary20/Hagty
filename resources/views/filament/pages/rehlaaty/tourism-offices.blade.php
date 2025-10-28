<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">مكاتب السياحة</h3>
        <p class="text-sm text-gray-600 mb-4">قائمة بأفضل مكاتب السياحة مع العناوين وأرقام الهواتف وروابط الصفحات</p>

        <!-- Success/Error Messages -->
        @if (session()->has('message'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Add New Office Button -->
        <div class="mb-6">
            <button onclick="document.getElementById('addOfficeModal').style.display='block';return false;"
                    class="fi-btn bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700">
                + إضافة مكتب جديد
            </button>
        </div>

        <!-- Modal -->
        <div id="addOfficeModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.5); z-index:9999;">
            <div class="fi-card" style="max-width:500px; margin:10vh auto; padding:2rem; position:relative;">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">إضافة أو تعديل مكتب</h2>
                    <button onclick="document.getElementById('addOfficeModal').style.display='none';" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                </div>
                @livewire('tourism-office-form')
            </div>
        </div>

        <!-- Offices Grid -->
        @livewire('tourism-office-list')
    </div>
</x-filament::page>
