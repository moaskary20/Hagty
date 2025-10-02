<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تم الحجز بنجاح - ايفينتاتى</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        
        @keyframes checkmark {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        .checkmark {
            animation: checkmark 0.8s ease-in-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 to-pink-50 min-h-screen">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/hagty-logo.png') }}" alt="HAGTY Logo" class="h-12">
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                <!-- Success Icon -->
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white py-12 text-center">
                    <div class="checkmark text-8xl mb-4">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h1 class="text-4xl font-bold mb-2">تم الحجز بنجاح!</h1>
                    <p class="text-green-100 text-lg">شكراً لحجزك معنا</p>
                </div>

                <div class="p-8">
                    <!-- Booking Reference -->
                    <div class="bg-purple-50 rounded-lg p-6 mb-8 text-center">
                        <div class="text-sm text-gray-600 mb-2">رقم الحجز المرجعي</div>
                        <div class="text-3xl font-bold text-purple-600 font-mono">{{ $booking->booking_reference }}</div>
                        <p class="text-sm text-gray-500 mt-2">احتفظ بهذا الرقم للرجوع إليه</p>
                    </div>

                    <!-- Booking Details -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">تفاصيل الحجز</h2>
                        
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                <span class="text-gray-600">الفعالية</span>
                                <span class="font-bold text-gray-900">{{ $booking->event->title }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                <span class="text-gray-600">التاريخ</span>
                                <span class="font-bold text-gray-900">{{ \Carbon\Carbon::parse($booking->event->event_date)->format('Y/m/d - H:i') }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                <span class="text-gray-600">الموقع</span>
                                <span class="font-bold text-gray-900">{{ $booking->event->location ?? 'سيتم الإعلان' }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                <span class="text-gray-600">اسم العميل</span>
                                <span class="font-bold text-gray-900">{{ $booking->customer_name }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                <span class="text-gray-600">البريد الإلكتروني</span>
                                <span class="font-bold text-gray-900">{{ $booking->customer_email }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                <span class="text-gray-600">رقم الهاتف</span>
                                <span class="font-bold text-gray-900">{{ $booking->customer_phone }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                <span class="text-gray-600">عدد التذاكر</span>
                                <span class="font-bold text-gray-900">{{ $booking->number_of_tickets }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center py-4 bg-purple-50 rounded-lg px-4 mt-4">
                                <span class="text-lg font-medium text-gray-700">المبلغ الإجمالي</span>
                                <span class="text-2xl font-bold text-purple-600">{{ number_format($booking->total_amount) }} جنيه</span>
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-8">
                        <div class="flex items-start">
                            <i class="fas fa-info-circle text-yellow-600 text-xl ml-3 mt-1"></i>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-2">حالة الحجز</h3>
                                <p class="text-sm text-gray-700">
                                    حجزك قيد الانتظار. سيتم إرسال تأكيد الحجز إلى بريدك الإلكتروني خلال 24 ساعة.
                                    يرجى التحقق من صندوق الوارد وصندوق الرسائل غير المرغوب فيها.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Info -->
                    @if($booking->total_amount > 0)
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-8">
                        <div class="flex items-start">
                            <i class="fas fa-credit-card text-blue-600 text-xl ml-3 mt-1"></i>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-2">معلومات الدفع</h3>
                                <p class="text-sm text-gray-700">
                                    حالة الدفع: <span class="font-bold text-yellow-600">قيد الانتظار</span><br>
                                    سيتم التواصل معك قريباً بخصوص طرق الدفع المتاحة.
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Actions -->
                    <div class="space-y-3">
                        <a href="{{ route('eventaty.index') }}" 
                           class="block w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white text-center px-6 py-4 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-all text-lg font-bold">
                            <i class="fas fa-calendar-alt ml-2"></i>
                            تصفح المزيد من الفعاليات
                        </a>
                        
                        <a href="{{ route('home') }}" 
                           class="block w-full bg-gray-200 text-gray-700 text-center px-6 py-4 rounded-lg hover:bg-gray-300 transition-all text-lg font-bold">
                            <i class="fas fa-home ml-2"></i>
                            العودة للصفحة الرئيسية
                        </a>
                        
                        <button onclick="window.print()" 
                                class="block w-full bg-white border-2 border-purple-600 text-purple-600 text-center px-6 py-4 rounded-lg hover:bg-purple-50 transition-all text-lg font-bold">
                            <i class="fas fa-print ml-2"></i>
                            طباعة تفاصيل الحجز
                        </button>
                    </div>

                    <!-- Social Share -->
                    <div class="mt-8 pt-8 border-t border-gray-200 text-center">
                        <p class="text-gray-600 mb-4">شارك الفعالية مع أصدقائك</p>
                        <div class="flex justify-center space-x-4 space-x-reverse">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('eventaty.show', $booking->event->id)) }}" 
                               target="_blank"
                               class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition-all">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($booking->event->title) }}&url={{ urlencode(route('eventaty.show', $booking->event->id)) }}" 
                               target="_blank"
                               class="bg-sky-500 text-white p-3 rounded-full hover:bg-sky-600 transition-all">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($booking->event->title . ' - ' . route('eventaty.show', $booking->event->id)) }}" 
                               target="_blank"
                               class="bg-green-600 text-white p-3 rounded-full hover:bg-green-700 transition-all">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-400">&copy; 2024 HAGTY. جميع الحقوق محفوظة.</p>
        </div>
    </footer>
</body>
</html>

