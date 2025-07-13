{{-- صفحة مصففو الشعر في قسم فرحي --}}
<x-filament::page>
    <div class="fi-card mb-6 p-4">
        <h3 class="text-lg font-bold mb-4">مصففو الشعر</h3>
        
        <!-- أزرار الإضافة -->
        <div class="flex flex-wrap gap-2 justify-end mb-4">
            <button type="button" class="fi-btn bg-pink-700 text-lg px-6 py-2" onclick="showAddForm()">
                + إضافة مصففة شعر
            </button>
        </div>

        <!-- البحث -->
        <form method="GET" class="flex flex-wrap gap-2 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث بالاسم أو العنوان أو مكان العرض..." class="fi-input w-48">
            <button type="submit" class="fi-btn bg-pink-400">بحث</button>
        </form>

        <!-- نموذج إضافة/تعديل مصففة شعر -->
        <div id="stylistForm" style="display:none;">
            <form id="stylistFormElement" method="POST" action="{{ route('wedding-hair-stylists.store') }}" enctype="multipart/form-data" class="flex flex-col gap-2 mb-4 bg-gray-900 p-4 rounded-lg">
                @csrf
                <input type="hidden" id="method_field" name="_method" value="">
                <input type="hidden" id="stylist_id" name="stylist_id" value="">
                
                <h4 id="form-title" class="text-lg font-bold mb-2 text-white">إضافة مصففة شعر جديدة</h4>
                
                <input type="text" id="name" name="name" placeholder="اسم مصففة الشعر" class="fi-input" required>
                <input type="file" name="work_images[]" multiple accept="image/*" class="fi-input" placeholder="صور العمل">
                <small class="text-gray-400">يمكنك اختيار عدة صور للأعمال</small>
                <input type="text" id="address" name="address" placeholder="العنوان (اختياري)" class="fi-input">
                <input type="url" id="google_maps_url" name="google_maps_url" placeholder="رابط خرائط جوجل (اختياري)" class="fi-input">
                <input type="text" id="phone" name="phone" placeholder="رقم الهاتف" class="fi-input">
                <input type="url" id="profile_url" name="profile_url" placeholder="رابط صفحتها (اختياري)" class="fi-input">
                <input type="text" id="package" name="package" placeholder="الباقة (اختياري)" class="fi-input">
                <input type="text" id="venue" name="venue" placeholder="مكان العرض (اختياري)" class="fi-input">
                <textarea id="description" name="description" placeholder="وصف إضافي (اختياري)" class="fi-input" rows="3"></textarea>
                
                <div class="flex gap-2 mt-2">
                    <button type="submit" class="fi-btn bg-pink-600 text-lg py-2 w-full">حفظ</button>
                    <button type="button" onclick="hideForm()" class="fi-btn bg-gray-500 w-full">إلغاء</button>
                </div>
            </form>
        </div>

        <!-- جدول مصففو الشعر -->
        <div class="mt-8">
            <h4 class="text-base font-bold mb-2">قائمة مصففو الشعر</h4>
            <table class="fi-ta-table w-full text-center">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>صور العمل</th>
                        <th>العنوان</th>
                        <th>خرائط جوجل</th>
                        <th>رقم الهاتف</th>
                        <th>رابط الصفحة</th>
                        <th>الباقة</th>
                        <th>مكان العرض</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stylists as $stylist)
                    <tr>
                        <td>{{ $stylist->name }}</td>
                        <td>
                            @if($stylist->work_images && count($stylist->work_images) > 0)
                                <div class="flex flex-wrap gap-1 justify-center">
                                    @foreach($stylist->work_images as $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="عمل" class="w-12 h-12 object-cover rounded border">
                                    @endforeach
                                </div>
                            @else
                                <span class="text-gray-400">لا توجد صور</span>
                            @endif
                        </td>
                        <td>{{ $stylist->address ?? '-' }}</td>
                        <td>
                            @if($stylist->google_maps_url)
                                <a href="{{ $stylist->google_maps_url }}" target="_blank" class="text-pink-400 underline">خريطة</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $stylist->phone ?? '-' }}</td>
                        <td>
                            @if($stylist->profile_url)
                                <a href="{{ $stylist->profile_url }}" target="_blank" class="text-pink-400 underline">صفحة المصففة</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $stylist->package ?? '-' }}</td>
                        <td>{{ $stylist->venue ?? '-' }}</td>
                        <td>
                            <div class="flex gap-1 justify-center">
                                <button onclick="editStylist({{ $stylist->id }}, '{{ $stylist->name }}', '{{ $stylist->address }}', '{{ $stylist->google_maps_url }}', '{{ $stylist->phone }}', '{{ $stylist->profile_url }}', '{{ $stylist->package }}', '{{ $stylist->venue }}', '{{ $stylist->description }}')" class="fi-btn bg-yellow-600 text-xs py-1 px-2">تعديل</button>
                                <form method="POST" action="{{ route('wedding-hair-stylists.destroy', $stylist->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fi-btn bg-red-600 text-xs py-1 px-2" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-gray-400 py-8">لا توجد مصففو شعر مسجلين</td>
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

    <script>
        function showAddForm() {
            document.getElementById('stylistForm').style.display = 'block';
            document.getElementById('form-title').textContent = 'إضافة مصففة شعر جديدة';
            document.getElementById('stylistFormElement').action = '{{ route("wedding-hair-stylists.store") }}';
            document.getElementById('method_field').value = '';
            clearForm();
        }

        function editStylist(id, name, address, googleMapsUrl, phone, profileUrl, package, venue, description) {
            document.getElementById('stylistForm').style.display = 'block';
            document.getElementById('form-title').textContent = 'تعديل مصففة الشعر';
            document.getElementById('stylistFormElement').action = '/wedding-hair-stylists/' + id;
            document.getElementById('method_field').value = 'PUT';
            document.getElementById('stylist_id').value = id;
            
            document.getElementById('name').value = name;
            document.getElementById('address').value = address;
            document.getElementById('google_maps_url').value = googleMapsUrl;
            document.getElementById('phone').value = phone;
            document.getElementById('profile_url').value = profileUrl;
            document.getElementById('package').value = package;
            document.getElementById('venue').value = venue;
            document.getElementById('description').value = description;
        }

        function hideForm() {
            document.getElementById('stylistForm').style.display = 'none';
            clearForm();
        }

        function clearForm() {
            document.getElementById('name').value = '';
            document.getElementById('address').value = '';
            document.getElementById('google_maps_url').value = '';
            document.getElementById('phone').value = '';
            document.getElementById('profile_url').value = '';
            document.getElementById('package').value = '';
            document.getElementById('venue').value = '';
            document.getElementById('description').value = '';
            document.getElementById('stylist_id').value = '';
        }
    </script>
</x-filament::page>
