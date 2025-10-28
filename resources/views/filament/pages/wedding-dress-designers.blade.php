<x-filament::page>
<div class="space-y-6">
    <!-- إعلانات الفيديو برعاية -->
    @if(isset($videoAds) && $videoAds->count() > 0)
        <div class="fi-card mb-6">
            <div class="p-4 border-b">
                <h2 class="text-xl font-bold">📺 إعلانات فيديو برعاية</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($videoAds as $ad)
                        <div class="fi-card p-4 hover:shadow-lg transition-all duration-300 border border-yellow-300">
                            @if($ad->thumbnail_image)
                                <img src="{{ asset('storage/' . $ad->thumbnail_image) }}" alt="{{ $ad->title }}" class="w-full h-40 object-cover rounded-lg mb-2">
                            @endif
                            <div class="p-2">
                                <div class="flex items-center gap-2 mb-2">
                                    @if($ad->sponsor_logo)
                                        <img src="{{ asset('storage/' . $ad->sponsor_logo) }}" alt="الراعي" class="w-8 h-8 rounded-full">
                                    @endif
                                    <span class="text-yellow-600 font-semibold text-sm">{{ $ad->sponsor_name ?? 'راعي مميز' }}</span>
                                </div>
                                <h3 class="text-gray-900 font-bold text-lg mb-2">{{ $ad->title }}</h3>
                                <p class="text-gray-700 text-sm mb-3">{{ Str::limit($ad->description, 100) }}</p>
                                <div class="flex gap-2">
                                    @if($ad->video_url || $ad->video_file)
                                        <button class="fi-btn bg-red-500 to-red-600 text-white px-3 py-1 rounded-lg text-sm font-semibold hover:from-red-600 hover:to-red-700 transition-all duration-300">
                                            ▶️ مشاهدة
                                        </button>
                                    @endif
                                    @if($ad->sponsor_website)
                                        <a href="{{ $ad->sponsor_website }}" target="_blank" class="fi-btn bg-blue-500 to-blue-600 text-white px-3 py-1 rounded-lg text-sm font-semibold hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                                            🌐 الموقع
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-6">
                    <button class="fi-btn bg-yellow-500 to-orange-500 text-white px-6 py-2 rounded-lg hover:from-yellow-600 hover:to-orange-600 shadow-md transition-all duration-300">
                        🎬 عرض المزيد من الإعلانات
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- لافتات التصاميم والعروض -->
    @if(isset($banners) && $banners->count() > 0)
        <div class="fi-card mb-6">
            <div class="p-4 border-b">
                <h2 class="text-xl font-bold">🎨 لافتات التصاميم والعروض</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($banners as $banner)
                        <div class="fi-card p-3 hover:shadow-lg transition-all duration-300 border border-pink-300">
                            <img src="{{ asset('storage/' . $banner->image_url) }}" 
                                 alt="{{ $banner->title }}" 
                                 class="w-full h-32 object-cover rounded mb-2">
                            <div class="p-2">
                                <h4 class="text-gray-900 font-bold text-sm mb-1">{{ $banner->title }}</h4>
                                <p class="text-gray-600 text-xs mb-2">{{ Str::limit($banner->description, 50) }}</p>
                                <div class="flex justify-between items-center">
                                    @if($banner->link_url)
                                        <a href="{{ $banner->link_url }}" target="_blank" class="fi-btn bg-pink-600 text-white px-2 py-1 rounded text-xs hover:bg-pink-700">
                                            👗 زيارة
                                        </a>
                                    @endif
                                    <span class="text-pink-600 text-xs">{{ $banner->designer->name ?? 'مصمم مميز' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-6">
                    <button class="fi-btn bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700">
                        🎨 عرض المزيد من اللافتات
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- شريط البحث -->
    <div class="fi-card p-6 mb-6">
        <form method="GET" class="flex gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="البحث في مصممي فساتين الزفاف..." 
                       class="fi-input w-full">
            </div>
            <button type="submit" class="fi-btn bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700">
                🔍 بحث
            </button>
            @if(request('search'))
                <a href="{{ url()->current() }}" class="fi-btn bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                    إعادة تعيين
                </a>
            @endif
        </form>
    </div>

    <!-- قسم المصممين -->
    <div class="fi-card mb-6">
        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-xl font-bold">👗 ورش ومصممو فساتين الزفاف</h2>
            <button onclick="openAddModal()" class="fi-btn bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                ➕ إضافة مصمم جديد
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @forelse($designers as $designer)
                <div class="fi-card p-4 hover:shadow-lg transition-all duration-300">
                    @if($designer->portfolio_images && count($designer->portfolio_images) > 0)
                        <img src="{{ asset('storage/' . $designer->portfolio_images[0]) }}" 
                             alt="{{ $designer->name }}" 
                             class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-48 flex items-center justify-center bg-gray-100 rounded-lg">
                            <div class="text-6xl">👗</div>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            @if($designer->is_featured)
                                <span class="fi-btn bg-yellow-400 to-orange-500 text-white px-2 py-1 rounded-full text-xs font-bold">⭐ مميز</span>
                            @endif
                            @if($designer->is_verified)
                                <span class="fi-btn bg-green-400 to-green-500 text-white px-2 py-1 rounded-full text-xs font-bold">✅ موثق</span>
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
                            <div class="fi-btn bg-green-600 to-green-700 text-white px-3 py-1 rounded-full text-sm font-semibold mb-3 inline-block">
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
                                        <span class="fi-btn bg-purple-600 to-purple-700 text-white px-2 py-1 rounded text-xs">{{ $size }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="flex gap-2 mt-4">
                            @if($designer->website_url)
                                <a href="{{ $designer->website_url }}" target="_blank" class="fi-btn bg-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                                    🌐 الموقع
                                </a>
                            @endif
                            
                            @if($designer->social_media && count($designer->social_media) > 0)
                                @foreach($designer->social_media as $platform => $link)
                                    <a href="{{ $link }}" target="_blank" class="fi-btn bg-purple-500 to-purple-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-purple-600 hover:to-purple-700 transition-all duration-300">
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
        <div class="fi-card p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto mx-4" onclick="event.stopPropagation();">
            <div class="flex justify-between items-center mb-6 border-b pb-4">
                <h3 class="text-xl font-bold">➕ إضافة مصمم جديد</h3>
                <button onclick="closeAddModal()" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            </div>
            
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-2">اسم المصمم</label>
                        <input type="text" name="name" class="fi-input w-full"  placeholder="اسم المصمم...">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">التخصص</label>
                        <input type="text" name="specialty" class="fi-input w-full"  placeholder="التخصص...">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">الوصف</label>
                    <textarea name="description" rows="3" class="fi-input w-full"  placeholder="وصف المصمم وخدماته..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-2">الموقع</label>
                        <input type="text" name="location" class="fi-input w-full"  placeholder="الموقع...">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">نطاق الأسعار</label>
                        <select name="price_range" class="fi-input w-full">
                            <option value="">اختر نطاق السعر...</option>
                            <option value="أقل من 1000 ريال">أقل من 1000 ريال</option>
                            <option value="1000 - 3000 ريال">1000 - 3000 ريال</option>
                            <option value="3000 - 5000 ريال">3000 - 5000 ريال</option>
                            <option value="أكثر من 5000 ريال">أكثر من 5000 ريال</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">أرقام الهاتف</label>
                    <div id="phoneNumbers">
                        <input type="text" name="phone_numbers[]" class="fi-input w-full"  placeholder="رقم الهاتف...">
                    </div>
                    <button type="button" onclick="addPhoneField()" class="mt-2 text-indigo-600 hover:text-indigo-700 text-sm">+ إضافة رقم آخر</button>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">المقاسات المتوفرة</label>
                    <div id="availableSizes">
                        <input type="text" name="available_sizes[]" class="fi-input w-full"  placeholder="مقاس...">
                    </div>
                    <button type="button" onclick="addSizeField()" class="mt-2 text-indigo-600 hover:text-indigo-700 text-sm">+ إضافة مقاس آخر</button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-2">موقع الويب</label>
                        <input type="url" name="website_url" class="fi-input w-full"  placeholder="https://...">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">رابط الإنستجرام</label>
                        <input type="url" name="instagram_url" class="fi-input w-full"  placeholder="https://instagram.com/...">
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 fi-btn bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 font-semibold">
                        ✅ إضافة المصمم
                    </button>
                    <button type="button" onclick="closeAddModal()" class="fi-btn bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600 font-semibold">
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
            input.className = 'fi-input w-full mt-2';
            container.appendChild(input);
        }

        function addSizeField() {
            const container = document.getElementById('availableSizes');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'available_sizes[]';
            input.className = 'fi-input w-full mt-2';
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
</x-filament::page>
