<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بيتي - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/beity-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/beity-animations.css') }}">
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] min-h-screen">
    @include('components.shared-header')

    <section class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-24">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fadeInUp">🏠 بيتي</h1>
            <p class="text-xl md:text-2xl animate-fadeInUp" style="animation-delay: 0.2s;">ديكور، أثاث، وأفكار تصميم لمنزل أحلامك</p>
            <div class="grid grid-cols-3 gap-6 mt-12 max-w-2xl mx-auto">
                <div class="bg-[#FFFFFF] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.3s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $decors->total() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">قطعة ديكور</div>
                </div>
                <div class="bg-[#FFFFFF] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.4s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $furniture->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">قطعة أثاث</div>
                </div>
                <div class="bg-[#FFFFFF] rounded-lg p-4 shadow-lg hover:scale-105 transition-all duration-300 animate-bounceIn" style="animation-delay: 0.5s;">
                    <div class="text-3xl font-black text-black text-center mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">{{ $designs->count() }}</div>
                    <div class="text-sm text-black font-bold text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">فكرة تصميم</div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Search Form -->
    @include('components.beity-search-form')

    <!-- Home Decor -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🎨 ديكورات <span style="color: #d94288">المنزل</span></h2>
            @if($decors->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($decors as $decor)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all">
                    @if($decor->image)
                    <img src="{{ Storage::url($decor->image) }}" alt="{{ $decor->title }}" class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-gradient-to-r from-amber-400 to-orange-400 flex items-center justify-center">
                        <i class="fas fa-home text-6xl text-white"></i>
                    </div>
                    @endif
                    <div class="p-6">
                        @if($decor->category)
                        <span class="inline-block bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-xs font-semibold mb-3">{{ $decor->category }}</span>
                        @endif
                        <h3 class="font-bold text-xl mb-2">{{ $decor->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($decor->description, 100) }}</p>
                        @if($decor->price)
                        <p class="text-amber-600 font-bold text-lg mb-4">{{ number_format($decor->price) }} جنيه</p>
                        @endif
                        <button onclick='openSellerModal(@json($decor))' class="block w-full bg-gradient-to-r from-amber-600 to-orange-600 text-white text-center px-4 py-2 rounded-lg hover:from-amber-700 hover:to-orange-700 transition-all">
                            <i class="fas fa-shopping-cart ml-2"></i>تسوق الآن
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-8">{{ $decors->links() }}</div>
            @else
            <p class="text-center text-gray-500">لا توجد ديكورات متاحة حالياً</p>
            @endif
        </div>
    </section>

    <!-- Furniture -->
    @if($furniture->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🛋️ الأثاث <span style="color: #d94288">المنزلي</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($furniture as $item)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all">
                    @if($item->image)
                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">{{ $item->title }}</h3>
                        <p class="text-gray-600 mb-3">{{ Str::limit($item->description, 80) }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if($item->room_type)<span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">{{ $item->room_type }}</span>@endif
                            @if($item->material)<span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">{{ $item->material }}</span>@endif
                        </div>
                        @if($item->price)
                        <p class="text-amber-600 font-bold text-lg">{{ number_format($item->price) }} جنيه</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Design Ideas -->
    @if($designs->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">💡 أفكار <span style="color: #d94288">التصميم</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($designs as $design)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all">
                    @if($design->image)
                    <img src="{{ Storage::url($design->image) }}" alt="{{ $design->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        @if($design->style)
                        <span class="inline-block bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs font-semibold mb-3">{{ $design->style }}</span>
                        @endif
                        <h3 class="font-bold text-xl mb-3">{{ $design->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($design->content, 120) }}</p>
                        <a href="{{ route('beity.design.show', $design->id) }}" class="text-amber-600 hover:text-amber-800 font-semibold inline-block">اقرأ المزيد →</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Seller Info Modal -->
    <div id="sellerModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-gradient-to-r from-amber-600 to-orange-600 text-white p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold">
                        <i class="fas fa-store ml-2"></i>
                        معلومات البائع
                    </h3>
                    <button onclick="closeSellerModal()" class="text-white hover:text-gray-200 text-3xl">×</button>
                </div>
            </div>
            
            <div class="p-8">
                <!-- Product Info -->
                <div class="mb-8 bg-amber-50 p-6 rounded-xl">
                    <div class="flex items-start gap-4">
                        <div id="modal_product_image" class="w-24 h-24 rounded-lg overflow-hidden flex-shrink-0"></div>
                        <div class="flex-1">
                            <h4 id="modal_product_title" class="font-bold text-xl text-gray-900 mb-2"></h4>
                            <p id="modal_product_price" class="text-amber-600 font-bold text-lg"></p>
                        </div>
                    </div>
                </div>

                <!-- Seller Info -->
                <div id="seller_info_content" class="space-y-4">
                    <!-- يتم ملؤها ديناميكياً -->
                </div>

                <!-- Contact Buttons -->
                <div id="contact_buttons" class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- يتم ملؤها ديناميكياً -->
                </div>
            </div>
        </div>
    </div>


    <script>
        function openSellerModal(product) {
            // عرض معلومات المنتج
            const imageDiv = document.getElementById('modal_product_image');
            if (product.image) {
                imageDiv.innerHTML = `<img src="/storage/${product.image}" alt="${product.title}" class="w-full h-full object-cover">`;
            } else {
                imageDiv.innerHTML = `<div class="w-full h-full bg-gradient-to-r from-amber-400 to-orange-400 flex items-center justify-center"><i class="fas fa-home text-3xl text-white"></i></div>`;
            }
            
            document.getElementById('modal_product_title').textContent = product.title;
            document.getElementById('modal_product_price').textContent = product.price ? product.price.toLocaleString() + ' جنيه' : 'السعر غير محدد';
            
            // عرض معلومات البائع
            const sellerInfoDiv = document.getElementById('seller_info_content');
            let sellerHTML = '';
            
            if (product.seller_name) {
                sellerHTML += `
                    <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-store text-2xl text-amber-600"></i>
                        <div>
                            <div class="text-sm text-gray-600">اسم المتجر</div>
                            <div class="font-bold text-lg text-gray-900">${product.seller_name}</div>
                        </div>
                    </div>
                `;
            }
            
            if (product.seller_description) {
                sellerHTML += `
                    <div class="p-4 bg-blue-50 rounded-lg">
                        <div class="text-sm text-gray-600 mb-2">عن المتجر</div>
                        <div class="text-gray-700">${product.seller_description}</div>
                    </div>
                `;
            }
            
            if (product.seller_address) {
                sellerHTML += `
                    <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-map-marker-alt text-2xl text-red-600"></i>
                        <div>
                            <div class="text-sm text-gray-600">العنوان</div>
                            <div class="text-gray-900">${product.seller_address}</div>
                        </div>
                    </div>
                `;
            }
            
            sellerInfoDiv.innerHTML = sellerHTML || '<p class="text-center text-gray-500">لا توجد معلومات إضافية عن البائع</p>';
            
            // أزرار التواصل
            const buttonsDiv = document.getElementById('contact_buttons');
            let buttonsHTML = '';
            
            if (product.seller_phone) {
                buttonsHTML += `
                    <a href="tel:${product.seller_phone}" class="flex items-center justify-center gap-2 bg-blue-600 text-white px-6 py-4 rounded-lg hover:bg-blue-700 transition-all font-bold">
                        <i class="fas fa-phone"></i>
                        <span>اتصل الآن</span>
                    </a>
                `;
            }
            
            if (product.seller_whatsapp) {
                buttonsHTML += `
                    <a href="https://wa.me/${product.seller_whatsapp.replace(/[^0-9]/g, '')}" target="_blank" class="flex items-center justify-center gap-2 bg-green-600 text-white px-6 py-4 rounded-lg hover:bg-green-700 transition-all font-bold">
                        <i class="fab fa-whatsapp"></i>
                        <span>واتساب</span>
                    </a>
                `;
            }
            
            if (product.seller_email) {
                buttonsHTML += `
                    <a href="mailto:${product.seller_email}" class="flex items-center justify-center gap-2 bg-purple-600 text-white px-6 py-4 rounded-lg hover:bg-purple-700 transition-all font-bold">
                        <i class="fas fa-envelope"></i>
                        <span>بريد إلكتروني</span>
                    </a>
                `;
            }
            
            if (product.shop_url) {
                buttonsHTML += `
                    <a href="${product.shop_url}" target="_blank" class="flex items-center justify-center gap-2 bg-orange-600 text-white px-6 py-4 rounded-lg hover:bg-orange-700 transition-all font-bold">
                        <i class="fas fa-globe"></i>
                        <span>زيارة الموقع</span>
                    </a>
                `;
            }
            
            buttonsDiv.innerHTML = buttonsHTML || '<p class="text-center text-gray-500 col-span-2">لا توجد معلومات تواصل متاحة</p>';
            
            // إظهار الـ Modal
            document.getElementById('sellerModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSellerModal() {
            document.getElementById('sellerModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('sellerModal')?.addEventListener('click', function(event) {
            if (event.target === this) {
                closeSellerModal();
            }
        });
    </script>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-teal-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في بيتي</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول ديكور المنزل وتنظيمه</p>
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
                            <span class="inline-block bg-teal-100 text-teal-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-teal-600 transition-colors duration-300">
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
                               class="inline-flex items-center text-teal-600 hover:text-teal-700 font-semibold transition-colors duration-300">
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
                   class="inline-flex items-center bg-gradient-to-r from-teal-600 to-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-teal-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')

    <!-- Beity Interactions JavaScript -->
    <script src="{{ asset('js/beity-interactions.js') }}"></script>
</body>
</html>
