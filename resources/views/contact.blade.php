<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاتصال بنا - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #d94288; }
        .primary-text { color: #d94288; }
        .primary-border { border-color: #d94288; }
    </style>
</head>
<body class="bg-gray-50">
    @include('components.shared-header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-d94288 to-purple-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">تواصل معنا</h1>
            <p class="text-xl md:text-2xl">نحن هنا لمساعدتك في أي وقت</p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Info -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">معلومات الاتصال</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4 space-x-reverse">
                            <div class="bg-d94288 text-white p-3 rounded-full">
                                <i class="fas fa-phone text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">الهاتف</h3>
                                <p class="text-gray-600 text-lg">+20 123 456 7890</p>
                                <p class="text-gray-600 text-lg">+20 987 654 3210</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4 space-x-reverse">
                            <div class="bg-d94288 text-white p-3 rounded-full">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">البريد الإلكتروني</h3>
                                <p class="text-gray-600 text-lg">info@hagty.com</p>
                                <p class="text-gray-600 text-lg">support@hagty.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4 space-x-reverse">
                            <div class="bg-d94288 text-white p-3 rounded-full">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">العنوان</h3>
                                <p class="text-gray-600 text-lg">القاهرة، مصر</p>
                                <p class="text-gray-600 text-lg">شارع التحرير، برج التجارة</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4 space-x-reverse">
                            <div class="bg-d94288 text-white p-3 rounded-full">
                                <i class="fas fa-clock text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">ساعات العمل</h3>
                                <p class="text-gray-600 text-lg">الأحد - الخميس: 9:00 ص - 6:00 م</p>
                                <p class="text-gray-600 text-lg">الجمعة - السبت: 10:00 ص - 4:00 م</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">أرسل لنا رسالة</h2>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم</label>
                                <input type="text" id="name" name="name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288">
                            </div>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف</label>
                            <input type="tel" id="phone" name="phone"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">الموضوع</label>
                            <select id="subject" name="subject" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288">
                                <option value="">اختر الموضوع</option>
                                <option value="general">استفسار عام</option>
                                <option value="support">دعم فني</option>
                                <option value="partnership">شراكة</option>
                                <option value="feedback">ملاحظات</option>
                                <option value="other">أخرى</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">الرسالة</label>
                            <textarea id="message" name="message" rows="5" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:border-d94288"
                                      placeholder="اكتب رسالتك هنا..."></textarea>
                        </div>
                        
                        <button type="submit"
                                class="w-full bg-d94288 text-white py-3 px-6 rounded-xl font-semibold hover:bg-pink-700 transition-colors duration-300">
                            <i class="fas fa-paper-plane ml-2"></i>
                            إرسال الرسالة
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">الأسئلة الشائعة</h2>
                <p class="text-lg text-gray-600">إجابات على أكثر الأسئلة شيوعاً</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-6 rounded-xl">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">كيف يمكنني التسجيل في المنصة؟</h3>
                    <p class="text-gray-600">يمكنك التسجيل بسهولة من خلال النقر على زر "الاشتراك" وملء النموذج بالمعلومات المطلوبة.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-xl">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">هل الخدمات مجانية؟</h3>
                    <p class="text-gray-600">نعم، معظم خدماتنا الأساسية مجانية. بعض الخدمات المتقدمة قد تتطلب رسوم رمزية.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-xl">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">كيف يمكنني الحصول على الدعم؟</h3>
                    <p class="text-gray-600">يمكنك التواصل معنا عبر الهاتف أو البريد الإلكتروني أو من خلال نموذج الاتصال أعلاه.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-xl">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">هل بياناتي آمنة؟</h3>
                    <p class="text-gray-600">نعم، نحن نستخدم أحدث تقنيات الحماية لضمان أمان بياناتك وخصوصيتك.</p>
                </div>
            </div>
        </div>
    </section>

    @include('components.shared-footer')
</body>
</html>
