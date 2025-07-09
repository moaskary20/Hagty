// أداة إجبارية لتغيير شريط أدوات الجدول
(function() {
    'use strict';

    // تطبيق التخصيصات بقوة
    function forceApplyToolbarStyles() {
        console.log('Applying toolbar styles...');
        
        // جميع الطرق المختلفة لاستهداف العنصر
        const selectors = [
            '.fi-ta-header-toolbar',
            '[class*="fi-ta-header-toolbar"]',
            'div[class*="fi-ta-header-toolbar"]',
            '.fi-ta-header-toolbar.flex',
            '.fi-ta-header-toolbar.flex.items-center',
            '.fi-ta-header-toolbar.flex.items-center.justify-between',
            '.fi-ta-header-toolbar.flex.items-center.justify-between.gap-x-4',
            '.fi-ta-header-toolbar.flex.items-center.justify-between.gap-x-4.px-4',
            '.fi-ta-header-toolbar.flex.items-center.justify-between.gap-x-4.px-4.py-3',
            '.fi-ta-header-toolbar.flex.items-center.justify-between.gap-x-4.px-4.py-3.sm\\:px-6',
            '[class*="toolbar"][class*="flex"]',
            'div[class*="toolbar"][class*="flex"][class*="items-center"]',
            '[class*="header-toolbar"]',
            'div[class*="header-toolbar"]'
        ];
        
        let elementsFound = 0;
        
        selectors.forEach(selector => {
            try {
                const elements = document.querySelectorAll(selector);
                elements.forEach(el => {
                    elementsFound++;
                    
                    // إزالة الستايلات الموجودة
                    el.style.removeProperty('background-color');
                    el.style.removeProperty('background');
                    
                    // تطبيق الستايلات الجديدة
                    el.style.setProperty('background-color', '#dc2175', 'important');
                    el.style.setProperty('background', '#dc2175', 'important');
                    el.style.setProperty('color', 'white', 'important');
                    
                    // تطبيق الستايلات باستخدام CSS Text
                    el.style.cssText += '; background-color: #dc2175 !important; background: #dc2175 !important; color: white !important;';
                    
                    // تطبيق الستايلات بطريقة مباشرة
                    el.setAttribute('style', el.getAttribute('style') + '; background-color: #dc2175 !important; background: #dc2175 !important; color: white !important;');
                });
            } catch (e) {
                console.warn('Error applying styles to selector:', selector, e);
            }
        });
        
        console.log('Elements found and styled:', elementsFound);
    }

    // تطبيق فوري
    forceApplyToolbarStyles();

    // تطبيق عند تحميل الصفحة
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', forceApplyToolbarStyles);
    } else {
        forceApplyToolbarStyles();
    }

    // مراقبة التغييرات
    const observer = new MutationObserver(function(mutations) {
        let shouldApply = false;
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                for (let node of mutation.addedNodes) {
                    if (node.nodeType === Node.ELEMENT_NODE) {
                        if (node.className && node.className.includes('fi-ta-header-toolbar')) {
                            shouldApply = true;
                            break;
                        }
                    }
                }
            }
        });
        
        if (shouldApply) {
            setTimeout(forceApplyToolbarStyles, 100);
        }
    });

    observer.observe(document.body || document.documentElement, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeFilter: ['class', 'style']
    });

    // تطبيق دوري كل ثانية
    setInterval(forceApplyToolbarStyles, 1000);

    // تطبيق عند أحداث مختلفة
    window.addEventListener('load', forceApplyToolbarStyles);
    window.addEventListener('resize', forceApplyToolbarStyles);
    
    // تطبيق عند تفاعل المستخدم
    document.addEventListener('click', () => {
        setTimeout(forceApplyToolbarStyles, 200);
    });

    console.log('Toolbar style forcer loaded');
})();
