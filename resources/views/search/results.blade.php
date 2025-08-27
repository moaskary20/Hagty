<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتائج البحث - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .primary-bg { background-color: #d94288; }
        .primary-text { color: #d94288; }
        .primary-border { border-color: #d94288; }
        .text-d94288 { color: #d94288 !important; }
        .bg-d94288 { background-color: #d94288 !important; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="primary-bg text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold">HAGTY</a>
                </div>
                <div class="hidden md:flex space-x-8 space-x-reverse">
                    <a href="{{ route('home') }}" class="hover:text-pink-200 transition duration-300">الرئيسية</a>
                    <a href="{{ route('section', 'accessoraty') }}" class="hover:text-pink-200 transition duration-300">أكسسوراتى</a>
                    <a href="{{ route('section', 'health') }}" class="hover:text-pink-200 transition duration-300">الصحة</a>
                    <a href="{{ route('section', 'fashion') }}" class="hover:text-pink-200 transition duration-300">الموضة</a>
                    <a href="{{ route('section', 'babies') }}" class="hover:text-pink-200 transition duration-300">الأطفال</a>
                    <a href="{{ route('section', 'wedding') }}" class="hover:text-pink-200 transition duration-300">الزفاف</a>
                    <a href="{{ route('section', 'beauty') }}" class="hover:text-pink-200 transition duration-300">الجمال</a>
                    <a href="{{ route('section', 'umomi') }}" class="hover:text-pink-200 transition duration-300">أومومتي</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Search Header -->
    <section class="primary-bg text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">🔍 نتائج البحث</h1>
            <p class="text-xl md:text-2xl mb-8">نتائج البحث عن: "{{ $query }}"</p>
            
            <!-- Search Form -->
            <form action="{{ route('search') }}" method="GET" class="max-w-2xl mx-auto">
                <div class="flex gap-4">
                    <input type="text" name="q" value="{{ $query }}" placeholder="ابحث في جميع الأقسام..." 
                           class="flex-1 px-6 py-3 rounded-lg text-gray-800 text-lg focus:outline-none focus:ring-4 focus:ring-pink-300">
                    <select name="section" class="px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-4 focus:ring-pink-300">
                        <option value="all" {{ $section === 'all' ? 'selected' : '' }}>جميع الأقسام</option>
                        <option value="accessoraty" {{ $section === 'accessoraty' ? 'selected' : '' }}>أكسسوراتى</option>
                        <option value="health" {{ $section === 'health' ? 'selected' : '' }}>الصحة</option>
                        <option value="fashion" {{ $section === 'fashion' ? 'selected' : '' }}>الموضة</option>
                        <option value="babies" {{ $section === 'babies' ? 'selected' : '' }}>الأطفال</option>
                        <option value="wedding" {{ $section === 'wedding' ? 'selected' : '' }}>الزفاف</option>
                        <option value="beauty" {{ $section === 'beauty' ? 'selected' : '' }}>الجمال</option>
                        <option value="umomi" {{ $section === 'umomi' ? 'selected' : '' }}>أومومتي</option>
                    </select>
                    <button type="submit" class="bg-white text-d94288 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition duration-300 shadow-lg">
                        <i class="fas fa-search ml-2"></i>بحث
                    </button>
                </div>
            </form>
            
            <!-- Statistics -->
            <div class="mt-8">
                <div class="bg-white bg-opacity-20 rounded-lg p-4 inline-block">
                    <div class="text-3xl font-bold">{{ $totalResults }}</div>
                    <div class="text-sm">نتيجة</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Results -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($totalResults === 0)
            <!-- No Results -->
            <div class="text-center py-16">
                <i class="fas fa-search text-6xl text-gray-400 mb-6"></i>
                <h2 class="text-2xl font-bold text-gray-600 mb-4">لم يتم العثور على نتائج</h2>
                <p class="text-gray-500 mb-8">جرب البحث بكلمات مختلفة أو اختر قسم آخر</p>
                <a href="{{ route('home') }}" class="bg-d94288 text-white px-8 py-3 rounded-lg font-bold hover:bg-pink-700 transition duration-300 shadow-lg">
                    العودة للرئيسية
                </a>
            </div>
        @else
            <!-- Results by Section -->
            @foreach($results as $sectionName => $sectionResults)
                @php
                    $sectionTotal = 0;
                    foreach($sectionResults as $items) {
                        $sectionTotal += $items->count();
                    }
                @endphp
                
                @if($sectionTotal > 0)
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-gray-800 mb-8 border-b-2 border-pink-200 pb-4">
                            @switch($sectionName)
                                @case('accessoraty')
                                    🎒 أكسسوراتى ({{ $sectionTotal }} نتيجة)
                                    @break
                                @case('health')
                                    🏥 الصحة ({{ $sectionTotal }} نتيجة)
                                    @break
                                @case('fashion')
                                    👗 الموضة ({{ $sectionTotal }} نتيجة)
                                    @break
                                @case('babies')
                                    👶 الأطفال ({{ $sectionTotal }} نتيجة)
                                    @break
                                @case('wedding')
                                    💒 الزفاف ({{ $sectionTotal }} نتيجة)
                                    @break
                                @case('beauty')
                                    💄 الجمال ({{ $sectionTotal }} نتيجة)
                                    @break
                                @case('umomi')
                                    🤱 أومومتي ({{ $sectionTotal }} نتيجة)
                                    @break
                            @endswitch
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($sectionResults as $type => $items)
                                @foreach($items as $item)
                                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                                        <div class="p-6">
                                            @if($sectionName === 'accessoraty')
                                                @if($type === 'courses')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->title }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                    <div class="text-sm text-gray-500">
                                                        <div><i class="fas fa-users ml-2"></i>{{ $item->students_count }} طالب</div>
                                                    </div>
                                                @elseif($type === 'students')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ $item->email }}</p>
                                                    @if($item->course)
                                                        <div class="text-sm text-gray-500">
                                                            <div><i class="fas fa-graduation-cap ml-2"></i>{{ $item->course->title }}</div>
                                                        </div>
                                                    @endif
                                                @elseif($type === 'shops')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @endif
                                            @elseif($sectionName === 'health')
                                                @if($type === 'doctors')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ $item->specialty }}</p>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'hospitals')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ $item->address }}</p>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'pharmacies')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ $item->address }}</p>
                                                @elseif($type === 'health_tips')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->title }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->content, 100) }}</p>
                                                @endif
                                            @elseif($sectionName === 'fashion')
                                                @if($type === 'fashion_trends')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->title }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'sponsor_videos')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->title }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'forasy_courses')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->title }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @endif
                                            @elseif($sectionName === 'babies')
                                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                            @elseif($sectionName === 'wedding')
                                                @if($type === 'wedding_designers')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ $item->specialty }}</p>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'wedding_planners')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'makeup_artists')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'wedding_hair_stylists')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'wedding_venues')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ $item->address }}</p>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'catering_services')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->company_name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'dj_performers')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'flower_decorators')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'wedding_gift_suppliers')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'wedding_photographers')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ $item->specialty }}</p>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @endif
                                            @elseif($sectionName === 'beauty')
                                                @if($type === 'plastic_surgeons')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'hair_stylists')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'beauty_shops')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'beauty_trends')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->title }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->content, 100) }}</p>
                                                @elseif($type === 'skin_care_doctors')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'nail_lash_specialists')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'nutrition_doctors')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'spa_clinics')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'training_videos')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->title }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @endif
                                            @elseif($sectionName === 'umomi')
                                                @if($type === 'maternity_doctors')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->name }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'weekly_baby_cares')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->title }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @elseif($type === 'delivery_preparations')
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->title }}</h3>
                                                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

    <!-- Footer -->
    <footer class="primary-bg text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">HAGTY</h3>
                    <p class="text-pink-200">منصة شاملة لجميع احتياجاتك</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">الأقسام الرئيسية</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('section', 'accessoraty') }}" class="hover:text-pink-200">أكسسوراتى</a></li>
                        <li><a href="{{ route('section', 'health') }}" class="hover:text-pink-200">الصحة</a></li>
                        <li><a href="{{ route('section', 'fashion') }}" class="hover:text-pink-200">الموضة</a></li>
                        <li><a href="{{ route('section', 'babies') }}" class="hover:text-pink-200">الأطفال</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">خدمات إضافية</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('section', 'wedding') }}" class="hover:text-pink-200">الزفاف</a></li>
                        <li><a href="{{ route('section', 'beauty') }}" class="hover:text-pink-200">الجمال</a></li>
                        <li><a href="{{ route('section', 'umomi') }}" class="hover:text-pink-200">أومومتي</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">تواصل معنا</h4>
                    <div class="flex space-x-4 space-x-reverse">
                        <a href="#" class="text-2xl hover:text-pink-200"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-2xl hover:text-pink-200"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-2xl hover:text-pink-200"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-pink-300 mt-8 pt-8 text-center">
                <p>&copy; 2024 HAGTY. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>
</body>
</html>
