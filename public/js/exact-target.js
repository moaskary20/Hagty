// استهداف الكلاس الفعلي المكتشف
console.log("🎯 بدء تشغيل استهداف الكلاس الفعلي...");

(function() {
    'use strict';

    const exactClass = 'fi-ta-header-toolbar flex items-center justify-between gap-x-4 px-4 py-3 sm:px-6';
    
    function targetExactClass() {
        console.log("🎯 البحث عن الكلاس الفعلي:", exactClass);
        
        let found = 0;
        
        // طريقة 1: البحث بـ selector مباشر
        const elements = document.querySelectorAll('.fi-ta-header-toolbar');
        console.log("🔍 وجدت", elements.length, "عنصر مع .fi-ta-header-toolbar");
        
        elements.forEach((element, index) => {
            console.log(`📋 العنصر ${index + 1}:`, element.className);
            
            // تطبيق الألوان
            element.style.setProperty('background-color', '#dc2175', 'important');
            element.style.setProperty('background', '#dc2175', 'important');
            element.style.setProperty('color', 'white', 'important');
            
            // طريقة إضافية
            element.style.cssText += '; background-color: #dc2175 !important; background: #dc2175 !important; color: white !important;';
            
            // إضافة attribute
            element.setAttribute('data-exact-target', 'true');
            
            found++;
            console.log(`✅ تم تطبيق اللون على العنصر ${index + 1}`);
        });
        
        // طريقة 2: البحث في جميع العناصر
        const allElements = document.querySelectorAll('*');
        allElements.forEach(element => {
            if (element.className && element.className.includes('fi-ta-header-toolbar')) {
                element.style.setProperty('background-color', '#dc2175', 'important');
                element.style.setProperty('background', '#dc2175', 'important');
                element.style.setProperty('color', 'white', 'important');
                element.setAttribute('data-exact-target', 'true');
                found++;
            }
        });
        
        // طريقة 3: البحث بالكلاس الكامل
        const fullClassElements = document.querySelectorAll('[class*="fi-ta-header-toolbar"][class*="flex"][class*="items-center"][class*="justify-between"][class*="gap-x-4"][class*="px-4"][class*="py-3"]');
        console.log("🔍 وجدت", fullClassElements.length, "عنصر مع الكلاس الكامل");
        
        fullClassElements.forEach((element, index) => {
            console.log(`📋 العنصر الكامل ${index + 1}:`, element.className);
            
            element.style.setProperty('background-color', '#dc2175', 'important');
            element.style.setProperty('background', '#dc2175', 'important');
            element.style.setProperty('color', 'white', 'important');
            element.setAttribute('data-exact-target', 'true');
            
            found++;
            console.log(`✅ تم تطبيق اللون على العنصر الكامل ${index + 1}`);
        });
        
        console.log(`🎯 تم العثور على وتطبيق اللون على ${found} عنصر`);
        return found;
    }

    function addExactCSS() {
        const style = document.createElement('style');
        style.id = 'exact-target-override';
        style.innerHTML = `
            /* الكلاس الفعلي المكتشف */
            .fi-ta-header-toolbar.flex.items-center.justify-between.gap-x-4.px-4.py-3.sm\\:px-6 {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
            
            .fi-ta-header-toolbar {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
            
            .fi-ta-header-toolbar.flex {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
            
            .fi-ta-header-toolbar.flex.items-center {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
            
            .fi-ta-header-toolbar.flex.items-center.justify-between {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
            
            [data-exact-target="true"] {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
        `;
        
        // إزالة الستايل القديم إن وجد
        const oldStyle = document.getElementById('exact-target-override');
        if (oldStyle) {
            oldStyle.remove();
        }
        
        document.head.appendChild(style);
        console.log('🎯 تم إضافة CSS للكلاس الفعلي');
    }

    // تشغيل فوري
    addExactCSS();
    targetExactClass();

    // تشغيل عند تحميل الصفحة
    document.addEventListener('DOMContentLoaded', () => {
        console.log('📄 DOM محمل - تطبيق الكلاس الفعلي');
        addExactCSS();
        setTimeout(() => {
            targetExactClass();
        }, 100);
    });

    // تشغيل عند تحميل النافذة
    window.addEventListener('load', () => {
        console.log('🌐 النافذة محملة - تطبيق الكلاس الفعلي');
        addExactCSS();
        setTimeout(() => {
            targetExactClass();
        }, 500);
    });

    // مراقب DOM
    const observer = new MutationObserver((mutations) => {
        let shouldRun = false;
        
        mutations.forEach(mutation => {
            if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                mutation.addedNodes.forEach(node => {
                    if (node.nodeType === Node.ELEMENT_NODE && node.className && node.className.includes('fi-ta-header-toolbar')) {
                        shouldRun = true;
                    }
                });
            }
        });
        
        if (shouldRun) {
            setTimeout(() => {
                addExactCSS();
                targetExactClass();
            }, 50);
        }
    });

    observer.observe(document.body || document.documentElement, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeFilter: ['class']
    });

    // تشغيل دوري كل ثانية
    setInterval(() => {
        const found = targetExactClass();
        if (found > 0) {
            console.log(`🔄 تشغيل دوري: معالجة ${found} عنصر`);
        }
    }, 1000);

    // تشغيل عند تفاعل المستخدم
    ['click', 'scroll', 'keydown'].forEach(event => {
        document.addEventListener(event, () => {
            setTimeout(() => {
                targetExactClass();
            }, 100);
        });
    });

    console.log("🎯 استهداف الكلاس الفعلي جاهز!");

})();
