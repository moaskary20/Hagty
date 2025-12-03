<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حساباتى - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/hesabaty-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hesabaty-animations.css') }}">
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] min-h-screen">
    @include('components.shared-header')

    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">💰 حساباتى</h1>
            <p class="text-xl md:text-2xl animate-fadeInUp" style="animation-delay: 0.2s;">إدارة ذكية لأموالك وميزانيتك</p>
        </div>
    </section>

    @auth
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Financial Summary -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 text-white rounded-lg shadow-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">إجمالي الدخل</h3>
                        <i class="fas fa-arrow-up text-3xl"></i>
                    </div>
                    <p class="text-4xl font-bold">{{ number_format($totalIncome) }} جنيه</p>
                </div>
                
                <div class="bg-gradient-to-br from-red-500 to-rose-600 text-white rounded-lg shadow-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">إجمالي المصروفات</h3>
                        <i class="fas fa-arrow-down text-3xl"></i>
                    </div>
                    <p class="text-4xl font-bold">{{ number_format($totalExpenses) }} جنيه</p>
                </div>
                
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-lg shadow-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">الرصيد المتبقي</h3>
                        <i class="fas fa-wallet text-3xl"></i>
                    </div>
                    <p class="text-4xl font-bold">{{ number_format($balance) }} جنيه</p>
                </div>
            </div>

            <!-- Quick Action Buttons -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <button onclick="openIncomeModal()" class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-4 rounded-lg hover:shadow-xl transition-all">
                    <i class="fas fa-plus-circle text-2xl mb-2"></i>
                    <p class="font-bold">إضافة دخل</p>
                </button>
                <button onclick="openExpenseModal()" class="bg-gradient-to-r from-red-500 to-rose-600 text-white p-4 rounded-lg hover:shadow-xl transition-all">
                    <i class="fas fa-minus-circle text-2xl mb-2"></i>
                    <p class="font-bold">إضافة مصروف</p>
                </button>
                <button onclick="openGoalModal()" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-4 rounded-lg hover:shadow-xl transition-all">
                    <i class="fas fa-bullseye text-2xl mb-2"></i>
                    <p class="font-bold">هدف ادخار</p>
                </button>
                <button onclick="openBillModal()" class="bg-gradient-to-r from-yellow-500 to-orange-600 text-white p-4 rounded-lg hover:shadow-xl transition-all">
                    <i class="fas fa-file-invoice text-2xl mb-2"></i>
                    <p class="font-bold">تذكير فاتورة</p>
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Expenses -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-list ml-2 text-red-600"></i>
                        آخر المصروفات
                    </h2>
                    @if($recentExpenses->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentExpenses as $expense)
                        <div class="flex justify-between items-center border-b pb-3">
                            <div>
                                <p class="font-semibold">{{ $expense->description }}</p>
                                <p class="text-sm text-gray-500">{{ $expense->category }} - {{ $expense->expense_date->format('Y/m/d') }}</p>
                            </div>
                            <p class="text-red-600 font-bold">{{ number_format($expense->amount) }} جنيه</p>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-500 text-center py-8">لا توجد مصروفات مسجلة</p>
                    @endif
                </div>

                <!-- Savings Goals -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-piggy-bank ml-2 text-green-600"></i>
                        أهداف الادخار
                    </h2>
                    @if($savingsGoals->count() > 0)
                    <div class="space-y-6">
                        @foreach($savingsGoals as $goal)
                        <div>
                            <div class="flex justify-between mb-2">
                                <p class="font-semibold">{{ $goal->goal_name }}</p>
                                <p class="text-sm text-gray-600">{{ number_format($goal->current_amount) }} / {{ number_format($goal->target_amount) }}</p>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-3 rounded-full" style="width: {{ min($goal->progress(), 100) }}%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">{{ number_format($goal->progress(), 1) }}% مكتمل</p>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-500 text-center py-8">لا توجد أهداف ادخار</p>
                    @endif
                </div>
            </div>

            <!-- Upcoming Bills -->
            @if($upcomingBills->count() > 0)
            <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
                <h2 class="text-2xl font-bold mb-6 flex items-center">
                    <i class="fas fa-bell ml-2 text-yellow-600"></i>
                    الفواتير القادمة
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($upcomingBills as $bill)
                    <div class="border-2 border-yellow-200 rounded-lg p-4 bg-yellow-50">
                        <h3 class="font-bold text-lg mb-2">{{ $bill->bill_name }}</h3>
                        <p class="text-2xl font-bold text-yellow-600 mb-2">{{ number_format($bill->amount) }} جنيه</p>
                        <p class="text-sm text-gray-600">موعد الدفع: {{ $bill->due_date->format('Y/m/d') }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Expenses Chart -->
            @if($expensesByCategory->count() > 0)
            <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
                <h2 class="text-2xl font-bold mb-6 flex items-center">
                    <i class="fas fa-chart-pie ml-2" style="color: #d94288"></i>
                    توزيع المصروفات
                </h2>
                <canvas id="expensesChart" height="100"></canvas>
            </div>
            @endif
        </div>
    </section>
    @else
    <section class="py-16">
        <div class="max-w-2xl mx-auto px-4 text-center">
            <div class="bg-white rounded-lg shadow-xl p-12">
                <i class="fas fa-lock text-6xl text-gray-400 mb-6"></i>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">سجل دخول لعرض حساباتك</h2>
                <p class="text-gray-600 mb-8">قم بتسجيل الدخول لإدارة دخلك ومصروفاتك وأهدافك المالية</p>
                <a href="{{ route('login') }}" class="inline-block bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-4 rounded-lg hover:from-green-700 hover:to-emerald-700 transition-all text-lg font-bold">
                    <i class="fas fa-sign-in-alt ml-2"></i>
                    تسجيل الدخول
                </a>
            </div>
        </div>
    </section>
    @endauth

    <!-- Income Modal -->
    <div id="incomeModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full">
            <div class="bg-gradient-to-r from-green-600 to-emerald-600 text-white p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold"><i class="fas fa-plus-circle ml-2"></i>إضافة دخل جديد</h3>
                    <button onclick="closeModal('incomeModal')" class="text-white text-3xl">×</button>
                </div>
            </div>
            <form action="{{ route('hesabaty.income.store') }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">مصدر الدخل *</label>
                        <input type="text" name="source" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500" placeholder="مثال: راتب شهري">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">المبلغ (جنيه) *</label>
                        <input type="number" name="amount" required min="0" step="0.01" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">التصنيف</label>
                        <select name="category" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
                            <option value="راتب">راتب</option>
                            <option value="أعمال حرة">أعمال حرة</option>
                            <option value="استثمار">استثمار</option>
                            <option value="مكافأة">مكافأة</option>
                            <option value="أخرى">أخرى</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">التاريخ</label>
                        <input type="date" name="income_date" value="{{ date('Y-m-d') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="is_recurring" id="is_recurring" class="w-5 h-5 text-green-600">
                        <label for="is_recurring" class="mr-2 text-gray-700">دخل متكرر (شهري)</label>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">ملاحظات</label>
                        <textarea name="notes" rows="2" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500"></textarea>
                    </div>
                </div>
                <div class="flex gap-4 mt-6">
                    <button type="submit" class="flex-1 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 font-bold">
                        <i class="fas fa-save ml-2"></i>حفظ
                    </button>
                    <button type="button" onclick="closeModal('incomeModal')" class="px-6 py-3 border-2 border-gray-300 rounded-lg hover:bg-gray-100">إلغاء</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Expense Modal -->
    <div id="expenseModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full">
            <div class="bg-gradient-to-r from-red-600 to-rose-600 text-white p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold"><i class="fas fa-minus-circle ml-2"></i>إضافة مصروف جديد</h3>
                    <button onclick="closeModal('expenseModal')" class="text-white text-3xl">×</button>
                </div>
            </div>
            <form action="{{ route('hesabaty.expense.store') }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">وصف المصروف *</label>
                        <input type="text" name="description" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-500" placeholder="مثال: فاتورة الكهرباء">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">المبلغ (جنيه) *</label>
                        <input type="number" name="amount" required min="0" step="0.01" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">التصنيف *</label>
                        <select name="category" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-500">
                            <option value="طعام وشراب">طعام وشراب</option>
                            <option value="مواصلات">مواصلات</option>
                            <option value="فواتير">فواتير</option>
                            <option value="تسوق">تسوق</option>
                            <option value="ترفيه">ترفيه</option>
                            <option value="صحة">صحة</option>
                            <option value="تعليم">تعليم</option>
                            <option value="منزل">منزل</option>
                            <option value="اشتراكات">اشتراكات</option>
                            <option value="أخرى">أخرى</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">طريقة الدفع</label>
                        <select name="payment_method" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-500">
                            <option value="نقدي">نقدي</option>
                            <option value="بطاقة">بطاقة ائتمان</option>
                            <option value="تحويل بنكي">تحويل بنكي</option>
                            <option value="محفظة إلكترونية">محفظة إلكترونية</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">التاريخ</label>
                        <input type="date" name="expense_date" value="{{ date('Y-m-d') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-500">
                    </div>
                </div>
                <div class="flex gap-4 mt-6">
                    <button type="submit" class="flex-1 bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 font-bold">
                        <i class="fas fa-save ml-2"></i>حفظ
                    </button>
                    <button type="button" onclick="closeModal('expenseModal')" class="px-6 py-3 border-2 border-gray-300 rounded-lg hover:bg-gray-100">إلغاء</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Goal Modal -->
    <div id="goalModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold"><i class="fas fa-bullseye ml-2"></i>هدف ادخار جديد</h3>
                    <button onclick="closeModal('goalModal')" class="text-white text-3xl">×</button>
                </div>
            </div>
            <form action="{{ route('hesabaty.goal.store') }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">اسم الهدف *</label>
                        <input type="text" name="goal_name" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="مثال: شراء ذهب">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">المبلغ المستهدف (جنيه) *</label>
                        <input type="number" name="target_amount" required min="0" step="0.01" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">المبلغ الحالي (جنيه)</label>
                        <input type="number" name="current_amount" value="0" min="0" step="0.01" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">الموعد المستهدف</label>
                        <input type="date" name="deadline" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div class="flex gap-4 mt-6">
                    <button type="submit" class="flex-1 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 font-bold">
                        <i class="fas fa-save ml-2"></i>حفظ
                    </button>
                    <button type="button" onclick="closeModal('goalModal')" class="px-6 py-3 border-2 border-gray-300 rounded-lg hover:bg-gray-100">إلغاء</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bill Reminder Modal -->
    <div id="billModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full">
            <div class="bg-gradient-to-r from-yellow-600 to-orange-600 text-white p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold"><i class="fas fa-file-invoice ml-2"></i>تذكير فاتورة جديد</h3>
                    <button onclick="closeModal('billModal')" class="text-white text-3xl">×</button>
                </div>
            </div>
            <form action="{{ route('hesabaty.bill.store') }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">اسم الفاتورة *</label>
                        <input type="text" name="bill_name" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="مثال: فاتورة الكهرباء">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">المبلغ (جنيه) *</label>
                        <input type="number" name="amount" required min="0" step="0.01" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">التصنيف</label>
                        <select name="category" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500">
                            <option value="فواتير">فواتير</option>
                            <option value="أقساط">أقساط</option>
                            <option value="اشتراكات">اشتراكات</option>
                            <option value="إيجار">إيجار</option>
                            <option value="أخرى">أخرى</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">موعد الاستحقاق *</label>
                        <input type="date" name="due_date" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="is_recurring" id="is_recurring_bill" class="w-5 h-5 text-yellow-600">
                        <label for="is_recurring_bill" class="mr-2 text-gray-700">تذكير متكرر (شهرياً)</label>
                    </div>
                </div>
                <div class="flex gap-4 mt-6">
                    <button type="submit" class="flex-1 bg-yellow-600 text-white px-6 py-3 rounded-lg hover:bg-yellow-700 font-bold">
                        <i class="fas fa-save ml-2"></i>حفظ
                    </button>
                    <button type="button" onclick="closeModal('billModal')" class="px-6 py-3 border-2 border-gray-300 rounded-lg hover:bg-gray-100">إلغاء</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Message -->
    <div id="successMessage" class="hidden fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-8 py-4 rounded-lg shadow-lg z-50">
        <i class="fas fa-check-circle ml-2"></i>
        <span id="successText">تم الحفظ بنجاح!</span>
    </div>

    <script>
        function openIncomeModal() {
            document.getElementById('incomeModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function openExpenseModal() {
            document.getElementById('expenseModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function openGoalModal() {
            document.getElementById('goalModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function openBillModal() {
            document.getElementById('billModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function showSuccess(message = 'تم الحفظ بنجاح!') {
            document.getElementById('successText').textContent = message;
            const msg = document.getElementById('successMessage');
            msg.classList.remove('hidden');
            setTimeout(() => {
                msg.classList.add('hidden');
                location.reload();
            }, 2000);
        }

        @if(session('success'))
            showSuccess('{{ session('success') }}');
        @endif
    </script>

    @auth
    <script>
    const ctx = document.getElementById('expensesChart');
    if(ctx) {
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($expensesByCategory->pluck('category')) !!},
                datasets: [{
                    data: {!! json_encode($expensesByCategory->pluck('total')) !!},
                    backgroundColor: ['#10b981', '#3b82f6', '#f59e0b', '#ef4444', '#8b5cf6', '#ec4899']
                }]
            },
            options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
        });
    }
    </script>
    @endauth

    @include('components.shared-footer')

    <!-- Hesabaty Interactions JavaScript -->
    <script src="{{ asset('js/hesabaty-interactions.js') }}"></script>
</body>
</html>
