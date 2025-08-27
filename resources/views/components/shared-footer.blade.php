<!-- Redesigned Enhanced Footer -->
<footer class="enhanced-footer text-white py-20 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Footer Logo Section -->
        <div class="footer-logo-section">
            <div class="footer-logo-icon">
                <i class="fas fa-gem"></i>
            </div>
            <h3 class="footer-title">HAGTY</h3>
            <p class="footer-subtitle">منصة شاملة للمرأة العربية - كل ما تحتاجينه في مكان واحد</p>
        </div>
        
        <!-- Footer Content Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- الأقسام -->
            <div class="footer-section text-center md:text-right">
                <h4 class="footer-section-title">الأقسام</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('section', 'accessoraty') }}" class="footer-link">
                            <i class="fas fa-gem text-pink-400"></i>
                            أكسسوراتى
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('section', 'health') }}" class="footer-link">
                            <i class="fas fa-heartbeat text-red-400"></i>
                            الصحة
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('section', 'fashion') }}" class="footer-link">
                            <i class="fas fa-tshirt text-purple-400"></i>
                            الموضة
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('section', 'babies') }}" class="footer-link">
                            <i class="fas fa-baby text-blue-400"></i>
                            الأطفال
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('section', 'wedding') }}" class="footer-link">
                            <i class="fas fa-heart text-yellow-400"></i>
                            الزفاف
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- خدمات إضافية -->
            <div class="footer-section text-center md:text-right">
                <h4 class="footer-section-title">خدمات إضافية</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('section', 'beauty') }}" class="footer-link">
                            <i class="fas fa-spa text-indigo-400"></i>
                            الجمال
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('section', 'umomi') }}" class="footer-link">
                            <i class="fas fa-female text-teal-400"></i>
                            أومومتي
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('section', 'accessoraty') }}" class="footer-link">
                            <i class="fas fa-graduation-cap text-green-400"></i>
                            الكورسات
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('section', 'health') }}" class="footer-link">
                            <i class="fas fa-user-md text-orange-400"></i>
                            الاستشارات
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="footer-link">
                            <i class="fas fa-calendar-alt text-pink-400"></i>
                            الفعاليات
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- تواصل معنا -->
            <div class="footer-section text-center md:text-right">
                <h4 class="footer-section-title">تواصل معنا</h4>
                <div class="space-y-2">
                    <div class="footer-contact-item">
                        <i class="fas fa-envelope text-pink-400"></i>
                        info@hagty.com
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-phone text-green-400"></i>
                        +2010006908075
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-map-marker-alt text-blue-400"></i>
                        القاهرة، جمهورية مصر العربية
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-clock text-yellow-400"></i>
                        الأحد - الخميس: 9 ص - 6 م
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-globe text-purple-400"></i>
                        www.hagty.com
                    </div>
                </div>
            </div>
            
            <!-- تابعينا وحمل التطبيق -->
            <div class="footer-section text-center md:text-right">
                <h4 class="footer-section-title">تابعينا</h4>
                
                <!-- Social Media Grid -->
                <div class="social-media-grid">
                    <a href="#" class="social-icon facebook" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span class="icon-fallback">f</span>
                    </a>
                    <a href="#" class="social-icon instagram" title="Instagram">
                        <i class="fab fa-instagram"></i>
                        <span class="icon-fallback">📷</span>
                    </a>
                    <a href="#" class="social-icon tiktok" title="TikTok">
                        <i class="fab fa-tiktok"></i>
                        <span class="icon-fallback">🎵</span>
                    </a>
                </div>
                
                <!-- App Download Section -->
                <div class="app-download-section-footer">
                    <h5 class="app-download-title">حمل التطبيق</h5>
                    <a href="#" class="download-button-footer">
                        <i class="fab fa-google-play"></i>
                        Google Play
                    </a>
                    <a href="#" class="download-button-footer">
                        <i class="fab fa-apple"></i>
                        App Store
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p class="copyright-text">&copy; 2024 HAGTY. جميع الحقوق محفوظة.</p>
            <p class="love-text">صنع بحب ❤️ للمرأة العربية</p>
        </div>
    </div>
</footer>
