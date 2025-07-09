(function() {
    'use strict';
    const targetSelector = '.fi-ta-header-toolbar';
    const colorToApply = '#dc2175';
    const colorToApplyRgb = 'rgb(220, 33, 117)';
    const applyStyles = (element) => {
        element.style.setProperty('background-color', colorToApply, 'important');
        element.style.setProperty('background', colorToApply, 'important');
        element.style.setProperty('color', 'white', 'important');
        element.style.setProperty('font-family', "'Noto Sans Arabic', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif", 'important');
    };
    const findAndStyle = () => {
        const element = document.querySelector(targetSelector);
        if (element) applyStyles(element);
    };
    new MutationObserver(findAndStyle).observe(document.body, {childList: true, subtree: true, attributes: true});
    setInterval(findAndStyle, 1000);
    if (document.readyState === 'complete') findAndStyle();
    else document.addEventListener('DOMContentLoaded', findAndStyle);
})();
