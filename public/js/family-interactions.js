// Family Section - Enhanced Interactions - تفاعلات محسنة لصفحة عائلتي

document.addEventListener('DOMContentLoaded', function() {
    // متغيرات الألوان المحددة
    const colors = {
        primary50: '#FAD6E0',
        primary100: '#E6A0C3',
        primary200: '#B17DC0',
        primary300: '#A15DBF',
        primary400: '#A15DBF',
        primary500: '#A15DBF',
        primary600: '#8B4A9C',
        primary700: '#753880',
        primary800: '#5F2664',
        primary900: '#491448',
        accent: '#E6DAC8'
    };

    // إزالة الأنيميشن من الـ Header
    function removeHeaderAnimations() {
        const headerElements = document.querySelectorAll('header, nav, .navbar, .navigation');
        headerElements.forEach(element => {
            element.style.animation = 'none';
            element.style.transition = 'none';
            const children = element.querySelectorAll('*');
            children.forEach(child => {
                child.style.animation = 'none';
                child.style.transition = 'none';
            });
        });
    }

    // تطبيق الحركات على البطاقات
    function animateCards() {
        const cards = document.querySelectorAll('.bg-\\[#FCE4EC\\], .bg-\\[#FAD6E0\\]');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('animate-fadeInUp');
            
            // إضافة تأثير اللمعان
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
                this.style.boxShadow = `0 20px 40px ${colors.primary300}30`;
                this.style.borderColor = colors.primary300;
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '0 8px 32px rgba(161, 93, 191, 0.15)';
                this.style.borderColor = colors.primary100;
            });
        });
    }

    // تطبيق الحركات على الإحصائيات
    function animateStats() {
        const stats = document.querySelectorAll('.grid.grid-cols-2.md\\:grid-cols-4 > div');
        stats.forEach((stat, index) => {
            stat.style.animationDelay = `${index * 0.1}s`;
            stat.classList.add('animate-bounceIn');
            
            // إضافة تأثير النبض
            stat.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.05)';
                this.style.boxShadow = `0 15px 40px ${colors.primary300}25`;
                this.style.background = colors.primary100;
                this.style.borderColor = colors.primary200;
            });
            
            stat.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '0 8px 32px rgba(161, 93, 191, 0.15)';
                this.style.background = colors.primary50;
                this.style.borderColor = colors.primary100;
            });
        });
    }

    // تطبيق الحركات على العناوين
    function animateTitles() {
        const titles = document.querySelectorAll('h1, h2, h3');
        titles.forEach((title, index) => {
            title.style.animationDelay = `${index * 0.2}s`;
            title.classList.add('animate-fadeInUp');
        });
    }

    // تطبيق الحركات على الصور
    function animateImages() {
        const images = document.querySelectorAll('img');
        images.forEach(img => {
            img.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
                this.style.filter = 'brightness(1.1) contrast(1.1)';
                this.style.boxShadow = `0 10px 25px ${colors.primary300}20`;
            });
            
            img.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.filter = 'brightness(1) contrast(1)';
                this.style.boxShadow = 'none';
            });
        });
    }

    // تطبيق الحركات على الأزرار
    function animateButtons() {
        const buttons = document.querySelectorAll('button, a');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = `0 8px 20px ${colors.primary300}30`;
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
            
            // إضافة تأثير الموجة عند النقر
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    }

    // تطبيق الحركات على العناصر التفاعلية
    function animateInteractiveElements() {
        const interactiveElements = document.querySelectorAll('.hover\\:shadow-xl, .hover\\:-translate-y-2, .hover\\:scale-105');
        interactiveElements.forEach(element => {
            element.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
                this.style.boxShadow = `0 20px 40px ${colors.primary300}30`;
            });
            
            element.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = 'none';
            });
        });
    }

    // تطبيق الحركات على النصوص
    function animateTexts() {
        const texts = document.querySelectorAll('p, div');
        texts.forEach((text, index) => {
            text.style.animationDelay = `${index * 0.05}s`;
            text.classList.add('animate-fadeIn');
        });
    }

    // تطبيق الحركات على الأقسام
    function animateSections() {
        const sections = document.querySelectorAll('section');
        sections.forEach((section, index) => {
            section.style.animationDelay = `${index * 0.3}s`;
            section.classList.add('animate-slideInRight');
        });
    }

    // تطبيق الحركات على العناصر المحددة
    function animateSpecificElements() {
        const specificElements = document.querySelectorAll('.transition-transform, .transition-all, .transition-colors');
        specificElements.forEach(element => {
            element.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
                this.style.color = colors.primary700;
            });
            
            element.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.color = '';
            });
        });
    }

    // تأثير التمرير
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        const scrollElements = document.querySelectorAll('.scroll-animate');
        scrollElements.forEach(el => {
            observer.observe(el);
        });
    }

    // تأثير البارالاكس
    function initParallax() {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.bg-\\[#FAD6E0\\]');
            
            parallaxElements.forEach((element, index) => {
                const speed = 0.5 + (index * 0.1);
                const yPos = -(scrolled * speed);
                element.style.transform = `translateY(${yPos}px)`;
            });
        });
    }

    // تأثير النقر
    function initClickEffects() {
        const clickElements = document.querySelectorAll('.click-ripple');
        clickElements.forEach(element => {
            element.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    }

    // تأثيرات خاصة للعائلة
    function initFamilyEffects() {
        // تأثير القلب للعائلة
        const familyElements = document.querySelectorAll('.family-heart');
        familyElements.forEach(element => {
            element.classList.add('family-heart');
        });

        // تأثير النشاط العائلي
        const activityElements = document.querySelectorAll('.activity-bounce');
        activityElements.forEach(element => {
            element.classList.add('activity-bounce');
        });

        // تأثير النصائح العائلية
        const adviceElements = document.querySelectorAll('.advice-glow');
        adviceElements.forEach(element => {
            element.classList.add('advice-glow');
        });

        // تأثير الصحة العائلية
        const healthElements = document.querySelectorAll('.health-pulse');
        healthElements.forEach(element => {
            element.classList.add('health-pulse');
        });
    }

    // تأثير التحميل
    function initLoadingEffects() {
        const loadingElements = document.querySelectorAll('.loading-pulse');
        loadingElements.forEach(element => {
            element.classList.add('loading-pulse');
        });
    }

    // تأثير التوهج
    function initGlowEffects() {
        const glowElements = document.querySelectorAll('.special-glow');
        glowElements.forEach(element => {
            element.classList.add('special-glow');
        });
    }

    // تأثير الخلفية المتحركة
    function initAnimatedBackground() {
        const animatedBgElements = document.querySelectorAll('.animated-bg');
        animatedBgElements.forEach(element => {
            element.classList.add('animated-bg');
        });
    }

    // تأثير النص المتحرك
    function initTextFlow() {
        const textFlowElements = document.querySelectorAll('.text-flow');
        textFlowElements.forEach(element => {
            element.classList.add('text-flow');
        });
    }

    // تأثير الظلال المتحركة
    function initFloatingShadow() {
        const floatingShadowElements = document.querySelectorAll('.floating-shadow');
        floatingShadowElements.forEach(element => {
            element.classList.add('floating-shadow');
        });
    }

    // تأثير الأيقونات
    function initIconBounce() {
        const iconElements = document.querySelectorAll('.icon-bounce');
        iconElements.forEach(element => {
            element.classList.add('icon-bounce');
        });
    }

    // تأثير البطاقات المتقدمة
    function initAdvancedCards() {
        const advancedCards = document.querySelectorAll('.card-advanced');
        advancedCards.forEach(card => {
            card.classList.add('card-advanced');
        });
    }

    // تشغيل جميع الحركات
    function runAllAnimations() {
        removeHeaderAnimations();
        animateCards();
        animateStats();
        animateTitles();
        animateImages();
        animateButtons();
        animateInteractiveElements();
        animateTexts();
        animateSections();
        animateSpecificElements();
        initScrollAnimations();
        initParallax();
        initClickEffects();
        initFamilyEffects();
        initLoadingEffects();
        initGlowEffects();
        initAnimatedBackground();
        initTextFlow();
        initFloatingShadow();
        initIconBounce();
        initAdvancedCards();
    }

    // تشغيل الحركات عند التحميل
    runAllAnimations();

    // تشغيل الحركات عند التمرير
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.bg-\\[#FAD6E0\\]');
        
        parallaxElements.forEach((element, index) => {
            const speed = 0.5 + (index * 0.1);
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });

    // تشغيل الحركات عند تغيير الحجم
    window.addEventListener('resize', function() {
        setTimeout(runAllAnimations, 100);
    });

    // تشغيل الحركات عند النقر
    document.addEventListener('click', function() {
        setTimeout(runAllAnimations, 50);
    });

    // إضافة أنماط CSS للتفاعلات
    const style = document.createElement('style');
    style.textContent = `
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(161, 93, 191, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .scroll-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .scroll-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .family-heart {
            animation: familyHeart 2s ease-in-out infinite;
        }
        
        @keyframes familyHeart {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }
        
        .activity-bounce {
            animation: activityBounce 1.5s ease-in-out infinite;
        }
        
        @keyframes activityBounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-8px);
            }
        }
        
        .advice-glow {
            animation: adviceGlow 3s ease-in-out infinite;
        }
        
        @keyframes adviceGlow {
            0%, 100% {
                box-shadow: 0 5px 15px rgba(161, 93, 191, 0.2);
            }
            50% {
                box-shadow: 0 10px 25px rgba(161, 93, 191, 0.4);
            }
        }
        
        .health-pulse {
            animation: healthPulse 2s ease-in-out infinite;
        }
        
        @keyframes healthPulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.02);
            }
        }
    `;
    document.head.appendChild(style);
});
