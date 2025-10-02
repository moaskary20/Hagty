<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حجز تذكرة - {{ $event->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 to-pink-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/hagty-logo.png') }}" alt="HAGTY Logo" class="h-12">
                    </a>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="{{ route('eventaty.show', $event->id) }}" class="text-gray-700 hover:text-purple-600 px-3 py-2">
                        <i class="fas fa-arrow-right ml-2"></i>
                        العودة للفعالية
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 text-white p-8">
                    <h1 class="text-3xl font-bold mb-2">🎫 حجز تذكرة</h1>
                    <p class="text-purple-100">{{ $event->title }}</p>
                </div>

                @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
                @endif

                @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="p-8">
                    <!-- Event Summary -->
                    <div class="bg-purple-50 rounded-lg p-6 mb-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <div class="text-sm text-gray-600 mb-1">📅 التاريخ</div>
                                <div class="font-bold">{{ \Carbon\Carbon::parse($event->event_date)->format('Y/m/d - H:i') }}</div>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600 mb-1">📍 الموقع</div>
                                <div class="font-bold">{{ $event->location ?? 'سيتم الإعلان عنه' }}</div>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600 mb-1">💵 السعر</div>
                                <div class="font-bold text-purple-600">{{ $event->price ? number_format($event->price) . ' جنيه' : 'مجاناً' }}</div>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600 mb-1">🎫 المقاعد المتاحة</div>
                                <div class="font-bold text-green-600">{{ $event->availableSeats() ?? 'غير محدود' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Form -->
                    <form action="{{ route('eventaty.booking.store', $event->id) }}" method="POST">
                        @csrf

                        <div class="space-y-6">
                            <div>
                                <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    الاسم الكامل <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="customer_name" 
                                       id="customer_name"
                                       value="{{ old('customer_name') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                       placeholder="أدخل اسمك الكامل">
                            </div>

                            <div>
                                <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-2">
                                    البريد الإلكتروني <span class="text-red-500">*</span>
                                </label>
                                <input type="email" 
                                       name="customer_email" 
                                       id="customer_email"
                                       value="{{ old('customer_email') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                       placeholder="example@email.com">
                            </div>

                            <div>
                                <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    رقم الهاتف <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" 
                                       name="customer_phone" 
                                       id="customer_phone"
                                       value="{{ old('customer_phone') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                       placeholder="+20 1XX XXX XXXX">
                            </div>

                            <div>
                                <label for="number_of_tickets" class="block text-sm font-medium text-gray-700 mb-2">
                                    عدد التذاكر <span class="text-red-500">*</span>
                                </label>
                                <input type="number" 
                                       name="number_of_tickets" 
                                       id="number_of_tickets"
                                       value="{{ old('number_of_tickets', 1) }}"
                                       min="1"
                                       max="{{ $event->availableSeats() ?? 10 }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                       onchange="calculateTotal()">
                                @if($event->max_attendees)
                                <p class="text-sm text-gray-500 mt-1">الحد الأقصى: {{ $event->availableSeats() }} تذكرة</p>
                                @endif
                            </div>

                            <div>
                                <label for="special_requests" class="block text-sm font-medium text-gray-700 mb-2">
                                    طلبات خاصة (اختياري)
                                </label>
                                <textarea name="special_requests" 
                                          id="special_requests"
                                          rows="4"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                          placeholder="أي طلبات أو ملاحظات خاصة...">{{ old('special_requests') }}</textarea>
                            </div>

                            <!-- Total Amount -->
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex justify-between items-center text-lg">
                                    <span class="font-medium text-gray-700">المبلغ الإجمالي:</span>
                                    <span class="text-3xl font-bold text-purple-600" id="total_amount">
                                        {{ $event->price ? number_format($event->price) : '0' }} جنيه
                                    </span>
                                </div>
                            </div>

                            <!-- Terms -->
                            @if($event->terms_conditions)
                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                <h3 class="font-bold text-gray-900 mb-2">📋 الشروط والأحكام</h3>
                                <p class="text-sm text-gray-700">{{ $event->terms_conditions }}</p>
                            </div>
                            @endif

                            <div class="flex items-start">
                                <input type="checkbox" 
                                       id="agree_terms" 
                                       required
                                       class="mt-1 ml-2">
                                <label for="agree_terms" class="text-sm text-gray-700">
                                    أوافق على الشروط والأحكام وسياسة الاسترجاع <span class="text-red-500">*</span>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-4 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-all text-lg font-bold">
                                <i class="fas fa-check-circle ml-2"></i>
                                تأكيد الحجز
                            </button>

                            <p class="text-center text-sm text-gray-500">
                                <i class="fas fa-shield-alt ml-1"></i>
                                معلوماتك محمية ومشفرة بالكامل
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function calculateTotal() {
            const ticketPrice = {{ $event->price ?? 0 }};
            const numberOfTickets = document.getElementById('number_of_tickets').value || 1;
            const total = ticketPrice * numberOfTickets;
            document.getElementById('total_amount').textContent = total.toLocaleString('ar-EG') + ' جنيه';
        }
    </script>
</body>
</html>

