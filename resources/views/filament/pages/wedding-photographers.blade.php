{{-- صفحة المصورون ومصورو الفيديو في قسم فرحي --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">المصورون ومصورو الفيديو</h3>
        
        <!-- أزرار الإضافة -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="showPhotographerForm()">
                + إضافة مصور
            </button>
            <button type="button" class="fi-btn bg-pink-600 text-lg px-6 py-2" onclick="showPackageForm()">
                + إضافة باقة
            </button>
            <button type="button" class="fi-btn bg-pink-500 text-lg px-6 py-2" onclick="showBannerForm()">
                + إضافة لافتة
            </button>
            <button type="button" class="fi-btn bg-pink-400 text-lg px-6 py-2" onclick="showVideoForm()">
                + إضافة إعلان فيديو
            </button>
        </div>

        <!-- البحث -->
        <form method="GET" class="flex flex-wrap gap-2 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث بالاسم أو التخصص..." class="fi-input w-48">
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
                    @if($video->photographer)
                        <p class="text-sm text-gray-400">{{ $video->photographer->name }}</p>
                    @endif
                    <p class="text-xs text-gray-500">تخطي بعد {{ $video->skip_after_seconds }} ثانية</p>
                    <form method="POST" action="{{ route('wedding-photographers.videos.destroy', $video->id) }}" style="display:inline;" class="mt-2">
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
                    @if($banner->photographer)
                        <p class="text-xs text-gray-400">{{ $banner->photographer->name }}</p>
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
                        <form method="POST" action="{{ route('wedding-photographers.banners.destroy', $banner->id) }}" style="display:inline;">
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
            <h4 class="text-base font-bold mb-2">باقات التصوير</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($packages as $package)
                <div class="bg-gray-800 rounded-lg p-4">
                    <h5 class="font-bold mb-2">{{ $package->name }}</h5>
                    <p class="text-lg text-green-400 font-bold mb-2">{{ number_format($package->price) }} ريال</p>
                    @if($package->photographer)
                        <p class="text-sm text-gray-400 mb-2">{{ $package->photographer->name }}</p>
                    @endif
                    @if($package->description)
                        <p class="text-xs text-gray-300 mb-2">{{ Str::limit($package->description, 80) }}</p>
                    @endif
                    <div class="text-xs text-gray-400 mb-2">
                        @if($package->duration_hours)
                            <div>⏱️ {{ $package->duration_hours }} ساعة</div>
                        @endif
                        @if($package->edited_photos_count)
                            <div>📸 {{ $package->edited_photos_count }} صورة معدلة</div>
                        @endif
                        @if($package->edited_videos_count)
                            <div>🎥 {{ $package->edited_videos_count }} فيديو معدل</div>
                        @endif
                        @if($package->includes_album)
                            <div>📖 ألبوم مطبوع</div>
                        @endif
                        @if($package->includes_usb)
                            <div>💾 فلاش ميموري</div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('wedding-photographers.packages.destroy', $package->id) }}" style="display:inline;" class="mt-2">
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
        
        <!-- نموذج إضافة مصور -->
        <div id="photographerForm" style="display:none;">
            <form method="POST" action="{{ route('wedding-photographers.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة مصور جديد</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="text" name="name" placeholder="اسم المصور" class="fi-input" required>
                    <select name="specialty" class="fi-input">
                        <option value="">اختر التخصص</option>
                        <option value="فوتوغرافي">فوتوغرافي</option>
                        <option value="فيديو">فيديو</option>
                        <option value="فوتوغرافي وفيديو">فوتوغرافي وفيديو</option>
                    </select>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="email" name="email" placeholder="البريد الإلكتروني" class="fi-input">
                    <input type="number" name="price_range_min" placeholder="أقل سعر" class="fi-input" step="0.01">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <input type="url" name="website_url" placeholder="رابط الموقع الإلكتروني" class="fi-input">
                    <input type="url" name="instagram_url" placeholder="رابط الانستغرام" class="fi-input">
                    <input type="url" name="facebook_url" placeholder="رابط الفيسبوك" class="fi-input">
                </div>

                <div id="phone-inputs">
                    <label class="text-white">أرقام الهواتف:</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="phone_numbers[]" placeholder="رقم الهاتف" class="fi-input">
                        <button type="button" onclick="addPhoneInput()" class="fi-btn bg-green-600 px-3">+</button>
                    </div>
                </div>

                <textarea name="description" placeholder="وصف المصور وخبراته" class="fi-input" rows="3"></textarea>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <label class="text-white">صور الأعمال السابقة:</label>
                        <input type="file" name="portfolio_images[]" multiple accept="image/*" class="fi-input">
                    </div>
                    <div>
                        <label class="text-white">روابط فيديوهات الأعمال:</label>
                        <div id="video-urls">
                            <input type="url" name="portfolio_videos[]" placeholder="رابط فيديو" class="fi-input mb-2">
                            <button type="button" onclick="addVideoUrl()" class="fi-btn bg-green-600 px-3 text-sm">+ إضافة رابط فيديو</button>
                        </div>
                    </div>
                </div>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة</button>
                    <button type="button" onclick="hidePhotographerForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة باقة -->
        <div id="packageForm" style="display:none;">
            <form method="POST" action="{{ route('wedding-photographers.packages.store') }}" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة باقة تصوير</h4>
                
                <select name="photographer_id" class="fi-input" required>
                    <option value="">اختر المصور</option>
                    @foreach($photographers as $photographer)
                        <option value="{{ $photographer->id }}">{{ $photographer->name }}</option>
                    @endforeach
                </select>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="text" name="name" placeholder="اسم الباقة" class="fi-input" required>
                    <input type="number" name="price" placeholder="السعر" class="fi-input" step="0.01" required>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <input type="number" name="duration_hours" placeholder="مدة التصوير (ساعات)" class="fi-input" min="1">
                    <input type="number" name="edited_photos_count" placeholder="عدد الصور المعدلة" class="fi-input" min="0">
                    <input type="number" name="edited_videos_count" placeholder="عدد الفيديوهات المعدلة" class="fi-input" min="0">
                </div>

                <div class="flex gap-4">
                    <label class="flex items-center text-white">
                        <input type="checkbox" name="includes_album" value="1" class="mr-2">
                        يشمل ألبوم مطبوع
                    </label>
                    <label class="flex items-center text-white">
                        <input type="checkbox" name="includes_usb" value="1" class="mr-2">
                        يشمل فلاش ميموري
                    </label>
                </div>

                <textarea name="description" placeholder="وصف الباقة" class="fi-input" rows="2"></textarea>

                <div id="services-inputs">
                    <label class="text-white">الخدمات المشمولة:</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="included_services[]" placeholder="خدمة مشمولة" class="fi-input">
                        <button type="button" onclick="addServiceInput()" class="fi-btn bg-green-600 px-3">+</button>
                    </div>
                </div>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">إضافة الباقة</button>
                    <button type="button" onclick="hidePackageForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- نموذج إضافة لافتة -->
        <div id="bannerForm" style="display:none;">
            <form method="POST" action="{{ route('wedding-photographers.banners.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة لافتة عرض</h4>
                
                <select name="photographer_id" class="fi-input">
                    <option value="">اختياري: ربط بمصور معين</option>
                    @foreach($photographers as $photographer)
                        <option value="{{ $photographer->id }}">{{ $photographer->name }}</option>
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
            <form method="POST" action="{{ route('wedding-photographers.videos.store') }}" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <h4 class="text-lg font-bold mb-2 text-white">إضافة إعلان فيديو برعاية</h4>
                
                <select name="photographer_id" class="fi-input">
                    <option value="">اختياري: ربط بمصور معين</option>
                    @foreach($photographers as $photographer)
                        <option value="{{ $photographer->id }}">{{ $photographer->name }}</option>
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

        <!-- نموذج تعديل مصور -->
        <div id="editPhotographerForm" style="display:none;">
            <form id="editForm" method="POST" action="" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                @method('PUT')
                <h4 class="text-lg font-bold mb-2 text-white">تعديل المصور</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="text" id="edit_name" name="name" placeholder="اسم المصور" class="fi-input" required>
                    <select id="edit_specialty" name="specialty" class="fi-input">
                        <option value="">اختر التخصص</option>
                        <option value="فوتوغرافي">فوتوغرافي</option>
                        <option value="فيديو">فيديو</option>
                        <option value="فوتوغرافي وفيديو">فوتوغرافي وفيديو</option>
                    </select>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <input type="email" id="edit_email" name="email" placeholder="البريد الإلكتروني" class="fi-input">
                    <input type="number" id="edit_price_range_min" name="price_range_min" placeholder="أقل سعر" class="fi-input" step="0.01">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <input type="url" id="edit_website_url" name="website_url" placeholder="رابط الموقع الإلكتروني" class="fi-input">
                    <input type="url" id="edit_instagram_url" name="instagram_url" placeholder="رابط الانستغرام" class="fi-input">
                    <input type="url" id="edit_facebook_url" name="facebook_url" placeholder="رابط الفيسبوك" class="fi-input">
                </div>

                <div id="editPhoneContainer">
                    <label class="text-white">أرقام الهواتف:</label>
                    <!-- سيتم ملء هذا الجزء بالجافا سكريبت -->
                </div>
                <button type="button" onclick="addEditPhoneInput()" class="fi-btn bg-green-600 px-3 w-32">+ إضافة رقم</button>

                <textarea id="edit_description" name="description" placeholder="وصف المصور وخبراته" class="fi-input" rows="3"></textarea>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <label class="text-white">إضافة صور أعمال جديدة:</label>
                        <input type="file" name="portfolio_images[]" multiple accept="image/*" class="fi-input">
                    </div>
                    <div id="editVideoContainer">
                        <label class="text-white">روابط فيديوهات الأعمال:</label>
                        <!-- سيتم ملء هذا الجزء بالجافا سكريبت -->
                    </div>
                </div>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-blue-600 text-lg py-2 w-full">تحديث</button>
                    <button type="button" onclick="hideEditPhotographerForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- جدول المصورين -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">قائمة المصورين</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>التخصص</th>
                        <th>التواصل</th>
                        <th>صور الأعمال</th>
                        <th>فيديوهات الأعمال</th>
                        <th>النطاق السعري</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($photographers as $photographer)
                    <tr>
                        <td>
                            <div>
                                <strong>{{ $photographer->name }}</strong>
                                @if($photographer->email)
                                    <br><a href="mailto:{{ $photographer->email }}" class="text-pink-400 text-xs underline">{{ $photographer->email }}</a>
                                @endif
                            </div>
                        </td>
                        <td>{{ $photographer->specialty ?: '-' }}</td>
                        <td>
                            @if($photographer->phone_numbers)
                                @foreach($photographer->phone_numbers as $phone)
                                    <div class="text-xs">{{ $phone }}</div>
                                @endforeach
                            @endif
                            <div class="flex gap-1 justify-center mt-1">
                                @if($photographer->website_url)
                                    <a href="{{ $photographer->website_url }}" target="_blank" class="text-blue-400 text-xs">🌐</a>
                                @endif
                                @if($photographer->instagram_url)
                                    <a href="{{ $photographer->instagram_url }}" target="_blank" class="text-pink-400 text-xs">📷</a>
                                @endif
                                @if($photographer->facebook_url)
                                    <a href="{{ $photographer->facebook_url }}" target="_blank" class="text-blue-600 text-xs">📘</a>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if($photographer->portfolio_images && count($photographer->portfolio_images) > 0)
                                <div class="flex flex-wrap gap-1 justify-center">
                                    @foreach(array_slice($photographer->portfolio_images, 0, 3) as $index => $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="عمل" class="w-12 h-12 object-cover rounded cursor-pointer" onclick="showImageModal('{{ asset('storage/' . $image) }}', 'أعمال {{ $photographer->name }}')">
                                    @endforeach
                                    @if(count($photographer->portfolio_images) > 3)
                                        <span class="text-xs bg-gray-600 px-2 py-1 rounded">+{{ count($photographer->portfolio_images) - 3 }}</span>
                                    @endif
                                </div>
                            @else
                                <span class="text-gray-400">لا توجد</span>
                            @endif
                        </td>
                        <td>
                            @if($photographer->portfolio_videos && count($photographer->portfolio_videos) > 0)
                                <div class="flex flex-col gap-1">
                                    @foreach(array_slice($photographer->portfolio_videos, 0, 2) as $video)
                                        <a href="{{ $video }}" target="_blank" class="text-pink-400 text-xs underline">🎥 فيديو</a>
                                    @endforeach
                                    @if(count($photographer->portfolio_videos) > 2)
                                        <span class="text-xs text-gray-400">+{{ count($photographer->portfolio_videos) - 2 }} أخرى</span>
                                    @endif
                                </div>
                            @else
                                <span class="text-gray-400">لا توجد</span>
                            @endif
                        </td>
                        <td>
                            @if($photographer->price_range_min)
                                <div class="text-xs">من {{ number_format($photographer->price_range_min) }} ريال</div>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="flex flex-col gap-1">
                                <button type="button" onclick="editPhotographer({{ $photographer->id }})" class="fi-btn bg-blue-600 text-xs py-1 px-2">تعديل</button>
                                <form method="POST" action="{{ route('wedding-photographers.destroy', $photographer->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-400 py-4">لا يوجد مصورون مسجلون</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- نافذة منبثقة لعرض الصور -->
        <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" onclick="hideImageModal()">
            <div class="max-w-4xl max-h-screen p-4">
                <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain">
                <p id="modalTitle" class="text-white text-center mt-2"></p>
            </div>
        </div>
    </div>

    <script>
        // دوال إظهار وإخفاء النماذج
        function showPhotographerForm() {
            hideAllForms();
            document.getElementById('photographerForm').style.display = 'block';
        }
        function hidePhotographerForm() {
            document.getElementById('photographerForm').style.display = 'none';
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
        
        function showEditPhotographerForm() {
            document.getElementById('editPhotographerForm').style.display = 'block';
        }
        function hideEditPhotographerForm() {
            document.getElementById('editPhotographerForm').style.display = 'none';
        }
        
        function hideAllForms() {
            hidePhotographerForm();
            hidePackageForm();
            hideBannerForm();
            hideVideoForm();
            hideEditPhotographerForm();
        }

        // دوال إضافة حقول ديناميكية
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

        function addVideoUrl() {
            const container = document.getElementById('video-urls');
            const input = document.createElement('input');
            input.type = 'url';
            input.name = 'portfolio_videos[]';
            input.placeholder = 'رابط فيديو';
            input.className = 'fi-input mb-2';
            container.insertBefore(input, container.lastElementChild);
        }

        function addServiceInput() {
            const container = document.getElementById('services-inputs');
            const div = document.createElement('div');
            div.className = 'flex gap-2 mb-2';
            div.innerHTML = '<input type="text" name="included_services[]" placeholder="خدمة مشمولة" class="fi-input"><button type="button" onclick="removeServiceInput(this)" class="fi-btn bg-red-600 px-3">-</button>';
            container.appendChild(div);
        }
        function removeServiceInput(button) {
            button.parentElement.remove();
        }

        // دوال التعديل
        function editPhotographer(photographerId) {
            hideAllForms();
            
            const photographers = @json($photographers);
            const photographer = photographers.find(p => p.id === photographerId);
            
            if (photographer) {
                // ملء الحقول
                document.getElementById('edit_name').value = photographer.name || '';
                document.getElementById('edit_specialty').value = photographer.specialty || '';
                document.getElementById('edit_email').value = photographer.email || '';
                document.getElementById('edit_price_range_min').value = photographer.price_range_min || '';
                document.getElementById('edit_website_url').value = photographer.website_url || '';
                document.getElementById('edit_instagram_url').value = photographer.instagram_url || '';
                document.getElementById('edit_facebook_url').value = photographer.facebook_url || '';
                document.getElementById('edit_description').value = photographer.description || '';
                
                // تحديث action الفورم
                document.getElementById('editForm').action = `/wedding-photographers/${photographerId}`;
                
                // ملء أرقام الهواتف
                const phoneContainer = document.getElementById('editPhoneContainer');
                phoneContainer.innerHTML = '<label class="text-white">أرقام الهواتف:</label>';
                if (photographer.phone_numbers && photographer.phone_numbers.length > 0) {
                    photographer.phone_numbers.forEach(phone => {
                        addEditPhoneInput(phone);
                    });
                } else {
                    addEditPhoneInput();
                }
                
                // ملء روابط الفيديوهات
                const videoContainer = document.getElementById('editVideoContainer');
                videoContainer.innerHTML = '<label class="text-white">روابط فيديوهات الأعمال:</label>';
                if (photographer.portfolio_videos && photographer.portfolio_videos.length > 0) {
                    photographer.portfolio_videos.forEach(video => {
                        addEditVideoInput(video);
                    });
                } else {
                    addEditVideoInput();
                }
                
                showEditPhotographerForm();
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
        
        function addEditVideoInput(value = '') {
            const container = document.getElementById('editVideoContainer');
            const div = document.createElement('div');
            div.className = 'flex gap-2 mb-2';
            div.innerHTML = `<input type="url" name="portfolio_videos[]" value="${value}" placeholder="رابط فيديو" class="fi-input"><button type="button" onclick="removeEditVideoInput(this)" class="fi-btn bg-red-600 px-3">-</button>`;
            container.appendChild(div);
        }
        
        function removeEditVideoInput(button) {
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
