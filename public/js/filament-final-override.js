// الحل النهائي لـ Filament - استهداف مباشر
console.log("🎯 بدء تشغيل مُجبِر ألوان Filament النهائي...");

(function() {
    'use strict';

    // قائمة بجميع الكلاسات المحتملة في Filament
    const filamentClasses = [
        'fi-ta-header-toolbar',
        'fi-ta-header',
        'fi-ta-ctn',
        'fi-ta-content',
        'fi-ta-table',
        'fi-ta-filters',
        'fi-ta-actions',
        'fi-header-toolbar',
        'fi-table-header',
        'fi-table-toolbar',
        'fi-resource-table',
        'fi-page-header',
        'fi-panel-header',
        'fi-card-header',
        'fi-section-header'
    ];

    // قائمة بالـ selectors المباشرة
    const directSelectors = [
        '[class*="fi-ta-header"]',
        '[class*="fi-ta-toolbar"]',
        '[class*="fi-header"]',
        '[class*="fi-toolbar"]',
        '[class*="fi-table-header"]',
        '[class*="fi-panel-header"]',
        '[class*="fi-card-header"]',
        '[class*="fi-section-header"]'
    ];

    function forceFilamentColors() {
        console.log("💥 تطبيق ألوان Filament...");
        
        let count = 0;
        
        // طريقة 1: استهداف الكلاسات المباشرة
        filamentClasses.forEach(className => {
            const elements = document.querySelectorAll(`.${className}`);
            elements.forEach(el => {
                applyColors(el, `class: ${className}`);
                count++;
            });
        });
        
        // طريقة 2: استهداف الـ selectors
        directSelectors.forEach(selector => {
            try {
                const elements = document.querySelectorAll(selector);
                elements.forEach(el => {
                    applyColors(el, `selector: ${selector}`);
                    count++;
                });
            } catch(e) {
                console.warn('خطأ في selector:', selector, e);
            }
        });
        
        // طريقة 3: استهداف العناصر بـ data attributes
        const dataSelectors = [
            '[data-filament-table]',
            '[data-filament-page]',
            '[data-filament-panel]',
            '[data-filament-resource]'
        ];
        
        dataSelectors.forEach(selector => {
            try {
                const elements = document.querySelectorAll(selector);
                elements.forEach(el => {
                    // استهداف العناصر الفرعية
                    const headers = el.querySelectorAll('[class*="header"], [class*="toolbar"], [class*="fi-ta-header"]');
                    headers.forEach(header => {
                        applyColors(header, `data-attribute: ${selector}`);
                        count++;
                    });
                });
            } catch(e) {
                console.warn('خطأ في data selector:', selector, e);
            }
        });
        
        // طريقة 4: استهداف أي div يحتوي على flex + items-center + justify-between
        const flexElements = document.querySelectorAll('div[class*="flex"][class*="items-center"][class*="justify-between"]');
        flexElements.forEach(el => {
            const className = el.className || '';
            // تجاهل العناصر الجانبية
            if (!className.includes('sidebar') && !className.includes('topbar') && !className.includes('fi-sidebar')) {
                applyColors(el, 'flex-layout');
                count++;
            }
        });
        
        // طريقة 5: استهداف العناصر التي تحتوي على gap-x-4 + px-4
        const gapElements = document.querySelectorAll('div[class*="gap-x-4"][class*="px-4"]');
        gapElements.forEach(el => {
            const className = el.className || '';
            if (!className.includes('sidebar') && !className.includes('topbar')) {
                applyColors(el, 'gap-padding');
                count++;
            }
        });
        
        // طريقة 6: استهداف جميع العناصر في Filament table container
        const tableContainers = document.querySelectorAll('.fi-ta-ctn, [class*="fi-ta-ctn"]');
        tableContainers.forEach(container => {
            const allChildren = container.querySelectorAll('*');
            allChildren.forEach(child => {
                const className = child.className || '';
                if (className.includes('toolbar') || className.includes('header') || 
                    (className.includes('flex') && className.includes('items-center'))) {
                    applyColors(child, 'table-container-child');
                    count++;
                }
            });
        });
        
        console.log(`🎯 تم تطبيق الألوان على ${count} عنصر في Filament`);
        return count;
    }

    function applyColors(element, reason) {
        if (!element || !element.style) return;
        
        try {
            // تطبيق الألوان بطرق متعددة
            element.style.cssText += '; background-color: #dc2175 !important; background: #dc2175 !important; color: white !important;';
            element.style.setProperty('background-color', '#dc2175', 'important');
            element.style.setProperty('background', '#dc2175', 'important');
            element.style.setProperty('color', 'white', 'important');
            
            // إضافة attribute للتتبع
            element.setAttribute('data-filament-forced', 'true');
            
            console.log(`✅ تم تطبيق اللون (${reason}):`, element.className);
            
        } catch(e) {
            console.error('خطأ في تطبيق اللون:', e);
        }
    }

    function addFilamentCSS() {
        const style = document.createElement('style');
        style.id = 'filament-force-override';
        style.innerHTML = `
            /* Filament Force Override */
            
            /* استهداف جميع headers في Filament */
            .fi-ta-header-toolbar,
            .fi-ta-header,
            .fi-header-toolbar,
            .fi-table-header,
            .fi-panel-header,
            .fi-card-header,
            .fi-section-header,
            [class*="fi-ta-header"],
            [class*="fi-ta-toolbar"],
            [class*="fi-header"],
            [class*="fi-toolbar"],
            [class*="fi-table-header"],
            [class*="fi-panel-header"],
            [class*="fi-card-header"],
            [class*="fi-section-header"] {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
            
            /* استهداف flex layouts في Filament */
            div[class*="flex"][class*="items-center"][class*="justify-between"]:not([class*="sidebar"]):not([class*="topbar"]) {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
            
            /* استهداف gap + padding في Filament */
            div[class*="gap-x-4"][class*="px-4"]:not([class*="sidebar"]):not([class*="topbar"]) {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
            
            /* استهداف العناصر المجبرة */
            [data-filament-forced="true"] {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
            
            /* استهداف النصوص الرمادية */
            .text-gray-700,
            .text-gray-950,
            .text-gray-600,
            .text-gray-800,
            .text-gray-900,
            [class*="text-gray"] {
                color: white !important;
            }
            
            /* فرض الخط العربي */
            * {
                font-family: 'Noto Sans Arabic', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
                direction: rtl !important;
            }
            
            /* استهداف أي element في Filament table */
            .fi-ta-ctn *,
            .fi-ta-content *,
            .fi-ta-table *,
            [data-filament-table] *,
            [data-filament-page] *,
            [data-filament-panel] *,
            [data-filament-resource] * {
                color: white !important;
            }
            
            /* استهداف headers بطريقة عامة */
            header,
            .header,
            .toolbar,
            [role="banner"],
            [role="toolbar"],
            [role="navigation"] {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
        `;
        
        // إزالة الستايل القديم إن وجد
        const oldStyle = document.getElementById('filament-force-override');
        if (oldStyle) {
            oldStyle.remove();
        }
        
        document.head.appendChild(style);
        console.log('🧨 تم إضافة CSS خاص بـ Filament');
    }

    // تشغيل فوري
    addFilamentCSS();
    forceFilamentColors();

    // تشغيل عند تحميل الصفحة
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            console.log('🚀 DOM محمل - تطبيق ألوان Filament');
            addFilamentCSS();
            setTimeout(() => {
                forceFilamentColors();
            }, 500);
        });
    }

    // تشغيل عند تحميل النافذة
    window.addEventListener('load', () => {
        console.log('🚀 النافذة محملة - تطبيق ألوان Filament');
        addFilamentCSS();
        setTimeout(() => {
            forceFilamentColors();
        }, 1000);
    });

    // مراقب DOM للتغييرات
    const observer = new MutationObserver((mutations) => {
        let shouldRun = false;
        
        mutations.forEach(mutation => {
            if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                mutation.addedNodes.forEach(node => {
                    if (node.nodeType === Node.ELEMENT_NODE && node.className) {
                        const className = node.className.toString();
                        if (className.includes('fi-ta-') || 
                            className.includes('fi-header') ||
                            className.includes('fi-toolbar') ||
                            className.includes('toolbar') ||
                            className.includes('header') ||
                            (className.includes('flex') && className.includes('items-center'))) {
                            shouldRun = true;
                        }
                    }
                });
            }
        });
        
        if (shouldRun) {
            setTimeout(() => {
                addFilamentCSS();
                forceFilamentColors();
            }, 100);
        }
    });

    observer.observe(document.body || document.documentElement, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeFilter: ['class']
    });

    // تشغيل دوري كل 3 ثوانٍ
    setInterval(() => {
        addFilamentCSS();
        const found = forceFilamentColors();
        if (found > 0) {
            console.log(`🔄 تشغيل دوري: تم معالجة ${found} عنصر في Filament`);
        }
    }, 3000);

    // تشغيل عند تفاعل المستخدم
    ['click', 'keydown', 'scroll', 'resize'].forEach(event => {
        document.addEventListener(event, () => {
            setTimeout(() => {
                forceFilamentColors();
            }, 300);
        });
    });

    // تشغيل عند focus على النافذة
    window.addEventListener('focus', () => {
        setTimeout(() => {
            addFilamentCSS();
            forceFilamentColors();
        }, 100);
    });

    console.log("🚀 مُجبِر ألوان Filament النهائي جاهز!");

})();
