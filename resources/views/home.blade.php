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
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
        
        .primary-color {
            color: #d94288;
        }
        
        .primary-bg {
            background-color: #d94288;
        }
        
        .primary-border {
            border-color: #d94288;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #d94288 0%, #ff6b9d 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(217, 66, 136, 0.2);
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
        
        /* تأكيد ظهور أزرار التنقل */
        .swiper-button-next,
        .swiper-button-prev {
            opacity: 1 !important;
            visibility: visible !important;
            display: flex !important;
            z-index: 100 !important;
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
            background: linear-gradient(135deg, #d94288 0%, #ff6b9d 100%);
            color: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
        }
        
        .menu-item {
            transition: all 0.3s ease;
        }
        
        .menu-item:hover {
            background-color: #d94288;
            color: white;
            transform: scale(1.05);
        }
        
        /* إزالة التأثيرات الافتراضية للمتصفح */
        a:focus {
            outline: none !important;
        }
        
        /* تخصيص ألوان الأزرار */
        .auth-btn-primary {
            background: #d94288;
            color: white;
            border: none;
        }
        
        .auth-btn-primary:hover {
            background: #c13a7a;
            color: white;
        }
        
        .auth-btn-secondary {
            background: white;
            color: #d94288;
            border: 2px solid #d94288;
        }
        
        .auth-btn-secondary:hover {
            background: #d94288;
            color: white;
            border-color: #d94288;
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
        
        /* Mobile Menu Styles */
        .mobile-menu-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            margin: 4px 0;
            border-radius: 12px;
            text-decoration: none;
            color: #374151;
            font-weight: 500;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .mobile-menu-item:hover {
            transform: translateX(-4px);
            box-shadow: 0 4px 12px rgba(217, 66, 136, 0.15);
            background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 100%);
        }
        
        .mobile-menu-item span {
            margin-right: 12px;
            font-size: 16px;
        }
        
        .mobile-auth-btn {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 12px 16px;
            margin: 8px 0;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .mobile-auth-btn.primary {
            background: linear-gradient(135deg, #d94288 0%, #c13a7a 100%);
            color: white;
        }
        
        .mobile-auth-btn.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(217, 66, 136, 0.3);
        }
        
        .mobile-auth-btn.secondary {
            background: white;
            color: #d94288;
            border: 2px solid #d94288;
        }
        
        .mobile-auth-btn.secondary:hover {
            background: #d94288;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(217, 66, 136, 0.2);
        }
        
        .mobile-auth-btn span {
            margin-right: 12px;
        }
        
        /* Mobile Menu Animation */
        #mobile-menu {
            animation: slideDown 0.3s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
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
            opacity: 0.15;
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
            background: linear-gradient(45deg, #d94288, #ff6b9d);
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
            background: linear-gradient(45deg, #ff6b9d, #d94288);
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
            color: #d94288;
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
            background: linear-gradient(135deg, #d94288 0%, #ff6b9d 100%);
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
            background-color: #d94288;
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
<body class="bg-gray-50">
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
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="text-2xl font-bold primary-color">HAGTY</div>
                </div>
                
                <!-- Navigation Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4 space-x-reverse">
                        <a href="#home" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الرئيسية</a>
                        <a href="#accessoraty" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">أكسسوراتى</a>
                        <a href="#health" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الصحة</a>
                        <a href="#fashion" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الموضة</a>
                        <a href="#babies" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الأطفال</a>
                        <a href="#wedding" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الزفاف</a>
                        <a href="#beauty" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">الجمال</a>
                        <a href="#umomi" class="menu-item px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white">أومومتي</a>
                    </div>
                </div>
                


                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-3 space-x-reverse">
                    @auth
                        <div class="flex items-center space-x-3 space-x-reverse">
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <div class="w-8 h-8 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-700">مرحباً، {{ Auth::user()->first_name ?? Auth::user()->name }}</span>
                            </div>
                            <a href="{{ route('profile') }}" class="auth-btn-primary px-4 py-2.5 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:ring-offset-2 transition-all duration-300 text-sm font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <i class="fas fa-user-edit ml-1"></i>الملف الشخصي
                            </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                               class="bg-white text-gray-600 border border-gray-300 px-4 py-2.5 rounded-xl hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition-all duration-300 text-sm font-semibold shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                <i class="fas fa-sign-out-alt ml-1"></i>تسجيل الخروج
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="auth-btn-primary px-5 py-2.5 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:ring-offset-2 transition-all duration-300 text-sm font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-sign-in-alt ml-2"></i>الدخول
                        </a>
                        <a href="{{ route('register') }}" class="auth-btn-secondary px-5 py-2.5 rounded-xl focus:outline-none focus:ring-2 focus:ring-d94288 focus:ring-offset-2 transition-all duration-300 text-sm font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-user-plus ml-2"></i>الاشتراك
                        </a>
                    @endauth
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button" class="text-gray-700 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div class="bg-gradient-to-br from-white to-pink-50 border-t border-pink-200 shadow-lg">
                    <!-- Header -->
                    <div class="px-4 py-3 bg-gradient-to-r from-d94288 to-purple-600 text-white">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                <i class="fas fa-bars text-white"></i>
                            </div>
                            <span class="mr-3 font-semibold text-lg">القائمة الرئيسية</span>
                        </div>
                    </div>
                    
                    <!-- Navigation Links -->
                    <div class="px-4 py-2 space-y-1">
                        <a href="#home" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-home text-white text-sm"></i>
                            </div>
                            <span>الرئيسية</span>
                        </a>
                        
                        <a href="#accessoraty" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-gem text-white text-sm"></i>
                            </div>
                            <span>أكسسوراتى</span>
                        </a>
                        
                        <a href="#health" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-heartbeat text-white text-sm"></i>
                            </div>
                            <span>الصحة</span>
                        </a>
                        
                        <a href="#fashion" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-tshirt text-white text-sm"></i>
                            </div>
                            <span>الموضة</span>
                        </a>
                        
                        <a href="#babies" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-baby text-white text-sm"></i>
                            </div>
                            <span>الأطفال</span>
                        </a>
                        
                        <a href="#wedding" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-heart text-white text-sm"></i>
                            </div>
                            <span>الزفاف</span>
                        </a>
                        
                        <a href="#beauty" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-spa text-white text-sm"></i>
                            </div>
                            <span>الجمال</span>
                        </a>
                        
                        <a href="#umomi" class="mobile-menu-item">
                            <div class="w-8 h-8 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-female text-white text-sm"></i>
                            </div>
                            <span>أومومتي</span>
                        </a>
                    </div>
                    
                    <!-- Mobile Auth Buttons -->
                    <div class="px-4 py-4 border-t border-pink-200 bg-white bg-opacity-50">
                        @auth
                            <div class="flex items-center mb-4 p-3 bg-gradient-to-r from-d94288 to-purple-600 rounded-xl text-white">
                                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <div class="font-semibold">مرحباً، {{ Auth::user()->first_name ?? Auth::user()->name }}</div>
                                    <div class="text-sm opacity-90">مرحباً بك في HAGTY</div>
                                </div>
                            </div>
                            
                            <a href="{{ route('profile') }}" class="mobile-auth-btn primary">
                                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-edit text-white text-sm"></i>
                                </div>
                                <span>الملف الشخصي</span>
                            </a>
                            
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                               class="mobile-auth-btn secondary">
                                <div class="w-8 h-8 bg-gray-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-sign-out-alt text-white text-sm"></i>
                                </div>
                                <span>تسجيل الخروج</span>
                            </a>
                        @else
                            <div class="text-center mb-4">
                                <div class="w-16 h-16 bg-gradient-to-r from-d94288 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-user-plus text-white text-xl"></i>
                                </div>
                                <div class="text-gray-600 font-medium">انضمي إلى مجتمعنا</div>
                            </div>
                            
                            <a href="{{ route('login') }}" class="mobile-auth-btn primary">
                                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-sign-in-alt text-white text-sm"></i>
                                </div>
                                <span>تسجيل الدخول</span>
                            </a>
                            
                            <a href="{{ route('register') }}" class="mobile-auth-btn secondary">
                                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-plus text-d94288 text-sm"></i>
                                </div>
                                <span>إنشاء حساب جديد</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            </div>
        </div>
    </nav>

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
        
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                <!-- Enhanced Slide 1 -->
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
                
                <!-- Enhanced Slide 2 -->
                <div class="swiper-slide hero-slide" style="background-image: url('https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');">
                    <div class="overlay absolute inset-0 flex items-center justify-center">
                        <div class="text-center text-white section-fade-in">
                            <h1 class="text-5xl md:text-7xl font-bold mb-6 text-shadow-lg">
                                كورسات تعليمية <span class="text-yellow-300 animate-pulse">احترافية</span>
                            </h1>
                            <p class="text-xl md:text-2xl mb-8 text-pink-100 leading-relaxed">
                                تعلمي من أفضل المدربين في مجالات التجميل والموضة والتصميم
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="{{ route('section', 'accessoraty') }}" class="glow-border pulse-button">
                                    <div class="content">
                                        <span class="text-d94288 font-bold text-lg flex items-center justify-center">
                                            <i class="fas fa-graduation-cap ml-2 animated-icon"></i>ابدأي التعلم
                                        </span>
                                    </div>
                                </a>
                                <a href="{{ route('section', 'accessoraty') }}" class="transparent-button inline-block px-8 py-3 border-2 border-white text-white font-bold text-lg hover:bg-white hover:text-d94288 transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-book ml-2 animated-icon"></i>استكشفي الكورسات
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Enhanced Slide 3 -->
                <div class="swiper-slide hero-slide" style="background-image: url('https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');">
                    <div class="overlay absolute inset-0 flex items-center justify-center">
                        <div class="text-center text-white section-fade-in">
                            <h1 class="text-5xl md:text-7xl font-bold mb-6 text-shadow-lg">
                                رعاية صحية <span class="text-yellow-300 animate-pulse">شاملة</span>
                            </h1>
                            <p class="text-xl md:text-2xl mb-8 text-pink-100 leading-relaxed">
                                اطبيبة متخصصات ونصائح صحية لصحة أفضل
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="{{ route('section', 'health') }}" class="glow-border pulse-button">
                                    <div class="content">
                                        <span class="text-d94288 font-bold text-lg flex items-center justify-center">
                                            <i class="fas fa-calendar-check ml-2 animated-icon"></i>احجزي موعد
                                        </span>
                                    </div>
                                </a>
                                <a href="{{ route('section', 'health') }}" class="transparent-button inline-block px-8 py-3 border-2 border-white text-white font-bold text-lg hover:bg-white hover:text-d94288 transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-user-md ml-2 animated-icon"></i>ابحثي عن طبيبة
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            
            <!-- Enhanced Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Enhanced Statistics Section -->
    <section class="py-20 bg-gradient-to-br from-white to-pink-50 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-10 left-10 w-32 h-32 bg-d94288 rounded-full"></div>
            <div class="absolute top-40 right-20 w-24 h-24 bg-purple-500 rounded-full"></div>
            <div class="absolute bottom-20 left-32 w-40 h-40 bg-pink-400 rounded-full"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 section-fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    إحصائيات <span class="text-d94288">المنصة</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    أرقام تتحدث عن نفسها - منصة HAGTY تنمو معك يوماً بعد يوم
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="enhanced-card text-center p-8 transform hover:scale-105 transition-all duration-500">
                    <div class="w-20 h-20 bg-gradient-to-br from-d94288 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-graduation-cap text-white text-3xl animated-icon"></i>
                    </div>
                    <div class="text-5xl font-bold text-d94288 mb-3 stats-number">{{ $courses_count ?? 0 }}</div>
                    <div class="text-lg text-gray-700 font-semibold">كورس تعليمي</div>
                    <div class="text-sm text-gray-500 mt-2">متاح للتعلم</div>
                </div>
                
                <div class="enhanced-card text-center p-8 transform hover:scale-105 transition-all duration-500">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-users text-white text-3xl animated-icon"></i>
                    </div>
                    <div class="text-5xl font-bold text-green-600 mb-3 stats-number">{{ $students_count ?? 0 }}</div>
                    <div class="text-lg text-gray-700 font-semibold">طالبة مسجلة</div>
                    <div class="text-sm text-gray-500 mt-2">في مجتمعنا</div>
                </div>
                
                <div class="enhanced-card text-center p-8 transform hover:scale-105 transition-all duration-500">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-user-md text-white text-3xl animated-icon"></i>
                    </div>
                    <div class="text-5xl font-bold text-red-600 mb-3 stats-number">{{ $doctors->count() ?? 0 }}</div>
                    <div class="text-lg text-gray-700 font-semibold">طبيبة متخصصة</div>
                    <div class="text-sm text-gray-500 mt-2">لرعايتك</div>
                </div>
                
                <div class="enhanced-card text-center p-8 transform hover:scale-105 transition-all duration-500">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-tshirt text-white text-3xl animated-icon"></i>
                    </div>
                    <div class="text-5xl font-bold text-purple-600 mb-3 stats-number">{{ $fashion_trends->count() ?? 0 }}</div>
                    <div class="text-lg text-gray-700 font-semibold">صيحة موضة</div>
                    <div class="text-sm text-gray-500 mt-2">لإطلالتك</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Search Section -->
    <section id="search" class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-16 h-16 bg-d94288 rounded-full animate-ping"></div>
            <div class="absolute top-40 right-32 w-12 h-12 bg-purple-500 rounded-full animate-pulse"></div>
            <div class="absolute bottom-32 left-40 w-20 h-20 bg-pink-400 rounded-full animate-bounce"></div>
        </div>
        
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 section-fade-in">
                <div class="w-24 h-24 bg-gradient-to-br from-d94288 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-8">
                    <i class="fas fa-search text-white text-4xl animated-icon"></i>
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
                            <button type="submit" class="w-full lg:w-auto bg-gradient-to-r from-d94288 to-purple-600 text-white px-10 py-5 rounded-2xl hover:from-purple-600 hover:to-d94288 transition-all duration-300 font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-2 pulse-button search-submit-btn">
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
                                <i class="fas fa-palette text-2xl mb-2"></i>
                                <span>كورسات التجميل</span>
                            </button>
                            <button type="button" onclick="setQuickSearch('طبيبة نساء')" class="quick-search-category">
                                <i class="fas fa-user-md text-2xl mb-2"></i>
                                <span>طبيبات متخصصات</span>
                            </button>
                            <button type="button" onclick="setQuickSearch('صيحة موضة')" class="quick-search-category">
                                <i class="fas fa-tshirt text-2xl mb-2"></i>
                                <span>صيحات الموضة</span>
                            </button>
                            <button type="button" onclick="setQuickSearch('نصيحة تجميل')" class="quick-search-category">
                                <i class="fas fa-spa text-2xl mb-2"></i>
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

                <!-- الزفاف -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'wedding') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=400&h=400&fit=crop&crop=center" 
                                 alt="الزفاف" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">الزفاف</h3>
                    <p class="text-sm text-gray-600 mt-1">يومك الخاص</p>
                </div>

                <!-- الجمال -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'beauty') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=400&h=400&fit=crop&crop=center" 
                                 alt="الجمال" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">الجمال</h3>
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

                <!-- الصحة -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'health') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400&h=400&fit=crop&crop=center" 
                                 alt="الصحة" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">الصحة</h3>
                    <p class="text-sm text-gray-600 mt-1">رعاية صحية</p>
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

                <!-- الأطفال -->
                <div class="text-center group cursor-pointer" onclick="window.location.href='{{ route('section', 'babies') }}'">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                            <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?w=400&h=400&fit=crop&crop=center" 
                                 alt="الأطفال" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-d94288 transition-colors">الأطفال</h3>
                    <p class="text-sm text-gray-600 mt-1">رعاية الأطفال</p>
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
            </div>
        </div>
    </section>

    <!-- Enhanced أكسسوراتى Section -->
    <section id="accessoraty" class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 right-20 w-40 h-40 bg-d94288 rounded-full"></div>
            <div class="absolute bottom-20 left-20 w-32 h-32 bg-purple-500 rounded-full"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 section-fade-in">
                <div class="w-20 h-20 bg-gradient-to-br from-d94288 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-gem text-white text-3xl animated-icon"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    <span class="text-d94288">أكسسوراتى</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    كورسات تعليمية احترافية وإكسسوارات عصرية لتصميم إطلالتك المميزة
                </p>
            </div>
            
            <!-- الكورسات التعليمية -->
            <div class="mb-16">
                <h3 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                    <i class="fas fa-graduation-cap ml-2 text-d94288"></i>الكورسات التعليمية
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($courses ?? [] as $course)
                    <div class="enhanced-card group">
                        <div class="p-8">
                            <div class="w-16 h-16 bg-gradient-to-br from-d94288 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-book text-white text-2xl"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4 text-center">{{ $course->name }}</h4>
                            <p class="text-gray-600 mb-6 text-center leading-relaxed">{{ Str::limit($course->description, 120) }}</p>
                            <div class="flex justify-between items-center mb-6">
                                <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">{{ $course->instructor }}</span>
                                <span class="text-sm text-d94288 font-bold bg-pink-100 px-3 py-1 rounded-full">{{ $course->students_count }} طالبة</span>
                            </div>
                            <div class="text-center">
                                <button onclick="Livewire.dispatch('openCourseRegistration', {courseId: {{ $course->id }}, courseName: '{{ $course->name }}'})" 
                                        class="w-full bg-gradient-to-r from-d94288 to-purple-600 text-white py-3 rounded-xl font-semibold hover:from-purple-600 hover:to-d94288 transition-all duration-300 transform hover:-translate-y-1 course-start-btn">
                                    <i class="fas fa-play ml-2"></i>ابدأي التعلم
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center text-gray-500 py-16">
                        <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-graduation-cap text-gray-400 text-4xl"></i>
                        </div>
                        <p class="text-xl">لا توجد كورسات متاحة حالياً</p>
                        <p class="text-gray-400 mt-2">سنضيف كورسات جديدة قريباً</p>
                    </div>
                    @endforelse
                </div>
            </div>
            
            </div>
            
            <!-- متاجر الإكسسوارات -->
            <div class="mt-16">
                <h3 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                    <i class="fas fa-shopping-bag ml-2 text-d94288"></i>متاجر الإكسسوارات
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($accessoraty_shops ?? [] as $shop)
                    <div class="enhanced-card group">
                        <div class="p-8">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-store text-white text-2xl"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4 text-center">{{ $shop->brand_name }}</h4>
                            <p class="text-gray-600 mb-6 text-center leading-relaxed">{{ $shop->location }}</p>
                            <div class="flex justify-between items-center mb-6">
                                <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">{{ $shop->category }}</span>
                                <span class="text-sm text-green-600 font-bold bg-green-100 px-3 py-1 rounded-full">متجر معتمد</span>
                            </div>
                            <div class="text-center">
                                @if($shop->shop_url)
                                    <a href="{{ $shop->shop_url }}" target="_blank" 
                                       class="w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white py-3 rounded-xl font-semibold hover:from-emerald-600 hover:to-green-500 transition-all duration-300 transform hover:-translate-y-1 inline-block text-center">
                                        <i class="fas fa-shopping-bag ml-2"></i>تسوقي الآن
                                    </a>
                                @else
                                    <button class="w-full bg-gradient-to-r from-gray-400 to-gray-500 text-white py-3 rounded-xl font-semibold cursor-not-allowed" disabled>
                                        <i class="fas fa-shopping-bag ml-2"></i>المتجر غير متاح
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center text-gray-500 py-16">
                        <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-store text-gray-400 text-4xl"></i>
                        </div>
                        <p class="text-xl">لا توجد متاجر متاحة حالياً</p>
                        <p class="text-gray-400 mt-2">سنضيف متاجر جديدة قريباً</p>
                    </div>
                    @endforelse
                </div>
            </div>
            
            <div class="text-center">
                <a href="{{ route('section', 'accessoraty') }}" class="glow-border pulse-button inline-block">
                    <div class="content">
                        <span class="text-d94288 font-bold text-lg flex items-center justify-center">
                            <i class="fas fa-arrow-left ml-2"></i>عرض جميع الكورسات والمتاجر
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <div class="section-divider-content">
            <h3 class="text-2xl font-bold mb-2">اكتشفي المزيد من الخدمات</h3>
            <p class="text-lg opacity-90">منصة HAGTY تجمع لك كل ما تحتاجينه</p>
        </div>
    </div>

    <!-- Enhanced الصحة Section -->
    <section id="health" class="py-20 bg-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-20 w-32 h-32 bg-red-500 rounded-full"></div>
            <div class="absolute bottom-20 right-20 w-40 h-40 bg-pink-400 rounded-full"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 section-fade-in">
                <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-heartbeat text-white text-3xl animated-icon"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    <span class="text-red-600">الصحة</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    رعاية صحية شاملة ومتخصصة لصحة أفضل وحياة أجمل
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($doctors ?? [] as $doctor)
                <div class="enhanced-card group">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-user-md text-white text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4 text-center">{{ $doctor->first_name ? 'د. ' . $doctor->first_name . ' ' . ($doctor->last_name ?? '') : 'د. غير محدد' }}</h4>
                        <p class="text-gray-600 mb-6 text-center leading-relaxed">{{ $doctor->specialty ?? 'تخصص غير محدد' }}</p>
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">{{ $doctor->clinic_address ?? 'عنوان غير محدد' }}</span>
                            <span class="text-sm text-red-600 font-bold bg-red-100 px-3 py-1 rounded-full">متاحة للحجز</span>
                        </div>
                        <div class="text-center">
                            @if($doctor->booking_url)
                                <a href="{{ $doctor->booking_url }}" target="_blank" 
                                   class="w-full bg-gradient-to-r from-red-500 to-pink-600 text-white py-3 rounded-xl font-semibold hover:from-pink-600 hover:to-red-500 transition-all duration-300 transform hover:-translate-y-1 book-appointment-btn inline-block text-center">
                                    <i class="fas fa-calendar-check ml-2"></i>احجزي موعد
                                </a>
                            @else
                                <button class="w-full bg-gradient-to-r from-gray-400 to-gray-500 text-white py-3 rounded-xl font-semibold cursor-not-allowed" disabled>
                                    <i class="fas fa-calendar-times ml-2"></i>الحجز غير متاح
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-16">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-user-md text-gray-400 text-4xl"></i>
                    </div>
                    <p class="text-xl">لا توجد أطباء متاحين حالياً</p>
                    <p class="text-gray-400 mt-2">سنضيف أطباء جدد قريباً</p>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('section', 'health') }}" class="glow-border pulse-button inline-block">
                    <div class="content">
                        <span class="text-red-600 font-bold text-lg flex items-center justify-center">
                            <i class="fas fa-arrow-left ml-2"></i>عرض جميع الأطباء
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Customer Reviews Section -->
    <section class="py-20 reviews-section relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 section-fade-in">
                <div class="w-20 h-20 bg-gradient-to-br from-d94288 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-star text-white text-3xl animated-icon"></i>
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

    <!-- Enhanced الموضة Section -->
    <section id="fashion" class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 right-20 w-36 h-36 bg-purple-500 rounded-full"></div>
            <div class="absolute bottom-20 left-20 w-28 h-28 bg-pink-400 rounded-full"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 section-fade-in">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-tshirt text-white text-3xl animated-icon"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    <span class="text-purple-600">الموضة</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    أحدث صيحات الموضة والتجميل لإطلالة مميزة وعصرية
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($fashion_trends ?? [] as $trend)
                <div class="enhanced-card group">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-star text-white text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4 text-center">{{ $trend->title ?? 'صيحة جديدة' }}</h4>
                        <p class="text-gray-600 mb-6 text-center leading-relaxed">{{ Str::limit($trend->content ?? 'وصف الصيحة', 120) }}</p>
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">{{ $trend->category->name ?? 'عام' }}</span>
                            <span class="text-sm text-purple-600 font-bold bg-purple-100 px-3 py-1 rounded-full">جديد</span>
                        </div>
                        <div class="text-center">
                            <button class="w-full bg-gradient-to-r from-purple-500 to-pink-600 text-white py-3 rounded-xl font-semibold hover:from-pink-600 hover:to-purple-500 transition-all duration-300 transform hover:-translate-y-1">
                                <i class="fas fa-eye ml-2"></i>اقرأي المزيد
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-16">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-tshirt text-gray-400 text-4xl"></i>
                    </div>
                    <p class="text-xl">لا توجد صيحات متاحة حالياً</p>
                    <p class="text-gray-400 mt-2">سنضيف صيحات جديدة قريباً</p>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('section', 'fashion') }}" class="glow-border pulse-button inline-block">
                    <div class="content">
                        <span class="text-purple-600 font-bold text-lg flex items-center justify-center">
                            <i class="fas fa-arrow-left ml-2"></i>عرض جميع الصيحات
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Enhanced App Download Section -->
    <section class="app-download-section text-white relative overflow-hidden">
        <!-- Floating App Icons -->
        <div class="floating-app-icon">
            <i class="fas fa-mobile-alt"></i>
        </div>
        <div class="floating-app-icon">
            <i class="fas fa-tablet-alt"></i>
        </div>
        <div class="floating-app-icon">
            <i class="fas fa-laptop"></i>
        </div>
        
        <div class="app-download-content">
            <!-- App Download Header -->
            <div class="app-download-header section-fade-in">
                <div class="app-download-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h2 class="app-download-title">حمل التطبيق الآن</h2>
                <p class="app-download-subtitle">
                    احصلي على تجربة أفضل مع تطبيق HAGTY - متوفر على Android و iOS
                </p>
            </div>
            
            <!-- App Download Grid -->
            <div class="app-download-grid">
                <!-- App Features -->
                <div class="app-features section-fade-in">
                    <h3 class="app-features-title">مميزات التطبيق</h3>
                    <ul class="app-features-list">
                        <li>
                            <i class="fas fa-bell"></i>
                            <span>إشعارات فورية بأحدث العروض والكورسات</span>
                        </li>
                        <li>
                            <i class="fas fa-calendar-check"></i>
                            <span>حجز المواعيد بسهولة وسرعة</span>
                        </li>
                        <li>
                            <i class="fas fa-play-circle"></i>
                            <span>مشاهدة الكورسات في أي وقت</span>
                        </li>
                        <li>
                            <i class="fas fa-headset"></i>
                            <span>دعم متواصل على مدار الساعة</span>
                        </li>
                    </ul>
                </div>
                
                <!-- App Download Buttons -->
                <div class="app-download-buttons section-fade-in">
                    <div class="space-y-4">
                        <a href="#" class="download-button">
                            <i class="fab fa-google-play"></i>
                            <div class="download-button-text">
                                <span class="store-label">احصل عليه على</span>
                                <span class="store-name">Google Play</span>
                            </div>
                        </a>
                        
                        <a href="#" class="download-button">
                            <i class="fab fa-apple"></i>
                            <div class="download-button-text">
                                <span class="store-label">احصل عليه على</span>
                                <span class="store-name">App Store</span>
                            </div>
                        </a>
                    </div>
                    
                    <!-- App Screenshot -->
                    <div class="app-screenshot mt-8">
                        <img src="https://via.placeholder.com/400x300/ffffff20/ffffff?text=HAGTY+App+Screenshot" alt="تطبيق HAGTY" class="w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- الأطفال Section -->
    <section id="babies" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">الأطفال</h2>
                <p class="text-gray-600">رعاية شاملة للأطفال والأمهات</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($babies ?? [] as $baby)
                <div class="section-card card-hover">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-baby text-white text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2 text-center">{{ $baby->name ?? 'طفل جديد' }}</h4>
                        <p class="text-gray-600 mb-4 text-center">{{ $baby->age ?? 'عمر غير محدد' }} سنوات</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">{{ $baby->parent_name ?? 'أم غير محدد' }}</span>
                            <span class="text-sm text-yellow-600 font-semibold bg-yellow-100 px-2 py-1 rounded-full">طفل</span>
                        </div>
                        <button onclick="openBabiesDetailsModal({{ $baby->id }}, '{{ $baby->name }}', '{{ $baby->age }}', '{{ $baby->parent_name }}', '{{ $baby->birth_date ?? '' }}', '{{ $baby->weight ?? '' }}', '{{ $baby->height ?? '' }}', '{{ $baby->notes ?? '' }}')" 
                                class="w-full bg-gradient-to-r from-yellow-400 to-orange-500 text-white py-3 rounded-xl font-semibold hover:from-orange-500 hover:to-yellow-400 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-info-circle ml-2"></i>عرض التفاصيل
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-baby text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد بيانات أطفال متاحة حالياً</p>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('section', 'babies') }}" class="primary-bg text-white px-8 py-3 rounded-full font-semibold hover:bg-pink-700 transition duration-300">
                    عرض جميع البيانات
                </a>
            </div>
        </div>
    </section>

    <!-- الزفاف Section -->
    <section id="wedding" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">الزفاف</h2>
                <p class="text-gray-600">كل ما تحتاجينه لحفل زفاف مثالي</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- مصمم فساتين الزفاف -->
                @forelse(($wedding_designers ?? [])->take(1) as $designer)
                <div class="section-card card-hover">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-tshirt text-white text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2 text-center">{{ $designer->name ?? 'مصمم جديد' }}</h4>
                        <p class="text-gray-600 mb-4 text-center">{{ Str::limit($designer->description ?? 'وصف المصمم', 100) }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">{{ $designer->location ?? 'موقع غير محدد' }}</span>
                            <span class="text-sm text-pink-600 font-semibold bg-pink-100 px-2 py-1 rounded-full">مصمم</span>
                        </div>
                        <button onclick="openWeddingBookingModal('designer', {{ $designer->id }}, '{{ $designer->name }}', '{{ $designer->description }}', '{{ $designer->address }}', '{{ $designer->phone_numbers ? ($designer->phone_numbers[0] ?? '') : '' }}', '{{ $designer->price_range_min }}-{{ $designer->price_range_max }} جنيه')" 
                                class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white py-3 rounded-xl font-semibold hover:from-purple-600 hover:to-pink-500 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-calendar-check ml-2"></i>احجزي موعد
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <i class="fas fa-tshirt text-6xl mb-4 text-gray-300"></i>
                    <p class="text-xl">لا توجد مصممين متاحين حالياً</p>
                </div>
                @endforelse

                <!-- منظم حفلات الزفاف -->
                @forelse(($wedding_planners ?? [])->take(1) as $planner)
                <div class="section-card card-hover">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-alt text-white text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2 text-center">{{ $planner->name ?? 'منظم جديد' }}</h4>
                        <p class="text-gray-600 mb-4 text-center">{{ Str::limit($planner->description ?? 'وصف المنظم', 100) }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">{{ $planner->location ?? 'موقع غير محدد' }}</span>
                            <span class="text-sm text-blue-600 font-semibold bg-blue-100 px-2 py-1 rounded-full">منظم</span>
                        </div>
                        <button onclick="openWeddingBookingModal('planner', {{ $planner->id }}, '{{ $planner->name }}', 'منظم حفلات زفاف محترف', '{{ $planner->location }}', '{{ $planner->phone ?? '' }}', '{{ $planner->package ?? '' }}')" 
                                class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-3 rounded-xl font-semibold hover:from-indigo-600 hover:to-blue-500 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-calendar-check ml-2"></i>احجزي موعد
                        </button>
                    </div>
                </div>
                @empty
                @endforelse

                <!-- فنانة مكياج -->
                @forelse(($makeup_artists ?? [])->take(1) as $artist)
                <div class="section-card card-hover">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-palette text-white text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2 text-center">{{ $artist->name ?? 'فنانة جديدة' }}</h4>
                        <p class="text-gray-600 mb-4 text-center">{{ Str::limit($artist->specialty ?? 'تخصص غير محدد', 100) }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">{{ $artist->location ?? 'موقع غير محدد' }}</span>
                            <span class="text-sm text-red-600 font-semibold bg-red-100 px-2 py-1 rounded-full">مكياج</span>
                        </div>
                        <button onclick="openWeddingBookingModal('makeup', {{ $artist->id }}, '{{ $artist->name }}', '{{ $artist->description }}', '{{ $artist->address }}', '{{ $artist->phone ?? '' }}', 'مكياج كامل')" 
                                class="w-full bg-gradient-to-r from-red-500 to-pink-600 text-white py-3 rounded-xl font-semibold hover:from-pink-600 hover:to-red-500 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-calendar-check ml-2"></i>احجزي موعد
                        </button>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('section', 'wedding') }}" class="primary-bg text-white px-8 py-3 rounded-full font-semibold hover:bg-pink-700 transition duration-300">
                    عرض جميع خدمات الزفاف
                </a>
            </div>
        </div>
    </section>

    <!-- الجمال Section -->
    <section id="beauty" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">الجمال</h2>
                <p class="text-gray-600">خدمات تجميل متخصصة وعناية بالبشرة</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- جراحي التجميل -->
                @forelse($plastic_surgeons ?? [] as $surgeon)
                <div class="section-card card-hover">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-md text-white text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2 text-center">{{ $surgeon->name ?? 'جراح جديد' }}</h4>
                        <p class="text-gray-600 mb-4 text-center">{{ $surgeon->specialty ?? 'تخصص غير محدد' }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">{{ $surgeon->clinic_address ?? 'عيادة غير محدد' }}</span>
                            <span class="text-sm text-blue-600 font-semibold bg-blue-100 px-2 py-1 rounded-full">جراحة تجميل</span>
                        </div>
                        @if($surgeon->booking_url)
                            <a href="{{ $surgeon->booking_url }}" target="_blank" 
                               class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-3 rounded-xl font-semibold hover:from-indigo-600 hover:to-blue-500 transition-all duration-300 transform hover:-translate-y-1 text-center block">
                                <i class="fas fa-calendar-check ml-2"></i>احجزي استشارة
                            </a>
                        @else
                            <button onclick="alert('رابط الحجز غير متاح حالياً')" 
                                    class="w-full bg-gray-400 text-white py-3 rounded-xl font-semibold cursor-not-allowed">
                                <i class="fas fa-calendar-check ml-2"></i>احجزي استشارة
                            </button>
                        @endif
                    </div>
                </div>
                @empty
                @endforelse

                <!-- مصففي الشعر -->
                @forelse($hair_stylists ?? [] as $stylist)
                <div class="section-card card-hover">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-cut text-white text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2 text-center">{{ $stylist->name ?? 'مصفف جديد' }}</h4>
                        <p class="text-gray-600 mb-4 text-center">تصفيف شعر احترافي</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">{{ $stylist->location ?? 'موقع غير محدد' }}</span>
                            <span class="text-sm text-pink-600 font-semibold bg-pink-100 px-2 py-1 rounded-full">تصفيف شعر</span>
                        </div>
                        @if($stylist->booking_url)
                            <a href="{{ $stylist->booking_url }}" target="_blank" 
                               class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white py-3 rounded-xl font-semibold hover:from-purple-600 hover:to-pink-500 transition-all duration-300 transform hover:-translate-y-1 text-center block">
                                <i class="fas fa-calendar-check ml-2"></i>احجزي استشارة
                            </a>
                        @else
                            <button onclick="alert('رابط الحجز غير متاح حالياً')" 
                                    class="w-full bg-gray-400 text-white py-3 rounded-xl font-semibold cursor-not-allowed">
                                <i class="fas fa-calendar-check ml-2"></i>احجزي استشارة
                            </button>
                        @endif
                    </div>
                </div>
                @empty
                @endforelse

                <!-- متاجر الجمال -->
                @forelse($beauty_shops ?? [] as $shop)
                <div class="section-card card-hover">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-store text-white text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2 text-center">{{ $shop->brand_name ?? 'متجر جديد' }}</h4>
                        <p class="text-gray-600 mb-4 text-center">خدمات تجميل شاملة</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">{{ $shop->location ?? 'موقع غير محدد' }}</span>
                            <span class="text-sm text-green-600 font-semibold bg-green-100 px-2 py-1 rounded-full">متجر جمال</span>
                        </div>
                        @if($shop->shop_url)
                            <a href="{{ $shop->shop_url }}" target="_blank" 
                               class="w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white py-3 rounded-xl font-semibold hover:from-emerald-600 hover:to-green-500 transition-all duration-300 transform hover:-translate-y-1 text-center block">
                                <i class="fas fa-calendar-check ml-2"></i>احجزي استشارة
                            </a>
                        @else
                            <button onclick="alert('رابط الحجز غير متاح حالياً')" 
                                    class="w-full bg-gray-400 text-white py-3 rounded-xl font-semibold cursor-not-allowed">
                                <i class="fas fa-calendar-check ml-2"></i>احجزي استشارة
                            </button>
                        @endif
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('section', 'beauty') }}" class="primary-bg text-white px-8 py-3 rounded-full font-semibold hover:bg-pink-700 transition duration-300">
                    عرض جميع خدمات الجمال
                </a>
            </div>
        </div>
    </section>

    <!-- أومومتي Section -->
    <section id="umomi" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">أومومتي</h2>
                <p class="text-gray-600">رعاية شاملة للأمهات الحوامل</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($maternity_doctors ?? [] as $doctor)
                <div class="section-card card-hover">
                    <div class="p-6">
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $doctor->name ?? 'دكتورة جديدة' }}</h4>
                        <p class="text-gray-600 mb-4">{{ $doctor->specialty ?? 'تخصص غير محدد' }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">{{ $doctor->clinic_name ?? 'عيادة غير محدد' }}</span>
                            <span class="text-sm text-teal-600 font-semibold bg-teal-100 px-2 py-1 rounded-full">طبيبة أمومة</span>
                        </div>
                        <button onclick="openUmomiBookingModal('doctor', {{ $doctor->id }}, '{{ $doctor->name }}', '{{ $doctor->specialty }}', '{{ $doctor->clinic_name ?? '' }}', '{{ $doctor->phone_numbers ? ($doctor->phone_numbers[0] ?? '') : '' }}', '{{ $doctor->consultation_fees ?? '' }}')" 
                                class="w-full bg-gradient-to-r from-teal-500 to-blue-600 text-white py-3 rounded-xl font-semibold hover:from-blue-600 hover:to-teal-500 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-calendar-check ml-2"></i>احجزي موعد
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    لا توجد أطباء متاحين حالياً
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('section', 'umomi') }}" class="primary-bg text-white px-8 py-3 rounded-full font-semibold hover:bg-pink-700 transition duration-300">
                    عرض جميع خدمات الأمومة
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 newsletter-section relative overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 section-fade-in">
                <div class="w-24 h-24 bg-gradient-to-br from-d94288 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-8">
                    <i class="fas fa-envelope text-white text-4xl animated-icon"></i>
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
                            <button type="submit" class="newsletter-submit-btn w-full lg:w-auto bg-gradient-to-r from-d94288 to-purple-600 text-white px-8 py-4 rounded-xl hover:from-purple-600 hover:to-d94288 transition-all duration-300 font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1">
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
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
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
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
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

        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
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
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
            
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
    </script>
    
    <!-- Course Registration Modal -->
    @livewire('course-registration-modal')
    
    <!-- Wedding Booking Modal -->
    <div id="wedding-booking-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <!-- Header -->
                <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white p-6 rounded-t-2xl">
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
                                    class="flex-1 bg-gradient-to-r from-pink-500 to-purple-600 text-white py-3 rounded-xl font-semibold hover:from-purple-600 hover:to-pink-500 transition-all duration-300">
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
                <div class="bg-gradient-to-r from-teal-500 to-blue-600 text-white p-6 rounded-t-2xl">
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
                                    class="flex-1 bg-gradient-to-r from-teal-500 to-blue-600 text-white py-3 rounded-xl font-semibold hover:from-blue-600 hover:to-teal-500 transition-all duration-300">
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
                <div class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white p-6 rounded-t-2xl">
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
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 mb-6">
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
                                class="flex-1 bg-gradient-to-r from-yellow-400 to-orange-500 text-white py-3 rounded-xl font-semibold hover:from-orange-500 hover:to-yellow-400 transition-all duration-300">
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
    </script>
</body>
</html>
