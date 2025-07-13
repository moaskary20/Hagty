<x-filament-panels::page>
    <div class="space-y-6 min-h-screen p-4" style="background-color: #1a1a1a;">
        <!-- شريط البحث -->
        <div class="rounded-xl shadow-lg border border-pink-400 p-6" style="background-color: #2a2a2a;">
            <form method="GET" class="flex gap-4">
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="البحث في موردي الهدايا التذكارية..." 
                           class="w-full rounded-lg border-2 border-pink-400 text-white placeholder-gray-300 focus:border-pink-500 focus:ring-pink-500 shadow-sm" 
                           style="background-color: #1a1a1a;">
                </div>
                <button type="submit" class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-6 py-2 rounded-lg hover:from-pink-600 hover:to-purple-700 shadow-md transition-all duration-300">
                    🔍 بحث
                </button>
                @if(request('search'))
                    <a href="{{ url()->current() }}" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white px-4 py-2 rounded-lg hover:from-gray-700 hover:to-gray-800 shadow-md transition-all duration-300">
                        إعادة تعيين
                    </a>
                @endif
            </form>
        </div>

        <!-- قسم موردي الهدايا -->
        <div class="rounded-xl shadow-lg border border-rose-400" style="background-color: #2a2a2a;">
            <div class="bg-gradient-to-r from-rose-500 to-pink-600 text-white p-6 rounded-t-xl flex justify-between items-center">
                <h2 class="text-xl font-bold">💎 موردو هدايا الزفاف التذكارية</h2>
                <button onclick="openAddModal()" class="text-rose-400 px-6 py-2 rounded-lg hover:bg-gray-700 border border-rose-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                    ➕ إضافة مورد جديد
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-rose-600">
                    <thead style="background-color: #333333;">
                        <tr>
                            <th class="px-6 py-4 text-right text-sm font-bold text-rose-300 uppercase tracking-wider">الاسم</th>
                            <th class="px-6 py-4 text-right text-sm font-bold text-rose-300 uppercase tracking-wider">التخصص</th>
                            <th class="px-6 py-4 text-right text-sm font-bold text-rose-300 uppercase tracking-wider">الهاتف</th>
                            <th class="px-6 py-4 text-right text-sm font-bold text-rose-300 uppercase tracking-wider">العنوان</th>
                            <th class="px-6 py-4 text-right text-sm font-bold text-rose-300 uppercase tracking-wider">الحد الأدنى للطلب</th>
                            <th class="px-6 py-4 text-right text-sm font-bold text-rose-300 uppercase tracking-wider">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-600" style="background-color: #2a2a2a;">
                        @forelse($giftSuppliers as $supplier)
                            <tr class="hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-white">💝 {{ $supplier->name }}</div>
                                    @if($supplier->whatsapp_number)
                                        <a href="https://wa.me/{{ $supplier->whatsapp_number }}" class="text-green-400 text-xs hover:text-green-300 font-semibold">📱 واتساب</a>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 font-medium">
                                    🎨 {{ $supplier->specialty }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    @if($supplier->phone_numbers)
                                        @foreach($supplier->phone_numbers as $phone)
                                            <div class="flex items-center">📞 {{ $phone }}</div>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-300 max-w-xs truncate">📍 {{ $supplier->address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold">
                                    @if($supplier->min_order_price)
                                        <span class="text-green-400">💰 {{ number_format($supplier->min_order_price, 2) }} ج.م</span>
                                    @else
                                        <span class="text-gray-500">غير محدد</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex gap-2">
                                        <button onclick="openEditModal({{ $supplier->id }})" class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-500 transition-colors">✏️ تعديل</button>
                                        <button onclick="deleteSupplier({{ $supplier->id }})" class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-500 transition-colors">🗑️ حذف</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <div class="text-4xl mb-2">💔</div>
                                        <div>لا توجد بيانات موردين</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- قسم معارض المنتجات -->
        <div class="rounded-xl shadow-lg border border-purple-400" style="background-color: #2a2a2a;">
            <div class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white p-6 rounded-t-xl flex justify-between items-center">
                <h2 class="text-xl font-bold">🖼️ معارض المنتجات والأعمال</h2>
                <button onclick="openAddGalleryModal()" class="text-purple-400 px-6 py-2 rounded-lg hover:bg-gray-700 border border-purple-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                    ➕ إضافة معرض جديد
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                @forelse($galleries as $gallery)
                    <div class="border-2 border-purple-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                        @if($gallery->gallery_images && count($gallery->gallery_images) > 0)
                            <img src="{{ asset('storage/' . $gallery->gallery_images[0]) }}" 
                                 alt="{{ $gallery->gallery_name }}" 
                                 class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-48 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                                <div class="text-6xl">🎨</div>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-purple-300">🎭 {{ $gallery->gallery_name }}</h3>
                            <p class="text-purple-400 text-sm font-semibold">👨‍🎨 {{ $gallery->giftSupplier->name }}</p>
                            <p class="text-gray-300 text-sm mt-1">🏷️ {{ $gallery->product_type }}</p>
                            @if($gallery->price_range_min && $gallery->price_range_max)
                                <p class="text-green-400 font-bold mt-2 px-2 py-1 rounded-lg inline-block" style="background-color: #333333;">
                                    💰 {{ number_format($gallery->price_range_min, 2) }} - {{ number_format($gallery->price_range_max, 2) }} ج.م
                                </p>
                            @endif
                            @if($gallery->is_handmade)
                                <span class="inline-block bg-yellow-600 text-yellow-200 text-xs px-2 py-1 rounded-full mt-2">✋ صنع يدوي</span>
                            @endif
                            @if($gallery->is_customizable)
                                <span class="inline-block bg-blue-600 text-blue-200 text-xs px-2 py-1 rounded-full mt-2">🎨 قابل للتخصيص</span>
                            @endif
                            <div class="flex gap-2 mt-4">
                                <button onclick="viewGallery({{ $gallery->id }})" class="bg-purple-600 text-white px-3 py-1 rounded-lg hover:bg-purple-500 text-sm transition-colors">👁️ عرض</button>
                                <button onclick="deleteGallery({{ $gallery->id }})" class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-500 text-sm transition-colors">🗑️ حذف</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-6xl mb-4">📷</div>
                        <div class="text-gray-400 text-lg">لا توجد معارض بعد</div>
                        <p class="text-gray-500 text-sm mt-2">قم بإضافة معرض لعرض أعمالك المميزة</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- قسم الأفكار -->
        <div class="rounded-xl shadow-lg border border-amber-400" style="background-color: #2a2a2a;">
            <div class="bg-gradient-to-r from-amber-500 to-orange-500 text-white p-6 rounded-t-xl flex justify-between items-center">
                <h2 class="text-xl font-bold">💡 أفكار الهدايا الإبداعية</h2>
                <button onclick="openAddIdeaModal()" class="text-amber-400 px-6 py-2 rounded-lg hover:bg-gray-700 border border-amber-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                    ➕ إضافة فكرة جديدة
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                @forelse($ideas as $idea)
                    <div class="border-2 border-amber-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                        @if($idea->idea_images && count($idea->idea_images) > 0)
                            <img src="{{ asset('storage/' . $idea->idea_images[0]) }}" 
                                 alt="{{ $idea->idea_title }}" 
                                 class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-48 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                                <div class="text-6xl">💡</div>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-amber-300">✨ {{ $idea->idea_title }}</h3>
                            <p class="text-amber-400 text-sm font-semibold">👨‍🎨 {{ $idea->giftSupplier->name }}</p>
                            <p class="text-gray-300 text-sm mt-1">🎉 {{ $idea->occasion_type }}</p>
                            @if($idea->estimated_price)
                                <p class="text-green-400 font-bold mt-2 px-2 py-1 rounded-lg inline-block" style="background-color: #333333;">💰 {{ number_format($idea->estimated_price, 2) }} ج.م</p>
                            @endif
                            @if($idea->preparation_days)
                                <p class="text-blue-400 text-sm mt-1">⏱️ {{ $idea->preparation_days }} يوم تحضير</p>
                            @endif
                            @if($idea->is_trending)
                                <span class="inline-block bg-red-600 text-red-200 text-xs px-2 py-1 rounded-full mt-2 animate-pulse">🔥 ترند</span>
                            @endif
                            <div class="flex gap-2 mt-4">
                                <button onclick="viewIdea({{ $idea->id }})" class="bg-amber-600 text-white px-3 py-1 rounded-lg hover:bg-amber-500 text-sm transition-colors">👁️ عرض</button>
                                <button onclick="deleteIdea({{ $idea->id }})" class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-500 text-sm transition-colors">🗑️ حذف</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-6xl mb-4">💭</div>
                        <div class="text-gray-400 text-lg">لا توجد أفكار بعد</div>
                        <p class="text-gray-500 text-sm mt-2">شاركنا أفكارك الإبداعية للهدايا التذكارية</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- مودال إضافة مورد جديد -->
    <div id="addModal" class="fixed inset-0 bg-black bg-opacity-70 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-10 mx-auto p-4 border-2 border-rose-400 w-11/12 md:w-2/3 lg:w-3/5 xl:w-1/2 max-w-4xl shadow-2xl rounded-xl" style="background-color: #2a2a2a; max-height: 90vh;">
            <div class="overflow-y-auto max-h-full">
                <div class="bg-gradient-to-r from-rose-500 to-pink-600 text-white p-3 rounded-t-lg -m-4 mb-4">
                    <h3 class="text-lg font-bold">💎 إضافة مورد هدايا جديد</h3>
                </div>
                <form action="{{ route('wedding-gift-suppliers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 px-2">
                        <div>
                            <label class="block text-sm font-bold text-rose-300 mb-1">الاسم *</label>
                            <input type="text" name="name" required class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-rose-300 mb-1">التخصص</label>
                            <input type="text" name="specialty" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-rose-300 mb-1">البريد الإلكتروني</label>
                            <input type="email" name="email" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-rose-300 mb-1">رقم الواتساب</label>
                            <input type="text" name="whatsapp_number" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-rose-300 mb-1">العنوان</label>
                            <textarea name="address" rows="2" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;"></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-rose-300 mb-1">الوصف</label>
                            <textarea name="description" rows="2" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-rose-300 mb-1">الحد الأدنى لسعر الطلب</label>
                            <input type="number" name="min_order_price" step="0.01" min="0" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-rose-300 mb-1">أيام التحضير</label>
                            <input type="number" name="delivery_days" min="1" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-rose-300 mb-1">موقع الويب</label>
                            <input type="url" name="website_url" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-rose-300 mb-1">رابط الإنستجرام</label>
                            <input type="url" name="instagram_url" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-rose-300 mb-1">رابط الفيسبوك</label>
                            <input type="url" name="facebook_url" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <div class="flex items-center mt-2">
                                <input type="checkbox" name="custom_orders" value="1" class="rounded border-2 border-rose-400 text-rose-600 shadow-sm" style="background-color: #1a1a1a;">
                                <label class="mr-2 block text-sm text-rose-300 font-semibold">يقبل الطلبات المخصصة</label>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-rose-300 mb-1">أرقام الهواتف</label>
                            <div id="phoneNumbers">
                                <input type="text" name="phone_numbers[]" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                            </div>
                            <button type="button" onclick="addPhoneField()" class="mt-1 text-rose-400 text-sm font-semibold hover:text-rose-300">➕ إضافة رقم آخر</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-rose-300 mb-1">التخصصات الحرفية</label>
                            <div id="craftSpecialties">
                                <input type="text" name="craft_specialties[]" placeholder="مثل: نقش على الخشب" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                            </div>
                            <button type="button" onclick="addCraftField()" class="mt-1 text-rose-400 text-sm font-semibold hover:text-rose-300">➕ إضافة تخصص آخر</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-rose-300 mb-1">فئات المنتجات</label>
                            <div id="productCategories">
                                <input type="text" name="product_categories[]" placeholder="مثل: هدايا خشبية" class="w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3" style="background-color: #1a1a1a;">
                            </div>
                            <button type="button" onclick="addCategoryField()" class="mt-1 text-rose-400 text-sm font-semibold hover:text-rose-300">➕ إضافة فئة أخرى</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-rose-300 mb-1">صور المعرض</label>
                            <input type="file" name="portfolio_images[]" multiple accept="image/*" class="w-full border-2 border-rose-400 rounded-lg text-white text-sm py-2 px-3" style="background-color: #1a1a1a;">
                            <p class="text-xs text-rose-400 mt-1">يمكن اختيار عدة صور</p>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-4 px-2">
                        <button type="button" onclick="closeAddModal()" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 shadow-md transition-all duration-300 text-sm">
                            إلغاء
                        </button>
                        <button type="submit" class="bg-gradient-to-r from-rose-500 to-pink-600 text-white px-4 py-2 rounded-lg hover:from-rose-600 hover:to-pink-700 shadow-md transition-all duration-300 text-sm">
                            💾 حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- مودال إضافة معرض جديد -->
    <div id="addGalleryModal" class="fixed inset-0 bg-black bg-opacity-70 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border-2 border-purple-400 w-11/12 md:w-3/4 lg:w-1/2 shadow-2xl rounded-xl" style="background-color: #2a2a2a;">
            <div class="mt-3">
                <div class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white p-4 rounded-t-lg -m-5 mb-4">
                    <h3 class="text-lg font-bold">🖼️ إضافة معرض منتجات جديد</h3>
                </div>
                <form action="{{ route('wedding-gift-suppliers.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-purple-300">المورد *</label>
                            <select name="wedding_gift_supplier_id" required class="mt-1 block w-full rounded-lg border-2 border-purple-400 text-white focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                                <option value="">اختر المورد</option>
                                @foreach($giftSuppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-purple-300">اسم المعرض *</label>
                            <input type="text" name="gallery_name" required class="mt-1 block w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-purple-300">نوع المنتج</label>
                            <input type="text" name="product_type" class="mt-1 block w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-purple-300">أقل سعر</label>
                            <input type="number" name="price_range_min" step="0.01" min="0" class="mt-1 block w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-purple-300">أعلى سعر</label>
                            <input type="number" name="price_range_max" step="0.01" min="0" class="mt-1 block w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-purple-300">وصف المعرض</label>
                            <textarea name="gallery_description" rows="3" class="mt-1 block w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;"></textarea>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <input type="checkbox" name="is_handmade" value="1" class="rounded border-2 border-purple-400 text-purple-600 shadow-sm" style="background-color: #1a1a1a;">
                                <label class="mr-2 block text-sm text-purple-300 font-semibold">✋ صناعة يدوية</label>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <input type="checkbox" name="is_customizable" value="1" class="rounded border-2 border-purple-400 text-purple-600 shadow-sm" style="background-color: #1a1a1a;">
                                <label class="mr-2 block text-sm text-purple-300 font-semibold">🎨 قابل للتخصيص</label>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-purple-300">الألوان المتاحة</label>
                            <div id="availableColors">
                                <input type="text" name="available_colors[]" placeholder="أحمر" class="mt-1 block w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                            </div>
                            <button type="button" onclick="addColorField()" class="mt-2 text-purple-400 text-sm font-semibold hover:text-purple-300">🎨 إضافة لون آخر</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-purple-300">الأحجام المتاحة</label>
                            <div id="availableSizes">
                                <input type="text" name="available_sizes[]" placeholder="صغير" class="mt-1 block w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                            </div>
                            <button type="button" onclick="addSizeField()" class="mt-2 text-purple-400 text-sm font-semibold hover:text-purple-300">📏 إضافة حجم آخر</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-purple-300">صور المعرض *</label>
                            <input type="file" name="gallery_images[]" multiple accept="image/*" required class="mt-1 block w-full border-2 border-purple-400 rounded-lg text-white" style="background-color: #1a1a1a;">
                            <p class="text-xs text-purple-400 mt-1">يجب اختيار صورة واحدة على الأقل</p>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" onclick="closeAddGalleryModal()" class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-500 shadow-md transition-all duration-300">
                            إلغاء
                        </button>
                        <button type="submit" class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-6 py-2 rounded-lg hover:from-purple-600 hover:to-indigo-700 shadow-md transition-all duration-300">
                            💾 حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- مودال إضافة فكرة جديدة -->
    <div id="addIdeaModal" class="fixed inset-0 bg-black bg-opacity-70 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border-2 border-amber-400 w-11/12 md:w-3/4 lg:w-1/2 shadow-2xl rounded-xl" style="background-color: #2a2a2a;">
            <div class="mt-3">
                <div class="bg-gradient-to-r from-amber-500 to-orange-500 text-white p-4 rounded-t-lg -m-5 mb-4">
                    <h3 class="text-lg font-bold">💡 إضافة فكرة هدية إبداعية</h3>
                </div>
                <form action="{{ route('wedding-gift-suppliers.idea.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-amber-300">المورد *</label>
                            <select name="wedding_gift_supplier_id" required class="mt-1 block w-full rounded-lg border-2 border-amber-400 text-white focus:border-amber-500 focus:ring-amber-500 shadow-sm" style="background-color: #1a1a1a;">
                                <option value="">اختر المورد</option>
                                @foreach($giftSuppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-amber-300">عنوان الفكرة *</label>
                            <input type="text" name="idea_title" required class="mt-1 block w-full rounded-lg border-2 border-amber-400 text-white placeholder-gray-400 focus:border-amber-500 focus:ring-amber-500 shadow-sm" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-amber-300">نوع المناسبة</label>
                            <input type="text" name="occasion_type" placeholder="زفاف، خطوبة، إلخ" class="mt-1 block w-full rounded-lg border-2 border-amber-400 text-white placeholder-gray-400 focus:border-amber-500 focus:ring-amber-500 shadow-sm" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-amber-300">السعر المتوقع</label>
                            <input type="number" name="estimated_price" step="0.01" min="0" class="mt-1 block w-full rounded-lg border-2 border-amber-400 text-white placeholder-gray-400 focus:border-amber-500 focus:ring-amber-500 shadow-sm" style="background-color: #1a1a1a;">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-amber-300">أيام التحضير</label>
                            <input type="number" name="preparation_days" min="1" class="mt-1 block w-full rounded-lg border-2 border-amber-400 text-white placeholder-gray-400 focus:border-amber-500 focus:ring-amber-500 shadow-sm" style="background-color: #1a1a1a;">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-amber-300">وصف الفكرة *</label>
                            <textarea name="idea_description" rows="4" required class="mt-1 block w-full rounded-lg border-2 border-amber-400 text-white placeholder-gray-400 focus:border-amber-500 focus:ring-amber-500 shadow-sm" style="background-color: #1a1a1a;"></textarea>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <input type="checkbox" name="is_trending" value="1" class="rounded border-2 border-amber-400 text-amber-600 shadow-sm" style="background-color: #1a1a1a;">
                                <label class="mr-2 block text-sm text-amber-300 font-semibold">🔥 فكرة رائجة</label>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-amber-300">المواد المستخدمة</label>
                            <div id="materialsUsed">
                                <input type="text" name="materials_used[]" placeholder="خشب طبيعي" class="mt-1 block w-full rounded-lg border-2 border-amber-400 text-white placeholder-gray-400 focus:border-amber-500 focus:ring-amber-500 shadow-sm" style="background-color: #1a1a1a;">
                            </div>
                            <button type="button" onclick="addMaterialField()" class="mt-2 text-amber-400 text-sm font-semibold hover:text-amber-300">🧱 إضافة مادة أخرى</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-amber-300">صور الفكرة</label>
                            <input type="file" name="idea_images[]" multiple accept="image/*" class="mt-1 block w-full border-2 border-amber-400 rounded-lg text-white" style="background-color: #1a1a1a;">
                            <p class="text-xs text-amber-400 mt-1">يمكن اختيار عدة صور</p>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" onclick="closeAddIdeaModal()" class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-500 shadow-md transition-all duration-300">
                            إلغاء
                        </button>
                        <button type="submit" class="bg-gradient-to-r from-amber-500 to-orange-500 text-white px-6 py-2 rounded-lg hover:from-amber-600 hover:to-orange-600 shadow-md transition-all duration-300">
                            💾 حفظ
                        </button>
                    </div>
                </form>
            </div>
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

        function openAddGalleryModal() {
            document.getElementById('addGalleryModal').classList.remove('hidden');
        }

        function closeAddGalleryModal() {
            document.getElementById('addGalleryModal').classList.add('hidden');
        }

        function openAddIdeaModal() {
            document.getElementById('addIdeaModal').classList.remove('hidden');
        }

        function closeAddIdeaModal() {
            document.getElementById('addIdeaModal').classList.add('hidden');
        }

        // دوال إضافة الحقول الديناميكية
        function addPhoneField() {
            const container = document.getElementById('phoneNumbers');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'phone_numbers[]';
            input.className = 'w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3 mt-2';
            input.style.backgroundColor = '#1a1a1a';
            container.appendChild(input);
        }

        function addCraftField() {
            const container = document.getElementById('craftSpecialties');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'craft_specialties[]';
            input.className = 'w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3 mt-2';
            input.style.backgroundColor = '#1a1a1a';
            input.placeholder = 'مثل: نقش على المعدن';
            container.appendChild(input);
        }

        function addCategoryField() {
            const container = document.getElementById('productCategories');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'product_categories[]';
            input.className = 'w-full rounded-lg border-2 border-rose-400 text-white placeholder-gray-400 focus:border-rose-500 focus:ring-rose-500 shadow-sm text-sm py-2 px-3 mt-2';
            input.style.backgroundColor = '#1a1a1a';
            input.placeholder = 'مثل: هدايا معدنية';
            container.appendChild(input);
        }

        function addColorField() {
            const container = document.getElementById('availableColors');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'available_colors[]';
            input.className = 'w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm text-sm py-2 px-3 mt-2';
            input.style.backgroundColor = '#1a1a1a';
            input.placeholder = 'أزرق';
            container.appendChild(input);
        }

        function addSizeField() {
            const container = document.getElementById('availableSizes');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'available_sizes[]';
            input.className = 'w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm text-sm py-2 px-3 mt-2';
            input.style.backgroundColor = '#1a1a1a';
            input.placeholder = 'متوسط';
            container.appendChild(input);
        }

        function addMaterialField() {
            const container = document.getElementById('materialsUsed');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'materials_used[]';
            input.className = 'w-full rounded-lg border-2 border-amber-400 text-white placeholder-gray-400 focus:border-amber-500 focus:ring-amber-500 shadow-sm text-sm py-2 px-3 mt-2';
            input.style.backgroundColor = '#1a1a1a';
            input.placeholder = 'قماش طبيعي';
            container.appendChild(input);
        }

        // دوال الحذف مع تأكيدات محسنة
        function deleteSupplier(id) {
            if (confirm('⚠️ هل أنت متأكد من حذف هذا المورد؟\n\nسيتم حذف جميع معارضه وأفكاره أيضاً!')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/wedding-gift-suppliers/${id}`;
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        function deleteGallery(id) {
            if (confirm('🖼️ هل أنت متأكد من حذف هذا المعرض؟\n\nسيتم حذف جميع الصور المرتبطة به!')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/wedding-gift-suppliers/gallery/${id}`;
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        function deleteIdea(id) {
            if (confirm('💡 هل أنت متأكد من حذف هذه الفكرة الإبداعية؟')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/wedding-gift-suppliers/idea/${id}`;
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        // دوال عرض التفاصيل
        function viewGallery(id) {
            // يمكن إضافة مودال لعرض تفاصيل المعرض
            alert('🖼️ سيتم إضافة عرض تفاصيل المعرض قريباً');
        }

        function viewIdea(id) {
            // يمكن إضافة مودال لعرض تفاصيل الفكرة
            alert('💡 سيتم إضافة عرض تفاصيل الفكرة قريباً');
        }

        function openEditModal(id) {
            // يمكن إضافة مودال للتعديل
            alert('✏️ سيتم إضافة نموذج التعديل قريباً');
        }

        // إغلاق المودالات عند النقر خارجها
        window.onclick = function(event) {
            const modals = ['addModal', 'addGalleryModal', 'addIdeaModal'];
            modals.forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        }

        // تأثيرات بصرية محسنة
        document.addEventListener('DOMContentLoaded', function() {
            // إضافة تأثير للأزرار
            const buttons = document.querySelectorAll('button');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // تأثير للبطاقات
            const cards = document.querySelectorAll('.border-2');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.02)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            });
        });
    </script>

    <style>
        /* أنماط إضافية للتحسينات البصرية - الثيم الداكن مع #1a1a1a */
        body {
            background-color: #1a1a1a;
            color: #f9fafb;
        }
        
        .hover\:bg-gray-750:hover {
            background-color: #333333;
        }
        
        .transition-all {
            transition: all 0.3s ease;
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: .5;
            }
        }
        
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        /* تحسين الخطوط العربية */
        input, textarea, select {
            font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* تحسين شكل الإدخالات للثيم الداكن */
        input:focus, textarea:focus, select:focus {
            box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.3);
            border-color: #f43f5e;
            outline: none;
        }
        
        /* تحسين الجداول للثيم الداكن */
        table {
            border-collapse: separate;
            border-spacing: 0;
        }
        
        /* تحسين البطاقات للثيم الداكن */
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.4), 0 10px 10px -5px rgba(0, 0, 0, 0.3);
        }
        
        /* تحسين الأزرار للثيم الداكن */
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }
        
        /* تحسين المودالات */
        .modal-backdrop {
            backdrop-filter: blur(4px);
        }
        
        /* تحسين شريط التمرير للثيم الداكن مع #1a1a1a */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #444444;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #555555;
        }
        
        /* تأثيرات إضافية للبطاقات */
        .card-gradient {
            background: linear-gradient(145deg, #2a2a2a, #333333);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.4), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
        }
        
        /* تحسين النصوص للثيم الداكن */
        .text-shadow {
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
        }
        
        /* تأثيرات الانتقال المحسنة */
        .smooth-transition {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* تحسين الحواف المضيئة */
        .glow-border {
            box-shadow: 0 0 15px rgba(244, 63, 94, 0.4);
        }
        
        /* تأثير الإضاءة الخلفية */
        .bg-glow {
            background: radial-gradient(circle at center, rgba(244, 63, 94, 0.15) 0%, transparent 70%);
        }

        /* تحسينات إضافية للثيم الداكن */
        .dark-input {
            background-color: #1a1a1a !important;
            border-color: #374151;
            color: #f9fafb;
        }

        .dark-input:focus {
            border-color: #f43f5e;
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
</x-filament-panels::page>
