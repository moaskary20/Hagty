<x-filament-panels::page>
<div class="doctor-follow-up-main space-y-6 min-h-screen p-4" style="background-color: #1a1a1a;">
    <!-- شريط البحث عن الأطباء -->
    <div class="rounded-xl shadow-lg border border-emerald-400 p-6" style="background-color: #2a2a2a;">
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white p-4 rounded-t-xl -m-6 mb-6">
            <h2 class="text-xl font-bold">🔍 البحث عن طبيب أمومة</h2>
        </div>
        <form method="GET" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="اسم الطبيب أو التخصص..." 
                           class="w-full rounded-lg border-2 border-emerald-400 text-white placeholder-gray-300 focus:border-emerald-500 focus:ring-emerald-500 shadow-sm" 
                           style="background-color: #1a1a1a;">
                </div>
                <div>
                    <select name="specialty" class="w-full rounded-lg border-2 border-emerald-400 text-white focus:border-emerald-500 focus:ring-emerald-500 shadow-sm" style="background-color: #1a1a1a;">
                        <option value="">جميع التخصصات</option>
                        <option value="نساء وولادة">نساء وولادة</option>
                        <option value="طب الأجنة">طب الأجنة</option>
                        <option value="طب الأطفال">طب الأطفال</option>
                        <option value="الرضاعة الطبيعية">الرضاعة الطبيعية</option>
                    </select>
                </div>
                <div>
                    <select name="location" class="w-full rounded-lg border-2 border-emerald-400 text-white focus:border-emerald-500 focus:ring-emerald-500 shadow-sm" style="background-color: #1a1a1a;">
                        <option value="">جميع المناطق</option>
                        <option value="الرياض">الرياض</option>
                        <option value="جدة">جدة</option>
                        <option value="الدمام">الدمام</option>
                        <option value="مكة">مكة</option>
                        <option value="المدينة">المدينة</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-4">
                <button type="submit" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-6 py-2 rounded-lg hover:from-emerald-600 hover:to-teal-700 shadow-md transition-all duration-300">
                    🔍 بحث
                </button>
                @if(request('search') || request('specialty') || request('location'))
                    <a href="{{ url()->current() }}" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white px-4 py-2 rounded-lg hover:from-gray-700 hover:to-gray-800 shadow-md transition-all duration-300">
                        إعادة تعيين
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- قائمة الأطباء -->
    <div class="rounded-xl shadow-lg border border-blue-400" style="background-color: #2a2a2a;">
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-6 rounded-t-xl flex justify-between items-center">
            <h2 class="text-xl font-bold">👨‍⚕️ قائمة أطباء الأمومة</h2>
            <button onclick="openAddDoctorModal()" class="text-blue-400 px-6 py-2 rounded-lg hover:bg-gray-700 border border-blue-400 shadow-md font-semibold transition-all duration-300" style="background-color: #1a1a1a;">
                ➕ إضافة طبيب جديد
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @forelse($doctors as $doctor)
                <div class="border-2 border-blue-400 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                    @if($doctor->profile_image)
                        <img src="{{ asset('storage/' . $doctor->profile_image) }}" 
                             alt="{{ $doctor->name }}" 
                             class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-48 flex items-center justify-center" style="background: linear-gradient(145deg, #444444, #333333);">
                            <div class="text-6xl">👨‍⚕️</div>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            @if($doctor->is_featured)
                                <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-2 py-1 rounded-full text-xs font-bold">⭐ مميز</span>
                            @endif
                            @if($doctor->is_verified)
                                <span class="bg-gradient-to-r from-green-400 to-green-500 text-white px-2 py-1 rounded-full text-xs font-bold">✅ موثق</span>
                            @endif
                        </div>
                        
                        <h3 class="text-white font-bold text-xl mb-2">{{ $doctor->name }}</h3>
                        <p class="text-gray-300 text-sm mb-2">{{ $doctor->title ?? 'طبيب أمومة' }}</p>
                        <p class="text-blue-400 text-sm mb-2">{{ $doctor->specialty ?? 'نساء وولادة' }}</p>
                        
                        @if($doctor->rating)
                            <div class="flex items-center gap-2 mb-3">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($doctor->rating))
                                            ⭐
                                        @elseif($i - 0.5 <= $doctor->rating)
                                            ⭐
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-gray-400 text-sm">({{ $doctor->rating }}/5)</span>
                            </div>
                        @endif

                        @if($doctor->consultation_fees)
                            <div class="bg-gradient-to-r from-green-600 to-green-700 text-white px-3 py-1 rounded-full text-sm font-semibold mb-3 inline-block">
                                💰 {{ $doctor->consultation_fees }}
                            </div>
                        @endif

                        @if($doctor->clinic_name)
                            <div class="mb-3">
                                <p class="text-blue-400 font-semibold text-sm">🏥 العيادة:</p>
                                <p class="text-gray-300 text-sm">{{ $doctor->clinic_name }}</p>
                            </div>
                        @endif

                        @if($doctor->phone_numbers && count($doctor->phone_numbers) > 0)
                            <div class="mb-3">
                                <p class="text-blue-400 font-semibold text-sm mb-1">📞 أرقام التواصل:</p>
                                @foreach($doctor->phone_numbers as $phone)
                                    <a href="tel:{{ $phone }}" class="text-green-400 hover:text-green-300 text-sm block">{{ $phone }}</a>
                                @endforeach
                            </div>
                        @endif

                        @if($doctor->clinic_address)
                            <div class="mb-3">
                                <p class="text-blue-400 font-semibold text-sm">📍 العنوان:</p>
                                <p class="text-gray-300 text-sm">{{ Str::limit($doctor->clinic_address, 100) }}</p>
                            </div>
                        @endif

                        <div class="flex gap-2 mt-4">
                            <button onclick="openReminderModal('{{ $doctor->id }}')" class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-purple-600 hover:to-purple-700 transition-all duration-300">
                                📅 تذكير موعد
                            </button>
                            
                            <button onclick="openDeliveryAlertModal('{{ $doctor->id }}')" class="bg-gradient-to-r from-pink-500 to-pink-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-pink-600 hover:to-pink-700 transition-all duration-300">
                                🚨 تنبيه ولادة
                            </button>
                            
                            @if($doctor->google_maps_url)
                                <a href="{{ $doctor->google_maps_url }}" target="_blank" class="bg-gradient-to-r from-green-500 to-green-600 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:from-green-600 hover:to-green-700 transition-all duration-300">
                                    🗺️ خريطة
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-6xl mb-4">👨‍⚕️</div>
                    <h3 class="text-xl font-bold text-gray-400 mb-2">لا توجد أطباء حالياً</h3>
                    <p class="text-gray-500">سيتم إضافة الأطباء قريباً...</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- قسم التذكيرات القادمة -->
    @if(isset($checkupReminders) && $checkupReminders->count() > 0)
        <div class="rounded-xl shadow-lg border border-purple-400" style="background-color: #2a2a2a;">
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-4 rounded-t-xl">
                <h2 class="text-xl font-bold">📅 التذكيرات القادمة</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($checkupReminders as $reminder)
                        <div class="rounded-xl p-4 border border-purple-400" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                            <h4 class="text-white font-bold text-sm mb-2">{{ $reminder->checkup_type ?? 'فحص دوري' }}</h4>
                            <p class="text-purple-400 text-sm mb-1">📅 {{ $reminder->checkup_date?->format('Y/m/d') }}</p>
                            <p class="text-gray-300 text-sm mb-2">👨‍⚕️ {{ $reminder->doctor->name ?? 'غير محدد' }}</p>
                            @if($reminder->notes)
                                <p class="text-gray-400 text-xs">{{ Str::limit($reminder->notes, 80) }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- قسم تنبيهات الولادة -->
    @if(isset($deliveryAlerts) && $deliveryAlerts->count() > 0)
        <div class="rounded-xl shadow-lg border border-pink-400" style="background-color: #2a2a2a;">
            <div class="bg-gradient-to-r from-pink-500 to-pink-600 text-white p-4 rounded-t-xl">
                <h2 class="text-xl font-bold">🚨 تنبيهات الولادة</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($deliveryAlerts as $alert)
                        <div class="rounded-xl p-4 border border-pink-400" style="background: linear-gradient(145deg, #333333, #2a2a2a);">
                            <h4 class="text-white font-bold text-sm mb-2">{{ $alert->patient_name }}</h4>
                            <p class="text-pink-400 text-sm mb-1">🗓️ {{ $alert->delivery_date?->format('Y/m/d') }}</p>
                            <p class="text-gray-300 text-sm mb-2">🏥 {{ $alert->hospital_name }}</p>
                            <p class="text-yellow-400 text-xs">⏰ تنبيه قبل {{ $alert->alert_before_days }} أيام</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- مودال إضافة طبيب جديد -->
    <div id="addDoctorModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" onclick="closeOnBackdrop(event, ['addDoctorModal'])">
        <div class="bg-gray-800 rounded-xl p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto mx-4" onclick="event.stopPropagation();" style="background-color: #2a2a2a;">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">➕ إضافة طبيب أمومة جديد</h3>
                <button onclick="closeAddDoctorModal()" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>
            
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">اسم الطبيب</label>
                        <input type="text" name="name" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="اسم الطبيب...">
                    </div>
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">المسمى الوظيفي</label>
                        <input type="text" name="title" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="دكتور، أستاذ، استشاري...">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">التخصص</label>
                        <select name="specialty" class="w-full rounded-lg border-2 border-blue-400 text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="">اختر التخصص...</option>
                            <option value="نساء وولادة">نساء وولادة</option>
                            <option value="طب الأجنة">طب الأجنة</option>
                            <option value="طب الأطفال">طب الأطفال</option>
                            <option value="الرضاعة الطبيعية">الرضاعة الطبيعية</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">اسم العيادة</label>
                        <input type="text" name="clinic_name" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="اسم العيادة أو المستشفى...">
                    </div>
                </div>

                <div>
                    <label class="block text-blue-400 text-sm font-semibold mb-2">عنوان العيادة</label>
                    <textarea name="clinic_address" rows="3" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="العنوان الكامل للعيادة..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">أجرة الاستشارة</label>
                        <input type="text" name="consultation_fees" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="مثال: 300 ريال">
                    </div>
                    <div>
                        <label class="block text-blue-400 text-sm font-semibold mb-2">سنوات الخبرة</label>
                        <input type="number" name="years_of_experience" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="عدد سنوات الخبرة...">
                    </div>
                </div>

                <div>
                    <label class="block text-blue-400 text-sm font-semibold mb-2">أرقام الهاتف</label>
                    <div id="phoneNumbers">
                        <input type="text" name="phone_numbers[]" class="w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="رقم الهاتف...">
                    </div>
                    <button type="button" onclick="addPhoneField()" class="mt-2 text-blue-400 hover:text-blue-300 text-sm">+ إضافة رقم آخر</button>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-2 px-4 rounded-lg hover:from-blue-600 hover:to-indigo-700 font-semibold transition-all duration-300">
                        ✅ إضافة الطبيب
                    </button>
                    <button type="button" onclick="closeAddDoctorModal()" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white py-2 px-4 rounded-lg hover:from-gray-700 hover:to-gray-800 font-semibold transition-all duration-300">
                        ❌ إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- مودال إضافة تذكير موعد -->
    <div id="reminderModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" onclick="closeOnBackdrop(event, ['reminderModal'])">
        <div class="bg-gray-800 rounded-xl p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto mx-4" onclick="event.stopPropagation();" style="background-color: #2a2a2a;">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">📅 إضافة تذكير موعد</h3>
                <button onclick="closeReminderModal()" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>
            
            <form class="space-y-4">
                <input type="hidden" name="doctor_id" id="reminderDoctorId">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-purple-400 text-sm font-semibold mb-2">اسم المريضة</label>
                        <input type="text" name="patient_name" class="w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="اسم المريضة...">
                    </div>
                    <div>
                        <label class="block text-purple-400 text-sm font-semibold mb-2">رقم الهاتف</label>
                        <input type="text" name="patient_phone" class="w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="رقم الهاتف...">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-purple-400 text-sm font-semibold mb-2">تاريخ الموعد</label>
                        <input type="date" name="checkup_date" class="w-full rounded-lg border-2 border-purple-400 text-white focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                    </div>
                    <div>
                        <label class="block text-purple-400 text-sm font-semibold mb-2">وقت الموعد</label>
                        <input type="time" name="checkup_time" class="w-full rounded-lg border-2 border-purple-400 text-white focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                    </div>
                </div>

                <div>
                    <label class="block text-purple-400 text-sm font-semibold mb-2">نوع الفحص</label>
                    <select name="checkup_type" class="w-full rounded-lg border-2 border-purple-400 text-white focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;">
                        <option value="">اختر نوع الفحص...</option>
                        <option value="فحص دوري">فحص دوري</option>
                        <option value="فحص الحمل">فحص الحمل</option>
                        <option value="سونار">سونار</option>
                        <option value="تحاليل">تحاليل</option>
                        <option value="متابعة">متابعة</option>
                    </select>
                </div>

                <div>
                    <label class="block text-purple-400 text-sm font-semibold mb-2">ملاحظات</label>
                    <textarea name="notes" rows="3" class="w-full rounded-lg border-2 border-purple-400 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="ملاحظات إضافية..."></textarea>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-purple-500 to-purple-600 text-white py-2 px-4 rounded-lg hover:from-purple-600 hover:to-purple-700 font-semibold transition-all duration-300">
                        ✅ إضافة التذكير
                    </button>
                    <button type="button" onclick="closeReminderModal()" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white py-2 px-4 rounded-lg hover:from-gray-700 hover:to-gray-800 font-semibold transition-all duration-300">
                        ❌ إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- مودال إضافة تنبيه ولادة -->
    <div id="deliveryAlertModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" onclick="closeOnBackdrop(event, ['deliveryAlertModal'])">
        <div class="bg-gray-800 rounded-xl p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto mx-4" onclick="event.stopPropagation();" style="background-color: #2a2a2a;">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">🚨 إضافة تنبيه ولادة</h3>
                <button onclick="closeDeliveryAlertModal()" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>
            
            <form class="space-y-4">
                <input type="hidden" name="doctor_id" id="deliveryDoctorId">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-pink-400 text-sm font-semibold mb-2">اسم المريضة</label>
                        <input type="text" name="patient_name" class="w-full rounded-lg border-2 border-pink-400 text-white placeholder-gray-400 focus:border-pink-500 focus:ring-pink-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="اسم المريضة...">
                    </div>
                    <div>
                        <label class="block text-pink-400 text-sm font-semibold mb-2">رقم الهاتف</label>
                        <input type="text" name="patient_phone" class="w-full rounded-lg border-2 border-pink-400 text-white placeholder-gray-400 focus:border-pink-500 focus:ring-pink-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="رقم الهاتف...">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-pink-400 text-sm font-semibold mb-2">تاريخ الولادة المتوقع</label>
                        <input type="date" name="delivery_date" class="w-full rounded-lg border-2 border-pink-400 text-white focus:border-pink-500 focus:ring-pink-500 shadow-sm" style="background-color: #1a1a1a;">
                    </div>
                    <div>
                        <label class="block text-pink-400 text-sm font-semibold mb-2">التنبيه قبل (أيام)</label>
                        <select name="alert_before_days" class="w-full rounded-lg border-2 border-pink-400 text-white focus:border-pink-500 focus:ring-pink-500 shadow-sm" style="background-color: #1a1a1a;">
                            <option value="1">يوم واحد</option>
                            <option value="3">3 أيام</option>
                            <option value="7" selected>أسبوع</option>
                            <option value="14">أسبوعين</option>
                            <option value="30">شهر</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-pink-400 text-sm font-semibold mb-2">اسم المستشفى</label>
                        <input type="text" name="hospital_name" class="w-full rounded-lg border-2 border-pink-400 text-white placeholder-gray-400 focus:border-pink-500 focus:ring-pink-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="اسم المستشفى...">
                    </div>
                    <div>
                        <label class="block text-pink-400 text-sm font-semibold mb-2">رقم المستشفى</label>
                        <input type="text" name="hospital_phone" class="w-full rounded-lg border-2 border-pink-400 text-white placeholder-gray-400 focus:border-pink-500 focus:ring-pink-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="رقم المستشفى...">
                    </div>
                </div>

                <div>
                    <label class="block text-pink-400 text-sm font-semibold mb-2">عنوان المستشفى</label>
                    <textarea name="hospital_address" rows="2" class="w-full rounded-lg border-2 border-pink-400 text-white placeholder-gray-400 focus:border-pink-500 focus:ring-pink-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="عنوان المستشفى..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-pink-400 text-sm font-semibold mb-2">اسم جهة الاتصال الطارئ</label>
                        <input type="text" name="emergency_contact_name" class="w-full rounded-lg border-2 border-pink-400 text-white placeholder-gray-400 focus:border-pink-500 focus:ring-pink-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="اسم جهة الاتصال...">
                    </div>
                    <div>
                        <label class="block text-pink-400 text-sm font-semibold mb-2">رقم الاتصال الطارئ</label>
                        <input type="text" name="emergency_contact_phone" class="w-full rounded-lg border-2 border-pink-400 text-white placeholder-gray-400 focus:border-pink-500 focus:ring-pink-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="رقم الاتصال الطارئ...">
                    </div>
                </div>

                <div>
                    <label class="block text-pink-400 text-sm font-semibold mb-2">ملاحظات خاصة</label>
                    <textarea name="special_notes" rows="3" class="w-full rounded-lg border-2 border-pink-400 text-white placeholder-gray-400 focus:border-pink-500 focus:ring-pink-500 shadow-sm" style="background-color: #1a1a1a;" placeholder="ملاحظات خاصة..."></textarea>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-pink-500 to-pink-600 text-white py-2 px-4 rounded-lg hover:from-pink-600 hover:to-pink-700 font-semibold transition-all duration-300">
                        ✅ إضافة التنبيه
                    </button>
                    <button type="button" onclick="closeDeliveryAlertModal()" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white py-2 px-4 rounded-lg hover:from-gray-700 hover:to-gray-800 font-semibold transition-all duration-300">
                        ❌ إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // دوال المودالات
        function openAddDoctorModal() {
            document.getElementById('addDoctorModal').classList.remove('hidden');
        }

        function closeAddDoctorModal() {
            document.getElementById('addDoctorModal').classList.add('hidden');
        }

        function openReminderModal(doctorId) {
            document.getElementById('reminderDoctorId').value = doctorId;
            document.getElementById('reminderModal').classList.remove('hidden');
        }

        function closeReminderModal() {
            document.getElementById('reminderModal').classList.add('hidden');
        }

        function openDeliveryAlertModal(doctorId) {
            document.getElementById('deliveryDoctorId').value = doctorId;
            document.getElementById('deliveryAlertModal').classList.remove('hidden');
        }

        function closeDeliveryAlertModal() {
            document.getElementById('deliveryAlertModal').classList.add('hidden');
        }

        // دالة إضافة رقم هاتف
        function addPhoneField() {
            const container = document.getElementById('phoneNumbers');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'phone_numbers[]';
            input.className = 'w-full rounded-lg border-2 border-blue-400 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 shadow-sm text-sm py-2 px-3 mt-2';
            input.style.backgroundColor = '#1a1a1a';
            input.placeholder = 'رقم هاتف آخر...';
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
        .doctor-follow-up-main {
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
