(function() {
    'use strict';
    console.log('nuclear-color-force loaded');
    // أقوى سكريبت لتلوين شريط الأدوات الوردي
    const targetSelector = '.fi-ta-header-toolbar';
    const colorToApply = '#dc2175';
    const colorToApplyRgb = 'rgb(220, 33, 117)';

    const applyStyles = (element) => {
        const computedStyle = window.getComputedStyle(element);
        if (computedStyle.backgroundColor !== colorToApplyRgb) {
            element.style.setProperty('background-color', colorToApply, 'important');
            element.style.setProperty('background', colorToApply, 'important');
            element.style.setProperty('color', 'white', 'important');
        }
    };

    const findAndStyle = () => {
        try {
            const element = document.querySelector(targetSelector);
            if (element) {
                applyStyles(element);
            }
        } catch (e) {
            console.error("Error during findAndStyle:", e);
        }
    };

    // مراقبة DOM
    const observer = new MutationObserver(() => {
        findAndStyle();
    });
    observer.observe(document.body, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeFilter: ['class', 'style']
    });

    // فحص دوري
    setInterval(findAndStyle, 1000);

    // عند تحميل الصفحة
    if (document.readyState === 'complete') {
        findAndStyle();
    } else {
        document.addEventListener('DOMContentLoaded', findAndStyle);
    }
})();
