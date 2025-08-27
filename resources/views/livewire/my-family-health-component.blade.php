<div class="min-h-screen bg-gradient-to-br from-pink-50 to-purple-50 p-6" dir="rtl">
    {{-- Header --}}
    <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-lg p-6 mb-8">
        <h1 class="text-3xl font-bold">كتاب صحة العائلة</h1>
        <p class="mt-2 text-pink-100">سجل صحي شامل لجميع أفراد العائلة مع معلومات الأطباء والأدوية</p>
    </div>

    {{-- Success/Error Messages --}}
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- Add New Record Button --}}
    <div class="mb-6">
        <button wire:click="openHealthRecordModal"
                class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            إضافة سجل صحي جديد
        </button>
    </div>

    {{-- Health Records Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($healthRecords as $record)
            <div class="rounded-lg shadow-lg p-6 border-l-4 border-pink-500" style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.1) 0%, rgba(236, 109, 169, 0.2) 100%);">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ $record->member_name }}</h3>
                        <p class="text-pink-600 font-medium">{{ $record->relationship }}</p>
                    </div>
                    <span class="bg-pink-100 text-pink-800 text-xs px-2 py-1 rounded">
                        {{ $record->blood_type ?? 'غير محدد' }}
                    </span>
                </div>

                <div class="space-y-2 text-sm text-gray-600">
                    @if($record->birth_date)
                        <p><strong>تاريخ الميلاد:</strong> {{ $record->birth_date->format('Y-m-d') }}</p>
                    @endif

                    @if($record->family_doctor)
                        <p><strong>طبيب العائلة:</strong> {{ $record->family_doctor }}</p>
                    @endif

                    @if($record->doctor_phone)
                        <p><strong>هاتف الطبيب:</strong> {{ $record->doctor_phone }}</p>
                    @endif

                    @if($record->chronic_diseases)
                        <p><strong>أمراض مزمنة:</strong> {{ Str::limit($record->chronic_diseases, 50) }}</p>
                    @endif

                    @if($record->current_medications)
                        <p><strong>الأدوية الحالية:</strong> {{ Str::limit($record->current_medications, 50) }}</p>
                    @endif
                </div>

                <div class="mt-4 flex gap-2">
                    <button wire:click="editHealthRecord({{ $record->id }})"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                        تعديل
                    </button>
                    <button wire:click="deleteHealthRecord({{ $record->id }})"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                        حذف
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p class="mt-2 text-gray-500">لا توجد سجلات صحية مضافة بعد</p>
            </div>
        @endforelse
    </div>

    ---

    ## Health Record Modal

    @if ($showHealthRecordModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 p-4">
            {{-- Modal content container --}}
            <div class="rounded-lg shadow-xl w-full max-w-md bg-white flex flex-col h-full max-h-[calc(100vh-2rem)]"
                 style="background: linear-gradient(135deg, rgba(236, 109, 169, 0.15) 0%, rgba(236, 109, 169, 0.25) 100%); backdrop-filter: blur(15px);">

                {{-- Modal Header --}}
                <div class="px-6 py-4 flex-shrink-0" style="border-bottom: 1px solid rgba(236, 109, 169, 0.3);">
                    <h3 class="text-lg font-medium" style="color: #ec6da9;">إضافة سجل صحي جديد</h3>
                </div>

                {{-- Modal Body (Scrollable Content) --}}
                <div class="px-6 py-4 flex-grow overflow-y-auto">
                    <div class="space-y-4">
                        {{-- Basic Info --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">اسم فرد العائلة</label>
                                <input type="text" wire:model="healthRecordForm.member_name"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">صلة القرابة</label>
                                <select wire:model="healthRecordForm.relationship"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                    <option value="">اختر صلة القرابة</option>
                                    <option value="الأب">الأب</option>
                                    <option value="الأم">الأم</option>
                                    <option value="الابن">الابن</option>
                                    <option value="الابنة">الابنة</option>
                                    <option value="الجد">الجد</option>
                                    <option value="الجدة">الجدة</option>
                                    <option value="العم">العم</option>
                                    <option value="العمة">العمة</option>
                                    <option value="الخال">الخال</option>
                                    <option value="الخالة">الخالة</option>
                                    <option value="أخرى">أخرى</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">تاريخ الميلاد</label>
                                <input type="date" wire:model="healthRecordForm.birth_date"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">فصيلة الدم</label>
                                <select wire:model="healthRecordForm.blood_type"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                                    <option value="">غير محدد</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">الطول (سم)</label>
                                <input type="number" step="0.1" wire:model="healthRecordForm.height"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>

                        {{-- Medical Info --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الأمراض المزمنة</label>
                            <textarea wire:model="healthRecordForm.chronic_diseases" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                                      placeholder="أذكر أي أمراض مزمنة مثل السكري، الضغط، القلب، إلخ..."></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الحساسية</label>
                            <textarea wire:model="healthRecordForm.allergies" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                                      placeholder="حساسية من أطعمة، أدوية، أو مواد معينة..."></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">الأدوية الحالية</label>
                            <textarea wire:model="healthRecordForm.current_medications" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                                      placeholder="قائمة بالأدوية التي يتناولها حالياً مع الجرعات..."></textarea>
                        </div>

                        {{-- Doctor Info --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">طبيب العائلة</label>
                                <input type="text" wire:model="healthRecordForm.family_doctor"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                                       placeholder="د. محمد أحمد">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">هاتف الطبيب</label>
                                <input type="tel" wire:model="healthRecordForm.doctor_phone"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>

                        {{-- Insurance Info --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">شركة التأمين</label>
                                <input type="text" wire:model="healthRecordForm.insurance_company"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">رقم التأمين</label>
                                <input type="text" wire:model="healthRecordForm.insurance_number"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ملاحظات طارئة</label>
                            <textarea wire:model="healthRecordForm.emergency_notes" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                                      placeholder="معلومات هامة في حالات الطوارئ..."></textarea>
                        </div>
                    </div>
                </div>

                {{-- Modal Footer --}}
                <div class="px-6 py-4 flex-shrink-0 border-t flex justify-end space-x-2 rtl:space-x-reverse" style="border-color: rgba(236, 109, 169, 0.2); background: rgba(236, 109, 169, 0.1);">
                    <button wire:click="closeHealthRecordModal"
                            class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-200" style="background: rgba(255, 255, 255, 0.7);">
                        إلغاء
                    </button>
                    <button wire:click="saveHealthRecord"
                            class="px-4 py-2 text-white rounded-md hover:opacity-90" style="background: #ec6da9;">
                        حفظ السجل الصحي
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>