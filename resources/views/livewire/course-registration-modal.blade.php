<div>

    
    <!-- Modal Overlay -->
    @if($showModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4" wire:click="closeModal">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto" wire:click.stop>
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-bold">تسجيل في الكورس</h3>
                        <p class="text-pink-100 mt-1">{{ $courseName }}</p>
                    </div>
                    <button wire:click="closeModal" class="text-white hover:text-pink-200 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                @if (session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form wire:submit.prevent="register">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- الاسم الأول -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">الاسم الأول *</label>
                            <input type="text" wire:model="first_name" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                                   placeholder="أدخلي اسمك الأول">
                            @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- الاسم الأخير -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">الاسم الأخير *</label>
                            <input type="text" wire:model="last_name" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                                   placeholder="أدخلي اسمك الأخير">
                            @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- البريد الإلكتروني -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني *</label>
                            <input type="email" wire:model="email" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                                   placeholder="أدخلي بريدك الإلكتروني">
                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- رقم الهاتف -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف *</label>
                            <input type="tel" wire:model="phone" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                                   placeholder="أدخلي رقم هاتفك">
                            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- العمر -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">العمر *</label>
                            <input type="number" wire:model="age" min="16" max="100"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                                   placeholder="أدخلي عمرك">
                            @error('age') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- المدينة -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">المدينة *</label>
                            <input type="text" wire:model="city" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                                   placeholder="أدخلي مدينتك">
                            @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- المستوى التعليمي -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">المستوى التعليمي *</label>
                            <select wire:model="education_level" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                                <option value="">اختر المستوى التعليمي</option>
                                <option value="ثانوية عامة">ثانوية عامة</option>
                                <option value="دبلوم">دبلوم</option>
                                <option value="بكالوريوس">بكالوريوس</option>
                                <option value="ماجستير">ماجستير</option>
                                <option value="دكتوراه">دكتوراه</option>
                                <option value="أخرى">أخرى</option>
                            </select>
                            @error('education_level') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- مستوى الخبرة -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">مستوى الخبرة *</label>
                            <select wire:model="experience_level" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                                <option value="">اختر مستوى الخبرة</option>
                                <option value="مبتدئة">مبتدئة</option>
                                <option value="متوسطة">متوسطة</option>
                                <option value="متقدمة">متقدمة</option>
                                <option value="محترفة">محترفة</option>
                            </select>
                            @error('experience_level') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- الأهداف -->
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">أهدافك من الكورس *</label>
                        <textarea wire:model="goals" rows="4" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                                  placeholder="أخبرينا عن أهدافك من هذا الكورس وما تريدين تحقيقه..."></textarea>
                        @error('goals') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex justify-end space-x-3 space-x-reverse mt-6 pt-6 border-t border-gray-200">
                        <button type="button" wire:click="closeModal" 
                                class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            إلغاء
                        </button>
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-lg hover:from-purple-600 hover:to-pink-500 transition-all duration-300">
                            <i class="fas fa-check ml-2"></i>تأكيد التسجيل
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
