<div class="min-h-screen bg-gradient-to-br from-pink-50 to-purple-50 p-6" dir="rtl">
    <!-- Header -->
    <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-lg p-6 mb-8">
        <h1 class="text-3xl font-bold">مكاتب السياحة</h1>
        <p class="mt-2 text-pink-100">قائمة بأفضل مكاتب السياحة مع العناوين وأرقام الهواتف وروابط الصفحات</p>
    </div>

    <!-- Success/Error Messages -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Add New Office Button -->
    <div class="mb-6">
        <button onclick="document.getElementById('addOfficeModal').style.display='block';return false;"
                class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            إضافة مكتب جديد
        </button>
    </div>

    <!-- Modal -->
    <div id="addOfficeModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); z-index:9999;">
        <div style="background: linear-gradient(135deg, #ec6da9 0%, #a259c3 100%); max-width:400px; margin:10vh auto; padding:2rem; border-radius:12px; position:relative; box-shadow:0 4px 24px #ec6da955; color:#fff;">
            <h2 style="color:#fff; margin-bottom:1rem;">إضافة أو تعديل مكتب</h2>
            @livewire('tourism-office-form')
            <span onclick="document.getElementById('addOfficeModal').style.display='none';" style="position:absolute;top:10px;right:16px;cursor:pointer;font-size:22px;color:#fff;">&times;</span>
        </div>
    </div>

    <!-- Offices Grid -->
    @livewire('tourism-office-list')
</div>
