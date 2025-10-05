@extends('layouts.app')

@section('title', $blog->title . ' - المقالات')

@section('content')
<!-- Navigation -->
    @include('components.shared-header')

<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-cyan-50" dir="rtl">
    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600"></div>
        <div class="absolute inset-0 bg-black opacity-30"></div>
        
        <!-- Floating Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-16 left-16 w-72 h-72 bg-white opacity-10 rounded-full animate-bounce"></div>
            <div class="absolute top-32 right-24 w-64 h-64 bg-white opacity-10 rounded-full animate-bounce" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-16 left-1/3 w-80 h-80 bg-white opacity-10 rounded-full animate-bounce" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center text-white">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-white bg-opacity-20 rounded-full mb-8 backdrop-blur-sm border-2 border-white border-opacity-30">
                    <i class="fas fa-pen-fancy text-4xl"></i>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold mb-6 bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text text-transparent leading-tight">
                    {{ $blog->title }}
                </h1>
                <div class="flex items-center justify-center space-x-8 text-lg opacity-90 font-medium">
                    <div class="flex items-center">
                        <i class="fas fa-user ml-2 text-xl"></i>
                        <span>{{ $blog->author_name ?? 'غير محدد' }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt ml-2 text-xl"></i>
                        <span>{{ $blog->published_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock ml-2 text-xl"></i>
                        <span>{{ $blog->reading_time }} دقيقة قراءة</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-eye ml-2 text-xl"></i>
                        <span>{{ $blog->views_count }} مشاهدة</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-20">
            <!-- Main Content -->
            <div class="lg:col-span-3">
                <article class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                    @if($blog->featured_image)
                        <div class="relative overflow-hidden">
                            <img src="{{ \Illuminate\Support\Str::startsWith($blog->featured_image, ['http', 'https']) ? $blog->featured_image : Storage::url($blog->featured_image) }}" 
                                 alt="{{ $blog->title }}"
                                 class="w-full h-96 object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                            <div class="absolute top-8 right-8">
                                <span class="inline-block bg-indigo-600 text-white text-3xl px-10 py-5 rounded-full font-black shadow-2xl">
                                    {{ $blog->section_name }}
                                </span>
                            </div>
                        </div>
                    @endif
                    
                    <div class="p-20">
                        <!-- Article Meta -->
                        <div class="flex items-center justify-between mb-8 pb-8 border-b-2 border-gray-200">
                            <div class="flex items-center space-x-8">
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-user ml-2 text-lg"></i>
                                    <span class="text-lg font-semibold">{{ $blog->author_name ?? 'غير محدد' }}</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-calendar-alt ml-2 text-lg"></i>
                                    <span class="text-lg font-semibold">{{ $blog->published_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-clock ml-2 text-lg"></i>
                                    <span class="text-lg font-semibold">{{ $blog->reading_time }} دقيقة قراءة</span>
                                </div>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-eye ml-2 text-lg"></i>
                                <span class="text-lg font-semibold">{{ $blog->views_count }} مشاهدة</span>
                            </div>
                        </div>
                        
                        <!-- Article Content -->
                        <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
                            {!! $blog->content !!}
                        </div>
                        
                        <!-- Tags -->
                        @if($blog->tags && count($blog->tags) > 0)
                            <div class="mt-12 pt-8 border-t-2 border-gray-200">
                                <h3 class="text-2xl font-bold text-gray-900 mb-6">العلامات:</h3>
                                <div class="flex flex-wrap gap-3">
                                    @foreach($blog->tags as $tag)
                                        <span class="inline-block bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-lg font-semibold hover:bg-indigo-600 hover:text-white transition-all duration-300 cursor-pointer">
                                            #{{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Related Articles -->
                @if($relatedBlogs->count() > 0)
                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 text-right">
                            <i class="fas fa-link text-indigo-600 ml-2"></i>
                            مقالات ذات صلة
                        </h3>
                        <div class="space-y-4">
                            @foreach($relatedBlogs as $relatedBlog)
                                <div class="flex space-x-3 group">
                                    @if($relatedBlog->featured_image)
                                        <img src="{{ \Illuminate\Support\Str::startsWith($relatedBlog->featured_image, ['http', 'https']) ? $relatedBlog->featured_image : Storage::url($relatedBlog->featured_image) }}" 
                                             alt="{{ $relatedBlog->title }}"
                                             class="w-16 h-16 object-cover rounded group-hover:scale-105 transition-transform duration-300">
                                    @endif
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-900 text-sm group-hover:text-indigo-600 transition-colors duration-300">
                                            <a href="{{ route('articles.show', $relatedBlog->slug) }}">
                                                {{ Str::limit($relatedBlog->title, 50) }}
                                            </a>
                                        </h4>
                                        <p class="text-xs text-gray-500 mb-2">
                                            <i class="fas fa-clock ml-1"></i>
                                            {{ $relatedBlog->published_at->diffForHumans() }}
                                        </p>
                                        <div class="flex items-center">
                                            <span class="inline-block bg-indigo-600 text-white text-xs px-2 py-1 rounded-full font-semibold">
                                                {{ $relatedBlog->section_name }}
                                            </span>
                                        </div>
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
                            <i class="fas fa-clock text-indigo-600 ml-2"></i>
                            أحدث المقالات
                        </h3>
                        <div class="space-y-4">
                            @foreach($recentBlogs as $recentBlog)
                                <div class="flex space-x-3 group">
                                    @if($recentBlog->featured_image)
                                        <img src="{{ \Illuminate\Support\Str::startsWith($recentBlog->featured_image, ['http', 'https']) ? $recentBlog->featured_image : Storage::url($recentBlog->featured_image) }}" 
                                             alt="{{ $recentBlog->title }}"
                                             class="w-16 h-16 object-cover rounded group-hover:scale-105 transition-transform duration-300">
                                    @endif
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-900 text-sm group-hover:text-indigo-600 transition-colors duration-300">
                                            <a href="{{ route('articles.show', $recentBlog->slug) }}">
                                                {{ Str::limit($recentBlog->title, 50) }}
                                            </a>
                                        </h4>
                                        <p class="text-xs text-gray-500 mb-2">
                                            <i class="fas fa-clock ml-1"></i>
                                            {{ $recentBlog->published_at->diffForHumans() }}
                                        </p>
                                        <div class="flex items-center">
                                            <span class="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full font-semibold">
                                                {{ $recentBlog->section_name }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    @if($blog->allow_comments)
    <div class="bg-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">التعليقات</h2>
                <p class="text-gray-600">شاركي رأيك معنا حول هذا المقال</p>
            </div>

            <!-- Comment Form -->
            <div class="bg-gray-50 rounded-2xl p-8 mb-12">
                <h3 class="text-xl font-semibold text-gray-900 mb-6 text-right">أضيفي تعليقك</h3>
                <form id="comment-form" class="space-y-6">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2 text-right">الاسم *</label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-d94288 transition-colors duration-300 text-right"
                                   placeholder="أدخلي اسمك">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2 text-right">البريد الإلكتروني *</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-d94288 transition-colors duration-300 text-right"
                                   placeholder="أدخلي بريدك الإلكتروني">
                        </div>
                    </div>
                    
                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700 mb-2 text-right">التعليق *</label>
                        <textarea id="comment" name="comment" rows="4" required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-d94288 focus:border-d94288 transition-colors duration-300 text-right resize-none"
                                  placeholder="اكتبي تعليقك هنا..."></textarea>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" 
                                class="bg-gradient-to-r from-d94288 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-pink-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-paper-plane ml-2"></i>
                            إرسال التعليق
                        </button>
                    </div>
                </form>
            </div>

            <!-- Comments List -->
            <div id="comments-container">
                <h3 class="text-xl font-semibold text-gray-900 mb-6 text-right">
                    التعليقات ({{ $comments->count() }})
                </h3>
                
                @if($comments->count() > 0)
                    <div class="space-y-6">
                        @foreach($comments as $comment)
                            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                                <div class="flex items-start space-x-4 space-x-reverse">
                                    <div class="w-12 h-12 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-lg">
                                        {{ substr($comment->name, 0, 1) }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-semibold text-gray-900">{{ $comment->name }}</h4>
                                            <span class="text-sm text-gray-500">
                                                <i class="fas fa-clock ml-1"></i>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        <p class="text-gray-700 leading-relaxed">{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-comments text-gray-400 text-2xl"></i>
                        </div>
                        <p class="text-gray-500 text-lg">لا توجد تعليقات بعد. كوني أول من يعلق!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endif
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

/* Prose Styling */
.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
    color: #1f2937;
    font-weight: 700;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.prose h1 {
    font-size: 2.5rem;
    line-height: 1.2;
}

.prose h2 {
    font-size: 2rem;
    line-height: 1.3;
}

.prose h3 {
    font-size: 1.5rem;
    line-height: 1.4;
}

.prose p {
    margin-bottom: 1.5rem;
    line-height: 1.8;
    font-size: 1.1rem;
}

.prose ul, .prose ol {
    margin-bottom: 1.5rem;
    padding-right: 1.5rem;
}

.prose li {
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
}

.prose blockquote {
    border-right: 4px solid #4f46e5;
    padding-right: 1.5rem;
    margin: 2rem 0;
    font-style: italic;
    color: #6b7280;
    font-size: 1.1rem;
}

.prose img {
    border-radius: 1rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    margin: 2rem 0;
}

.prose a {
    color: #4f46e5;
    text-decoration: none;
    font-weight: 600;
}

.prose a:hover {
    text-decoration: underline;
}

/* Hover Effects */
.group:hover .group-hover\:scale-115 {
    transform: scale(1.15);
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 16px;
}

::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #4f46e5, #7c3aed);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #4338ca, #6d28d9);
}

/* Animated Background */
@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-30px);
    }
}

.animate-float {
    animation: float 8s ease-in-out infinite;
}

/* Bounce Animation */
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

.animate-bounce {
    animation: bounce 3s ease-in-out infinite;
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

// Comment Form Handling
document.getElementById('comment-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    // Show loading state
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin ml-2"></i>جاري الإرسال...';
    submitBtn.disabled = true;
    
    fetch('{{ route("comments.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            showNotification(data.message, 'success');
            
            // Reset form
            this.reset();
            
            // Reload comments
            loadComments();
        } else {
            showNotification(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء إرسال التعليق', 'error');
    })
    .finally(() => {
        // Reset button state
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
});

function loadComments() {
    fetch('{{ route("comments.get", $blog->id) }}')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCommentsDisplay(data.comments);
        }
    })
    .catch(error => {
        console.error('Error loading comments:', error);
    });
}

function updateCommentsDisplay(comments) {
    const container = document.getElementById('comments-container');
    const commentsList = container.querySelector('.space-y-6') || container.querySelector('.text-center');
    
    if (comments.length === 0) {
        container.innerHTML = `
            <h3 class="text-xl font-semibold text-gray-900 mb-6 text-right">
                التعليقات (0)
            </h3>
            <div class="text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-comments text-gray-400 text-2xl"></i>
                </div>
                <p class="text-gray-500 text-lg">لا توجد تعليقات بعد. كوني أول من يعلق!</p>
            </div>
        `;
        return;
    }
    
    let commentsHtml = `
        <h3 class="text-xl font-semibold text-gray-900 mb-6 text-right">
            التعليقات (${comments.length})
        </h3>
        <div class="space-y-6">
    `;
    
    comments.forEach(comment => {
        const date = new Date(comment.created_at).toLocaleDateString('ar-SA');
        commentsHtml += `
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="flex items-start space-x-4 space-x-reverse">
                    <div class="w-12 h-12 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-lg">
                        ${comment.name.charAt(0)}
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-semibold text-gray-900">${comment.name}</h4>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                ${date}
                            </span>
                        </div>
                        <p class="text-gray-700 leading-relaxed">${comment.comment}</p>
                    </div>
                </div>
            </div>
        `;
    });
    
    commentsHtml += '</div>';
    container.innerHTML = commentsHtml;
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg text-white font-semibold transform transition-all duration-300 ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Remove after 5 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 5000);
}
</script>
@endsection