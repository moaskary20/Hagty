@extends('layouts.app')

@section('title', 'المقالات - منصة حاقتي')

@section('content')
<!-- Navigation -->
    @include('components.shared-header')

<div class="min-h-screen bg-white" dir="rtl">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-d94288 via-purple-600 to-pink-500 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h1 class="text-6xl font-bold mb-6">المدونة</h1>
                <p class="text-2xl mb-12">اكتشفي عالم من المعرفة والإلهام في مدونتنا المتنوعة</p>
                
                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                    <div class="bg-white bg-opacity-20 rounded-lg p-6">
                        <div class="text-3xl font-bold">{{ $blogs->total() ?? 0 }}</div>
                        <div class="text-lg">مقال منشور</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-6">
                        <div class="text-3xl font-bold">{{ $blogs->where('is_featured', true)->count() ?? 0 }}</div>
                        <div class="text-lg">مقال مميز</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-6">
                        <div class="text-3xl font-bold">{{ count($sections) ?? 0 }}</div>
                        <div class="text-lg">قسم مختلف</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">ابحثي في المدونة</h2>
                    <p class="text-lg text-gray-600">استخدمي الفلاتر للعثور على المقالات التي تهمك</p>
                </div>
                
                <form method="GET" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Search Input -->
                        <div class="lg:col-span-2">
                            <label class="block text-lg font-semibold text-gray-700 mb-3 text-right">
                                <i class="fas fa-search text-d94288 ml-2"></i>البحث في المحتوى
                            </label>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       placeholder="ابحثي في العناوين والمحتوى..."
                                       class="w-full px-4 py-3 pr-12 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-d94288 transition-all duration-300 bg-gray-50 focus:bg-white text-right">
                                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        
                        <!-- Section Filter -->
                        <div>
                            <label class="block text-lg font-semibold text-gray-700 mb-3 text-right">
                                <i class="fas fa-tags text-d94288 ml-2"></i>القسم
                            </label>
                            <select name="section" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-d94288 transition-all duration-300 bg-gray-50 focus:bg-white text-right">
                                <option value="">جميع الأقسام</option>
                                @foreach($sections as $key => $value)
                                    <option value="{{ $key }}" {{ request('section') == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Search Button -->
                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-gradient-to-r from-d94288 to-purple-600 text-white px-6 py-3 rounded-lg hover:from-pink-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg font-semibold">
                                <i class="fas fa-search ml-2"></i>بحث
                            </button>
                        </div>
                    </div>
                    
                    <!-- Quick Filter Tags -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4 text-right">فلترة سريعة:</h3>
                        <div class="flex flex-wrap gap-3 justify-end">
                            <a href="{{ route('articles.index') }}" 
                               class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 {{ !request('section') ? 'bg-d94288 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                                جميع المقالات
                            </a>
                            @foreach(array_slice($sections, 0, 10, true) as $key => $value)
                            <a href="{{ route('articles.index', ['section' => $key]) }}" 
                               class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 {{ request('section') == $key ? 'bg-d94288 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                                {{ $value }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-3">
                @if($blogs->count() > 0)
                    <!-- Articles Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                        @foreach($blogs as $blog)
                            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow group">
                                @if($blog->featured_image)
                                    <img src="{{ \Illuminate\Support\Str::startsWith($blog->featured_image, ['http', 'https']) ? $blog->featured_image : Storage::url($blog->featured_image) }}" 
                                         alt="{{ $blog->title }}"
                                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                @endif
                                
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="inline-block bg-d94288 text-white text-xs px-3 py-1 rounded-full">
                                            {{ $blog->section_name }}
                                        </span>
                                        <span class="text-sm text-gray-500">
                                            {{ $blog->published_at->format('d/m/Y') }}
                                        </span>
                                    </div>
                                    
                                    <h2 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-d94288 transition-colors">
                                        <a href="{{ route('articles.show', $blog->slug) }}">
                                            {{ $blog->title }}
                                        </a>
                                    </h2>
                                    
                                    <p class="text-gray-600 mb-4 text-sm">
                                        {{ Str::limit($blog->excerpt, 100) }}
                                    </p>
                                    
                                    <div class="flex items-center justify-between text-sm text-gray-500">
                                        <span>{{ $blog->author_name ?? 'غير محدد' }}</span>
                                        <span>{{ $blog->views_count }} مشاهدة</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center">
                        {{ $blogs->appends(request()->query())->links() }}
                    </div>
                @else
                    <div class="text-center py-20">
                        <h3 class="text-2xl font-semibold text-gray-600 mb-4">لا توجد مقالات</h3>
                        <p class="text-gray-500 mb-8">لم يتم العثور على مقالات تطابق معايير البحث</p>
                        <a href="{{ route('articles.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-d94288 to-purple-600 text-white rounded-lg hover:from-pink-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg font-semibold">
                            <i class="fas fa-refresh ml-2"></i>
                            عرض جميع المقالات
                        </a>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Featured Articles -->
                @if($featuredBlogs->count() > 0)
                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 text-right">
                            <i class="fas fa-star text-d94288 ml-2"></i>
                            مقالات مميزة
                        </h3>
                        <div class="space-y-4">
                            @foreach($featuredBlogs as $blog)
                                <div class="flex space-x-3">
                                    @if($blog->featured_image)
                                        <img src="{{ \Illuminate\Support\Str::startsWith($blog->featured_image, ['http', 'https']) ? $blog->featured_image : Storage::url($blog->featured_image) }}" 
                                             alt="{{ $blog->title }}"
                                             class="w-16 h-16 object-cover rounded">
                                    @endif
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-900 text-sm">
                                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-d94288 transition-colors">
                                                {{ Str::limit($blog->title, 50) }}
                                            </a>
                                        </h4>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $blog->published_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Recent Articles -->
                @if($recentBlogs->count() > 0)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 text-right">
                            <i class="fas fa-clock text-d94288 ml-2"></i>
                            أحدث المقالات
                        </h3>
                        <div class="space-y-4">
                            @foreach($recentBlogs as $blog)
                                <div class="flex space-x-3">
                                    @if($blog->featured_image)
                                        <img src="{{ \Illuminate\Support\Str::startsWith($blog->featured_image, ['http', 'https']) ? $blog->featured_image : Storage::url($blog->featured_image) }}" 
                                             alt="{{ $blog->title }}"
                                             class="w-16 h-16 object-cover rounded">
                                    @endif
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-900 text-sm">
                                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-d94288 transition-colors">
                                                {{ Str::limit($blog->title, 50) }}
                                            </a>
                                        </h4>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $blog->published_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('components.shared-footer')

<style>
/* Navigation Styles */
.primary-color {
    color: #A15DBF;
}

.menu-item {
    background: linear-gradient(135deg, #A15DBF, #9333ea);
    color: white !important;
    transition: all 0.3s ease;
}

.menu-item:hover {
    background: linear-gradient(135deg, #be185d, #7c2d12);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(217, 66, 136, 0.3);
}

.auth-btn-primary {
    background: linear-gradient(135deg, #A15DBF, #9333ea);
    color: white;
    transition: all 0.3s ease;
}

.auth-btn-primary:hover {
    background: linear-gradient(135deg, #be185d, #7c2d12);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(217, 66, 136, 0.3);
}

.auth-btn-secondary {
    background: white;
    color: #A15DBF;
    border: 2px solid #A15DBF;
    transition: all 0.3s ease;
}

.auth-btn-secondary:hover {
    background: #A15DBF;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(217, 66, 136, 0.3);
}

/* Mobile Menu Styles */
.mobile-menu-item {
    display: flex;
    align-items: center;
    padding: 12px 16px;
    color: #374151;
    text-decoration: none;
    transition: all 0.3s ease;
    border-radius: 8px;
    margin: 4px 0;
}

.mobile-menu-item:hover {
    background: linear-gradient(135deg, #A15DBF, #9333ea);
    color: white;
    transform: translateX(-4px);
}

.mobile-auth-btn {
    display: flex;
    align-items: center;
    padding: 12px 16px;
    color: #374151;
    text-decoration: none;
    transition: all 0.3s ease;
    border-radius: 8px;
    margin: 4px 0;
    font-weight: 500;
}

.mobile-auth-btn.primary {
    background: linear-gradient(135deg, #A15DBF, #9333ea);
    color: white;
}

.mobile-auth-btn.primary:hover {
    background: linear-gradient(135deg, #be185d, #7c2d12);
    transform: translateX(-4px);
}

.mobile-auth-btn.secondary {
    background: white;
    color: #A15DBF;
    border: 2px solid #A15DBF;
}

.mobile-auth-btn.secondary:hover {
    background: #A15DBF;
    color: white;
    transform: translateX(-4px);
}

/* Footer Styles */
.enhanced-footer {
    background: linear-gradient(135deg, #1f2937 0%, #374151 50%, #4b5563 100%);
    position: relative;
}

.enhanced-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(217, 66, 136, 0.1) 0%, rgba(147, 51, 234, 0.1) 100%);
    pointer-events: none;
}

.footer-logo-section {
    text-align: center;
    margin-bottom: 3rem;
}

.footer-logo-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #A15DBF, #9333ea);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 2rem;
    color: white;
    box-shadow: 0 10px 30px rgba(217, 66, 136, 0.3);
}

.footer-title {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #A15DBF, #9333ea);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.5rem;
}

.footer-subtitle {
    font-size: 1.1rem;
    color: #d1d5db;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.footer-section-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 0.5rem;
}

.footer-section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(135deg, #A15DBF, #9333ea);
    border-radius: 2px;
}

.footer-link {
    display: flex;
    align-items: center;
    padding: 0.75rem 0;
    color: #d1d5db;
    text-decoration: none;
    transition: all 0.3s ease;
    border-radius: 8px;
    padding-left: 0.5rem;
    padding-right: 0.5rem;
}

.footer-link:hover {
    color: white;
    background: rgba(217, 66, 136, 0.1);
    transform: translateX(-5px);
}

.footer-link i {
    margin-left: 0.75rem;
    font-size: 1.1rem;
    width: 20px;
    text-align: center;
}

.footer-contact-item {
    display: flex;
    align-items: center;
    padding: 0.5rem 0;
    color: #d1d5db;
    font-size: 0.95rem;
}

.footer-contact-item i {
    margin-left: 0.75rem;
    font-size: 1.1rem;
    width: 20px;
    text-align: center;
}

.social-media-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
    margin-bottom: 2rem;
}

.social-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 1.2rem;
}

.social-icon.facebook {
    background: linear-gradient(135deg, #1877f2, #42a5f5);
    color: white;
}

.social-icon.instagram {
    background: linear-gradient(135deg, #e4405f, #fd1d1d, #fcb045);
    color: white;
}

.social-icon.twitter {
    background: linear-gradient(135deg, #1da1f2, #0d8bd9);
    color: white;
}

.social-icon.youtube {
    background: linear-gradient(135deg, #ff0000, #cc0000);
    color: white;
}

.social-icon:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.footer-bottom {
    text-align: center;
    padding-top: 2rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.copyright-text {
    color: #9ca3af;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

.love-text {
    color: #d1d5db;
    font-size: 0.9rem;
    font-weight: 500;
}

/* RTL Support */
[dir="rtl"] {
    text-align: right;
}

[dir="rtl"] input,
[dir="rtl"] select,
[dir="rtl"] textarea {
    text-align: right;
    direction: rtl;
}

[dir="rtl"] input::placeholder {
    text-align: right;
    direction: rtl;
}

/* Custom Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
}

.pagination a,
.pagination span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.pagination a {
    color: #6b7280;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
}

.pagination a:hover {
    color: #A15DBF;
    background: #fdf2f8;
    border-color: #A15DBF;
}

.pagination .active span {
    color: white;
    background: #A15DBF;
    border: 1px solid #A15DBF;
}

.pagination .disabled span {
    color: #9ca3af;
    background: #f3f4f6;
    border: 1px solid #e5e7eb;
    cursor: not-allowed;
}
</style>

<script>
// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
    
    // Add scroll effect to navigation
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('nav');
        if (window.scrollY > 100) {
            nav.classList.add('bg-white/95', 'backdrop-blur-sm');
        } else {
            nav.classList.remove('bg-white/95', 'backdrop-blur-sm');
        }
    });
});
</script>
@endsection