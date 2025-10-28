<x-filament::page>
    <div class="space-y-6">
        <!-- شريط البحث -->
        <div class="fi-card p-6 mb-6">
            <form method="GET" class="flex gap-4">
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="البحث في موردي الهدايا التذكارية..." 
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

        <!-- قسم موردي الهدايا -->
        <div class="fi-card mb-6">
            <div class="p-6 border-b flex justify-between items-center">
                <h2 class="text-xl font-bold">💎 موردو هدايا الزفاف التذكارية</h2>
                <button onclick="openAddModal()" class="fi-btn bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700">
                    ➕ إضافة مورد جديد
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-right text-sm font-bold text-gray-700 uppercase tracking-wider">الاسم</th>
                            <th class="px-6 py-4 text-right text-sm font-bold text-gray-700 uppercase tracking-wider">التخصص</th>
                            <th class="px-6 py-4 text-right text-sm font-bold text-gray-700 uppercase tracking-wider">الهاتف</th>
                            <th class="px-6 py-4 text-right text-sm font-bold text-gray-700 uppercase tracking-wider">العنوان</th>
                            <th class="px-6 py-4 text-right text-sm font-bold text-gray-700 uppercase tracking-wider">الحد الأدنى للطلب</th>
                            <th class="px-6 py-4 text-right text-sm font-bold text-gray-700 uppercase tracking-wider">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($giftSuppliers as $supplier)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900">💝 {{ $supplier->name }}</div>
                                    @if($supplier->whatsapp_number)
                                        <a href="https://wa.me/{{ $supplier->whatsapp_number }}" class="text-green-400 text-xs hover:text-green-300 font-semibold">📱 واتساب</a>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-medium">
                                    🎨 {{ $supplier->specialty }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    @if($supplier->phone_numbers)
                                        @foreach($supplier->phone_numbers as $phone)
                                            <div class="flex items-center">📞 {{ $phone }}</div>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700 max-w-xs truncate">📍 {{ $supplier->address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold">
                                    @if($supplier->min_order_price)
                                        <span class="text-green-600">💰 {{ number_format($supplier->min_order_price, 2) }} ج.م</span>
                                    @else
                                        <span class="text-gray-500">غير محدد</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex gap-2">
                                        <button onclick="openEditModal({{ $supplier->id }})" class="fi-btn bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 text-sm">✏️ تعديل</button>
                                        <button onclick="deleteSupplier({{ $supplier->id }})" class="fi-btn bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 text-sm">🗑️ حذف</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
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
        <div class="fi-card mb-6">
            <div class="p-6 border-b flex justify-between items-center">
                <h2 class="text-xl font-bold">🖼️ معارض المنتجات والأعمال</h2>
                <button onclick="openAddGalleryModal()" class="fi-btn bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700">
                    ➕ إضافة معرض جديد
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                @forelse($galleries as $gallery)
                    <div class="fi-card p-4 hover:shadow-lg transition-all duration-300">
                        @if($gallery->gallery_images && count($gallery->gallery_images) > 0)
                            <img src="{{ asset('storage/' . $gallery->gallery_images[0]) }}" 
                                 alt="{{ $gallery->gallery_name }}" 
                                 class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-48 flex items-center justify-center" class="bg-gray-100">
                                <div class="text-6xl">🎨</div>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-purple-600">🎭 {{ $gallery->gallery_name }}</h3>
                            <p class="text-purple-700 text-sm font-semibold">👨‍🎨 {{ $gallery->giftSupplier->name }}</p>
                            <p class="text-gray-700 text-sm mt-1">🏷️ {{ $gallery->product_type }}</p>
                            @if($gallery->price_range_min && $gallery->price_range_max)
                                <p class="text-green-600 font-bold mt-2 px-2 py-1 rounded-lg inline-block bg-green-50">
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
                                <button onclick="viewGallery({{ $gallery->id }})" class="fi-btn bg-purple-600 text-white px-3 py-1 rounded-lg hover:bg-purple-700 text-sm">👁️ عرض</button>
                                <button onclick="deleteGallery({{ $gallery->id }})" class="fi-btn bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 text-sm">🗑️ حذف</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-6xl mb-4">📷</div>
                        <div class="text-gray-500 text-lg">لا توجد معارض بعد</div>
                        <p class="text-gray-400 text-sm mt-2">قم بإضافة معرض لعرض أعمالك المميزة</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- قسم الأفكار -->
        <div class="fi-card mb-6">
            <div class="p-6 border-b flex justify-between items-center">
                <h2 class="text-xl font-bold">💡 أفكار الهدايا الإبداعية</h2>
                <button onclick="openAddIdeaModal()" class="fi-btn bg-amber-600 text-white px-6 py-2 rounded-lg hover:bg-amber-700">
                    ➕ إضافة فكرة جديدة
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                @forelse($ideas as $idea)
                    <div class="fi-card p-4 hover:shadow-lg transition-all duration-300">
                        @if($idea->idea_images && count($idea->idea_images) > 0)
                            <img src="{{ asset('storage/' . $idea->idea_images[0]) }}" 
                                 alt="{{ $idea->idea_title }}" 
                                 class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-48 flex items-center justify-center" class="bg-gray-100">
                                <div class="text-6xl">💡</div>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-amber-600">✨ {{ $idea->idea_title }}</h3>
                            <p class="text-amber-700 text-sm font-semibold">👨‍🎨 {{ $idea->giftSupplier->name }}</p>
                            <p class="text-gray-700 text-sm mt-1">🎉 {{ $idea->occasion_type }}</p>
                            @if($idea->estimated_price)
                                <p class="text-green-600 font-bold mt-2 px-2 py-1 rounded-lg inline-block bg-green-50">💰 {{ number_format($idea->estimated_price, 2) }} ج.م</p>
                            @endif
                            @if($idea->preparation_days)
                                <p class="text-blue-400 text-sm mt-1">⏱️ {{ $idea->preparation_days }} يوم تحضير</p>
                            @endif
                            @if($idea->is_trending)
                                <span class="inline-block bg-red-600 text-red-200 text-xs px-2 py-1 rounded-full mt-2 animate-pulse">🔥 ترند</span>
                            @endif
                            <div class="flex gap-2 mt-4">
                                <button onclick="viewIdea({{ $idea->id }})" class="fi-btn bg-amber-600 text-white px-3 py-1 rounded-lg hover:bg-amber-700 text-sm">👁️ عرض</button>
                                <button onclick="deleteIdea({{ $idea->id }})" class="fi-btn bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 text-sm">🗑️ حذف</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-6xl mb-4">💭</div>
                        <div class="text-gray-500 text-lg">لا توجد أفكار بعد</div>
                        <p class="text-gray-400 text-sm mt-2">شاركنا أفكارك الإبداعية للهدايا التذكارية</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- مودال إضافة مورد جديد -->
    <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-10 mx-auto p-4 w-11/12 md:w-2/3 lg:w-3/5 xl:w-1/2 max-w-4xl shadow-2xl rounded-xl fi-card max-h-[90vh]">
            <div class="overflow-y-auto max-h-full">
                <div class="p-3 border-b mb-4">
                    <h3 class="text-lg font-bold">💎 إضافة مورد هدايا جديد</h3>
                </div>
                <form action="{{ route('wedding-gift-suppliers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 px-2">
                        <div>
                            <label class="block text-sm font-bold mb-1">الاسم *</label>
                            <input type="text" name="name" required class="fi-input w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">التخصص</label>
                            <input type="text" name="specialty" class="fi-input w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">البريد الإلكتروني</label>
                            <input type="email" name="email" class="fi-input w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">رقم الواتساب</label>
                            <input type="text" name="whatsapp_number" class="fi-input w-full">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">العنوان</label>
                            <textarea name="address" rows="2" class="fi-input w-full"></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">الوصف</label>
                            <textarea name="description" rows="2" class="fi-input w-full"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">الحد الأدنى لسعر الطلب</label>
                            <input type="number" name="min_order_price" step="0.01" min="0" class="fi-input w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">أيام التحضير</label>
                            <input type="number" name="delivery_days" min="1" class="fi-input w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">موقع الويب</label>
                            <input type="url" name="website_url" class="fi-input w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">رابط الإنستجرام</label>
                            <input type="url" name="instagram_url" class="fi-input w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">رابط الفيسبوك</label>
                            <input type="url" name="facebook_url" class="fi-input w-full">
                        </div>
                        <div>
                            <div class="flex items-center mt-2">
                                <input type="checkbox" name="custom_orders" value="1" class="fi-checkbox" >
                                <label class="mr-2 block text-sm font-semibold">يقبل الطلبات المخصصة</label>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">أرقام الهواتف</label>
                            <div id="phoneNumbers">
                                <input type="text" name="phone_numbers[]" class="fi-input w-full">
                            </div>
                            <button type="button" onclick="addPhoneField()" class="mt-1 text-pink-600 text-sm font-semibold hover:text-pink-700">➕ إضافة رقم آخر</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">التخصصات الحرفية</label>
                            <div id="craftSpecialties">
                                <input type="text" name="craft_specialties[]" placeholder="مثل: نقش على الخشب" class="fi-input w-full">
                            </div>
                            <button type="button" onclick="addCraftField()" class="mt-1 text-rose-400 text-sm font-semibold hover:text-rose-300">➕ إضافة تخصص آخر</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">فئات المنتجات</label>
                            <div id="productCategories">
                                <input type="text" name="product_categories[]" placeholder="مثل: هدايا خشبية" class="fi-input w-full">
                            </div>
                            <button type="button" onclick="addCategoryField()" class="mt-1 text-rose-400 text-sm font-semibold hover:text-rose-300">➕ إضافة فئة أخرى</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">صور المعرض</label>
                            <input type="file" name="portfolio_images[]" multiple accept="image/*" class="fi-input w-full" >
                            <p class="text-xs text-pink-600 mt-1">يمكن اختيار عدة صور</p>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-4 px-2">
                        <button type="button" onclick="closeAddModal()" class="fi-btn bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 text-sm">
                            إلغاء
                        </button>
                        <button type="submit" class="fi-btn bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 text-sm">
                            💾 حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- مودال إضافة معرض جديد -->
    <div id="addGalleryModal" class="fixed inset-0 bg-black bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 w-11/12 md:w-3/4 lg:w-1/2 shadow-2xl rounded-xl fi-card">
            <div class="mt-3">
                <div class="p-4 border-b mb-4">
                    <h3 class="text-lg font-bold">🖼️ إضافة معرض منتجات جديد</h3>
                </div>
                <form action="{{ route('wedding-gift-suppliers.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">المورد *</label>
                            <select name="wedding_gift_supplier_id" required class="fi-input w-full">
                                <option value="">اختر المورد</option>
                                @foreach($giftSuppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">اسم المعرض *</label>
                            <input type="text" name="gallery_name" required class="fi-input w-full" >
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">نوع المنتج</label>
                            <input type="text" name="product_type" class="fi-input w-full" >
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">أقل سعر</label>
                            <input type="number" name="price_range_min" step="0.01" min="0" class="fi-input w-full" >
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">أعلى سعر</label>
                            <input type="number" name="price_range_max" step="0.01" min="0" class="fi-input w-full" >
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">وصف المعرض</label>
                            <textarea name="gallery_description" rows="3" class="fi-input w-full" ></textarea>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <input type="checkbox" name="is_handmade" value="1" class="fi-checkbox" >
                                <label class="mr-2 block text-sm font-semibold">✋ صناعة يدوية</label>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <input type="checkbox" name="is_customizable" value="1" class="fi-checkbox" >
                                <label class="mr-2 block text-sm font-semibold">🎨 قابل للتخصيص</label>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">الألوان المتاحة</label>
                            <div id="availableColors">
                                <input type="text" name="available_colors[]" placeholder="أحمر" class="fi-input w-full" >
                            </div>
                            <button type="button" onclick="addColorField()" class="mt-2 text-purple-400 text-sm font-semibold hover:text-purple-300">🎨 إضافة لون آخر</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">الأحجام المتاحة</label>
                            <div id="availableSizes">
                                <input type="text" name="available_sizes[]" placeholder="صغير" class="fi-input w-full" >
                            </div>
                            <button type="button" onclick="addSizeField()" class="mt-2 text-purple-400 text-sm font-semibold hover:text-purple-300">📏 إضافة حجم آخر</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">صور المعرض *</label>
                            <input type="file" name="gallery_images[]" multiple accept="image/*" required class="fi-input w-full" >
                            <p class="text-xs text-purple-600 mt-1">يجب اختيار صورة واحدة على الأقل</p>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" onclick="closeAddGalleryModal()" class="fi-btn bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                            إلغاء
                        </button>
                        <button type="submit" class="fi-btn bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700">
                            💾 حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- مودال إضافة فكرة جديدة -->
    <div id="addIdeaModal" class="fixed inset-0 bg-black bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 w-11/12 md:w-3/4 lg:w-1/2 shadow-2xl rounded-xl fi-card">
            <div class="mt-3">
                <div class="p-4 border-b mb-4">
                    <h3 class="text-lg font-bold">💡 إضافة فكرة هدية إبداعية</h3>
                </div>
                <form action="{{ route('wedding-gift-suppliers.idea.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">المورد *</label>
                            <select name="wedding_gift_supplier_id" required class="fi-input w-full">
                                <option value="">اختر المورد</option>
                                @foreach($giftSuppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">عنوان الفكرة *</label>
                            <input type="text" name="idea_title" required class="fi-input w-full" >
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">نوع المناسبة</label>
                            <input type="text" name="occasion_type" placeholder="زفاف، خطوبة، إلخ" class="fi-input w-full" >
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">السعر المتوقع</label>
                            <input type="number" name="estimated_price" step="0.01" min="0" class="fi-input w-full" >
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1">أيام التحضير</label>
                            <input type="number" name="preparation_days" min="1" class="fi-input w-full" >
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">وصف الفكرة *</label>
                            <textarea name="idea_description" rows="4" required class="fi-input w-full" ></textarea>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <input type="checkbox" name="is_trending" value="1" class="fi-checkbox" >
                                <label class="mr-2 block text-sm font-semibold">🔥 فكرة رائجة</label>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">المواد المستخدمة</label>
                            <div id="materialsUsed">
                                <input type="text" name="materials_used[]" placeholder="خشب طبيعي" class="fi-input w-full" >
                            </div>
                            <button type="button" onclick="addMaterialField()" class="mt-2 text-amber-400 text-sm font-semibold hover:text-amber-300">🧱 إضافة مادة أخرى</button>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-1">صور الفكرة</label>
                            <input type="file" name="idea_images[]" multiple accept="image/*" class="fi-input w-full" >
                            <p class="text-xs text-amber-600 mt-1">يمكن اختيار عدة صور</p>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" onclick="closeAddIdeaModal()" class="fi-btn bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                            إلغاء
                        </button>
                        <button type="submit" class="fi-btn bg-amber-600 text-white px-6 py-2 rounded-lg hover:bg-amber-700">
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
            input.className = 'fi-input w-full mt-2';
            container.appendChild(input);
        }

        function addCraftField() {
            const container = document.getElementById('craftSpecialties');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'craft_specialties[]';
            input.className = 'fi-input w-full mt-2';
            input.placeholder = 'مثل: نقش على المعدن';
            container.appendChild(input);
        }

        function addCategoryField() {
            const container = document.getElementById('productCategories');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'product_categories[]';
            input.className = 'fi-input w-full mt-2';
            input.placeholder = 'مثل: هدايا معدنية';
            container.appendChild(input);
        }

        function addColorField() {
            const container = document.getElementById('availableColors');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'available_colors[]';
            input.className = 'fi-input w-full mt-2';
            input.placeholder = 'أزرق';
            container.appendChild(input);
        }

        function addSizeField() {
            const container = document.getElementById('availableSizes');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'available_sizes[]';
            input.className = 'fi-input w-full mt-2';
            input.placeholder = 'متوسط';
            container.appendChild(input);
        }

        function addMaterialField() {
            const container = document.getElementById('materialsUsed');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'materials_used[]';
            input.className = 'fi-input w-full mt-2';
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
        
    </style>
</x-filament::page>
