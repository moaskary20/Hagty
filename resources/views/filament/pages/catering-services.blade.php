{{-- صفحة خدمات الطعام في قسم فرحي --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">خدمات الطعام</h3>
        
        <!-- أزرار الإضافة -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="showServiceForm()">
                + إضافة شركة طعام
            </button>
            <button type="button" class="fi-btn bg-pink-600 text-lg px-6 py-2" onclick="showMenuForm()">
                + إضافة قائمة طعام
            </button>
            <button type="button" class="fi-btn bg-pink-500 text-lg px-6 py-2" onclick="showPackageForm()">
                + إضافة باقة
            </button>
            <button type="button" class="fi-btn bg-pink-400 text-lg px-6 py-2" onclick="showBannerForm()">
                + إضافة لافتة
            </button>
            <button type="button" class="fi-btn bg-pink-300 text-lg px-6 py-2" onclick="showVideoForm()">
                + إضافة فيديو
            </button>
        </div>

        <!-- البحث -->
        <form method="GET" class="flex flex-wrap gap-2 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث بالاسم أو الشخص المسؤول..." class="fi-input w-48">
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
                    @if($video->cateringService)
                        <p class="text-sm text-gray-400">{{ $video->cateringService->company_name }}</p>
                    @endif
                    <p class="text-xs text-gray-500">تخطي بعد {{ $video->skip_after_seconds }} ثانية</p>
                    <form method="POST" action="{{ route('catering-services.videos.destroy', $video->id) }}" style="display:inline;" class="mt-2">
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
                    @if($banner->cateringService)
                        <p class="text-xs text-gray-400">{{ $banner->cateringService->company_name }}</p>
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
                        <form method="POST" action="{{ route('catering-services.banners.destroy', $banner->id) }}" style="display:inline;">
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
            <h4 class="text-base font-bold mb-2">قوائم الطعام</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($menus as $menu)
                <div class="bg-gray-800 rounded-lg p-4">
                    <h5 class="font-bold mb-2">{{ $menu->menu_name }}</h5>
                    <span class="bg-green-500 text-white px-2 py-1 rounded text-xs mb-2 inline-block">{{ $menu->menu_type }}</span>
                    @if($menu->cateringService)
                        <p class="text-sm text-gray-400 mb-2">{{ $menu->cateringService->company_name }}</p>
                    @endif
                    @if($menu->description)
                        <p class="text-sm text-gray-300 mb-2">{{ Str::limit($menu->description, 80) }}</p>
                    @endif
                    @if($menu->price_per_person)
                        <p class="text-lg font-bold text-pink-400">{{ number_format($menu->price_per_person) }} ريال/شخص</p>
                    @endif
                    <p class="text-xs text-gray-500">أقل طلب: {{ $menu->min_persons }} شخص</p>
                    @if($menu->menu_images && count($menu->menu_images) > 0)
                        <div class="mt-2 flex gap-1">
                            @foreach(array_slice($menu->menu_images, 0, 3) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="قائمة" class="w-12 h-12 object-cover rounded">
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('catering-services.menus.destroy', $menu->id) }}" style="display:inline;" class="mt-2">
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
                <div class="bg-gray-800 rounded-lg p-4">
                    <h5 class="font-bold mb-2">{{ $package->package_name }}</h5>
                    @if($package->is_featured)
                        <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs mb-2 inline-block">مميز</span>
                    @endif
                    @if($package->cateringService)
                        <p class="text-sm text-gray-400 mb-2">{{ $package->cateringService->company_name }}</p>
                    @endif
                    @if($package->description)
                        <p class="text-sm text-gray-300 mb-2">{{ Str::limit($package->description, 80) }}</p>
                    @endif
                    <p class="text-lg font-bold text-pink-400">{{ number_format($package->price_per_person) }} ريال/شخص</p>
                    <p class="text-xs text-gray-500">من {{ $package->min_persons }} شخص</p>
                    @if($package->discount_percentage)
                        <p class="text-sm text-green-400">خصم {{ $package->discount_percentage }}%</p>
                    @endif
                    @if($package->offer_valid_until)
                        <p class="text-xs text-yellow-400">صالح حتى: {{ $package->offer_valid_until->format('Y-m-d') }}</p>
                    @endif
                    @if($package->package_images && count($package->package_images) > 0)
                        <div class="mt-2 flex gap-1">
                            @foreach(array_slice($package->package_images, 0, 3) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="باقة" class="w-12 h-12 object-cover rounded">
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('catering-services.packages.destroy', $package->id) }}" style="display:inline;" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- نموذج إضافة شركة طعام -->
        <div id="serviceForm" style="display:none;">
            <form method="POST" action="{{ route('catering-services.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة شركة خدمات طعام جديدة</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="text" name="company_name" placeholder="اسم الشركة" class="fi-input" required>
                    <input type="text" name="contact_person" placeholder="الشخص المسؤول" class="fi-input">
                </div>
                
                <input type="text" name="address" placeholder="العنوان" class="fi-input">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="email" name="email" placeholder="البريد الإلكتروني" class="fi-input">
                    <input type="url" name="website_url" placeholder="رابط الموقع الإلكتروني" class="fi-input">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="url" name="facebook_url" placeholder="رابط الفيسبوك" class="fi-input">
                    <input type="url" name="instagram_url" placeholder="رابط الإنستغرام" class="fi-input">
                </div>

                <div id="phone-inputs">
                    <label class="text-white">أرقام الهواتف:</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="phone_numbers[]" placeholder="رقم الهاتف" class="fi-input">
                        <button type="button" onclick="addPhoneInput()" class="fi-btn bg-green-600 px-3">+</button>
                    </div>
                </div>

                <div id="specialty-inputs">
                    <label class="text-white">التخصصات:</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="specialties[]" placeholder="التخصص (مثل: مأكولات شرقية)" class="fi-input">
                        <button type="button" onclick="addSpecialtyInput()" class="fi-btn bg-green-600 px-3">+</button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="number" name="min_order_value" placeholder="أقل قيمة طلب" class="fi-input" step="0.01">
                    <input type="number" name="min_guests" placeholder="أقل عدد ضيوف" class="fi-input">
                </div>

                <textarea name="description" placeholder="وصف الشركة وخدماتها" class="fi-input" rows="3"></textarea>

                <div>
                    <label class="text-white">صور الخدمة:</label>
                    <input type="file" name="service_images[]" multiple accept="image/*" class="fi-input">
                </div>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة</button>
                    <button type="button" onclick="hideServiceForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة قائمة طعام -->
        <div id="menuForm" style="display:none;">
            <form method="POST" action="{{ route('catering-services.menus.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة قائمة طعام</h4>
                
                <select name="catering_service_id" class="fi-input" required>
                    <option value="">اختر شركة الطعام</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->company_name }}</option>
                    @endforeach
                </select>
                
                <input type="text" name="menu_name" placeholder="اسم القائمة" class="fi-input" required>
                <select name="menu_type" class="fi-input" required>
                    <option value="">نوع القائمة</option>
                    <option value="breakfast">إفطار</option>
                    <option value="lunch">غداء</option>
                    <option value="dinner">عشاء</option>
                    <option value="desserts">حلويات</option>
                    <option value="beverages">مشروبات</option>
                    <option value="appetizers">مقبلات</option>
                </select>
                
                <textarea name="description" placeholder="وصف القائمة" class="fi-input" rows="3"></textarea>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="number" name="price_per_person" placeholder="السعر للشخص الواحد" class="fi-input" step="0.01">
                    <input type="number" name="minimum_order" placeholder="الحد الأدنى للطلب" class="fi-input">
                </div>
                
                <div>
                    <label class="text-white">صور القائمة:</label>
                    <input type="file" name="menu_images[]" multiple accept="image/*" class="fi-input">
                </div>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة القائمة</button>
                    <button type="button" onclick="hideMenuForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة باقة -->
        <div id="packageForm" style="display:none;">
            <form method="POST" action="{{ route('catering-services.packages.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة باقة</h4>
                
                <select name="catering_service_id" class="fi-input" required>
                    <option value="">اختر شركة الطعام</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->company_name }}</option>
                    @endforeach
                </select>
                
                <input type="text" name="package_name" placeholder="اسم الباقة" class="fi-input" required>
                <textarea name="description" placeholder="وصف الباقة" class="fi-input" rows="3"></textarea>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <input type="number" name="price_per_person" placeholder="السعر للشخص" class="fi-input" step="0.01" required>
                    <input type="number" name="minimum_guests" placeholder="أقل عدد ضيوف" class="fi-input">
                    <input type="number" name="maximum_guests" placeholder="أكبر عدد ضيوف" class="fi-input">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="number" name="discount_percentage" placeholder="نسبة الخصم %" class="fi-input" step="0.01" min="0" max="100">
                    <input type="date" name="offer_valid_until" placeholder="العرض صالح حتى" class="fi-input">
                </div>
                
                <div>
                    <label class="text-white">صور الباقة:</label>
                    <input type="file" name="package_images[]" multiple accept="image/*" class="fi-input">
                </div>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة الباقة</button>
                    <button type="button" onclick="hidePackageForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة لافتة -->
        <div id="bannerForm" style="display:none;">
            <form method="POST" action="{{ route('catering-services.banners.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة لافتة عرض</h4>
                
                <select name="catering_service_id" class="fi-input">
                    <option value="">اختياري: ربط بشركة طعام معينة</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->company_name }}</option>
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
            <form method="POST" action="{{ route('catering-services.videos.store') }}" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة إعلان فيديو برعاية</h4>
                
                <select name="catering_service_id" class="fi-input">
                    <option value="">اختياري: ربط بشركة طعام معينة</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->company_name }}</option>
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

        <!-- جدول شركات خدمات الطعام -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">قائمة شركات خدمات الطعام</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>اسم الشركة</th>
                        <th>الشخص المسؤول</th>
                        <th>العنوان</th>
                        <th>أرقام الهواتف</th>
                        <th>التخصصات</th>
                        <th>أقل طلب</th>
                        <th>الصور</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr>
                        <td>
                            <div>
                                <strong>{{ $service->company_name }}</strong>
                                @if($service->website_url)
                                    <br><a href="{{ $service->website_url }}" target="_blank" class="text-pink-400 text-xs underline">الموقع</a>
                                @endif
                                @if($service->facebook_url)
                                    <br><a href="{{ $service->facebook_url }}" target="_blank" class="text-blue-400 text-xs underline">فيسبوك</a>
                                @endif
                            </div>
                        </td>
                        <td>{{ $service->contact_person ?? '-' }}</td>
                        <td>{{ $service->address ?? '-' }}</td>
                        <td>
                            @if($service->phone_numbers)
                                @foreach($service->phone_numbers as $phone)
                                    <div class="text-xs">{{ $phone }}</div>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($service->specialties)
                                @foreach($service->specialties as $specialty)
                                    <span class="bg-gray-600 px-2 py-1 rounded text-xs mr-1">{{ $specialty }}</span>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($service->min_order_value)
                                {{ number_format($service->min_order_value) }} ريال
                            @else
                                -
                            @endif
                            @if($service->min_guests)
                                <br><span class="text-xs">{{ $service->min_guests }} ضيف</span>
                            @endif
                        </td>
                        <td>
                            @if($service->service_images && count($service->service_images) > 0)
                                <div class="flex flex-wrap gap-1 justify-center">
                                    @foreach(array_slice($service->service_images, 0, 3) as $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="خدمة" class="w-12 h-12 object-cover rounded">
                                    @endforeach
                                    @if(count($service->service_images) > 3)
                                        <span class="text-xs bg-gray-600 px-2 py-1 rounded">+{{ count($service->service_images) - 3 }}</span>
                                    @endif
                                </div>
                            @else
                                <span class="text-gray-400">لا توجد</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex flex-col gap-1">
                                <button type="button" onclick="editService({{ $service->id }})" class="fi-btn bg-blue-600 text-xs py-1 px-2">تعديل</button>
                                <form method="POST" action="{{ route('catering-services.destroy', $service->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-gray-400">لا توجد شركات خدمات طعام</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // دوال النماذج
        function showServiceForm() {
            hideAllForms();
            document.getElementById('serviceForm').style.display = 'block';
        }
        function hideServiceForm() {
            document.getElementById('serviceForm').style.display = 'none';
        }
        
        function showMenuForm() {
            hideAllForms();
            document.getElementById('menuForm').style.display = 'block';
        }
        function hideMenuForm() {
            document.getElementById('menuForm').style.display = 'none';
        }
        
        function showPackageForm() {
            hideAllForms();
            document.getElementById('packageForm').style.display = 'block';
        }
        function hidePackageForm() {
            document.getElementById('packageForm').style.display = 'none';
        }
        
        function showBannerForm() {
            hideAllForms();
            document.getElementById('bannerForm').style.display = 'block';
        }
        function hideBannerForm() {
            document.getElementById('bannerForm').style.display = 'none';
        }
        
        function showVideoForm() {
            hideAllForms();
            document.getElementById('videoForm').style.display = 'block';
        }
        function hideVideoForm() {
            document.getElementById('videoForm').style.display = 'none';
        }
        
        function hideAllForms() {
            document.getElementById('serviceForm').style.display = 'none';
            if(document.getElementById('menuForm')) document.getElementById('menuForm').style.display = 'none';
            if(document.getElementById('packageForm')) document.getElementById('packageForm').style.display = 'none';
            if(document.getElementById('bannerForm')) document.getElementById('bannerForm').style.display = 'none';
            if(document.getElementById('videoForm')) document.getElementById('videoForm').style.display = 'none';
        }

        // دوال إضافة الحقول
        function addPhoneInput() {
            const container = document.getElementById('phone-inputs');
            const div = document.createElement('div');
            div.className = 'flex gap-2 mb-2';
            div.innerHTML = '<input type="text" name="phone_numbers[]" placeholder="رقم الهاتف" class="fi-input"><button type="button" onclick="removePhoneInput(this)" class="fi-btn bg-red-600 px-3">-</button>';
            container.appendChild(div);
        }
        function removePhoneInput(button) {
            button.parentElement.remove();
        }

        function addSpecialtyInput() {
            const container = document.getElementById('specialty-inputs');
            const div = document.createElement('div');
            div.className = 'flex gap-2 mb-2';
            div.innerHTML = '<input type="text" name="specialties[]" placeholder="التخصص" class="fi-input"><button type="button" onclick="removeSpecialtyInput(this)" class="fi-btn bg-red-600 px-3">-</button>';
            container.appendChild(div);
        }
        function removeSpecialtyInput(button) {
            button.parentElement.remove();
        }

        // دالة التعديل
        function editService(serviceId) {
            // سيتم إضافة نموذج التعديل لاحقاً
            alert('ميزة التعديل ستكون متاحة قريباً');
        }
    </script>
</x-filament::page>
