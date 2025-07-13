{{-- صفحة ديكورات الزهور والتجهيزات في قسم فرحي --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">ديكورات الزهور والتجهيزات</h3>
        
        <!-- أزرار الإضافة -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="showDecoratorForm()">
                + إضافة مورد ديكورات
            </button>
            <button type="button" class="fi-btn bg-pink-600 text-lg px-6 py-2" onclick="showPackageForm()">
                + إضافة باقة
            </button>
            <button type="button" class="fi-btn bg-pink-500 text-lg px-6 py-2" onclick="showSponsorBannerForm()">
                + إضافة لافتة راعية
            </button>
            <button type="button" class="fi-btn bg-pink-400 text-lg px-6 py-2" onclick="showVideoForm()">
                + إضافة إعلان فيديو
            </button>
        </div>

        <!-- البحث -->
        <form method="GET" class="flex flex-wrap gap-2 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث بالاسم أو التخصص أو العنوان..." class="fi-input w-48">
            <button type="submit" class="fi-btn bg-pink-400">بحث</button>
        </form>

        <!-- عرض إعلانات الفيديو -->
        @if($videoAds->count() > 0)
        <div class="mb-6">
            <h4 class="text-base font-bold mb-2">إعلانات الفيديو برعاية</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($videoAds as $video)
                <div class="bg-gray-800 rounded-lg p-4">
                    <h5 class="font-bold mb-2">{{ $video->title }}</h5>
                    @if($video->is_sponsored)
                        <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs mb-2 inline-block">برعاية</span>
                    @endif
                    <div class="mb-2">
                        <a href="{{ $video->video_url }}" target="_blank" class="text-pink-400 underline">مشاهدة الفيديو</a>
                    </div>
                    @if($video->flowerDecorator)
                        <p class="text-sm text-gray-400">{{ $video->flowerDecorator->name }}</p>
                    @endif
                    <p class="text-xs text-gray-500">تخطي بعد {{ $video->skip_after_seconds }} ثانية</p>
                    <form method="POST" action="{{ route('flower-decorators.video-ads.destroy', $video->id) }}" style="display:inline;" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2">حذف</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- عرض اللافتات الراعية -->
        @if($sponsorBanners->count() > 0)
        <div class="mb-6">
            <h4 class="text-base font-bold mb-2">اللافتات الراعية للموردين</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($sponsorBanners as $banner)
                <div class="bg-gray-800 rounded-lg p-2">
                    <img src="{{ asset('storage/' . $banner->banner_image) }}" alt="{{ $banner->title }}" class="w-full h-32 object-cover rounded mb-2">
                    <h5 class="font-bold text-sm">{{ $banner->title }}</h5>
                    @if($banner->sponsor_company)
                        <p class="text-xs text-yellow-400 mb-1">{{ $banner->sponsor_company }}</p>
                    @endif
                    @if($banner->flowerDecorator)
                        <p class="text-xs text-gray-400">{{ $banner->flowerDecorator->name }}</p>
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
                        <form method="POST" action="{{ route('flower-decorators.sponsor-banners.destroy', $banner->id) }}" style="display:inline;">
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

        <!-- عرض الباقات -->
        @if($packages->count() > 0)
        <div class="mb-6">
            <h4 class="text-base font-bold mb-2">باقات عروض الزفاف</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($packages as $package)
                <div class="bg-gray-800 rounded-lg p-4 {{ $package->is_popular ? 'border-2 border-yellow-500' : '' }}">
                    @if($package->is_popular)
                        <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs mb-2 inline-block">الأكثر طلباً</span>
                    @endif
                    <h5 class="font-bold mb-2">{{ $package->package_name }}</h5>
                    <p class="text-2xl font-bold text-pink-400 mb-2">{{ number_format($package->price) }} ريال</p>
                    @if($package->package_type)
                        <p class="text-sm text-gray-400 mb-2">النوع: {{ $package->package_type }}</p>
                    @endif
                    @if($package->flowerDecorator)
                        <p class="text-sm text-gray-400 mb-2">{{ $package->flowerDecorator->name }}</p>
                    @endif
                    <p class="text-sm text-gray-300 mb-3">{{ Str::limit($package->package_description, 100) }}</p>
                    @if($package->includes && count($package->includes) > 0)
                        <div class="mb-3">
                            <p class="text-xs font-bold text-gray-300 mb-1">يشمل:</p>
                            <ul class="text-xs text-gray-400 space-y-1">
                                @foreach(array_slice($package->includes, 0, 3) as $include)
                                    <li>• {{ $include }}</li>
                                @endforeach
                                @if(count($package->includes) > 3)
                                    <li class="text-pink-400">وأكثر...</li>
                                @endif
                            </ul>
                        </div>
                    @endif
                    @if($package->package_images && count($package->package_images) > 0)
                        <div class="mb-3">
                            <div class="flex flex-wrap gap-1">
                                @foreach(array_slice($package->package_images, 0, 3) as $index => $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="باقة" class="w-12 h-12 object-cover rounded cursor-pointer" onclick="showImageModal('{{ asset('storage/' . $image) }}', '{{ $package->package_name }} - صورة {{ $index + 1 }}')">
                                @endforeach
                                @if(count($package->package_images) > 3)
                                    <span class="text-xs bg-gray-600 px-2 py-1 rounded">+{{ count($package->package_images) - 3 }}</span>
                                @endif
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('flower-decorators.packages.destroy', $package->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- نماذج الإضافة -->
        
        <!-- نموذج إضافة مورد ديكورات -->
        <div id="decoratorForm" style="display:none;">
            <form method="POST" action="{{ route('flower-decorators.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة مورد ديكورات جديد</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="text" name="name" placeholder="الاسم" class="fi-input" required>
                    <input type="text" name="specialty" placeholder="التخصص (زهور، ديكورات، تجهيزات)" class="fi-input">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="email" name="email" placeholder="البريد الإلكتروني" class="fi-input">
                    <input type="number" name="starting_price" placeholder="السعر المبدئي" class="fi-input" step="0.01">
                </div>

                <input type="text" name="address" placeholder="العنوان" class="fi-input">

                <div id="phone-inputs">
                    <label class="text-white">أرقام الهواتف:</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="phone_numbers[]" placeholder="رقم الهاتف" class="fi-input">
                        <button type="button" onclick="addPhoneInput()" class="fi-btn bg-green-600 px-3">+</button>
                    </div>
                </div>

                <textarea name="description" placeholder="وصف الخدمات" class="fi-input" rows="3"></textarea>

                <div id="services-inputs">
                    <label class="text-white">الخدمات المقدمة:</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="services_offered[]" placeholder="خدمة" class="fi-input">
                        <button type="button" onclick="addServiceInput()" class="fi-btn bg-green-600 px-3">+</button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <input type="url" name="website_url" placeholder="رابط الموقع" class="fi-input">
                    <input type="url" name="instagram_url" placeholder="رابط الانستقرام" class="fi-input">
                    <input type="url" name="facebook_url" placeholder="رابط الفيسبوك" class="fi-input">
                </div>

                <div>
                    <label class="text-white">صور المراجع (Portfolio):</label>
                    <input type="file" name="portfolio_images[]" multiple accept="image/*" class="fi-input">
                </div>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة</button>
                    <button type="button" onclick="hideDecoratorForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة باقة -->
        <div id="packageForm" style="display:none;">
            <form method="POST" action="{{ route('flower-decorators.packages.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة باقة زفاف</h4>
                
                <select name="flower_decorator_id" class="fi-input" required>
                    <option value="">اختر مورد الديكورات</option>
                    @foreach($flowerDecorators as $decorator)
                        <option value="{{ $decorator->id }}">{{ $decorator->name }}</option>
                    @endforeach
                </select>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <input type="text" name="package_name" placeholder="اسم الباقة" class="fi-input" required>
                    <input type="number" name="price" placeholder="السعر" class="fi-input" step="0.01" required>
                    <input type="text" name="package_type" placeholder="نوع الباقة" class="fi-input">
                </div>
                
                <textarea name="package_description" placeholder="وصف الباقة" class="fi-input" rows="3" required></textarea>

                <div id="includes-inputs">
                    <label class="text-white">ما تشمله الباقة:</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="includes[]" placeholder="عنصر من الباقة" class="fi-input">
                        <button type="button" onclick="addIncludeInput()" class="fi-btn bg-green-600 px-3">+</button>
                    </div>
                </div>

                <div>
                    <label class="text-white">صور الباقة:</label>
                    <input type="file" name="package_images[]" multiple accept="image/*" class="fi-input">
                </div>

                <label class="flex items-center text-white">
                    <input type="checkbox" name="is_popular" value="1" class="mr-2">
                    باقة شائعة (الأكثر طلباً)
                </label>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة الباقة</button>
                    <button type="button" onclick="hidePackageForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة لافتة راعية -->
        <div id="sponsorBannerForm" style="display:none;">
            <form method="POST" action="{{ route('flower-decorators.sponsor-banners.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة لافتة راعية</h4>
                
                <select name="flower_decorator_id" class="fi-input">
                    <option value="">اختياري: ربط بمورد ديكورات معين</option>
                    @foreach($flowerDecorators as $decorator)
                        <option value="{{ $decorator->id }}">{{ $decorator->name }}</option>
                    @endforeach
                </select>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="text" name="title" placeholder="عنوان اللافتة" class="fi-input" required>
                    <input type="text" name="sponsor_company" placeholder="الشركة الراعية" class="fi-input">
                </div>
                
                <input type="file" name="banner_image" accept="image/*" class="fi-input" required>
                <input type="url" name="link_url" placeholder="رابط عند الضغط (اختياري)" class="fi-input">
                <textarea name="offer_description" placeholder="وصف العرض" class="fi-input" rows="2"></textarea>
                <input type="date" name="valid_until" placeholder="صالح حتى تاريخ" class="fi-input">
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة اللافتة</button>
                    <button type="button" onclick="hideSponsorBannerForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة إعلان فيديو -->
        <div id="videoForm" style="display:none;">
            <form method="POST" action="{{ route('flower-decorators.video-ads.store') }}" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة إعلان فيديو برعاية</h4>
                
                <select name="flower_decorator_id" class="fi-input">
                    <option value="">اختياري: ربط بمورد ديكورات معين</option>
                    @foreach($flowerDecorators as $decorator)
                        <option value="{{ $decorator->id }}">{{ $decorator->name }}</option>
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

        <!-- جدول موردي الديكورات -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">قائمة موردي الديكورات والزهور</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>التخصص</th>
                        <th>أرقام الهواتف</th>
                        <th>العنوان</th>
                        <th>صور المراجع</th>
                        <th>المراجع</th>
                        <th>السعر المبدئي</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($flowerDecorators as $decorator)
                    <tr>
                        <td>
                            <div>
                                <strong>{{ $decorator->name }}</strong>
                                @if($decorator->email)
                                    <br><a href="mailto:{{ $decorator->email }}" class="text-pink-400 text-xs underline">{{ $decorator->email }}</a>
                                @endif
                            </div>
                        </td>
                        <td>{{ $decorator->specialty ?? '-' }}</td>
                        <td>
                            @if($decorator->phone_numbers)
                                @foreach($decorator->phone_numbers as $phone)
                                    <div class="text-xs">{{ $phone }}</div>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ Str::limit($decorator->address, 30) ?? '-' }}</td>
                        <td>
                            @if($decorator->portfolio_images && count($decorator->portfolio_images) > 0)
                                <div class="flex flex-wrap gap-1 justify-center">
                                    @foreach(array_slice($decorator->portfolio_images, 0, 3) as $index => $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="مرجع" class="w-12 h-12 object-cover rounded cursor-pointer" onclick="showImageModal('{{ asset('storage/' . $image) }}', '{{ $decorator->name }} - مرجع {{ $index + 1 }}')">
                                    @endforeach
                                    @if(count($decorator->portfolio_images) > 3)
                                        <span class="text-xs bg-gray-600 px-2 py-1 rounded">+{{ count($decorator->portfolio_images) - 3 }}</span>
                                    @endif
                                </div>
                            @else
                                <span class="text-gray-400">لا توجد</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex flex-col gap-1 text-xs">
                                @if($decorator->website_url)
                                    <a href="{{ $decorator->website_url }}" target="_blank" class="text-blue-400 underline">الموقع</a>
                                @endif
                                @if($decorator->instagram_url)
                                    <a href="{{ $decorator->instagram_url }}" target="_blank" class="text-pink-400 underline">انستقرام</a>
                                @endif
                                @if($decorator->facebook_url)
                                    <a href="{{ $decorator->facebook_url }}" target="_blank" class="text-blue-600 underline">فيسبوك</a>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if($decorator->starting_price)
                                <span class="text-pink-400 font-bold">{{ number_format($decorator->starting_price) }} ريال</span>
                            @else
                                <span class="text-gray-400">غير محدد</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex flex-col gap-1">
                                <button type="button" onclick="editDecorator({{ $decorator->id }})" class="fi-btn bg-blue-600 text-xs py-1 px-2">تعديل</button>
                                <form method="POST" action="{{ route('flower-decorators.destroy', $decorator->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-gray-500 py-4">لا توجد بيانات</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- نموذج تعديل مورد ديكورات -->
        <div id="editDecoratorForm" style="display:none;">
            <form id="editForm" method="POST" action="" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                @method('PUT')
                <h4 class="text-lg font-bold mb-2 text-white">تعديل مورد الديكورات</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="text" id="edit_name" name="name" placeholder="الاسم" class="fi-input" required>
                    <input type="text" id="edit_specialty" name="specialty" placeholder="التخصص" class="fi-input">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="email" id="edit_email" name="email" placeholder="البريد الإلكتروني" class="fi-input">
                    <input type="number" id="edit_starting_price" name="starting_price" placeholder="السعر المبدئي" class="fi-input" step="0.01">
                </div>

                <input type="text" id="edit_address" name="address" placeholder="العنوان" class="fi-input">

                <div id="editPhoneContainer">
                    <label class="text-white">أرقام الهواتف:</label>
                    <!-- سيتم ملء هذا الجزء بالجافا سكريبت -->
                </div>
                <button type="button" onclick="addEditPhoneInput()" class="fi-btn bg-green-600 px-3 w-32">+ إضافة رقم</button>

                <textarea id="edit_description" name="description" placeholder="وصف الخدمات" class="fi-input" rows="3"></textarea>

                <div id="editServicesContainer">
                    <label class="text-white">الخدمات المقدمة:</label>
                    <!-- سيتم ملء هذا الجزء بالجافا سكريبت -->
                </div>
                <button type="button" onclick="addEditServiceInput()" class="fi-btn bg-green-600 px-3 w-32">+ إضافة خدمة</button>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <input type="url" id="edit_website_url" name="website_url" placeholder="رابط الموقع" class="fi-input">
                    <input type="url" id="edit_instagram_url" name="instagram_url" placeholder="رابط الانستقرام" class="fi-input">
                    <input type="url" id="edit_facebook_url" name="facebook_url" placeholder="رابط الفيسبوك" class="fi-input">
                </div>

                <div>
                    <label class="text-white">إضافة صور مراجع جديدة:</label>
                    <input type="file" name="portfolio_images[]" multiple accept="image/*" class="fi-input">
                </div>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-blue-600 text-lg py-2 w-full">تحديث</button>
                    <button type="button" onclick="hideEditDecoratorForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>
    </div>

    <!-- نافذة منبثقة لعرض الصور -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="max-w-4xl max-h-full p-4">
            <div class="bg-white rounded-lg p-4">
                <div class="flex justify-between items-center mb-4">
                    <h3 id="modalTitle" class="text-lg font-bold text-black"></h3>
                    <button onclick="hideImageModal()" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                </div>
                <img id="modalImage" src="" alt="" class="max-w-full max-h-96 object-contain mx-auto">
            </div>
        </div>
    </div>

    <script>
        // دوال النماذج الأساسية
        function showDecoratorForm() {
            hideAllForms();
            document.getElementById('decoratorForm').style.display = 'block';
        }
        function hideDecoratorForm() {
            document.getElementById('decoratorForm').style.display = 'none';
        }
        
        function showPackageForm() {
            hideAllForms();
            document.getElementById('packageForm').style.display = 'block';
        }
        function hidePackageForm() {
            document.getElementById('packageForm').style.display = 'none';
        }

        function showSponsorBannerForm() {
            hideAllForms();
            document.getElementById('sponsorBannerForm').style.display = 'block';
        }
        function hideSponsorBannerForm() {
            document.getElementById('sponsorBannerForm').style.display = 'none';
        }

        function showVideoForm() {
            hideAllForms();
            document.getElementById('videoForm').style.display = 'block';
        }
        function hideVideoForm() {
            document.getElementById('videoForm').style.display = 'none';
        }

        function hideAllForms() {
            hideDecoratorForm();
            hidePackageForm();
            hideSponsorBannerForm();
            hideVideoForm();
            hideEditDecoratorForm();
        }

        // دوال إضافة الحقول الديناميكية
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

        function addServiceInput() {
            const container = document.getElementById('services-inputs');
            const div = document.createElement('div');
            div.className = 'flex gap-2 mb-2';
            div.innerHTML = '<input type="text" name="services_offered[]" placeholder="خدمة" class="fi-input"><button type="button" onclick="removeServiceInput(this)" class="fi-btn bg-red-600 px-3">-</button>';
            container.appendChild(div);
        }
        function removeServiceInput(button) {
            button.parentElement.remove();
        }

        function addIncludeInput() {
            const container = document.getElementById('includes-inputs');
            const div = document.createElement('div');
            div.className = 'flex gap-2 mb-2';
            div.innerHTML = '<input type="text" name="includes[]" placeholder="عنصر من الباقة" class="fi-input"><button type="button" onclick="removeIncludeInput(this)" class="fi-btn bg-red-600 px-3">-</button>';
            container.appendChild(div);
        }
        function removeIncludeInput(button) {
            button.parentElement.remove();
        }

        // دوال التعديل
        function showEditDecoratorForm() {
            document.getElementById('editDecoratorForm').style.display = 'block';
        }
        function hideEditDecoratorForm() {
            document.getElementById('editDecoratorForm').style.display = 'none';
        }
        
        function editDecorator(decoratorId) {
            hideAllForms();
            
            const flowerDecorators = @json($flowerDecorators);
            const decorator = flowerDecorators.find(d => d.id === decoratorId);
            
            if (decorator) {
                document.getElementById('edit_name').value = decorator.name || '';
                document.getElementById('edit_specialty').value = decorator.specialty || '';
                document.getElementById('edit_email').value = decorator.email || '';
                document.getElementById('edit_starting_price').value = decorator.starting_price || '';
                document.getElementById('edit_address').value = decorator.address || '';
                document.getElementById('edit_description').value = decorator.description || '';
                document.getElementById('edit_website_url').value = decorator.website_url || '';
                document.getElementById('edit_instagram_url').value = decorator.instagram_url || '';
                document.getElementById('edit_facebook_url').value = decorator.facebook_url || '';
                
                document.getElementById('editForm').action = `/flower-decorators/${decoratorId}`;
                
                // ملء أرقام الهواتف
                const phoneContainer = document.getElementById('editPhoneContainer');
                phoneContainer.innerHTML = '<label class="text-white">أرقام الهواتف:</label>';
                if (decorator.phone_numbers && decorator.phone_numbers.length > 0) {
                    decorator.phone_numbers.forEach(phone => {
                        addEditPhoneInput(phone);
                    });
                } else {
                    addEditPhoneInput();
                }

                // ملء الخدمات المقدمة
                const servicesContainer = document.getElementById('editServicesContainer');
                servicesContainer.innerHTML = '<label class="text-white">الخدمات المقدمة:</label>';
                if (decorator.services_offered && decorator.services_offered.length > 0) {
                    decorator.services_offered.forEach(service => {
                        addEditServiceInput(service);
                    });
                } else {
                    addEditServiceInput();
                }
                
                showEditDecoratorForm();
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

        function addEditServiceInput(value = '') {
            const container = document.getElementById('editServicesContainer');
            const div = document.createElement('div');
            div.className = 'flex gap-2 mb-2';
            div.innerHTML = `<input type="text" name="services_offered[]" value="${value}" placeholder="خدمة" class="fi-input"><button type="button" onclick="removeEditServiceInput(this)" class="fi-btn bg-red-600 px-3">-</button>`;
            container.appendChild(div);
        }
        
        function removeEditServiceInput(button) {
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
