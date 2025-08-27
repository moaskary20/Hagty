<!-- Search Bar Component -->
<form action="{{ route('search') }}" method="GET" class="flex items-center">
    <input type="text" name="q" placeholder="ابحث في الموقع..." 
           class="px-4 py-2 rounded-r-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-300 w-64 text-sm">
    <button type="submit" class="bg-white text-primary-text px-4 py-2 rounded-l-lg hover:bg-gray-100 transition duration-300 text-sm">
        <i class="fas fa-search"></i>
    </button>
</form>
