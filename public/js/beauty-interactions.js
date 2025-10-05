// Beauty Section - Enhanced Interactions - تفاعلات محسنة لصفحة الجمال

document.addEventListener('DOMContentLoaded', function() {
    // الألوان المحددة
    const colors = {
        primary: '#A15DBF',
        secondary: '#8B4A9C',
        accent: '#FAD6E0',
        light: '#E6A0C3',
        dark: '#B17DC0',
        background: '#E6DAC8'
    };

    // تحريك البطاقات
    function animateCards() {
        const cards = document.querySelectorAll('.bg-\\[#FAD6E0\\]');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('animate-fadeInUp');
        });
    }

    // تحريك الإحصائيات
    function animateStats() {
        const stats = document.querySelectorAll('.grid.grid-cols-2.md\\:grid-cols-4 > div, .grid.grid-cols-1.md\\:grid-cols-3 > div');
        stats.forEach((stat, index) => {
            stat.style.animationDelay = `${index * 0.2}s`;
            stat.classList.add('animate-bounceIn');
        });
    }

    // تحريك العناوين
    function animateTitles() {
        const titles = document.querySelectorAll('h1, h2, h3');
        titles.forEach((title, index) => {
            title.style.animationDelay = `${index * 0.1}s`;
            title.classList.add('animate-fadeInUp');
        });
    }

    // تحريك الصور
    function animateImages() {
        const images = document.querySelectorAll('img');
        images.forEach((img, index) => {
            img.style.animationDelay = `${index * 0.1}s`;
            img.classList.add('animate-fadeInUp');
        });
    }

    // تحريك الأزرار
    function animateButtons() {
        const buttons = document.querySelectorAll('button, a');
        buttons.forEach((btn, index) => {
            btn.style.animationDelay = `${index * 0.05}s`;
            btn.classList.add('animate-fadeInUp');
        });
    }

    // تحريك العناصر التفاعلية
    function animateInteractiveElements() {
        const elements = document.querySelectorAll('.hover\\:scale-105, .hover\\:shadow-xl');
        elements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.1}s`;
            el.classList.add('animate-fadeInUp');
        });
    }

    // تحريك النصوص
    function animateTexts() {
        const texts = document.querySelectorAll('p, div');
        texts.forEach((text, index) => {
            text.style.animationDelay = `${index * 0.05}s`;
            text.classList.add('animate-fadeInUp');
        });
    }

    // تحريك الأقسام
    function animateSections() {
        const sections = document.querySelectorAll('section');
        sections.forEach((section, index) => {
            section.style.animationDelay = `${index * 0.2}s`;
            section.classList.add('animate-slideInRight');
        });
    }

    // تحريك العناصر المحددة
    function animateSpecificElements() {
        const specificElements = document.querySelectorAll('.animate-fadeInUp, .animate-bounceIn');
        specificElements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.1}s`;
        });
    }

    // تأثير التمرير
    function handleScroll() {
        const elements = document.querySelectorAll('.scroll-animate');
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('visible');
            }
        });
    }

    // تأثير النقر
    function addClickEffects() {
        const clickableElements = document.querySelectorAll('button, a, .click-ripple');
        clickableElements.forEach(element => {
            element.addEventListener('click', function(e) {
                this.classList.add('click-ripple');
                setTimeout(() => {
                    this.classList.remove('click-ripple');
                }, 600);
            });
        });
    }

    // تأثير التمرير للخلفية
    function addParallaxEffect() {
        const parallaxElements = document.querySelectorAll('.bg-white');
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            parallaxElements.forEach(element => {
                const rate = scrolled * -0.5;
                element.style.transform = `translateY(${rate}px)`;
            });
        });
    }

    // تحسين وضوح النص
    function enhanceTextClarity() {
        const textElements = document.querySelectorAll('.text-\\[#A15DBF\\], .text-\\[#B17DC0\\], .text-\\[#8B4A9C\\]');
        textElements.forEach(element => {
            element.style.textShadow = '1px 1px 2px rgba(0, 0, 0, 0.1)';
            element.style.fontWeight = '600';
            element.style.fontFamily = "'Cairo', sans-serif";
        });
    }

    // تحسين وضوح الأزرار
    function enhanceButtonClarity() {
        const buttons = document.querySelectorAll('.bg-gradient-to-r.from-\\[#A15DBF\\].to-\\[#8B4A9C\\]');
        buttons.forEach(button => {
            button.style.color = '#ffffff';
            button.style.textShadow = '2px 2px 4px rgba(0, 0, 0, 0.8)';
            button.style.fontWeight = '800';
            button.style.fontFamily = "'Cairo', sans-serif";
            button.style.textRendering = 'optimizeLegibility';
            button.style.webkitFontSmoothing = 'antialiased';
        });
    }

    // تحسين وضوح الإحصائيات
    function enhanceStatsClarity() {
        const stats = document.querySelectorAll('.grid.grid-cols-2.md\\:grid-cols-4 > div .text-3xl, .grid.grid-cols-1.md\\:grid-cols-3 > div .text-3xl');
        stats.forEach(stat => {
            stat.style.color = '#000000';
            stat.style.textShadow = '2px 2px 4px rgba(0, 0, 0, 0.3)';
            stat.style.fontWeight = '900';
            stat.style.fontFamily = "'Cairo', sans-serif";
        });

        const labels = document.querySelectorAll('.grid.grid-cols-2.md\\:grid-cols-4 > div .text-sm, .grid.grid-cols-1.md\\:grid-cols-3 > div .text-sm');
        labels.forEach(label => {
            label.style.color = '#000000';
            label.style.textShadow = '1px 1px 2px rgba(0, 0, 0, 0.2)';
            label.style.fontWeight = '700';
            label.style.fontFamily = "'Cairo', sans-serif";
        });
    }

    // تأثيرات خاصة للجمال
    function addBeautyEffects() {
        // تأثير اللمعان للمكياج
        const makeupCards = document.querySelectorAll('.bg-\\[#FAD6E0\\]');
        makeupCards.forEach(card => {
            if (card.textContent.includes('مكياج') || card.textContent.includes('جمال')) {
                card.classList.add('beauty-glow');
            }
        });

        // تأثير التوهج للعناية
        const careCards = document.querySelectorAll('.bg-\\[#FAD6E0\\]');
        careCards.forEach(card => {
            if (card.textContent.includes('عناية') || card.textContent.includes('رعاية')) {
                card.classList.add('care-shine');
            }
        });

        // تأثير النعومة للبشرة
        const skinCards = document.querySelectorAll('.bg-\\[#FAD6E0\\]');
        skinCards.forEach(card => {
            if (card.textContent.includes('بشرة') || card.textContent.includes('جلد')) {
                card.classList.add('skin-soft');
            }
        });
    }

    // تهيئة جميع التحسينات
    function initializeEnhancements() {
        animateCards();
        animateStats();
        animateTitles();
        animateImages();
        animateButtons();
        animateInteractiveElements();
        animateTexts();
        animateSections();
        animateSpecificElements();
        addClickEffects();
        addParallaxEffect();
        enhanceTextClarity();
        enhanceButtonClarity();
        enhanceStatsClarity();
        addBeautyEffects();
    }

    // تشغيل التحسينات
    initializeEnhancements();

    // إضافة مستمعي الأحداث
    window.addEventListener('scroll', handleScroll);
    window.addEventListener('resize', initializeEnhancements);

    // تحسين الأداء
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    });

    document.querySelectorAll('.scroll-animate').forEach(el => {
        observer.observe(el);
    });
});
