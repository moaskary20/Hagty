<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- بطاقة المستخدمين -->
        <x-filament::card>
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold" style="color: #fce7f3;">
                        المستخدمون
                    </h3>
                    <p class="text-sm" style="color: #f9a8d4;">
                        إجمالي المستخدمين المسجلين
                    </p>
                    <p class="text-2xl font-bold text-primary-600 mt-2" style="color: #eb6fab;">
                        {{ \App\Models\User::count() }}
                    </p>
                </div>
                <div class="text-primary-500" style="color: #eb6fab;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </x-filament::card>

        <!-- بطاقة المحتوى -->
        <x-filament::card>
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold" style="color: #fce7f3;">
                        المحتوى
                    </h3>
                    <p class="text-sm" style="color: #f9a8d4;">
                        إجمالي المحتوى المنشور
                    </p>
                    <p class="text-2xl font-bold mt-2" style="color: #eb6fab;">
                        0
                    </p>
                </div>
                <div style="color: #eb6fab;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
        </x-filament::card>

        <!-- بطاقة النشاط -->
        <x-filament::card>
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold" style="color: #fce7f3;">
                        النشاط اليومي
                    </h3>
                    <p class="text-sm" style="color: #f9a8d4;">
                        مستخدمين نشطين اليوم
                    </p>
                    <p class="text-2xl font-bold mt-2" style="color: #eb6fab;">
                        {{ \App\Models\User::whereDate('updated_at', today())->count() }}
                    </p>
                </div>
                <div style="color: #eb6fab;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
        </x-filament::card>
    </div>

    <div class="mt-8">
        <x-filament::card>
            <div class="text-center py-8">
                <h2 class="text-xl font-semibold mb-2" style="color: #fce7f3;">
                    مرحباً بك في منصة HAGTY
                </h2>
                <p class="mb-4" style="color: #f9a8d4;">
                    منصة شاملة ومتطورة لإدارة المحتوى والمستخدمين
                </p>
                <div class="flex justify-center space-x-4 space-x-reverse">
                    <a href="{{ \App\Filament\Resources\UserResource::getUrl() }}" 
                       class="inline-flex items-center px-4 py-2 rounded-lg transition-colors"
                       style="background-color: #eb6fab; color: #000000;">
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 4v16m8-8H4"></path>
                        </svg>
                        إضافة مستخدم جديد
                    </a>
                    <a href="{{ \App\Filament\Resources\UserResource::getUrl() }}" 
                       class="inline-flex items-center px-4 py-2 rounded-lg transition-colors"
                       style="background-color: transparent; color: #f9a8d4; border: 1px solid #f9a8d4;">
                        عرض جميع المستخدمين
                    </a>
                </div>
            </div>
        </x-filament::card>
    </div>
</x-filament-panels::page>
