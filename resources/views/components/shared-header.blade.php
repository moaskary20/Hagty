<!-- Enhanced Header -->
<header class="bg-white shadow-lg sticky top-0 z-50">
<style>
    /* Mobile Menu Styles */
    #mobile-menu {
        transition: all 0.3s ease-in-out;
    }
    
    #mobile-menu.hidden {
        display: none !important;
    }
    
    #mobile-menu:not(.hidden) {
        display: block !important;
    }
    
    /* Ensure mobile menu button is clickable */
    #mobile-menu-button {
        cursor: pointer;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
    }
    
    /* Mobile menu animation */
    @media (max-width: 768px) {
        #mobile-menu {
            transform: translateY(-10px);
            opacity: 0;
        }
        
        #mobile-menu:not(.hidden) {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>
    <!-- Top Bar -->
    <div class="bg-gray-800 text-white py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center text-sm">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span><i class="fas fa-phone ml-1"></i> +20 123 456 7890</span>
                    <span><i class="fas fa-envelope ml-1"></i> info@hagty.com</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        @php
                            $logoPath = \App\Models\Setting::get('site_logo', 'images/hagty-logo.png');
                            $siteName = \App\Models\Setting::get('site_name', 'HAGTY');
                        @endphp
                        <img src="{{ asset($logoPath) }}" alt="{{ $siteName }}" class="h-12">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8 space-x-reverse">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-d94288 transition-colors font-medium">
                        الرئيسية
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-d94288 transition-colors font-medium">
                        عنا
                    </a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-d94288 transition-colors font-medium">
                        الاتصال بنا
                    </a>
                    <a href="{{ route('join-us') }}" class="text-gray-700 hover:text-d94288 transition-colors font-medium">
                        انضم لنا
                    </a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4 space-x-reverse">
                    <a href="{{ route('register') }}" 
                       class="bg-white border-2 border-d94288 text-d94288 px-6 py-2 rounded-full font-semibold hover:bg-d94288 hover:text-white transition-all duration-300 flex items-center">
                        <i class="fas fa-user-plus ml-2"></i>
                        الاشتراك
                    </a>
                    <a href="{{ route('login') }}" 
                       class="bg-d94288 text-white px-6 py-2 rounded-full font-semibold hover:bg-pink-700 transition-all duration-300 flex items-center">
                        <i class="fas fa-arrow-left ml-2"></i>
                        الدخول
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-d94288 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 shadow-lg">
            <div class="px-4 py-4 space-y-4">
                <a href="{{ route('home') }}" class="block text-gray-700 hover:text-d94288 transition-colors font-medium py-2">
                    الرئيسية
                </a>
                <a href="{{ route('about') }}" class="block text-gray-700 hover:text-d94288 transition-colors font-medium py-2">
                    عنا
                </a>
                <a href="{{ route('contact') }}" class="block text-gray-700 hover:text-d94288 transition-colors font-medium py-2">
                    الاتصال بنا
                </a>
                <a href="{{ route('join-us') }}" class="block text-gray-700 hover:text-d94288 transition-colors font-medium py-2">
                    انضم لنا
                </a>
                <div class="pt-4 border-t border-gray-200 space-y-3">
                    <a href="{{ route('register') }}" 
                       class="block bg-white border-2 border-d94288 text-d94288 px-6 py-2 rounded-full font-semibold hover:bg-d94288 hover:text-white transition-all duration-300 text-center">
                        <i class="fas fa-user-plus ml-2"></i>
                        الاشتراك
                    </a>
                    <a href="{{ route('login') }}" 
                       class="block bg-d94288 text-white px-6 py-2 rounded-full font-semibold hover:bg-pink-700 transition-all duration-300 text-center">
                        <i class="fas fa-arrow-left ml-2"></i>
                        الدخول
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Mobile Menu JavaScript -->
<script>
    // Function to initialize mobile menu
    function initMobileMenu() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            // Remove any existing event listeners
            mobileMenuButton.removeEventListener('click', toggleMobileMenu);
            
            // Add click event listener
            mobileMenuButton.addEventListener('click', toggleMobileMenu);
            
            // Close mobile menu when clicking on a link
            const mobileMenuLinks = mobileMenu.querySelectorAll('a');
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                });
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }
    }
    
    // Toggle mobile menu function
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu) {
            mobileMenu.classList.toggle('hidden');
            console.log('Mobile menu toggled'); // Debug log
        }
    }
    
    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', initMobileMenu);
    
    // Also initialize after a short delay to ensure all scripts are loaded
    setTimeout(initMobileMenu, 100);
</script>
