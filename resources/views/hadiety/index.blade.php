<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>هديتي - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hadiety-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hadiety-animations.css') }}">
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-[#FAD6E0] to-[#E6DAC8] min-h-screen">
    @include('components.shared-header')

    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">🎁 هديتي</h1>
            <p class="text-xl md:text-2xl animate-fadeInUp" style="animation-delay: 0.2s;">أفكار هدايا رائعة ودليل تسوق ذكي</p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🎁 أفكار <span style="color: #d94288">الهدايا</span></h2>
            @if($giftIdeas->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($giftIdeas as $gift)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all">
                    @if($gift->image)
                    <img src="{{ Storage::url($gift->image) }}" alt="{{ $gift->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">{{ $gift->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($gift->description, 100) }}</p>
                        @if($gift->price_range_min && $gift->price_range_max)
                        <p class="text-pink-600 font-bold">{{ $gift->price_range_min }} - {{ $gift->price_range_max }} جنيه</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-8">{{ $giftIdeas->links() }}</div>
            @else
            <p class="text-center text-gray-500">لا توجد أفكار هدايا متاحة حالياً</p>
            @endif
        </div>
    </section>

    <!-- Shopping Guides Section -->
    @if($guides->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">📖 أدلة <span style="color: #d94288">التسوق</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($guides as $guide)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all">
                    @if($guide->image)
                    <img src="{{ Storage::url($guide->image) }}" alt="{{ $guide->title }}" class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center">
                        <i class="fas fa-book text-6xl text-white"></i>
                    </div>
                    @endif
                    <div class="p-6">
                        @if($guide->category)
                        <span class="inline-block bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs font-semibold mb-3">
                            {{ $guide->category }}
                        </span>
                        @endif
                        <h3 class="font-bold text-xl mb-3">{{ $guide->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($guide->content, 120) }}</p>
                        <a href="{{ route('hadiety.guide.show', $guide->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold text-sm inline-block">
                            اقرأ المزيد <i class="fas fa-arrow-left mr-2"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Personal Shopping Services Section -->
    @if($services->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🛒 خدمات <span style="color: #d94288">التسوق الشخصية</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-lg shadow-lg p-8 hover:shadow-2xl transition-all border-2 border-transparent hover:border-pink-400">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shopping-bag text-3xl text-white"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-3 text-gray-900">{{ $service->service_name }}</h3>
                        <p class="text-gray-700 mb-4 leading-relaxed">{{ $service->description }}</p>
                    </div>
                    
                    @if($service->price)
                    <div class="text-center mb-6">
                        <div class="text-3xl font-bold text-pink-600 mb-2">{{ number_format($service->price) }} جنيه</div>
                        <p class="text-sm text-gray-500">للخدمة الواحدة</p>
                    </div>
                    @endif

                    <div class="space-y-2 mb-6">
                        @if($service->contact_email)
                        <div class="flex items-center justify-center text-gray-600">
                            <i class="fas fa-envelope ml-2 text-pink-600"></i>
                            <a href="mailto:{{ $service->contact_email }}" class="hover:text-pink-600">{{ $service->contact_email }}</a>
                        </div>
                        @endif
                        @if($service->contact_phone)
                        <div class="flex items-center justify-center text-gray-600">
                            <i class="fas fa-phone ml-2 text-pink-600"></i>
                            <a href="tel:{{ $service->contact_phone }}" class="hover:text-pink-600">{{ $service->contact_phone }}</a>
                        </div>
                        @endif
                    </div>

                    <button onclick="openServiceModal({{ $service->id }}, '{{ $service->service_name }}', '{{ $service->price ?? 0 }}')" 
                            class="w-full bg-gradient-to-r from-pink-600 to-purple-600 text-white px-6 py-3 rounded-lg hover:from-pink-700 hover:to-purple-700 transition-all font-bold">
                        <i class="fas fa-shopping-cart ml-2"></i>
                        اطلب الخدمة الآن
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Service Request Modal -->
    <div id="serviceModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-gradient-to-r from-pink-600 to-purple-600 text-white p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold">
                        <i class="fas fa-shopping-bag ml-2"></i>
                        طلب خدمة التسوق الشخصية
                    </h3>
                    <button onclick="closeServiceModal()" class="text-white hover:text-gray-200 text-3xl">×</button>
                </div>
            </div>
            
            <form id="serviceRequestForm" class="p-8" onsubmit="submitServiceRequest(event)">
                <input type="hidden" id="service_id" name="service_id">
                
                <div class="mb-6 bg-purple-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700 font-semibold">الخدمة المطلوبة:</span>
                        <span id="service_name_display" class="text-pink-600 font-bold text-lg"></span>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-gray-700 font-semibold">السعر:</span>
                        <span id="service_price_display" class="text-purple-600 font-bold text-lg"></span>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">الاسم الكامل *</label>
                    <input type="text" name="customer_name" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                           placeholder="أدخلي اسمك الكامل">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">البريد الإلكتروني *</label>
                        <input type="email" name="customer_email" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                               placeholder="example@email.com">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">رقم الهاتف *</label>
                        <input type="tel" name="customer_phone" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                               placeholder="01XXXXXXXXX">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">تفاصيل الطلب *</label>
                    <textarea name="request_details" required rows="5"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                              placeholder="صفي احتياجاتك من خدمة التسوق الشخصية (نوع الهدية، المناسبة، الميزانية، التفضيلات، إلخ)"></textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">تاريخ التسليم المطلوب</label>
                    <input type="date" name="preferred_date" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                </div>

                <div class="flex gap-4">
                    <button type="submit" 
                            class="flex-1 bg-gradient-to-r from-pink-600 to-purple-600 text-white px-6 py-4 rounded-lg hover:from-pink-700 hover:to-purple-700 transition-all font-bold text-lg">
                        <i class="fas fa-paper-plane ml-2"></i>
                        إرسال الطلب
                    </button>
                    <button type="button" onclick="closeServiceModal()" 
                            class="px-6 py-4 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-all font-bold">
                        إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Message -->
    <div id="successMessage" class="hidden fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-8 py-4 rounded-lg shadow-lg z-50">
        <i class="fas fa-check-circle ml-2"></i>
        تم إرسال طلبك بنجاح! سنتواصل معك قريباً.
    </div>


    <script>
        function openServiceModal(serviceId, serviceName, servicePrice) {
            document.getElementById('service_id').value = serviceId;
            document.getElementById('service_name_display').textContent = serviceName;
            document.getElementById('service_price_display').textContent = servicePrice ? servicePrice + ' جنيه' : 'حسب الطلب';
            document.getElementById('serviceModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeServiceModal() {
            document.getElementById('serviceModal').classList.add('hidden');
            document.getElementById('serviceRequestForm').reset();
            document.body.style.overflow = 'auto';
        }

        function submitServiceRequest(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData);
            
            fetch('/hadiety/service-request', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    closeServiceModal();
                    showSuccessMessage();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('حدث خطأ أثناء إرسال الطلب. يرجى المحاولة مرة أخرى.');
            });
        }

        function showSuccessMessage() {
            const message = document.getElementById('successMessage');
            message.classList.remove('hidden');
            setTimeout(() => {
                message.classList.add('hidden');
            }, 5000);
        }

        // Close modal when clicking outside
        document.getElementById('serviceModal')?.addEventListener('click', function(event) {
            if (event.target === this) {
                closeServiceModal();
            }
        });
    </script>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-pink-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في هديتي</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول الهدايا والتسوق</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestBlogs as $blog)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    @if($blog->featured_image)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ \Illuminate\Support\Str::startsWith($blog->featured_image, ['http', 'https']) ? $blog->featured_image : Storage::url($blog->featured_image) }}" 
                                 alt="{{ $blog->title }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-block bg-pink-100 text-pink-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-pink-600 transition-colors duration-300">
                                {{ $blog->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $blog->excerpt }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-eye ml-1"></i>
                                <span>{{ $blog->views_count }} مشاهدة</span>
                                <i class="fas fa-clock mr-2 ml-4"></i>
                                <span>{{ $blog->reading_time }} دقيقة قراءة</span>
                            </div>
                            
                            <a href="{{ route('articles.show', $blog->slug) }}" 
                               class="inline-flex items-center text-pink-600 hover:text-pink-700 font-semibold transition-colors duration-300">
                                اقرأ المزيد
                                <i class="fas fa-arrow-left mr-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('articles.index') }}" 
                   class="inline-flex items-center bg-gradient-to-r from-pink-600 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-pink-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')

    <!-- Hadiety Interactions JavaScript -->
    <script src="{{ asset('js/hadiety-interactions.js') }}"></script>
</body>
</html>
