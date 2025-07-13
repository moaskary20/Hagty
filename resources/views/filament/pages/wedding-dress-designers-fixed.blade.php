<x-filament-panels::page>
<div class="wedding-dress-designers-main space-y-6 min-h-screen p-4" style="background-color: #1a1a1a;">
    <!-- إعلانات الفيديو برعاية -->
    @if(isset($videoAds) && $videoAds->count() > 0)
        <div class="rounded-xl shadow-lg border border-yellow-400" style="background-color: #2a2a2a;">
            <div class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white p-4 rounded-t-xl">
                <h2 class="text-xl font-bold">📺 إعلانات فيديو برعاية</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($videoAds as $ad)
                        <div class="rounded-xl overflow-hidden hover:scale-105 transition-transform duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a); border: 2px solid #fbbf24;">
                            @if($ad->thumbnail_image)
                                <img src="{{ asset('storage/' . $ad->thumbnail_image) }}" alt="{{ $ad->title }}" class="w-full h-40 object-cover">
                            @endif
                            <div class="p-4">
                                <div class="flex items-center gap-2 mb-2">
                                    @if($ad->sponsor_logo)
                                        <img src="{{ asset('storage/' . $ad->sponsor_logo) }}" alt="الراعي" class="w-8 h-8 rounded-full">
                                    @endif
                                    <span class="text-yellow-400 font-semibold text-sm">{{ $ad->sponsor_name ?? 'راعي مميز' }}</span>
                                </div>
                                <h3 class="text-white font-bold text-lg mb-2">{{ $ad->title }}</h3>
                                <p class="text-gray-300 text-sm mb-3">{{ Str::limit($ad->description, 100) }}</p>
                                <div class="flex gap-2">
                                    @if($ad->video_url || $ad->video_file)
                                        <button class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-lg text-sm font-semibold hover:from-red-600 hover:to-red-700 transition-all duration-300">
                                            ▶️ مشاهدة
                                        </button>
                                    @endif
                                    @if($ad->sponsor_website)
                                        <a href="{{ $ad->sponsor_website }}" target="_blank" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-1 rounded-lg text-sm font-semibold hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                                            🌐 الموقع
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-6">
                    <button class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-6 py-2 rounded-lg hover:from-yellow-600 hover:to-orange-600 shadow-md transition-all duration-300">
                        🎬 عرض المزيد من الإعلانات
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- لافتات التصاميم والعروض -->
    @if(isset($banners) && $banners->count() > 0)
        <div class="rounded-xl shadow-lg border border-pink-400" style="background-color: #2a2a2a;">
            <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white p-4 rounded-t-xl">
                <h2 class="text-xl font-bold">🎨 لافتات التصاميم والعروض</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($banners as $banner)
                        <div class="rounded-xl overflow-hidden hover:scale-105 transition-transform duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a); border: 2px solid #ec4899;">
                            <img src="{{ asset('storage/' . $banner->image_url) }}" 
                                 alt="{{ $banner->title }}" 
                                 class="w-full h-32 object-cover">
                            <div class="p-3">
                                <h4 class="text-white font-bold text-sm mb-1">{{ $banner->title }}</h4>
                                <p class="text-gray-400 text-xs mb-2">{{ Str::limit($banner->description, 50) }}</p>
                                <div class="flex justify-between items-center">
                                    @if($banner->link_url)
                                        <a href="{{ $banner->link_url }}" target="_blank" class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-2 py-1 rounded text-xs font-semibold hover:from-pink-600 hover:to-purple-700 transition-all duration-300">
                                            👗 زيارة
                                        </a>
                                    @endif
                                    <span class="text-pink-400 text-xs">{{ $banner->designer->name ?? 'مصمم مميز' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-6">
                    <button class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-6 py-2 rounded-lg hover:from-pink-600 hover:to-purple-700 shadow-md transition-all duration-300">
                        🎨 عرض المزيد من اللافتات
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- شريط البحث -->
    <div class="rounded-xl shadow-lg border border-rose-400 p-6" style="background-color: #2a2a2a;">
        <form method="GET" class="flex gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="البحث في مصممي فساتين الزفاف..." 
                       class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-300 focus:border-rose-500 focus:ring-rose-500 shadow-sm" 
                       style="background-color: #1a1a1a;">
            </div>
            <button type="submit" class="bg-gradient-to-r from-rose-500 to-pink-600 text-white px-6 py-2 rounded-lg hover:from-rose-600 hover:to-pink-700 shadow-md transition-all duration-300">
                🔍 بحث
            </button>
            @if(request('search'))
                <a href="{{ url()->current() }}" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white px-4 py-2 rounded-lg hover:from-gray-700 hover:to-gray-800 shadow-md transition-all duration-300">
                    إعادة تعيين
                </a>
            @endif
        </form>
    </div>

    <!-- قسم المصممين -->
    <div class="rounded-xl shadow-lg border border-indigo-400" style="background-color: #2a2a2a;">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-6 rounded-t-xl flex justify-between items-center">
            <h2 class="text-xl font-bold">👗 ورش ومصممو فساتين الزفاف</h2>
            <button onclick="openAddModal()" class="text-indigo-400 px-6 py-2 rounded-lg hover:bg-gray-700 border border-indigo-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                ➕ إضافة مصمم جديد
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @forelse($designers as $designer)
                <div class="border-2 border-indigo-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                    @if($designer->portfolio_images && count($designer->portfolio_images) > 0)
                        <img src="{{ asset('storage/' . $designer->portfolio_images[0]) }}" 
                             alt="{{ $designer->name }}" 
                             class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-48 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                            <div class="text-6xl">👗</div>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            @if($designer->is_featured)
                                <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-2 py-1 rounded-full text-xs font-bold">⭐ مميز</span>
                            @endif
                            @if($designer->is_verified)
                                <span class="bg-gradient-to-r from-green-400 to-green-500 text-white px-2 py-1 rounded-full text-xs font-bold">✅ موثق</span>
                            @endif
                        </div>
                        
                        <h3 class="text-white font-bold text-xl mb-2">{{ $designer->name }}</h3>
                        <p class="text-gray-300 text-sm mb-2">{{ $designer->specialty ?? 'تصميم فساتين زفاف' }}</p>
                        
                        @if($designer->rating)
                            <div class="flex items-center gap-2 mb-3">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($designer->rating))
                                            ⭐
                                        @elseif($i - 0.5 <= $designer->rating)
                                            ⭐
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-gray-400 text-sm">({{ $designer->rating }}/5)</span>
                            </div>
                        @endif

                        @if($designer->price_range)
                            <div class="bg-gradient-to-r from-green-600 to-green-700 text-white px-3 py-1 rounded-full text-sm font-semibold mb-3 inline-block">
                                💰 {{ $designer->price_range }}
                            </div>
                        @endif

                        <p class="text-gray-400 text-sm mb-4">{{ Str::limit($designer->description, 120) }}</p>

                        @if($designer->phone_numbers && count($designer->phone_numbers) > 0)
                            <div class="mb-3">
                                <p class="text-indigo-400 font-semibold text-sm mb-1">📞 أرقام التواصل:</p>
                                @foreach($designer->phone_numbers as $phone)
                                    <a href="tel:{{ $phone }}" class="text-green-400 hover:text-green-300 text-sm block">{{ $phone }}</a>
                                @endforeach
                            </div>
                        @endif

                        @if($designer->location)
                            <div class="mb-3">
                                <p class="text-indigo-400 font-semibold text-sm">📍 الموقع:</p>
                                <p class="text-gray-300 text-sm">{{ $designer->location }}</p>
                            </div>
                        @endif

                        @if($designer->available_sizes && count($designer->available_sizes) > 0)
                            <div class="mb-4">
                                <p class="text-indigo-400 font-semibold text-sm mb-2">📏 المقاسات المتوفرة:</p>
                                <div class="flex flex-wrap gap-1">
                                    @foreach($designer->available_sizes as $size)
                                        <span class="bg-gradient-to-r from-purple-600 to-purple-700 text-white px-2 py-1 rounded text-xs">{{ $size }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="flex gap-2 mt-4">
                            @if($designer->website_url)
                                <a href="{{ $designer->website_url }}" target="_blank" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                                    🌐 الموقع
                                </a>
                            @endif
                            
                            @if($designer->social_media && count($designer->social_media) > 0)
                                @foreach($designer->social_media as $platform => $link)
                                    <a href="{{ $link }}" target="_blank" class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-purple-600 hover:to-purple-700 transition-all duration-300">
                                        📱 {{ ucfirst($platform) }}
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-6xl mb-4">👗</div>
                    <h3 class="text-xl font-bold text-gray-400 mb-2">لا توجد ورش أو مصممين حالياً</h3>
                    <p class="text-gray-500">سيتم إضافة المصممين قريباً...</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- مودال إضافة مصمم جديد -->
    <div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" onclick="closeOnBackdrop(event, ['addModal'])">
        <div class="bg-gray-800 rounded-xl p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto mx-4" onclick="event.stopPropagation();" style="background-color: #2a2a2a;">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">➕ إضافة مصمم جديد</h3>
                <button onclick="closeAddModal()" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>
            
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-indigo-400 text-sm font-semibold mb-2">اسم المصمم</label>
                        <input type="text" name="name" class="w-full rounded-lg border-2 border-indigo-400 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="اسم المصمم...">
                    </div>
                    <div>
                        <label class="block text-indigo-400 text-sm font-semibold mb-2">التخصص</label>
                        <input type="text" name="specialty" class="w-full rounded-lg border-2 border-indigo-400 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="التخصص...">
                    </div>
                </div>

                <div>
                    <label class="block text-indigo-400 text-sm font-semibold mb-2">الوصف</label>
                    <textarea name="description" rows="3" class="w-full rounded-lg border-2 border-indigo-400 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="وصف المصمم وخدماته..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-indigo-400 text-sm font-semibold mb-2">الموقع</label>
                        <input type="text" name="location" class="w-full rounded-lg border-2 border-indigo-400 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="الموقع...">
                    </div>
                    <div>
                        <label class="block text-indigo-400 text-sm font-semibold mb-2">نطاق الأسعار</label>
                        <select name="price_range" class="w-full rounded-lg border-2 border-indigo-400 text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="">اختر نطاق السعر...</option>
                            <option value="أقل من 1000 ريال">أقل من 1000 ريال</option>
                            <option value="1000 - 3000 ريال">1000 - 3000 ريال</option>
                            <option value="3000 - 5000 ريال">3000 - 5000 ريال</option>
                            <option value="أكثر من 5000 ريال">أكثر من 5000 ريال</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-indigo-400 text-sm font-semibold mb-2">أرقام الهاتف</label>
                    <div id="phoneNumbers">
                        <input type="text" name="phone_numbers[]" class="w-full rounded-lg border-2 border-indigo-400 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="رقم الهاتف...">
                    </div>
                    <button type="button" onclick="addPhoneField()" class="mt-2 text-indigo-400 hover:text-indigo-300 text-sm">+ إضافة رقم آخر</button>
                </div>

                <div>
                    <label class="block text-indigo-400 text-sm font-semibold mb-2">المقاسات المتوفرة</label>
                    <div id="availableSizes">
                        <input type="text" name="available_sizes[]" class="w-full rounded-lg border-2 border-indigo-400 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="مقاس...">
                    </div>
                    <button type="button" onclick="addSizeField()" class="mt-2 text-indigo-400 hover:text-indigo-300 text-sm">+ إضافة مقاس آخر</button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-indigo-400 text-sm font-semibold mb-2">موقع الويب</label>
                        <input type="url" name="website_url" class="w-full rounded-lg border-2 border-indigo-400 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="https://...">
                    </div>
                    <div>
                        <label class="block text-indigo-400 text-sm font-semibold mb-2">رابط الإنستجرام</label>
                        <input type="url" name="instagram_url" class="w-full rounded-lg border-2 border-indigo-400 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="https://instagram.com/...">
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-2 px-4 rounded-lg hover:from-indigo-600 hover:to-purple-700 font-semibold transition-all duration-300">
                        ✅ إضافة المصمم
                    </button>
                    <button type="button" onclick="closeAddModal()" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white py-2 px-4 rounded-lg hover:from-gray-700 hover:to-gray-800 font-semibold transition-all duration-300">
                        ❌ إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // دوال المودالات
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        // دوال إضافة الحقول الديناميكية
        function addPhoneField() {
            const container = document.getElementById('phoneNumbers');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'phone_numbers[]';
            input.className = 'w-full rounded-lg border-2 border-indigo-400 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm text-sm py-2 px-3 mt-2';
            input.style.backgroundColor = '#1a1a1a';
            container.appendChild(input);
        }

        function addSizeField() {
            const container = document.getElementById('availableSizes');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'available_sizes[]';
            input.className = 'w-full rounded-lg border-2 border-indigo-400 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm text-sm py-2 px-3 mt-2';
            input.style.backgroundColor = '#1a1a1a';
            input.placeholder = 'مقاس آخر...';
            container.appendChild(input);
        }

        // دالة إغلاق المودال عند النقر على الخلفية
        function closeOnBackdrop(event, modals) {
            modals.forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        }
    </script>
    
    <style>
        /* أنماط الحاوي الرئيسي */
        .wedding-dress-designers-main {
            background-color: #1a1a1a;
            color: #f9fafb;
            min-height: 100vh;
        }
        
        /* أنماط إضافية للتحسينات البصرية - الثيم الداكن مع #1a1a1a */
        body {
            background-color: #1a1a1a;
            color: #f9fafb;
        }
    
        /* تحسين أنماط المودالات */
        .modal-backdrop {
            backdrop-filter: blur(8px);
        }
        
        /* تحسين أنماط النماذج */
        input, textarea, select {
            transition: all 0.3s ease;
        }
        
        input:focus, textarea:focus, select:focus {
            transform: scale(1.02);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
        }
        
        /* تحسين أنماط الأزرار */
        button {
            transition: all 0.3s ease;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        
        /* تحسين الحواف المضيئة */
        .glow-border {
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.4);
        }
        
        /* تأثير الإضاءة الخلفية */
        .bg-glow {
            background: radial-gradient(circle at center, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
        }

        /* تحسينات إضافية للثيم الداكن */
        .dark-input {
            background-color: #1a1a1a !important;
            border-color: #374151;
            color: #f9fafb;
        }

        .dark-input:focus {
            border-color: #6366f1;
            background-color: #1a1a1a !important;
        }

        .dark-select option {
            background-color: #1a1a1a;
            color: #f9fafb;
        }

        .dark-card {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border: 1px solid #333333;
        }
    </style>
</div>
</x-filament-panels::page>
