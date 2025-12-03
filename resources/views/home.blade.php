<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAGTY - منصة شاملة للمرأة العربية</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Alternative Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/auth-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-admin-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-animations.css') }}">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
        
        /* Popup Notification Styles */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .popup-content {
            background: white;
            border-radius: 15px;
            max-width: 90%;
            max-height: 90%;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            animation: popupSlideIn 0.3s ease-out;
        }
        
        @keyframes popupSlideIn {
            from {
                opacity: 0;
                transform: scale(0.8) translateY(-50px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        
        .popup-close {
            position: absolute;
            top: 10px;
            right: 15px;
            background: rgba(161, 93, 191, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }
        
        .popup-close:hover {
            background: rgba(161, 93, 191, 1);
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }
        
        .primary-color {
            color: #A15DBF;
        }
        
        .primary-bg {
            background-color: #A15DBF;
        }
        
        .primary-border {
            border-color: #A15DBF;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #A15DBF 0%, #8B4A9C 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(217, 66, 136, 0.2);
        }

        /* App Download Section - Fixed Colors */
        .app-download-section {
            background: linear-gradient(135deg, #A15DBF 0%, #B17DC0 25%, #ff8fab 50%, #ffb3c1 75%, #ffd6e0 100%) !important;
            position: relative;
            overflow: hidden;
            border-radius: 30px;
            margin: 2rem 0;
            box-shadow: 0 20px 60px rgba(217, 66, 136, 0.3);
            padding: 4rem 2rem;
        }

        .app-download-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="app-pattern" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="3" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="80" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="10" cy="60" r="1.5" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="30" r="1.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23app-pattern)"/></svg>');
            opacity: 0.3;
            animation: float 25s ease-in-out infinite;
        }

        .app-download-content {
            position: relative;
            z-index: 10;
            max-width: 1200px;
            margin: 0 auto;
        }

        .app-download-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .app-download-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .app-download-icon i {
            font-size: 2rem;
            color: white;
        }

        .app-download-title {
            font-size: 3.5rem;
            font-weight: 900;
            color: white;
            margin-bottom: 1rem;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .app-download-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .app-download-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .app-features-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 2rem;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .app-features-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .app-features-list li {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .app-features-list li:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .app-features-list li i {
            font-size: 1.5rem;
            color: #10b981;
            margin-left: 1rem;
            background: rgba(16, 185, 129, 0.2);
            padding: 0.5rem;
            border-radius: 50%;
            min-width: 3rem;
            text-align: center;
        }

        .app-features-list li span {
            color: white;
            font-size: 1.1rem;
            font-weight: 500;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .download-button {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 1rem;
        }

        .download-button:hover {
            background: rgba(255, 255, 255, 1);
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .download-button i {
            font-size: 2rem;
            color: #A15DBF;
        }

        .download-button-text {
            display: flex;
            flex-direction: column;
            text-align: right;
        }

        .store-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.25rem;
        }

        .store-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
        }

        .floating-app-icon {
            position: absolute;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: float 6s ease-in-out infinite;
        }

        .floating-app-icon:nth-child(1) {
            top: 20%;
            right: 10%;
            animation-delay: 0s;
        }

        .floating-app-icon:nth-child(2) {
            top: 60%;
            right: 5%;
            animation-delay: 2s;
        }

        .floating-app-icon:nth-child(3) {
            top: 40%;
            right: 15%;
            animation-delay: 4s;
        }

        .floating-app-icon i {
            font-size: 1.5rem;
            color: white;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .app-download-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .app-download-title {
                font-size: 2.5rem;
            }
            
            .app-features-title {
                font-size: 2rem;
            }
            
            .app-download-section {
                padding: 2rem 1rem;
            }
        }
        
        .swiper-slide {
            height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex !important;
            align-items: center;
            justify-content: center;
        }
        
        .hero-slide {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100% !important;
            height: 100% !important;
        }
        
        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                135deg,
                rgba(217, 66, 136, 0.2) 0%,
                rgba(99, 102, 241, 0.2) 50%,
                rgba(245, 158, 11, 0.2) 100%
            );
            z-index: 1;
            opacity: 0;
            transition: opacity 0.8s ease;
        }
        
        .hero-slide:hover::before {
            opacity: 1;
        }
        
        .hero-slide:hover {
            transform: scale(1.02);
        }
        
        .overlay {
            background: linear-gradient(
                135deg,
                rgba(0, 0, 0, 0.5) 0%,
                rgba(0, 0, 0, 0.3) 50%,
                rgba(0, 0, 0, 0.5) 100%
            );
            position: relative;
            z-index: 2;
        }
        
        /* إصلاح مشكلة Swiper */
        .swiper-wrapper {
            display: flex !important;
            width: 100% !important;
        }
        
        .swiper-slide {
            flex-shrink: 0 !important;
            width: 100% !important;
        }
        
        /* Sponsor Swiper specific styles */
        .sponsorSwiper .swiper-slide {
            height: 100vh !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
        }
        
        .sponsorSwiper .swiper-wrapper {
            height: 100vh !important;
        }
        
        .sponsorSwiper {
            height: 100vh !important;
        }
        
        /* Debug styles */
        .sponsorSwiper .swiper-slide {
            border: 2px solid red !important;
            min-height: 100vh !important;
        }
        
        .sponsorSwiper .swiper-slide::before {
            content: 'Slide Content' !important;
            position: absolute !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            color: white !important;
            font-size: 24px !important;
            z-index: 10 !important;
        }
        
        .sponsorSwiper .swiper-slide::after {
            content: 'Background Image' !important;
            position: absolute !important;
            top: 20% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            color: yellow !important;
            font-size: 18px !important;
            z-index: 10 !important;
        }
        
        .sponsorSwiper .swiper-slide .text-center {
            background: rgba(0,0,0,0.5) !important;
            padding: 20px !important;
            border-radius: 10px !important;
        }
        
        /* تأكيد ظهور أزرار التنقل */
        .swiper-button-next,
        .swiper-button-prev {
            opacity: 1 !important;
            visibility: visible !important;
            display: flex !important;
            z-index: 100 !important;
        }
        
        /* تحويل أزرار التنقل إلى أسهم */
        .swiper-button-next::after,
        .swiper-button-prev::after {
            content: '' !important;
            font-family: 'Font Awesome 5 Free' !important;
            font-weight: 900 !important;
            font-size: 20px !important;
            color: white !important;
        }
        
        .swiper-button-next::after {
            content: '\f054' !important; /* Font Awesome arrow-right */
        }
        
        .swiper-button-prev::after {
            content: '\f053' !important; /* Font Awesome arrow-left */
        }
        
        /* تنسيق أزرار التنقل */
        .swiper-button-next,
        .swiper-button-prev {
            width: 50px !important;
            height: 50px !important;
            background: rgba(217, 66, 136, 0.8) !important;
            border-radius: 50% !important;
            border: 2px solid white !important;
            transition: all 0.3s ease !important;
        }
        
        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(217, 66, 136, 1) !important;
            transform: scale(1.1) !important;
        }
        
        .swiper-button-disabled {
            opacity: 0.5 !important;
            cursor: not-allowed !important;
        }
        
        /* تأكيد ظهور الترقيم */
        .swiper-pagination {
            opacity: 1 !important;
            visibility: visible !important;
            display: flex !important;
            z-index: 100 !important;
        }
        
        /* تنسيق الروابط في الـ Slider */
        .hero-slide a {
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
        
        .hero-slide a:hover {
            text-decoration: none;
        }
        
        .hero-slide .glow-border {
            text-decoration: none;
        }
        
        .hero-slide .transparent-button {
            text-decoration: none;
        }
        
        .section-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .stats-card {
            background: linear-gradient(135deg, #A15DBF 0%, #B17DC0 100%);
            color: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
        }
        
        .menu-item {
            transition: all 0.3s ease;
        }
        
        .menu-item:hover {
            background-color: #A15DBF;
            color: white;
            transform: scale(1.05);
        }
        
        /* إزالة التأثيرات الافتراضية للمتصفح */
        a:focus {
            outline: none !important;
        }
        
        /* تخصيص ألوان الأزرار */
        .auth-btn-primary {
            background: #A15DBF;
            color: white;
            border: none;
        }
        
        .auth-btn-primary:hover {
            background: #c13a7a;
            color: white;
        }
        
        .auth-btn-secondary {
            background: white;
            color: #A15DBF;
            border: 2px solid #A15DBF;
        }
        
        .auth-btn-secondary:hover {
            background: #A15DBF;
            color: white;
            border-color: #A15DBF;
        }
        
        /* منع ظهور الألوان الافتراضية للمتصفح */
        a:visited {
            color: inherit;
        }
        
        a:active {
            color: inherit;
        }
        
        /* تخصيص ألوان التركيز */
        .auth-btn-primary:focus {
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(217, 66, 136, 0.3) !important;
        }
        
        .auth-btn-secondary:focus {
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(217, 66, 136, 0.3) !important;
        }
        
        /* Mobile Menu Styles are handled by shared-header component */
        
        /* خلفية متحركة من القلوب والتاج والنجوم */
        .floating-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }
        
        .floating-icon {
            position: absolute;
            opacity: 0.15;https://github.com/moaskary20/Hagty
            animation: float 8s ease-in-out infinite;
            font-size: 3rem;
            filter: drop-shadow(0 0 8px rgba(217, 66, 136, 0.3));
            z-index: 1 !important;
            display: block !important;
            visibility: visible !important;
        }
        
        .floating-icon.heart {
            font-size: 3.5rem;
        }
        
        .floating-icon.crown {
            font-size: 3.2rem;
        }
        
        .floating-icon.star {
            font-size: 3rem;
        }
        
        .floating-icon.diamond {
            font-size: 3.2rem;
        }
        
        .floating-icon.sparkle {
            font-size: 2.8rem;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.15;
            }
            25% {
                transform: translateY(-30px) rotate(8deg);
                opacity: 0.25;
            }
            50% {
                transform: translateY(-60px) rotate(0deg);
                opacity: 0.2;
            }
            75% {
                transform: translateY(-30px) rotate(-8deg);
                opacity: 0.25;
            }
        }
        
        /* تأخير مختلف لكل أيقونة */
        .floating-icon:nth-child(1) { animation-delay: 0s; }
        .floating-icon:nth-child(2) { animation-delay: 1.5s; }
        .floating-icon:nth-child(3) { animation-delay: 3s; }
        .floating-icon:nth-child(4) { animation-delay: 4.5s; }
        .floating-icon:nth-child(5) { animation-delay: 6s; }
        .floating-icon:nth-child(6) { animation-delay: 7.5s; }
        .floating-icon:nth-child(7) { animation-delay: 1s; }
        .floating-icon:nth-child(8) { animation-delay: 2.5s; }
        .floating-icon:nth-child(9) { animation-delay: 4s; }
        .floating-icon:nth-child(10) { animation-delay: 5.5s; }
        .floating-icon:nth-child(11) { animation-delay: 7s; }
        .floating-icon:nth-child(12) { animation-delay: 8.5s; }
        
        /* حركة أفقية إضافية */
        .floating-icon:nth-child(odd) {
            animation: float-horizontal 12s ease-in-out infinite;
        }
        
        @keyframes float-horizontal {
            0%, 100% {
                transform: translateX(0px) translateY(0px);
            }
            25% {
                transform: translateX(25px) translateY(-30px);
            }
            50% {
                transform: translateX(0px) translateY(-60px);
            }
            75% {
                transform: translateX(-25px) translateY(-30px);
            }
        }
        
        /* تحسين الوضوح */
        .floating-icon {
            text-shadow: 0 0 10px rgba(217, 66, 136, 0.5);
        }
        
        /* تأثير توهج إضافي */
        .floating-icon::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(217, 66, 136, 0.1) 0%, transparent 70%);
            transform: translate(-50%, -50%);
            border-radius: 50%;
            z-index: -1;
        }
        
        /* إصلاح مشكلة z-index */
        .floating-background {
            z-index: 0 !important;
        }
        
        /* تأكد من ظهور الأيقونات */
        .floating-icon {
            z-index: 1 !important;
            display: block !important;
            visibility: visible !important;
        }
        
        /* تأثيرات متحركة للنصوص في Hero Section */
        .hero-title {
            animation: heroTitleSlideIn 1.2s ease-out 0.3s both;
            transform: translateY(60px);
            opacity: 0;
            position: relative;
            z-index: 3;
        }
        
        .hero-subtitle {
            animation: heroSubtitleSlideIn 1.2s ease-out 0.6s both;
            transform: translateY(60px);
            opacity: 0;
            position: relative;
            z-index: 3;
        }
        
        .hero-button {
            animation: heroButtonSlideIn 1.2s ease-out 0.9s both;
            transform: translateY(60px);
            opacity: 0;
            position: relative;
            z-index: 3;
        }
        
        @keyframes heroTitleSlideIn {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        @keyframes heroSubtitleSlideIn {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        @keyframes heroButtonSlideIn {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        /* تأثيرات متحركة للخلفية */
        .hero-slide.active {
            animation: heroBackgroundZoom 25s ease-in-out infinite;
        }
        
        @keyframes heroBackgroundZoom {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }
        
        /* تأثيرات متحركة للأزرار في Hero Section */
        .hero-cta-button {
            background: linear-gradient(45deg, #A15DBF, #B17DC0);
            border: none;
            padding: 18px 45px;
            border-radius: 50px;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            position: relative;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(217, 66, 136, 0.3);
            cursor: pointer;
        }
        
        .hero-cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.8s ease;
        }
        
        .hero-cta-button:hover::before {
            left: 100%;
        }
        
        .hero-cta-button:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 40px rgba(217, 66, 136, 0.4);
            background: linear-gradient(45deg, #B17DC0, #A15DBF);
        }
        
        .hero-cta-button:active {
            transform: translateY(-2px) scale(1.02);
        }
        
        /* تأثيرات متحركة للعناصر في Hero Section */
        .hero-content {
            animation: heroContentFadeIn 1.5s ease-out 0.5s both;
            opacity: 0;
            transform: translateY(30px);
        }
        
        @keyframes heroContentFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* تأثيرات متحركة للصور في Hero Section */
        .hero-image {
            animation: heroImageFloat 8s ease-in-out infinite;
        }
        
        @keyframes heroImageFloat {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }
        
        /* تأثيرات متحركة للخلفية المتحركة */
        .hero-background-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        
        .hero-particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(217, 66, 136, 0.3);
            border-radius: 50%;
            animation: particleFloat 15s linear infinite;
        }
        
        @keyframes particleFloat {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) translateX(100px);
                opacity: 0;
            }
        }
        
        /* تحسين تصميم البطاقات مع hover effects متقدمة */
        .enhanced-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            position: relative;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(217, 66, 136, 0.1);
        }
        
        .enhanced-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(217, 66, 136, 0.05), transparent);
            transition: left 0.8s ease;
            z-index: 1;
        }
        
        .enhanced-card:hover::before {
            left: 100%;
        }
        
        .enhanced-card:hover {
            transform: translateY(-12px) scale(1.03);
            box-shadow: 0 20px 40px rgba(217, 66, 136, 0.15);
            border-color: rgba(217, 66, 136, 0.3);
        }
        
        /* تأثيرات متحركة للأيقونات داخل البطاقات */
        .enhanced-card .w-16 {
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            z-index: 2;
        }
        
        .enhanced-card:hover .w-16 {
            transform: scale(1.15) rotate(5deg);
            box-shadow: 0 10px 25px rgba(217, 66, 136, 0.3);
        }
        
        /* تأثيرات متحركة للنصوص داخل البطاقات */
        .enhanced-card h4 {
            transition: all 0.4s ease;
            position: relative;
            z-index: 2;
        }
        
        .enhanced-card:hover h4 {
            color: #A15DBF;
            transform: translateY(-2px);
        }
        
        .enhanced-card p {
            transition: all 0.4s ease;
            position: relative;
            z-index: 2;
        }
        
        .enhanced-card:hover p {
            transform: translateY(-1px);
        }
        
        /* تأثيرات متحركة للأزرار داخل البطاقات */
        .enhanced-card button,
        .enhanced-card a {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            z-index: 2;
            overflow: hidden;
        }
        
        .enhanced-card button::before,
        .enhanced-card a::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.6s ease;
        }
        
        .enhanced-card button:hover::before,
        .enhanced-card a:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .enhanced-card button:hover,
        .enhanced-card a:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(217, 66, 136, 0.3);
        }
        
        /* تأثيرات متحركة للبطاقات الإحصائية */
        .stats-card {
            background: linear-gradient(135deg, #A15DBF 0%, #B17DC0 100%);
            color: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }
        
        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.8s ease;
        }
        
        .stats-card:hover::before {
            left: 100%;
        }
        
        .stats-card:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 20px 40px rgba(217, 66, 136, 0.3);
        }
        
        /* تأثيرات متحركة للبطاقات في الأقسام */
        .section-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(217, 66, 136, 0.1);
        }
        
        .section-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(217, 66, 136, 0.15);
            border-color: rgba(217, 66, 136, 0.3);
        }
        
        /* تأثيرات متحركة للصور داخل البطاقات */
        .enhanced-card img {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .enhanced-card:hover img {
            transform: scale(1.1) rotate(2deg);
        }
        
        /* تأثيرات متحركة للبطاقات عند التمرير */
        .enhanced-card {
            animation: cardFloat 6s ease-in-out infinite;
        }
        
        @keyframes cardFloat {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }
        
        .enhanced-card:hover {
            animation: none;
        }
        
        /* 3D Transformations للعناصر */
        .card-3d {
            perspective: 1000px;
            transform-style: preserve-3d;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .card-3d:hover {
            transform: rotateX(10deg) rotateY(10deg) translateZ(20px);
            box-shadow: 
                0 20px 40px rgba(217, 66, 136, 0.2),
                0 0 0 1px rgba(217, 66, 136, 0.1);
        }
        
        /* 3D Transformations للبطاقات */
        .enhanced-card {
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        
        .enhanced-card:hover {
            transform: translateY(-12px) scale(1.03) rotateX(5deg) rotateY(5deg);
            box-shadow: 
                0 25px 50px rgba(217, 66, 136, 0.2),
                0 0 0 1px rgba(217, 66, 136, 0.1);
        }
        
        /* 3D Transformations للأيقونات */
        .enhanced-card .w-16 {
            transform-style: preserve-3d;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .enhanced-card:hover .w-16 {
            transform: scale(1.15) rotateX(15deg) rotateY(15deg) translateZ(30px);
            box-shadow: 
                0 15px 35px rgba(217, 66, 136, 0.3),
                0 0 0 1px rgba(217, 66, 136, 0.1);
        }
        
        /* 3D Transformations للأزرار */
        .enhanced-card button,
        .enhanced-card a {
            transform-style: preserve-3d;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .enhanced-card button:hover,
        .enhanced-card a:hover {
            transform: translateY(-2px) rotateX(5deg) rotateY(5deg) translateZ(15px);
            box-shadow: 
                0 12px 25px rgba(217, 66, 136, 0.3),
                0 0 0 1px rgba(217, 66, 136, 0.1);
        }
        
        /* 3D Transformations للصور */
        .enhanced-card img {
            transform-style: preserve-3d;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .enhanced-card:hover img {
            transform: scale(1.1) rotateX(10deg) rotateY(10deg) translateZ(25px);
        }
        
        /* 3D Transformations للبطاقات الإحصائية */
        .stats-card {
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        
        .stats-card:hover {
            transform: translateY(-8px) scale(1.05) rotateX(8deg) rotateY(8deg);
            box-shadow: 
                0 25px 50px rgba(217, 66, 136, 0.3),
                0 0 0 1px rgba(217, 66, 136, 0.1);
        }
        
        /* 3D Transformations لبطاقات الأقسام */
        .section-card {
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        
        .section-card:hover {
            transform: translateY(-8px) rotateX(5deg) rotateY(5deg);
            box-shadow: 
                0 25px 50px rgba(217, 66, 136, 0.2),
                0 0 0 1px rgba(217, 66, 136, 0.1);
        }
        
        /* 3D Transformations للقوائم */
        .menu-item {
            transform-style: preserve-3d;
            perspective: 800px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .menu-item:hover {
            transform: rotateX(10deg) rotateY(10deg) translateZ(10px);
            background-color: #A15DBF;
            color: white;
        }
        
        /* 3D Transformations للبطاقات في الأقسام */
        .section-card .enhanced-card {
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        
        .section-card .enhanced-card:hover {
            transform: translateY(-15px) scale(1.05) rotateX(8deg) rotateY(8deg);
            box-shadow: 
                0 30px 60px rgba(217, 66, 136, 0.25),
                0 0 0 1px rgba(217, 66, 136, 0.1);
        }
        
        /* 3D Transformations للعناصر في Hero Section */
        .hero-section {
            perspective: 1200px;
        }
        
        .hero-slide {
            transform-style: preserve-3d;
        }
        
        .hero-slide:hover {
            transform: scale(1.02) rotateX(2deg) rotateY(2deg);
        }
        
        .hero-title {
            transform-style: preserve-3d;
        }
        
        .hero-title:hover {
            transform: translateZ(20px) rotateX(5deg);
        }
        
        .hero-subtitle {
            transform-style: preserve-3d;
        }
        
        .hero-subtitle:hover {
            transform: translateZ(15px) rotateX(3deg);
        }
        
        .hero-button {
            transform-style: preserve-3d;
        }
        
        .hero-button:hover {
            transform: translateZ(25px) rotateX(8deg) rotateY(5deg);
        }
        
        /* 3D Transformations للخلفية المتحركة */
        .floating-icon {
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        
        .floating-icon:hover {
            transform: rotateX(15deg) rotateY(15deg) translateZ(20px) scale(1.2);
            filter: drop-shadow(0 0 15px rgba(217, 66, 136, 0.5));
        }
        
        /* 3D Transformations للصور */
        .image-3d {
            transform-style: preserve-3d;
            perspective: 1000px;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .image-3d:hover {
            transform: rotateX(15deg) rotateY(15deg) translateZ(30px) scale(1.1);
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(217, 66, 136, 0.2);
        }
        
        /* 3D Transformations للنصوص */
        .text-3d {
            transform-style: preserve-3d;
            perspective: 800px;
            transition: all 0.4s ease;
        }
        
        .text-3d:hover {
            transform: translateZ(15px) rotateX(5deg);
            text-shadow: 
                0 5px 15px rgba(217, 66, 136, 0.3),
                0 0 0 1px rgba(217, 66, 136, 0.1);
        }
        
        /* 3D Transformations للأزرار */
        .button-3d {
            transform-style: preserve-3d;
            perspective: 1000px;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .button-3d:hover {
            transform: translateY(-3px) rotateX(10deg) rotateY(10deg) translateZ(20px);
            box-shadow: 
                0 15px 30px rgba(217, 66, 136, 0.3),
                0 0 0 1px rgba(217, 66, 136, 0.1);
        }
        
        /* 3D Transformations للبطاقات عند التمرير */
        .card-3d-scroll {
            transform-style: preserve-3d;
            perspective: 1000px;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-3d-scroll:hover {
            transform: rotateX(15deg) rotateY(15deg) translateZ(40px);
            box-shadow: 
                0 35px 70px rgba(217, 66, 136, 0.3),
                0 0 0 1px rgba(217, 66, 136, 0.1);
        }
        
        /* 3D Transformations للعناصر في الأقسام */
        .section-3d {
            perspective: 1200px;
        }
        
        .section-3d .enhanced-card {
            transform-style: preserve-3d;
        }
        
        .section-3d .enhanced-card:hover {
            transform: translateY(-20px) scale(1.08) rotateX(12deg) rotateY(12deg);
            box-shadow: 
                0 40px 80px rgba(217, 66, 136, 0.3),
                0 0 0 1px rgba(217, 66, 136, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#FFFFFF] to-[#E6DAC8] min-h-screen">
    <!-- خلفية متحركة من القلوب والتاج والنجوم -->
    <div class="floating-background">
        <div class="floating-icon heart" style="top: 10%; left: 5%;">❤️</div>
        <div class="floating-icon crown" style="top: 15%; left: 85%;">👑</div>
        <div class="floating-icon star" style="top: 25%; left: 15%;">⭐</div>
        <div class="floating-icon diamond" style="top: 35%; left: 80%;">💎</div>
        <div class="floating-icon sparkle" style="top: 45%; left: 10%;">✨</div>
        <div class="floating-icon heart" style="top: 55%; left: 90%;">❤️</div>
        <div class="floating-icon crown" style="top: 65%; left: 20%;">👑</div>
        <div class="floating-icon star" style="top: 75%; left: 75%;">⭐</div>
        <div class="floating-icon diamond" style="top: 85%; left: 5%;">💎</div>
        <div class="floating-icon sparkle" style="top: 20%; left: 60%;">✨</div>
        <div class="floating-icon heart" style="top: 40%; left: 40%;">❤️</div>
        <div class="floating-icon crown" style="top: 60%; left: 50%;">👑</div>
    </div>
    
    @include('components.shared-header')

    <!-- Enhanced Hero Slider -->
    <section id="home" class="hero-section relative">
        <!-- Floating Animated Elements -->
        <div class="floating-element text-6xl opacity-60" style="z-index: 20;">
            <i class="fas fa-gem text-yellow-300"></i>
        </div>
        <div class="floating-element text-5xl opacity-60" style="z-index: 20;">
            <i class="fas fa-heart text-pink-200"></i>
        </div>
        <div class="floating-element text-4xl opacity-60" style="z-index: 20;">
            <i class="fas fa-star text-yellow-200"></i>
        </div>
        <div class="floating-element text-5xl opacity-60" style="top: 40%; right: 25%; z-index: 20;">
            <i class="fas fa-crown text-purple-200"></i>
        </div>
        <div class="floating-element text-4xl opacity-60" style="bottom: 40%; right: 30%; z-index: 20;">
            <i class="fas fa-sparkles text-pink-300"></i>
        </div>
        
        <div class="swiper hero-swiper" dir="rtl">
            <div class="swiper-wrapper">
                @if(isset($forasy_banners) && $forasy_banners->count() > 0)
                    @foreach($forasy_banners as $banner)
                    <div class="swiper-slide hero-slide" style="background-image: url('{{ \Illuminate\Support\Str::startsWith($banner->banner_image, ['http', 'https']) ? $banner->banner_image : Storage::url($banner->banner_image) }}');">
                        @if($banner->show_overlay)
                        <div class="overlay absolute inset-0 bg-gradient-to-t from-[#A15DBF]/50 to-transparent"></div>
                        @endif
                        <div class="absolute inset-0 flex items-center justify-{{ $banner->text_position ?? 'center' }}">
                            <div class="text-center text-white section-fade-in max-w-4xl mx-auto px-4">
                                @if($banner->main_title)
                                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-shadow-lg" style="color: {{ $banner->text_color ?? '#ffffff' }}">
                                    {{ $banner->main_title }}
                                </h1>
                                @endif
                                @if($banner->subtitle)
                                <p class="text-xl md:text-2xl mb-8 text-shadow-md" style="color: {{ $banner->text_color ?? '#ffffff' }}">
                                    {{ $banner->subtitle }}
                                </p>
                                @endif
                                @if($banner->button_text)
                                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                    @if($banner->button_url)
                                    <a href="{{ $banner->button_url }}" class="px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg" class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] hover:from-[#8B4A9C] hover:to-[#753880]" style="color: white;">
                                        <i class="fas fa-arrow-left ml-2"></i>
                                        {{ $banner->button_text }}
                                    </a>
                                    @else
                                    <button class="px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg" class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] hover:from-[#8B4A9C] hover:to-[#753880]" style="color: white;">
                                        <i class="fas fa-arrow-left ml-2"></i>
                                        {{ $banner->button_text }}
                                    </button>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Default Slides if no banners in database -->
                    <div class="swiper-slide hero-slide" style="background-image: url('https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80');">
                        <div class="overlay absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white section-fade-in">
                                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-shadow-lg">
                                    مرحباً بك في <span class="text-yellow-300 animate-pulse">HAGTY</span>
                                </h1>
                                <p class="text-xl md:text-2xl mb-8 text-pink-100 leading-relaxed">
                                    منصة شاملة للمرأة العربية - كل ما تحتاجينه في مكان واحد
                                </p>
                                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                    <a href="#about" class="glow-border pulse-button">
                                        <div class="content">
                                            <span class="text-d94288 font-bold text-lg flex items-center justify-center">
                                                <i class="fas fa-rocket ml-2 animated-icon"></i>اكتشفي المزيد
                                            </span>
                                        </div>
                                    </a>
                                    <a href="{{ route('register') }}" class="transparent-button inline-block px-8 py-3 border-2 border-white text-white font-bold text-lg hover:bg-white hover:text-d94288 transition-all duration-300 transform hover:scale-105">
                                        <i class="fas fa-heart ml-2 animated-icon"></i>انضمي إلينا
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            
            <!-- Enhanced Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            
            <!-- Enhanced Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>


    <!-- Enhanced Search Section -->
    <section id="search" class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-16 h-16 bg-d94288 rounded-full animate-ping"></div>
            <div class="absolute top-40 right-32 w-12 h-12 bg-[#A15DBF] rounded-full animate-pulse"></div>
            <div class="absolute bottom-32 left-40 w-20 h-20 bg-[#E6A0C3] rounded-full animate-bounce"></div>
        </div>
        
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <div class="w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg" style="background: linear-gradient(135deg, #d94288 0%, #9333ea 100%);">
                    <i class="fas fa-search animated-icon" style="color: white; font-size: 2.5rem; display: block;"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    ابحثي في <span class="text-d94288">المنصة</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    اكتشفي كل ما تحتاجينه بسهولة وسرعة - منصة HAGTY تجمع لك كل شيء في مكان واحد
                </p>
            </div>
            
            <div class="enhanced-search rounded-3xl p-8 shadow-2xl">
                <form action="{{ route('search') }}" method="GET" class="space-y-8">
                    <div class="flex flex-col lg:flex-row gap-6">
                        <div class="flex-1">
                            <label for="search-input" class="block text-sm font-semibold text-gray-700 mb-3 text-right">
                                <i class="fas fa-lightbulb ml-2 text-yellow-500"></i>ماذا تبحثين عنه؟
                            </label>
                            <input 
                                id="search-input"
                                type="text" 
                                name="q" 
                                placeholder="ابحثي عن: كورس تعليمي، طبيبة، صيحة موضة، نصيحة تجميل..."
                                value="{{ request('q') }}"
                                class="newsletter-input w-full px-6 py-5 border-2 border-gray-200 rounded-2xl focus:ring-2 focus:ring-d94288 focus:border-transparent text-right text-lg transition-all duration-300 bg-white shadow-lg"
                                required
                            >
                        </div>
                        <div class="lg:w-auto">
                            <button type="submit" class="w-full lg:w-auto bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-10 py-5 rounded-2xl hover:from-[#8B4A9C] hover:to-[#753880] transition-all duration-300 font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-2 pulse-button search-submit-btn">
                                <i class="fas fa-search ml-3 text-xl"></i>ابحثي الآن
                            </button>
                        </div>
                    </div>
                    
                    <!-- Quick Search Categories -->
                    <div class="pt-6 border-t border-gray-200">
                        <p class="text-center text-gray-600 mb-6 font-medium">
                            <i class="fas fa-bolt ml-2 text-yellow-500"></i>بحث سريع في الأقسام الشائعة
                        </p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <button type="button" onclick="setQuickSearch('كورس تجميل')" class="quick-search-category">
                                <i class="fas fa-palette text-2xl mb-2" style="color: #a15dbf;"></i>
                                <span>كورسات التجميل</span>
                            </button>
                            <button type="button" onclick="setQuickSearch('طبيبة نساء')" class="quick-search-category">
                                <i class="fas fa-user-md text-2xl mb-2" style="color: #a15dbf;"></i>
                                <span>طبيبات متخصصات</span>
                            </button>
                            <button type="button" onclick="setQuickSearch('صيحة موضة')" class="quick-search-category">
                                <i class="fas fa-tshirt text-2xl mb-2" style="color: #a15dbf;"></i>
                                <span>صيحات الموضة</span>
                            </button>
                            <button type="button" onclick="setQuickSearch('نصيحة تجميل')" class="quick-search-category">
                                <i class="fas fa-spa text-2xl mb-2" style="color: #a15dbf;"></i>
                                <span>نصائح التجميل</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Sections Gallery -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    اكتشفي <span class="text-d94288">أقسامنا</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    منصة شاملة تجمع لك كل ما تحتاجينه في مكان واحد
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- رحلتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'rehlaaty') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=400&fit=crop&crop=center" 
                                 alt="رحلتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">رحلتي</h3>
                    <p class="text-sm text-gray-600 mt-1">اكتشفي العالم</p>
                </div>

                <!-- عائلتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'family') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?w=400&h=400&fit=crop&crop=center" 
                                 alt="عائلتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">عائلتي</h3>
                    <p class="text-sm text-gray-600 mt-1">رعاية العائلة</p>
                </div>

                <!-- أومومتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'umomi') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?w=400&h=400&fit=crop&crop=center" 
                                 alt="أومومتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">أومومتي</h3>
                    <p class="text-sm text-gray-600 mt-1">رعاية الأمومة</p>
                </div>

                <!-- زفافي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'wedding') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=400&h=400&fit=crop&crop=center" 
                                 alt="زفافي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">زفافي</h3>
                    <p class="text-sm text-gray-600 mt-1">يومك الخاص</p>
                </div>

                <!-- جمالي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'beauty') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=400&h=400&fit=crop&crop=center" 
                                 alt="جمالي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">جمالي</h3>
                    <p class="text-sm text-gray-600 mt-1">عناية وجمال</p>
                </div>

                <!-- أكسسوراتى -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'accessoraty') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400&h=400&fit=crop&crop=center" 
                                 alt="أكسسوراتى" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">أكسسوراتى</h3>
                    <p class="text-sm text-gray-600 mt-1">إكسسوارات عصرية</p>
                </div>

                <!-- صحتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'health') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400&h=400&fit=crop&crop=center" 
                                 alt="صحتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">صحتي</h3>
                    <p class="text-sm text-gray-600 mt-1">رعاية صحية</p>
                </div>

                <!-- أطفالي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'babies') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?w=400&h=400&fit=crop&crop=center" 
                                 alt="أطفالي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">أطفالي</h3>
                    <p class="text-sm text-gray-600 mt-1">رعاية الأطفال</p>
                </div>






                <!-- الموضة -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'fashion') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?w=400&h=400&fit=crop&crop=center" 
                                 alt="الموضة" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">الموضة</h3>
                    <p class="text-sm text-gray-600 mt-1">أحدث الصيحات</p>
                </div>


                <!-- فرحي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'joy') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400&h=400&fit=crop&crop=center" 
                                 alt="فرحي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">فرحي</h3>
                    <p class="text-sm text-gray-600 mt-1">مناسبات سعيدة</p>
                </div>

                <!-- ايفينتاتى -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('eventaty.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=400&h=400&fit=crop&crop=center" 
                                 alt="ايفينتاتى" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">ايفينتاتى</h3>
                    <p class="text-sm text-gray-600 mt-1">فعاليات وحفلات</p>
                </div>

                <!-- فورصى -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('forasy.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=400&h=400&fit=crop&crop=center" 
                                 alt="فورصى" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">فورصى</h3>
                    <p class="text-sm text-gray-600 mt-1">فرص عمل</p>
                </div>

                <!-- هديتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('hadiety.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1513885535751-8b9238bd345a?w=400&h=400&fit=crop&crop=center" 
                                 alt="هديتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">هديتي</h3>
                    <p class="text-sm text-gray-600 mt-1">أفكار هدايا</p>
                </div>

                <!-- بيتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('beity.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1484101403633-562f891dc89a?w=400&h=400&fit=crop&crop=center" 
                                 alt="بيتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">بيتي</h3>
                    <p class="text-sm text-gray-600 mt-1">ديكور وأثاث</p>
                </div>

                <!-- حساباتى -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('hesabaty.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=400&h=400&fit=crop&crop=center" 
                                 alt="حساباتى" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">حساباتى</h3>
                    <p class="text-sm text-gray-600 mt-1">إدارة مالية</p>
                </div>

                <!-- رياضتي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('riadaty.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?w=400&h=400&fit=crop&crop=center" 
                                 alt="رياضتي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">رياضتي</h3>
                    <p class="text-sm text-gray-600 mt-1">لياقة ورياضة</p>
                </div>

                <!-- مشروعي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('mashroay.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&h=400&fit=crop&crop=center" 
                                 alt="مشروعي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">مشروعي</h3>
                    <p class="text-sm text-gray-600 mt-1">ريادة أعمال</p>
                </div>

                <!-- مستشاري -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('mostashary.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop&crop=center" 
                                 alt="مستشاري" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">مستشاري</h3>
                    <p class="text-sm text-gray-600 mt-1">استشارات متنوعة</p>
                </div>

                <!-- مستمعي -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('mostamay.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=400&fit=crop&crop=center" 
                                 alt="مستمعي" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">مستمعي</h3>
                    <p class="text-sm text-gray-600 mt-1">تطوير ذات</p>
                </div>

                <!-- نساء الغد -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('nesaa-alghad.index') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400&h=400&fit=crop&crop=center" 
                                 alt="نساء الغد" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">نساء الغد</h3>
                    <p class="text-sm text-gray-600 mt-1">تمكين المرأة</p>
                </div>
            </div>
        </div>
    </section>

    @if(isset($sponsor_banners) && $sponsor_banners->count() > 0)
        <!-- Debug: عدد البانرات = {{ $sponsor_banners->count() }} -->
        <!-- Sponsor Banners Slider -->
        <section class="relative overflow-hidden">
            <div class="w-full">
                <div class="text-center py-16 bg-white">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full mb-6 shadow-lg" style="background: linear-gradient(135deg, #a15dbf 0%, #8B4A9C 100%);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 640 512" fill="white">
                            <path d="M323.4 85.2l-96.8 78.4c-16.1 13-19.2 36.4-7 53.1c12.9 17.8 38 21.3 55.3 7.8l99.3-77.2c7-5.4 17-4.2 22.5 2.8s4.2 17-2.8 22.5l-20.9 16.2L512 316.8V128h-.7l-3.9-2.5L434.8 79c-15.3-9.8-33.2-15-51.4-15c-21.8 0-43 7.5-60 21.2zm22.8 124.4l-51.7 40.2C263 274.4 217.3 268 193.7 235.6c-22.2-30.5-16.6-73.1 12.7-96.8l83.2-67.3c-11.6-4.9-24.1-7.4-36.8-7.4C234 64 215.7 69.6 200 80l-72 48V352h28.2l91.4 83.4c19.6 17.9 49.9 16.5 67.8-3.1c5.5-6.1 9.2-13.2 11.1-20.6l17 15.6c19.5 17.9 49.9 16.6 67.8-2.9c4.5-4.9 7.8-10.6 9.9-16.5c19.4 13 45.8 10.3 62.1-7.5c17.9-19.5 16.6-49.9-2.9-67.8l-134.2-123zM16 128c-8.8 0-16 7.2-16 16V352c0 17.7 14.3 32 32 32H64c17.7 0 32-14.3 32-32V128H16zM48 320a16 16 0 1 1 0 32 16 16 0 1 1 0-32zM544 128V352c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V144c0-8.8-7.2-16-16-16H544zm32 208a16 16 0 1 1 32 0 16 16 0 1 1 -32 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        شركاؤنا <span style="color: #a15dbf;">المميزون</span>
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        اكتشفي أفضل العروض والخدمات من شركائنا الموثوقين
                    </p>
                </div>
                
                <div class="swiper sponsorSwiper" dir="rtl">
                    <div class="swiper-wrapper">
                        @foreach($sponsor_banners as $banner)
                        <div class="swiper-slide hero-slide" style="background-image: url('{{ \Illuminate\Support\Str::startsWith($banner->image, ['http', 'https']) ? $banner->image : Storage::url($banner->image) }}');">
                            @if($banner->show_overlay)
                            <div class="overlay absolute inset-0 bg-gradient-to-t from-[#A15DBF]/50 to-transparent"></div>
                            @endif
                            <div class="absolute inset-0 flex items-center justify-{{ $banner->text_position ?? 'center' }}">
                                <div class="text-center text-white section-fade-in max-w-4xl mx-auto px-4">
                                    @if($banner->main_title)
                                    <h3 class="text-4xl md:text-6xl font-bold mb-6 text-shadow-lg group-hover:text-yellow-300 transition-colors duration-300" style="color: {{ $banner->text_color ?? '#ffffff' }}">
                                        {{ $banner->main_title }}
                                    </h3>
                                    @endif
                                    @if($banner->subtitle)
                                    <p class="text-xl md:text-2xl mb-8 text-shadow-md opacity-90" style="color: {{ $banner->text_color ?? '#ffffff' }}">
                                        {{ $banner->subtitle }}
                                    </p>
                                    @endif
                                    @if($banner->button_text)
                                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                        @if($banner->link_url)
                                        <a href="{{ $banner->link_url }}" target="_blank" class="px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg" class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] hover:from-[#8B4A9C] hover:to-[#753880]" style="color: white;">
                                            <i class="fas fa-external-link-alt ml-2"></i>
                                            {{ $banner->button_text }}
                                        </a>
                                        @else
                                        <button class="px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg" class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] hover:from-[#8B4A9C] hover:to-[#753880]" style="color: white;">
                                            <i class="fas fa-external-link-alt ml-2"></i>
                                            {{ $banner->button_text }}
                                        </button>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Enhanced Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    
                    <!-- Enhanced Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Initializing Sponsor Swiper...');
            const sponsorSwiperElement = document.querySelector('.sponsorSwiper');
            if (!sponsorSwiperElement) {
                console.error('Sponsor Swiper element not found!');
                return;
            }
            console.log('Sponsor Swiper element found:', sponsorSwiperElement);
            
            const sponsorSwiper = new Swiper('.sponsorSwiper', {
                direction: 'horizontal',
                dir: 'rtl',
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                    reverseDirection: false,
                },
                pagination: {
                    el: '.sponsorSwiper .swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '"></span>';
                    },
                },
                navigation: {
                    nextEl: '.sponsorSwiper .swiper-button-prev',
                    prevEl: '.sponsorSwiper .swiper-button-next',
                    disabledClass: 'swiper-button-disabled',
                },
                effect: 'slide',
                speed: 800,
                grabCursor: true,
                watchOverflow: true,
                on: {
                    init: function() {
                        console.log('Sponsor Swiper initialized successfully!');
                        console.log('Number of slides:', this.slides.length);
                        // Force button visibility after initialization
                        setTimeout(() => {
                            const nextBtn = document.querySelector('.sponsorSwiper .swiper-button-next');
                            const prevBtn = document.querySelector('.sponsorSwiper .swiper-button-prev');
                            const pagination = document.querySelector('.sponsorSwiper .swiper-pagination');
                            
                            if (nextBtn) {
                                nextBtn.style.opacity = '1';
                                nextBtn.style.visibility = 'visible';
                                nextBtn.style.display = 'flex';
                            }
                            if (prevBtn) {
                                prevBtn.style.opacity = '1';
                                prevBtn.style.visibility = 'visible';
                                prevBtn.style.display = 'flex';
                            }
                            if (pagination) {
                                pagination.style.opacity = '1';
                                pagination.style.visibility = 'visible';
                                pagination.style.display = 'flex';
                            }
                        }, 100);
                    },
                    slideChange: function() {
                        // Ensure buttons remain visible after slide change
                        const nextBtn = document.querySelector('.sponsorSwiper .swiper-button-next');
                        const prevBtn = document.querySelector('.sponsorSwiper .swiper-button-prev');
                        if (nextBtn) nextBtn.style.opacity = '1';
                        if (prevBtn) prevBtn.style.opacity = '1';
                    },
                }
            });
            
            console.log('Sponsor Swiper setup completed!');
            console.log('Sponsor Swiper instance:', sponsorSwiper);
        });
    </script>
    @endif

    <!-- Blog Section -->
    @if(isset($latest_blogs) && $latest_blogs->count() > 0)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-6" style="background: #ffffff; border: 3px solid #a15dbf;">
                    <i class="fas fa-crown text-2xl" style="color: #a15dbf; display: block;"></i>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    الأكثر <span class="text-d94288">رواجاً</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    اكتشفي آخر المقالات والنصائح المفيدة من خبرائنا
                </p>
            </div>

            <!-- Blog Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                @foreach($latest_blogs as $blog)
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow group">
                    @if($blog->featured_image)
                        <div class="aspect-w-16 aspect-h-9">
                            <img src="{{ \Illuminate\Support\Str::startsWith($blog->featured_image, ['http', 'https']) ? $blog->featured_image : Storage::url($blog->featured_image) }}" 
                                 alt="{{ $blog->title }}"
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-block bg-d94288 text-white text-xs px-3 py-1 rounded-full">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-lg font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-d94288 transition-colors">
                            <a href="{{ route('articles.show', $blog->slug) }}">
                                {{ $blog->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {{ $blog->excerpt }}
                        </p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center">
                                <i class="fas fa-user ml-1"></i>
                                <span>{{ $blog->author_name ?? 'غير محدد' }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-eye ml-1"></i>
                                <span>{{ $blog->views_count }}</span>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center">
                <a href="{{ route('articles.index') }}" 
                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white font-bold rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح أحدث الموضوعات
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Customer Reviews Section -->
    <section class="pt-8 pb-20 reviews-section relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg" style="background: #ffffff; border: 3px solid #a15dbf;">
                    <i class="fas fa-comments text-3xl animated-icon" style="color: #a15dbf; display: block;"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    تجارب <span class="text-d94288">العملاء</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    ماذا يقول عملاؤنا عن منصة HAGTY - قصص نجاح حقيقية
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="review-card p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-d94288 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl ml-4">
                            س
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">سارة أحمد</h4>
                            <div class="star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        "منصة رائعة! استفدت كثيراً من كورسات التجميل والموضة. المدربات محترفات والمنصة سهلة الاستخدام."
                    </p>
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-graduation-cap ml-1"></i>طالبة في كورسات التجميل
                    </div>
                </div>
                
                <!-- Review 2 -->
                <div class="review-card p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-bold text-xl ml-4">
                            ف
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">فاطمة محمد</h4>
                            <div class="star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        "حجزت موعد مع طبيبة نساء ممتازة من خلال المنصة. الخدمة احترافية والرعاية ممتازة."
                    </p>
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-heartbeat ml-1"></i>مستخدمة قسم الصحة
                    </div>
                </div>
                
                <!-- Review 3 -->
                <div class="review-card p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-xl ml-4">
                            ن
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">نور الهدى</h4>
                            <div class="star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        "أفضل منصة للمرأة العربية! كل شيء متوفر في مكان واحد. أنصح بها بشدة."
                    </p>
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-gem ml-1"></i>مستخدمة نشطة
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Enhanced App Download Section -->
    <!-- HAGTY App Section -->
    <section class="py-12 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <img src="{{ asset('images/hagty-app-banner.png') }}" 
                 alt="تطبيق HAGTY" 
                 class="w-full h-auto rounded-2xl shadow-lg">
        </div>
    </section>





    <!-- Newsletter Section -->
    <section class="py-20 newsletter-section relative overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <div class="w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg" style="background: linear-gradient(135deg, #e8b4d9 0%, #d8a3ce 100%);">
                    <i class="fas fa-envelope animated-icon" style="color: white; font-size: 2.5rem; display: block;"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    انضمي إلى <span class="text-d94288">النشرة الإخبارية</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    احصلي على آخر الأخبار والعروض الخاصة والكورسات الجديدة مباشرة في بريدك الإلكتروني
                </p>
            </div>
            
            <div class="newsletter-form p-8 text-center">
                <form class="space-y-6">
                    <div class="flex flex-col lg:flex-row gap-4 max-w-2xl mx-auto">
                        <div class="flex-1">
                            <input 
                                type="email" 
                                placeholder="أدخلي بريدك الإلكتروني..."
                                class="newsletter-input w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-d94288 focus:border-transparent text-right text-lg transition-all duration-300"
                                required
                            >
                        </div>
                        <div class="lg:w-auto">
                            <button type="submit" class="newsletter-submit-btn w-full lg:w-auto bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-8 py-4 rounded-xl hover:from-[#8B4A9C] hover:to-[#753880] transition-all duration-300 font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <i class="fas fa-paper-plane ml-2"></i>اشتركي الآن
                            </button>
                        </div>
                    </div>
                    
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-shield-alt ml-1"></i>نضمن خصوصية بياناتك ولن نرسل لك رسائل مزعجة
                    </div>
                    
                    <div class="flex flex-wrap justify-center gap-4 text-sm text-gray-600">
                        <label class="flex items-center">
                            <input type="checkbox" class="ml-2 text-d94288" checked>
                            <span>أخبار المنصة</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="ml-2 text-d94288" checked>
                            <span>عروض خاصة</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="ml-2 text-d94288">
                            <span>كورسات جديدة</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="ml-2 text-d94288">
                            <span>نصائح صحية</span>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('components.shared-footer')

    <!-- Floating Action Button -->
    <div class="fab" onclick="scrollToTop()" title="العودة للأعلى">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Initialize Enhanced Swiper with Hero Effects
        const swiper = new Swiper('.hero-swiper', {
            direction: 'horizontal',
            dir: 'rtl',
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
                reverseDirection: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '"></span>';
                },
            },
            navigation: {
                nextEl: '.swiper-button-prev',
                prevEl: '.swiper-button-next',
                disabledClass: 'swiper-button-disabled',
            },
            effect: 'slide',
            speed: 800,
            grabCursor: true,
            watchOverflow: true,
            allowTouchMove: true,
            touchRatio: 1,
            touchAngle: 45,
            resistance: true,
            resistanceRatio: 0.85,
            slidesPerView: 1,
            spaceBetween: 0,
            on: {
                init: function () {
                    console.log('Enhanced Swiper initialized');
                    initHeroEffects();
                    // Force button visibility after initialization
                    setTimeout(() => {
                        const nextBtn = document.querySelector('.hero-swiper .swiper-button-next');
                        const prevBtn = document.querySelector('.hero-swiper .swiper-button-prev');
                        const pagination = document.querySelector('.hero-swiper .swiper-pagination');
                        
                        if (nextBtn) {
                            nextBtn.style.opacity = '1';
                            nextBtn.style.visibility = 'visible';
                            nextBtn.style.display = 'flex';
                        }
                        if (prevBtn) {
                            prevBtn.style.opacity = '1';
                            prevBtn.style.visibility = 'visible';
                            prevBtn.style.display = 'flex';
                        }
                        if (pagination) {
                            pagination.style.opacity = '1';
                            pagination.style.visibility = 'visible';
                            pagination.style.display = 'flex';
                        }
                    }, 200);
                },
                slideChange: function () {
                    console.log('Slide changed to:', this.realIndex);
                    // Add active class to current slide
                    this.slides.forEach(slide => slide.classList.remove('active'));
                    this.slides[this.activeIndex].classList.add('active');
                    
                    // Ensure buttons remain visible after slide change
                    const nextBtn = document.querySelector('.hero-swiper .swiper-button-next');
                    const prevBtn = document.querySelector('.hero-swiper .swiper-button-prev');
                    if (nextBtn) nextBtn.style.opacity = '1';
                    if (prevBtn) prevBtn.style.opacity = '1';
                },
                beforeInit: function() {
                    console.log('Swiper before init');
                },
                afterInit: function() {
                    console.log('Swiper after init');
                }
            }
        });
        
        // Hero Section Effects
        function initHeroEffects() {
            // Add active class to first slide
            const firstSlide = document.querySelector('.hero-swiper .swiper-slide');
            if (firstSlide) {
                firstSlide.classList.add('active');
            }
            
            // Create floating particles
            createHeroParticles();
            
            // Add hero classes to elements
            addHeroClasses();
        }
        
        // Create floating particles in hero section
        function createHeroParticles() {
            const heroSection = document.querySelector('.hero-section');
            if (!heroSection) return;
            
            // Create particles container
            const particlesContainer = document.createElement('div');
            particlesContainer.className = 'hero-background-particles';
            heroSection.appendChild(particlesContainer);
            
            // Create particles
            for (let i = 0; i < 15; i++) {
                const particle = document.createElement('div');
                particle.className = 'hero-particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 15 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                particlesContainer.appendChild(particle);
            }
        }
        
                // Add hero classes to elements
        function addHeroClasses() {
            // Add hero-title class to main titles
            const heroTitles = document.querySelectorAll('.hero-section h1');
            heroTitles.forEach(title => {
                title.classList.add('hero-title');
            });
            
            // Add hero-subtitle class to subtitles
            const heroSubtitles = document.querySelectorAll('.hero-section p');
            heroSubtitles.forEach(subtitle => {
                subtitle.classList.add('hero-subtitle');
            });
            
            // Add hero-button class to buttons
            const heroButtons = document.querySelectorAll('.hero-section button, .hero-section a');
            heroButtons.forEach(button => {
                button.classList.add('hero-button');
            });
            
            // Add hero-content class to content containers
            const heroContents = document.querySelectorAll('.hero-section .overlay > div');
            heroContents.forEach(content => {
                content.classList.add('hero-content');
            });
        }
        
        // تطبيق 3D Transformations تلقائياً
        function apply3DTransformations() {
            // تطبيق 3D على البطاقات
            document.querySelectorAll('.enhanced-card').forEach(card => {
                card.classList.add('card-3d');
            });
            
            // تطبيق 3D على البطاقات الإحصائية
            document.querySelectorAll('.stats-card').forEach(card => {
                card.classList.add('card-3d');
            });
            
            // تطبيق 3D على بطاقات الأقسام
            document.querySelectorAll('.section-card').forEach(card => {
                card.classList.add('card-3d');
            });
            
            // تطبيق 3D على القوائم
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.add('text-3d');
            });
            
            // تطبيق 3D على الأزرار
            document.querySelectorAll('button, a').forEach(button => {
                if (button.classList.contains('btn-primary') || 
                    button.classList.contains('auth-btn-primary') ||
                    button.classList.contains('course-start-btn')) {
                    button.classList.add('button-3d');
                }
            });
            
            // تطبيق 3D على الصور
            document.querySelectorAll('img').forEach(img => {
                img.classList.add('image-3d');
            });
            
            // تطبيق 3D على النصوص
            document.querySelectorAll('h1, h2, h3, h4, h5, h6').forEach(heading => {
                heading.classList.add('text-3d');
            });
            
            // تطبيق 3D على الأقسام
            document.querySelectorAll('.section-card').forEach(section => {
                section.classList.add('section-3d');
            });
        }
        
        // Additional button visibility fix
        document.addEventListener('DOMContentLoaded', function() {
            // تطبيق 3D Transformations
            apply3DTransformations();
            
            // إصلاح مشكلة Swiper
            setTimeout(() => {
                // إعادة تهيئة Swiper إذا لم يعمل
                if (swiper && !swiper.initialized) {
                    swiper.init();
                }
                
                // تأكيد ظهور أزرار التنقل
                const nextBtn = document.querySelector('.hero-swiper .swiper-button-next');
                const prevBtn = document.querySelector('.hero-swiper .swiper-button-prev');
                const pagination = document.querySelector('.hero-swiper .swiper-pagination');
                
                if (nextBtn) {
                    nextBtn.style.opacity = '1';
                    nextBtn.style.visibility = 'visible';
                    nextBtn.style.display = 'flex';
                    nextBtn.style.position = 'absolute';
                    nextBtn.style.top = '50%';
                    nextBtn.style.right = '30px';
                    nextBtn.style.left = 'auto';
                    nextBtn.style.transform = 'translateY(-50%)';
                    nextBtn.style.zIndex = '100';
                }
                
                if (prevBtn) {
                    prevBtn.style.opacity = '1';
                    prevBtn.style.visibility = 'visible';
                    prevBtn.style.display = 'flex';
                    prevBtn.style.position = 'absolute';
                    prevBtn.style.top = '50%';
                    prevBtn.style.left = '30px';
                    prevBtn.style.right = 'auto';
                    prevBtn.style.transform = 'translateY(-50%)';
                    prevBtn.style.zIndex = '100';
                }
                
                if (pagination) {
                    pagination.style.opacity = '1';
                    pagination.style.visibility = 'visible';
                    pagination.style.display = 'flex';
                    pagination.style.zIndex = '100';
                }
                
                // تأكيد ظهور جميع الصور
                const slides = document.querySelectorAll('.hero-swiper .swiper-slide');
                slides.forEach((slide, index) => {
                    slide.style.display = 'flex';
                    slide.style.width = '100%';
                    slide.style.height = '100vh';
                });
                
                console.log('Swiper slides count:', slides.length);
            }, 500);
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
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

        // Mobile menu functionality is handled by shared-header component
        
        // Scroll to top functionality
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
        
        // Show/hide floating action button
        window.addEventListener('scroll', function() {
            const fab = document.querySelector('.fab');
            if (window.scrollY > 300) {
                fab.style.opacity = '1';
                fab.style.transform = 'scale(1)';
            } else {
                fab.style.opacity = '0';
                fab.style.transform = 'scale(0)';
            }
        });
        
        // Intersection Observer for section animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);
        
        // Observe all sections with fade-in animation
        document.querySelectorAll('.section-fade-in').forEach(section => {
            observer.observe(section);
        });
        
        // Quick search functionality
        function setQuickSearch(query) {
            document.getElementById('search-input').value = query;
            document.querySelector('#search form').submit();
        }
        
        // Enhanced card hover effects
        document.querySelectorAll('.enhanced-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) rotateX(5deg)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) rotateX(0)';
            });
        });
        
        // Newsletter form submission
        document.querySelector('.newsletter-form form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (email) {
                // Show success message
                const button = this.querySelector('button');
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check ml-2"></i>تم الاشتراك بنجاح!';
                button.classList.add('bg-green-600');
                button.disabled = true;
                
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.classList.remove('bg-green-600');
                    button.disabled = false;
                    this.reset();
                }, 3000);
            }
        });
        
        // Check Font Awesome loading
        function checkFontAwesome() {
            const testIcon = document.createElement('i');
            testIcon.className = 'fab fa-facebook-f';
            testIcon.style.position = 'absolute';
            testIcon.style.left = '-9999px';
            testIcon.style.fontSize = '3em';
            document.body.appendChild(testIcon);
            
            const isLoaded = testIcon.offsetWidth > 0;
            document.body.removeChild(testIcon);
            
            if (!isLoaded) {
                console.log('Font Awesome not loaded, showing fallback icons');
                document.querySelectorAll('.icon-fallback').forEach(fallback => {
                    fallback.style.display = 'block';
                });
            } else {
                console.log('Font Awesome loaded successfully');
            }
        }
        
        // Check and fix course icon specifically
        function checkCourseIcon() {
            const courseIcon = document.querySelector('.enhanced-card:first-child .fas.fa-graduation-cap');
            if (courseIcon) {
                // Check if the icon is visible
                const computedStyle = window.getComputedStyle(courseIcon);
                if (computedStyle.display === 'none' || computedStyle.visibility === 'hidden' || courseIcon.offsetWidth === 0) {
                    console.log('Course icon not visible, showing fallback');
                    // Show fallback icon
                    const fallbackIcon = courseIcon.parentElement.querySelector('.fas.fa-book');
                    if (fallbackIcon) {
                        fallbackIcon.style.display = 'block';
                        courseIcon.style.display = 'none';
                    }
                } else {
                    console.log('Course icon is visible');
                }
            }
        }
        
        // Check after page load
        window.addEventListener('load', function() {
            checkFontAwesome();
            checkCourseIcon();
        });
        // Check after a delay
        setTimeout(function() {
            checkFontAwesome();
            checkCourseIcon();
        }, 2000);
        
        // Mobile menu functionality is handled by shared-header component
    </script>
    
    <!-- Course Registration Modal -->
    @livewire('course-registration-modal')
    
    <!-- Wedding Booking Modal -->
    <div id="wedding-booking-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <!-- Header -->
                <div class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white p-6 rounded-t-2xl">
                    <div class="flex justify-between items-center">
                        <h3 class="text-2xl font-bold">حجز موعد خدمة الزفاف</h3>
                        <button onclick="closeWeddingBookingModal()" class="text-white hover:text-gray-200 text-2xl">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <!-- Service Info -->
                    <div class="bg-gray-50 rounded-xl p-4 mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">معلومات الخدمة</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <span class="text-sm text-gray-600">نوع الخدمة:</span>
                                <p class="font-semibold text-gray-900" id="modal-service-type">-</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">اسم المقدم:</span>
                                <p class="font-semibold text-gray-900" id="modal-provider-name">-</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">الموقع:</span>
                                <p class="font-semibold text-gray-900" id="modal-location">-</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">رقم الهاتف:</span>
                                <p class="font-semibold text-gray-900" id="modal-phone">-</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="text-sm text-gray-600">الوصف:</span>
                            <p class="font-semibold text-gray-900" id="modal-description">-</p>
                        </div>
                        <div class="mt-3">
                            <span class="text-sm text-gray-600">الباقة:</span>
                            <p class="font-semibold text-gray-900" id="modal-package">-</p>
                        </div>
                    </div>
                    
                    <!-- Booking Form -->
                    <form id="wedding-booking-form" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">الاسم الكامل</label>
                                <input type="text" id="booking-name" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">رقم الهاتف</label>
                                <input type="tel" id="booking-phone" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">تاريخ الحفل</label>
                                <input type="date" id="booking-date" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">عدد الضيوف</label>
                                <input type="number" id="booking-guests" min="1" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">ملاحظات إضافية</label>
                            <textarea id="booking-notes" rows="3" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-transparent"></textarea>
                        </div>
                        
                        <div class="flex gap-4 pt-4">
                            <button type="submit" 
                                    class="flex-1 bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-3 rounded-xl font-semibold hover:from-[#8B4A9C] hover:to-[#753880] transition-all duration-300">
                                <i class="fas fa-check ml-2"></i>تأكيد الحجز
                            </button>
                            <button type="button" onclick="closeWeddingBookingModal()" 
                                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300">
                                إلغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Umomi Booking Modal -->
    <div id="umomi-booking-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <!-- Header -->
                <div class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white p-6 rounded-t-2xl">
                    <div class="flex justify-between items-center">
                        <h3 class="text-2xl font-bold">حجز موعد خدمة الأمومة</h3>
                        <button onclick="closeUmomiBookingModal()" class="text-white hover:text-gray-200 text-2xl">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <!-- Service Info -->
                    <div class="bg-gray-50 rounded-xl p-4 mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">معلومات الخدمة</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <span class="text-sm text-gray-600">نوع الخدمة:</span>
                                <p class="font-semibold text-gray-900" id="umomi-modal-service-type">-</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">اسم المقدم:</span>
                                <p class="font-semibold text-gray-900" id="umomi-modal-provider-name">-</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">الموقع:</span>
                                <p class="font-semibold text-gray-900" id="umomi-modal-location">-</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">رقم الهاتف:</span>
                                <p class="font-semibold text-gray-900" id="umomi-modal-phone">-</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="text-sm text-gray-600">الوصف:</span>
                            <p class="font-semibold text-gray-900" id="umomi-modal-description">-</p>
                        </div>
                        <div class="mt-3">
                            <span class="text-sm text-gray-600">التفاصيل/الأسعار:</span>
                            <p class="font-semibold text-gray-900" id="umomi-modal-details">-</p>
                        </div>
                    </div>
                    
                    <!-- Booking Form -->
                    <form id="umomi-booking-form" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">الاسم الكامل</label>
                                <input type="text" id="umomi-booking-name" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">رقم الهاتف</label>
                                <input type="tel" id="umomi-booking-phone" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">تاريخ الموعد</label>
                                <input type="date" id="umomi-booking-date" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">وقت الموعد</label>
                                <select id="umomi-booking-time" required 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                    <option value="">اختر الوقت</option>
                                    <option value="09:00">09:00 صباحاً</option>
                                    <option value="10:00">10:00 صباحاً</option>
                                    <option value="11:00">11:00 صباحاً</option>
                                    <option value="12:00">12:00 ظهراً</option>
                                    <option value="14:00">02:00 ظهراً</option>
                                    <option value="15:00">03:00 ظهراً</option>
                                    <option value="16:00">04:00 عصراً</option>
                                    <option value="17:00">05:00 عصراً</option>
                                    <option value="18:00">06:00 مساءً</option>
                                    <option value="19:00">07:00 مساءً</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">نوع الخدمة المطلوبة</label>
                            <select id="umomi-booking-service-type" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                <option value="">اختر نوع الخدمة</option>
                                <option value="استشارة طبية">استشارة طبية</option>
                                <option value="فحص دوري">فحص دوري</option>
                                <option value="رعاية الطفل">رعاية الطفل</option>
                                <option value="تحضير الولادة">تحضير الولادة</option>
                                <option value="متابعة الحمل">متابعة الحمل</option>
                                <option value="استشارة تغذية">استشارة تغذية</option>
                                <option value="استشارة نفسية">استشارة نفسية</option>
                                <option value="خدمة أخرى">خدمة أخرى</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">ملاحظات إضافية</label>
                            <textarea id="umomi-booking-notes" rows="3" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent"></textarea>
                        </div>
                        
                        <div class="flex gap-4 pt-4">
                            <button type="submit" 
                                    class="flex-1 bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-3 rounded-xl font-semibold hover:from-[#8B4A9C] hover:to-[#753880] transition-all duration-300">
                                <i class="fas fa-check ml-2"></i>تأكيد الحجز
                            </button>
                            <button type="button" onclick="closeUmomiBookingModal()" 
                                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300">
                                إلغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Babies Details Modal -->
    <div id="babies-details-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <!-- Header -->
                <div class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white p-6 rounded-t-2xl">
                    <div class="flex justify-between items-center">
                        <h3 class="text-2xl font-bold">تفاصيل الطفل</h3>
                        <button onclick="closeBabiesDetailsModal()" class="text-white hover:text-gray-200 text-2xl">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <!-- Baby Info -->
                    <div class="bg-gray-50 rounded-xl p-4 mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">معلومات الطفل</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <span class="text-sm text-gray-600">اسم الطفل:</span>
                                <p class="font-semibold text-gray-900" id="baby-modal-name">-</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">العمر:</span>
                                <p class="font-semibold text-gray-900" id="baby-modal-age">-</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">اسم الأم:</span>
                                <p class="font-semibold text-gray-900" id="baby-modal-parent">-</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">تاريخ الميلاد:</span>
                                <p class="font-semibold text-gray-900" id="baby-modal-birth-date">-</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">الوزن:</span>
                                <p class="font-semibold text-gray-900" id="baby-modal-weight">-</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">الطول:</span>
                                <p class="font-semibold text-gray-900" id="baby-modal-height">-</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="text-sm text-gray-600">ملاحظات إضافية:</span>
                            <p class="font-semibold text-gray-900" id="baby-modal-notes">-</p>
                        </div>
                    </div>
                    
                    <!-- Growth Chart -->
                    <div class="bg-gradient-to-r from-[#FFFFFF] to-[#E6DAC8] rounded-xl p-4 mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">معلومات النمو</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                            <div class="bg-white rounded-lg p-3 shadow-sm">
                                <div class="text-2xl font-bold text-blue-600" id="baby-modal-age-months">-</div>
                                <div class="text-sm text-gray-600">شهر</div>
                            </div>
                            <div class="bg-white rounded-lg p-3 shadow-sm">
                                <div class="text-2xl font-bold text-green-600" id="baby-modal-weight-kg">-</div>
                                <div class="text-sm text-gray-600">كجم</div>
                            </div>
                            <div class="bg-white rounded-lg p-3 shadow-sm">
                                <div class="text-2xl font-bold text-purple-600" id="baby-modal-height-cm">-</div>
                                <div class="text-sm text-gray-600">سم</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-4 pt-4">
                        <button onclick="closeBabiesDetailsModal()" 
                                class="flex-1 bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white py-3 rounded-xl font-semibold hover:from-[#8B4A9C] hover:to-[#753880] transition-all duration-300">
                            <i class="fas fa-check ml-2"></i>إغلاق
                        </button>
                        <button onclick="window.open('{{ route('section', 'babies') }}', '_blank')" 
                                class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <i class="fas fa-external-link-alt ml-2"></i>عرض المزيد
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
    
    <!-- Ensure Livewire is loaded -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Wait for Livewire to be ready
            if (typeof Livewire !== 'undefined') {
                console.log('Livewire is loaded and ready!');
            } else {
                console.log('Livewire is not loaded yet, waiting...');
                // Wait a bit more
                setTimeout(function() {
                    if (typeof Livewire !== 'undefined') {
                        console.log('Livewire is now loaded!');
                    } else {
                        console.error('Livewire failed to load!');
                    }
                }, 1000);
            }
        });
        
        // Listen for Livewire events
        document.addEventListener('livewire:init', () => {
            Livewire.on('console-log', (event) => {
                console.log('Livewire Event:', event.message);
            });
            
            Livewire.on('modal-opened', () => {
                console.log('Modal opened event received!');
            });
        });
        
        // Wedding Booking Modal Functions
        function openWeddingBookingModal(serviceType, providerId, providerName, description, location, phone, package) {
            // Set modal content
            document.getElementById('modal-service-type').textContent = getServiceTypeName(serviceType);
            document.getElementById('modal-provider-name').textContent = providerName;
            document.getElementById('modal-location').textContent = location;
            document.getElementById('modal-phone').textContent = phone || 'غير متاح';
            document.getElementById('modal-description').textContent = description || 'لا يوجد وصف';
            document.getElementById('modal-package').textContent = package || 'غير محدد';
            
            // Show modal
            document.getElementById('wedding-booking-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeWeddingBookingModal() {
            document.getElementById('wedding-booking-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            
            // Reset form
            document.getElementById('wedding-booking-form').reset();
        }
        
        function getServiceTypeName(serviceType) {
            const types = {
                'designer': 'مصمم فساتين زفاف',
                'planner': 'منظم حفلات زفاف',
                'makeup': 'فنانة مكياج',
                'hair': 'مصففة شعر',
                'venue': 'قاعة حفلات',
                'catering': 'خدمة الطعام',
                'dj': 'دي جي',
                'flower': 'تنسيق الزهور',
                'gift': 'مورد هدايا',
                'photographer': 'مصور'
            };
            return types[serviceType] || 'خدمة زفاف';
        }
        
        // Handle form submission
        document.getElementById('wedding-booking-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = {
                name: document.getElementById('booking-name').value,
                phone: document.getElementById('booking-phone').value,
                date: document.getElementById('booking-date').value,
                guests: document.getElementById('booking-guests').value,
                notes: document.getElementById('booking-notes').value
            };
            
            // Show success message
            alert('تم إرسال طلب الحجز بنجاح! سنتواصل معك قريباً.');
            
            // Close modal
            closeWeddingBookingModal();
        });
        
        // Close modal when clicking outside
        document.getElementById('wedding-booking-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeWeddingBookingModal();
            }
        });
        
        // Umomi Booking Modal Functions
        function openUmomiBookingModal(serviceType, providerId, providerName, description, location, phone, details) {
            // Set modal content
            document.getElementById('umomi-modal-service-type').textContent = getUmomiServiceTypeName(serviceType);
            document.getElementById('umomi-modal-provider-name').textContent = providerName;
            document.getElementById('umomi-modal-location').textContent = location || 'غير محدد';
            document.getElementById('umomi-modal-phone').textContent = phone || 'غير متاح';
            document.getElementById('umomi-modal-description').textContent = description || 'لا يوجد وصف';
            document.getElementById('umomi-modal-details').textContent = details || 'غير محدد';
            
            // Show modal
            document.getElementById('umomi-booking-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeUmomiBookingModal() {
            document.getElementById('umomi-booking-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            
            // Reset form
            document.getElementById('umomi-booking-form').reset();
        }
        
        function getUmomiServiceTypeName(serviceType) {
            const types = {
                'doctor': 'طبيبة أمومة',
                'care': 'رعاية الطفل',
                'preparation': 'تحضير الولادة',
                'consultation': 'استشارة أمومة',
                'examination': 'فحص دوري'
            };
            return types[serviceType] || 'خدمة أمومة';
        }
        
        // Handle umomi booking form submission
        document.getElementById('umomi-booking-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = {
                name: document.getElementById('umomi-booking-name').value,
                phone: document.getElementById('umomi-booking-phone').value,
                date: document.getElementById('umomi-booking-date').value,
                time: document.getElementById('umomi-booking-time').value,
                serviceType: document.getElementById('umomi-booking-service-type').value,
                notes: document.getElementById('umomi-booking-notes').value
            };
            
            // Show success message
            alert('تم إرسال طلب الحجز بنجاح! سنتواصل معك قريباً.');
            
            // Close modal
            closeUmomiBookingModal();
        });
        
        // Close umomi booking modal when clicking outside
        document.getElementById('umomi-booking-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeUmomiBookingModal();
            }
        });
        
        // Babies Details Modal Functions
        function openBabiesDetailsModal(babyId, babyName, babyAge, parentName, birthDate, weight, height, notes) {
            // Set modal content
            document.getElementById('baby-modal-name').textContent = babyName || 'غير محدد';
            document.getElementById('baby-modal-age').textContent = (babyAge || '0') + ' سنوات';
            document.getElementById('baby-modal-parent').textContent = parentName || 'غير محدد';
            document.getElementById('baby-modal-birth-date').textContent = birthDate || 'غير محدد';
            document.getElementById('baby-modal-weight').textContent = weight || 'غير محدد';
            document.getElementById('baby-modal-height').textContent = height || 'غير محدد';
            document.getElementById('baby-modal-notes').textContent = notes || 'لا توجد ملاحظات';
            
            // Calculate and display growth info
            const ageInMonths = babyAge ? parseInt(babyAge) * 12 : 0;
            const weightInKg = weight ? parseFloat(weight) : 0;
            const heightInCm = height ? parseFloat(height) : 0;
            
            document.getElementById('baby-modal-age-months').textContent = ageInMonths;
            document.getElementById('baby-modal-weight-kg').textContent = weightInKg > 0 ? weightInKg.toFixed(1) : '-';
            document.getElementById('baby-modal-height-cm').textContent = heightInCm > 0 ? heightInCm.toFixed(1) : '-';
            
            // Show modal
            document.getElementById('babies-details-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeBabiesDetailsModal() {
            document.getElementById('babies-details-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Close babies details modal when clicking outside
        document.getElementById('babies-details-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeBabiesDetailsModal();
            }
        });
        
        // Popup Notifications - Disabled
        /* 
        @if(isset($popup_notifications) && $popup_notifications->count() > 0)
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($popup_notifications as $popup)
            setTimeout(function() {
                try {
                    showPopupNotification(@json($popup));
                } catch (error) {
                    console.error('خطأ في عرض الـ popup:', error);
                    // عرض الـ popup بطريقة بديلة في حالة الخطأ
                    showFallbackPopup(@json($popup));
                }
            }, {{ $popup->display_delay * 1000 }});
            @endforeach
        });
        @endif
        */
        
        // دالة بديلة لعرض الـ popup في حالة الخطأ
        function showFallbackPopup(popup) {
            const overlay = document.createElement('div');
            overlay.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.7);
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: center;
            `;
            
            overlay.innerHTML = `
                <div style="background: white; padding: 20px; border-radius: 10px; max-width: 500px; text-align: center;">
                    <h3 style="color: #A15DBF; margin-bottom: 15px;">${popup.title || 'إشعار مهم'}</h3>
                    <p style="color: #666; margin-bottom: 20px;">${popup.content || ''}</p>
                    <button onclick="this.parentElement.parentElement.remove()" style="background: #A15DBF; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">إغلاق</button>
                </div>
            `;
            
            document.body.appendChild(overlay);
        }
        
        function setCookie(name, value, days) {
            const d = new Date();
            d.setTime(d.getTime() + (days*24*60*60*1000));
            const expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

        function getCookie(name) {
            const cname = name + "=";
            const decodedCookie = decodeURIComponent(document.cookie);
            const ca = decodedCookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1);
                if (c.indexOf(cname) === 0) return c.substring(cname.length, c.length);
            }
            return "";
        }

        function showPopupNotification(popup) {
            // Show popup every time (removed cookie/localStorage check)
            
            const overlay = document.createElement('div');
            overlay.className = 'popup-overlay';
            overlay.id = 'popup-overlay-' + popup.id;
            
            let mediaContent = '';
            if (popup.media_url) {
                if (popup.type === 'video') {
                    mediaContent = `<div class="relative">
                        <video controls style="width: 100%; max-height: 400px; object-fit: cover;">
                            <source src="${popup.media_url}" type="video/mp4">
                            متصفحك لا يدعم تشغيل الفيديو
                        </video>
                    </div>`;
                } else {
                    mediaContent = `<div class="relative">
                        <img src="${popup.media_url}" alt="${popup.title || ''}" style="width: 100%; max-height: 400px; object-fit: cover;" 
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; width: 100%; height: 200px; background: linear-gradient(135deg, #A15DBF, #E6A0C3); align-items: center; justify-content: center; color: white; font-size: 18px;">
                            <i class="fas fa-image text-4xl mb-2"></i><br>
                            ${popup.title || 'صورة الإعلان'}
                        </div>
                    </div>`;
                }
            } else {
                // إذا لم تكن هناك صورة، اعرض placeholder جميل
                mediaContent = `<div style="width: 100%; height: 200px; background: linear-gradient(135deg, #A15DBF, #E6A0C3); display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
                    <i class="fas fa-bell text-6xl mb-4"></i><br>
                    ${popup.title || 'إشعار مهم'}
                </div>`;
            }
            
            let buttonContent = '';
            if (popup.show_button && popup.button_text && popup.button_url) {
                buttonContent = `<a href="${popup.button_url}" target="_blank" class="bg-gradient-to-r from-[#A15DBF] to-[#8B4A9C] text-white px-6 py-3 rounded-lg hover:from-[#8B4A9C] hover:to-[#753880] transition-all font-bold inline-block mt-4">
                    ${popup.button_text}
                </a>`;
            }
            
            overlay.innerHTML = `
                <div class="popup-content" style="position: relative; max-width: 600px;" onclick="event.stopPropagation();">
                    <button class="popup-close" onclick="closePopupNotification(${popup.id})" title="إغلاق">&times;</button>
                    ${mediaContent}
                    <div class="p-6">
                        ${popup.title ? `<h3 class="text-2xl font-bold mb-3 text-gray-800">${popup.title}</h3>` : ''}
                        ${popup.content ? `<p class="text-gray-600 mb-4">${popup.content}</p>` : ''}
                        ${buttonContent}
                    </div>
                </div>
            `;
            
            // إضافة إمكانية إغلاق الـ popup بالضغط على الـ overlay
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    closePopupNotification(popup.id);
                }
            });
            
            // إضافة إمكانية إغلاق الـ popup بالضغط على مفتاح Escape
            const handleKeyPress = function(e) {
                if (e.key === 'Escape') {
                    closePopupNotification(popup.id);
                    document.removeEventListener('keydown', handleKeyPress);
                }
            };
            document.addEventListener('keydown', handleKeyPress);
            
            document.body.appendChild(overlay);
            document.body.style.overflow = 'hidden';
            
            // Auto close after duration
            if (popup.display_duration > 0) {
                setTimeout(function() {
                    closePopupNotification(popup.id);
                }, popup.display_duration * 1000);
            }
        }
        
        function closePopupNotification(popupId) {
            const overlay = document.getElementById('popup-overlay-' + popupId);
            if (overlay) {
                // إزالة جميع الـ event listeners
                const newOverlay = overlay.cloneNode(true);
                overlay.parentNode.replaceChild(newOverlay, overlay);
                newOverlay.remove();
                
                document.body.style.overflow = 'auto';
            }
        }
    </script>

    <!-- Home Interactions JavaScript -->
    <script src="{{ asset('js/home-interactions.js') }}"></script>
</body>
</html>
