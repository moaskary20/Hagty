{{-- صفحة الفنادق والأماكن في قسم فرحي --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">الفنادق والأماكن</h3>
        
        <!-- أزرار الإضافة -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="showVenueForm()">
                + إضافة فندق/مكان
            </button>
            <button type="button" class="fi-btn bg-pink-600 text-lg px-6 py-2" onclick="showBannerForm()">
                + إضافة لافتة
            </button>
            <button type="button" class="fi-btn bg-pink-500 text-lg px-6 py-2" onclick="showVideoForm()">
                + إضافة إعلان فيديو
            </button>
            <button type="button" class="fi-btn bg-green-600 text-lg px-6 py-2" onclick="showMenuForm()">
                + إضافة قائمة طعام
            </button>
            <button type="button" class="fi-btn bg-blue-600 text-lg px-6 py-2" onclick="showPackageForm()">
                + إضافة باقة
            </button>
        </div>

        <!-- البحث -->
        <form method="GET" class="flex flex-wrap gap-2 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث بالاسم أو العنوان..." class="fi-input w-48">
            <button type="submit" class="fi-btn bg-pink-400">بحث</button>
        </form>

        <!-- عرض إعلانات الفيديو -->
        @if($videos->count() > 0)
        <div class="mb-6">
            <h4 class="text-base font-bold mb-2">إعلانات الفيديو برعاية</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($videos as $video)
                <div class="bg-gray-800 rounded-lg p-4">
                    <h5 class="font-bold mb-2">{{ $video->title }}</h5>
                    @if($video->is_sponsored)
                        <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs mb-2 inline-block">برعاية</span>
                    @endif
                    <div class="mb-2">
                        <a href="{{ $video->video_url }}" target="_blank" class="text-pink-400 underline">مشاهدة الفيديو</a>
                    </div>
                    @if($video->venue)
                        <p class="text-sm text-gray-400">{{ $video->venue->name }}</p>
                    @endif
                    <p class="text-xs text-gray-500">تخطي بعد {{ $video->skip_after_seconds }} ثانية</p>
                    <form method="POST" action="{{ route('wedding-venues.videos.destroy', $video->id) }}" style="display:inline;" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- عرض لافتات العروض -->
        @if($banners->count() > 0)
        <div class="mb-6">
            <h4 class="text-base font-bold mb-2">لافتات العروض والباقات</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($banners as $banner)
                <div class="bg-gray-800 rounded-lg p-2">
                    <img src="{{ asset('storage/' . $banner->banner_image) }}" alt="{{ $banner->title }}" class="w-full h-32 object-cover rounded mb-2">
                    <h5 class="font-bold text-sm">{{ $banner->title }}</h5>
                    @if($banner->venue)
                        <p class="text-xs text-gray-400">{{ $banner->venue->name }}</p>
                    @endif
                    @if($banner->offer_description)
                        <p class="text-xs text-gray-300 mb-1">{{ Str::limit($banner->offer_description, 50) }}</p>
                    @endif
                    @if($banner->valid_until)
                        <p class="text-xs text-yellow-400">صالح حتى: {{ $banner->valid_until->format('Y-m-d') }}</p>
                    @endif
                    <div class="flex gap-1 mt-2">
                        @if($banner->link_url)
                            <a href="{{ $banner->link_url }}" target="_blank" class="fi-btn bg-blue-600 text-xs py-1 px-2">رابط</a>
                        @endif
                        <form method="POST" action="{{ route('wedding-venues.banners.destroy', $banner->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- عرض قوائم الطعام -->
        @if($menus->count() > 0)
        <div class="mb-6">
            <h4 class="text-base font-bold mb-2">قوائم الطعام والمشروبات</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($menus as $menu)
                <div class="bg-gray-800 rounded-lg p-4">
                    @if($menu->menu_image)
                        <img src="{{ asset('storage/' . $menu->menu_image) }}" alt="{{ $menu->menu_name }}" class="w-full h-32 object-cover rounded mb-3">
                    @endif
                    <h5 class="font-bold text-lg mb-1">{{ $menu->menu_name }}</h5>
                    <span class="bg-green-600 text-white px-2 py-1 rounded text-xs mb-2 inline-block">{{ $menu->menu_type_arabic }}</span>
                    <p class="text-gray-300 text-sm mb-2">{{ $menu->venue->name }}</p>
                    @if($menu->description)
                        <p class="text-gray-400 text-sm mb-2">{{ Str::limit($menu->description, 80) }}</p>
                    @endif
                    <div class="mb-3">
                        <strong class="text-yellow-400">{{ number_format($menu->price_per_person) }} ريال/شخص</strong>
                    </div>
                    @if($menu->menu_items && count($menu->menu_items) > 0)
                        <div class="mb-3">
                            <p class="text-xs text-gray-300 mb-1">عناصر القائمة:</p>
                            <div class="text-xs text-gray-400">
                                @foreach(array_slice($menu->menu_items, 0, 3) as $item)
                                    <span class="bg-gray-700 px-2 py-1 rounded mr-1 mb-1 inline-block">{{ $item }}</span>
                                @endforeach
                                @if(count($menu->menu_items) > 3)
                                    <span class="text-yellow-400">+{{ count($menu->menu_items) - 3 }} المزيد</span>
                                @endif
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('wedding-venues.menus.destroy', $menu->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- عرض الباقات -->
        @if($packages->count() > 0)
        <div class="mb-6">
            <h4 class="text-base font-bold mb-2">الباقات والعروض</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($packages as $package)
                <div class="bg-gray-800 rounded-lg p-4 {{ $package->is_featured ? 'border-2 border-yellow-400' : '' }}">
                    @if($package->package_image)
                        <img src="{{ asset('storage/' . $package->package_image) }}" alt="{{ $package->package_name }}" class="w-full h-32 object-cover rounded mb-3">
                    @endif
                    @if($package->is_featured)
                        <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs mb-2 inline-block">⭐ باقة مميزة</span>
                    @endif
                    <h5 class="font-bold text-lg mb-1">{{ $package->package_name }}</h5>
                    <span class="bg-blue-600 text-white px-2 py-1 rounded text-xs mb-2 inline-block">{{ $package->package_type_arabic }}</span>
                    <p class="text-gray-300 text-sm mb-2">{{ $package->venue->name }}</p>
                    @if($package->description)
                        <p class="text-gray-400 text-sm mb-2">{{ Str::limit($package->description, 80) }}</p>
                    @endif
                    <div class="mb-2">
                        @if($package->discount_percentage > 0)
                            <div class="flex items-center gap-2">
                                <span class="text-gray-400 line-through text-sm">{{ number_format($package->price_per_person) }} ريال</span>
                                <span class="bg-red-600 text-white px-1 py-0.5 rounded text-xs">خصم {{ $package->discount_percentage }}%</span>
                            </div>
                            <strong class="text-green-400 text-lg">{{ number_format($package->final_price) }} ريال/شخص</strong>
                        @else
                            <strong class="text-yellow-400 text-lg">{{ number_format($package->price_per_person) }} ريال/شخص</strong>
                        @endif
                    </div>
                    <p class="text-xs text-gray-400 mb-2">من {{ $package->min_guests }} إلى {{ $package->max_guests }} ضيف</p>
                    @if($package->valid_until)
                        <p class="text-xs text-yellow-400 mb-2">صالح حتى: {{ $package->valid_until->format('Y-m-d') }}</p>
                    @endif
                    @if($package->included_services && count($package->included_services) > 0)
                        <div class="mb-3">
                            <p class="text-xs text-gray-300 mb-1">الخدمات المشمولة:</p>
                            <div class="text-xs text-gray-400">
                                @foreach(array_slice($package->included_services, 0, 2) as $service)
                                    <span class="bg-gray-700 px-2 py-1 rounded mr-1 mb-1 inline-block">{{ $service }}</span>
                                @endforeach
                                @if(count($package->included_services) > 2)
                                    <span class="text-yellow-400">+{{ count($package->included_services) - 2 }} المزيد</span>
                                @endif
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('wedding-venues.packages.destroy', $package->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- نماذج الإضافة -->
        
        <!-- نموذج تعديل فندق/مكان -->
        <div id="editVenueForm" style="display:none;">
            <form id="editForm" method="POST" action="" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                @method('PUT')
                <h4 class="text-lg font-bold mb-2 text-white">تعديل الفندق/المكان</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="text" id="edit_name" name="name" placeholder="اسم الفندق/المكان" class="fi-input" required>
                    <input type="text" id="edit_address" name="address" placeholder="عنوان الموقع" class="fi-input" required>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <select id="edit_stars" name="stars" class="fi-input">
                        <option value="">عدد النجوم</option>
                        <option value="1">نجمة واحدة</option>
                        <option value="2">نجمتان</option>
                        <option value="3">3 نجوم</option>
                        <option value="4">4 نجوم</option>
                        <option value="5">5 نجوم</option>
                    </select>
                    <input type="number" id="edit_price_range_min" name="price_range_min" placeholder="أقل سعر" class="fi-input" step="0.01">
                    <input type="number" id="edit_price_range_max" name="price_range_max" placeholder="أعلى سعر" class="fi-input" step="0.01">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="url" id="edit_google_maps_url" name="google_maps_url" placeholder="رابط خرائط جوجل" class="fi-input">
                    <input type="url" id="edit_website_url" name="website_url" placeholder="رابط الموقع الإلكتروني" class="fi-input">
                </div>

                <div id="editPhoneContainer">
                    <label class="text-white">أرقام الهواتف:</label>
                    <!-- سيتم ملء هذا الجزء بالجافا سكريبت -->
                </div>
                <button type="button" onclick="addEditPhoneInput()" class="fi-btn bg-green-600 px-3 w-32">+ إضافة رقم</button>

                <textarea id="edit_description" name="description" placeholder="وصف إضافي" class="fi-input" rows="3"></textarea>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <label class="text-white">إضافة صور قاعات جديدة:</label>
                        <input type="file" name="hall_images[]" multiple accept="image/*" class="fi-input">
                    </div>
                    <div>
                        <label class="text-white">إضافة صور خارجية جديدة:</label>
                        <input type="file" name="outdoor_images[]" multiple accept="image/*" class="fi-input">
                    </div>
                </div>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-blue-600 text-lg py-2 w-full">تحديث</button>
                    <button type="button" onclick="hideEditVenueForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة فندق/مكان -->
        <div id="venueForm" style="display:none;">
            <form method="POST" action="{{ route('wedding-venues.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة فندق/مكان جديد</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="text" name="name" placeholder="اسم الفندق/المكان" class="fi-input" required>
                    <input type="text" name="address" placeholder="عنوان الموقع" class="fi-input" required>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <select name="stars" class="fi-input">
                        <option value="">عدد النجوم</option>
                        <option value="1">نجمة واحدة</option>
                        <option value="2">نجمتان</option>
                        <option value="3">3 نجوم</option>
                        <option value="4">4 نجوم</option>
                        <option value="5">5 نجوم</option>
                    </select>
                    <input type="number" name="price_range_min" placeholder="أقل سعر" class="fi-input" step="0.01">
                    <input type="number" name="price_range_max" placeholder="أعلى سعر" class="fi-input" step="0.01">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="url" name="google_maps_url" placeholder="رابط خرائط جوجل" class="fi-input">
                    <input type="url" name="website_url" placeholder="رابط الموقع الإلكتروني" class="fi-input">
                </div>

                <div id="phone-inputs">
                    <label class="text-white">أرقام الهواتف:</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="phone_numbers[]" placeholder="رقم الهاتف" class="fi-input">
                        <button type="button" onclick="addPhoneInput()" class="fi-btn bg-green-600 px-3">+</button>
                    </div>
                </div>

                <textarea name="description" placeholder="وصف إضافي" class="fi-input" rows="3"></textarea>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <label class="text-white">صور قاعات الحفلات:</label>
                        <input type="file" name="hall_images[]" multiple accept="image/*" class="fi-input">
                    </div>
                    <div>
                        <label class="text-white">صور الأنشطة الخارجية:</label>
                        <input type="file" name="outdoor_images[]" multiple accept="image/*" class="fi-input">
                    </div>
                </div>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة</button>
                    <button type="button" onclick="hideVenueForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة لافتة -->
        <div id="bannerForm" style="display:none;">
            <form method="POST" action="{{ route('wedding-venues.banners.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة لافتة عرض</h4>
                
                <select name="wedding_venue_id" class="fi-input">
                    <option value="">اختياري: ربط بفندق/مكان معين</option>
                    @foreach($venues as $venue)
                        <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                    @endforeach
                </select>
                
                <input type="text" name="title" placeholder="عنوان اللافتة" class="fi-input" required>
                <input type="file" name="banner_image" accept="image/*" class="fi-input" required>
                <input type="url" name="link_url" placeholder="رابط عند الضغط (اختياري)" class="fi-input">
                <textarea name="offer_description" placeholder="وصف العرض" class="fi-input" rows="2"></textarea>
                <input type="date" name="valid_until" placeholder="صالح حتى تاريخ" class="fi-input">
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة اللافتة</button>
                    <button type="button" onclick="hideBannerForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة إعلان فيديو -->
        <div id="videoForm" style="display:none;">
            <form method="POST" action="{{ route('wedding-venues.videos.store') }}" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة إعلان فيديو برعاية</h4>
                
                <select name="wedding_venue_id" class="fi-input">
                    <option value="">اختياري: ربط بفندق/مكان معين</option>
                    @foreach($venues as $venue)
                        <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                    @endforeach
                </select>
                
                <input type="text" name="title" placeholder="عنوان الفيديو" class="fi-input" required>
                <input type="url" name="video_url" placeholder="رابط الفيديو" class="fi-input" required>
                <textarea name="description" placeholder="وصف الفيديو" class="fi-input" rows="2"></textarea>
                <input type="number" name="skip_after_seconds" placeholder="وقت التخطي بالثواني" class="fi-input" value="5" min="1" max="60">
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة الفيديو</button>
                    <button type="button" onclick="hideVideoForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة قائمة طعام -->
        <div id="menuForm" style="display:none;">
            <form method="POST" action="{{ route('wedding-venues.menus.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة قائمة طعام ومشروبات</h4>
                
                <select name="wedding_venue_id" class="fi-input" required>
                    <option value="">اختر الفندق/المكان</option>
                    @foreach($venues as $venue)
                        <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                    @endforeach
                </select>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="text" name="menu_name" placeholder="اسم القائمة" class="fi-input" required>
                    <select name="menu_type" class="fi-input" required>
                        <option value="">نوع القائمة</option>
                        <option value="appetizers">المقبلات</option>
                        <option value="main_courses">الأطباق الرئيسية</option>
                        <option value="desserts">الحلويات</option>
                        <option value="beverages">المشروبات</option>
                        <option value="custom">مخصص</option>
                    </select>
                </div>

                <textarea name="description" placeholder="وصف القائمة" class="fi-input" rows="2"></textarea>

                <div id="menu-items-container">
                    <label class="text-white">عناصر القائمة:</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="menu_items[]" placeholder="عنصر من القائمة" class="fi-input" required>
                        <button type="button" onclick="addMenuItem()" class="fi-btn bg-green-600 px-3">+</button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="number" name="price_per_person" placeholder="السعر للشخص الواحد" class="fi-input" step="0.01" required>
                    <input type="file" name="menu_image" accept="image/*" class="fi-input">
                </div>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-green-600 text-lg py-2 w-full">إضافة القائمة</button>
                    <button type="button" onclick="hideMenuForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة باقة -->
        <div id="packageForm" style="display:none;">
            <form method="POST" action="{{ route('wedding-venues.packages.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة باقة وعرض</h4>
                
                <select name="wedding_venue_id" class="fi-input" required>
                    <option value="">اختر الفندق/المكان</option>
                    @foreach($venues as $venue)
                        <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                    @endforeach
                </select>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="text" name="package_name" placeholder="اسم الباقة" class="fi-input" required>
                    <select name="package_type" class="fi-input" required>
                        <option value="">نوع الباقة</option>
                        <option value="bronze">برونزية</option>
                        <option value="silver">فضية</option>
                        <option value="gold">ذهبية</option>
                        <option value="platinum">بلاتينية</option>
                        <option value="custom">مخصصة</option>
                    </select>
                </div>

                <textarea name="description" placeholder="وصف الباقة" class="fi-input" rows="2"></textarea>

                <div id="services-container">
                    <label class="text-white">الخدمات المشمولة:</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="included_services[]" placeholder="خدمة مشمولة" class="fi-input" required>
                        <button type="button" onclick="addService()" class="fi-btn bg-green-600 px-3">+</button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
                    <input type="number" name="price_per_person" placeholder="السعر للشخص" class="fi-input" step="0.01" required>
                    <input type="number" name="discount_percentage" placeholder="نسبة الخصم %" class="fi-input" step="0.01" min="0" max="100">
                    <input type="number" name="min_guests" placeholder="أقل عدد ضيوف" class="fi-input" min="1" required>
                    <input type="number" name="max_guests" placeholder="أكبر عدد ضيوف" class="fi-input" min="1" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <input type="date" name="valid_from" placeholder="صالح من تاريخ" class="fi-input">
                    <input type="date" name="valid_until" placeholder="صالح حتى تاريخ" class="fi-input">
                    <input type="file" name="package_image" accept="image/*" class="fi-input">
                </div>

                <label class="flex items-center gap-2 text-white">
                    <input type="checkbox" name="is_featured" value="1" class="rounded">
                    باقة مميزة
                </label>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-blue-600 text-lg py-2 w-full">إضافة الباقة</button>
                    <button type="button" onclick="hidePackageForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- جدول الفنادق والأماكن -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">قائمة الفنادق والأماكن</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>العنوان</th>
                        <th>النجوم</th>
                        <th>أرقام الهواتف</th>
                        <th>صور القاعات</th>
                        <th>صور خارجية</th>
                        <th>النطاق السعري</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($venues as $venue)
                    <tr>
                        <td>
                            <div>
                                <strong>{{ $venue->name }}</strong>
                                @if($venue->website_url)
                                    <br><a href="{{ $venue->website_url }}" target="_blank" class="text-pink-400 text-xs underline">الموقع</a>
                                @endif
                            </div>
                        </td>
                        <td>
                            {{ $venue->address }}
                            @if($venue->google_maps_url)
                                <br><a href="{{ $venue->google_maps_url }}" target="_blank" class="text-pink-400 text-xs underline">خريطة</a>
                            @endif
                        </td>
                        <td>
                            @if($venue->stars)
                                @for($i = 1; $i <= $venue->stars; $i++)
                                    ⭐
                                @endfor
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($venue->phone_numbers)
                                @foreach($venue->phone_numbers as $phone)
                                    <div class="text-xs">{{ $phone }}</div>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($venue->hall_images && count($venue->hall_images) > 0)
                                <div class="flex flex-wrap gap-1 justify-center">
                                    @foreach(array_slice($venue->hall_images, 0, 3) as $index => $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="قاعة" class="w-12 h-12 object-cover rounded cursor-pointer" onclick="showImageModal('{{ asset('storage/' . $image) }}', 'قاعة حفلات - {{ $venue->name }}')">
                                    @endforeach
                                    @if(count($venue->hall_images) > 3)
                                        <span class="text-xs bg-gray-600 px-2 py-1 rounded">+{{ count($venue->hall_images) - 3 }}</span>
                                    @endif
                                </div>
                            @else
                                <span class="text-gray-400">لا توجد</span>
                            @endif
                        </td>
                        <td>
                            @if($venue->outdoor_images && count($venue->outdoor_images) > 0)
                                <div class="flex flex-wrap gap-1 justify-center">
                                    @foreach(array_slice($venue->outdoor_images, 0, 3) as $index => $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="خارجي" class="w-12 h-12 object-cover rounded cursor-pointer" onclick="showImageModal('{{ asset('storage/' . $image) }}', 'منطقة خارجية - {{ $venue->name }}')">
                                    @endforeach
                                    @if(count($venue->outdoor_images) > 3)
                                        <span class="text-xs bg-gray-600 px-2 py-1 rounded">+{{ count($venue->outdoor_images) - 3 }}</span>
                                    @endif
                                </div>
                            @else
                                <span class="text-gray-400">لا توجد</span>
                            @endif
                        </td>
                        <td>
                            @if($venue->price_range_min || $venue->price_range_max)
                                <div class="text-xs">
                                    @if($venue->price_range_min)من {{ number_format($venue->price_range_min) }}@endif
                                    @if($venue->price_range_max)إلى {{ number_format($venue->price_range_max) }}@endif
                                </div>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="flex flex-col gap-1">
                                <button type="button" onclick="editVenue({{ $venue->id }})" class="fi-btn bg-blue-600 text-xs py-1 px-2">تعديل</button>
                                <form method="POST" action="{{ route('wedding-venues.destroy', $venue->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-gray-400 py-8">لا توجد فنادق أو أماكن مسجلة</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(session('success'))
            <div class="mt-4 p-4 bg-green-600 text-white rounded">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- نافذة منبثقة لعرض الصور -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
        <div class="max-w-4xl max-h-full p-4">
            <div class="bg-gray-800 rounded-lg p-4">
                <div class="flex justify-between items-center mb-4">
                    <h5 id="modalTitle" class="text-white font-bold"></h5>
                    <button onclick="hideImageModal()" class="text-white text-2xl">&times;</button>
                </div>
                <img id="modalImage" src="" alt="" class="max-w-full max-h-96 object-contain rounded">
            </div>
        </div>
    </div>

    <script>
        function showVenueForm() {
            document.getElementById('venueForm').style.display = 'block';
        }
        function hideVenueForm() {
            document.getElementById('venueForm').style.display = 'none';
        }
        function showBannerForm() {
            document.getElementById('bannerForm').style.display = 'block';
        }
        function hideBannerForm() {
            document.getElementById('bannerForm').style.display = 'none';
        }
        function showVideoForm() {
            document.getElementById('videoForm').style.display = 'block';
        }
        function hideVideoForm() {
            document.getElementById('videoForm').style.display = 'none';
        }
        // دوال قوائم الطعام
        function showMenuForm() {
            hideAllForms();
            document.getElementById('menuForm').style.display = 'block';
        }
        function hideMenuForm() {
            document.getElementById('menuForm').style.display = 'none';
        }
        
        function addMenuItem() {
            const container = document.getElementById('menu-items-container');
            const div = document.createElement('div');
            div.className = 'flex gap-2 mb-2';
            div.innerHTML = '<input type="text" name="menu_items[]" placeholder="عنصر من القائمة" class="fi-input" required><button type="button" onclick="removeMenuItem(this)" class="fi-btn bg-red-600 px-3">-</button>';
            container.appendChild(div);
        }
        
        function removeMenuItem(button) {
            button.parentElement.remove();
        }

        // دوال الباقات
        function showPackageForm() {
            hideAllForms();
            document.getElementById('packageForm').style.display = 'block';
        }
        function hidePackageForm() {
            document.getElementById('packageForm').style.display = 'none';
        }
        
        function addService() {
            const container = document.getElementById('services-container');
            const div = document.createElement('div');
            div.className = 'flex gap-2 mb-2';
            div.innerHTML = '<input type="text" name="included_services[]" placeholder="خدمة مشمولة" class="fi-input" required><button type="button" onclick="removeService(this)" class="fi-btn bg-red-600 px-3">-</button>';
            container.appendChild(div);
        }
        
        function removeService(button) {
            button.parentElement.remove();
        }

        // دالة إخفاء جميع النماذج
        function hideAllForms() {
            hideVenueForm();
            hideBannerForm();
            hideVideoForm();
            hideMenuForm();
            hidePackageForm();
            hideEditVenueForm();
        }

        // دوال التعديل
        function showEditVenueForm() {
            document.getElementById('editVenueForm').style.display = 'block';
        }
        function hideEditVenueForm() {
            document.getElementById('editVenueForm').style.display = 'none';
        }
        
        function editVenue(venueId) {
            // إخفاء النماذج الأخرى
            hideVenueForm();
            hideBannerForm();
            hideVideoForm();
            hideMenuForm();
            hidePackageForm();
            
            // البحث عن بيانات الفندق
            const venues = @json($venues);
            const venue = venues.find(v => v.id === venueId);
            
            if (venue) {
                // ملء الحقول
                document.getElementById('edit_name').value = venue.name || '';
                document.getElementById('edit_address').value = venue.address || '';
                document.getElementById('edit_stars').value = venue.stars || '';
                document.getElementById('edit_price_range_min').value = venue.price_range_min || '';
                document.getElementById('edit_price_range_max').value = venue.price_range_max || '';
                document.getElementById('edit_google_maps_url').value = venue.google_maps_url || '';
                document.getElementById('edit_website_url').value = venue.website_url || '';
                document.getElementById('edit_description').value = venue.description || '';
                
                // تحديث action الفورم
                document.getElementById('editForm').action = `/wedding-venues/${venueId}`;
                
                // ملء أرقام الهواتف
                const phoneContainer = document.getElementById('editPhoneContainer');
                phoneContainer.innerHTML = '';
                if (venue.phone_numbers && venue.phone_numbers.length > 0) {
                    venue.phone_numbers.forEach(phone => {
                        addEditPhoneInput(phone);
                    });
                } else {
                    addEditPhoneInput();
                }
                
                showEditVenueForm();
            }
        }
        
        function addEditPhoneInput(value = '') {
            const container = document.getElementById('editPhoneContainer');
            const div = document.createElement('div');
            div.className = 'flex gap-2 mb-2';
            div.innerHTML = `<input type="text" name="phone_numbers[]" value="${value}" placeholder="رقم الهاتف" class="fi-input"><button type="button" onclick="removeEditPhoneInput(this)" class="fi-btn bg-red-600 px-3">-</button>`;
            container.appendChild(div);
        }
        
        function removeEditPhoneInput(button) {
            button.parentElement.remove();
        }
        
        // دوال عرض الصور
        function showImageModal(imageSrc, title) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('imageModal').classList.remove('hidden');
        }
        
        function hideImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>
</x-filament::page>
