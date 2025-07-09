// سكريبت القوة الكاملة لفرض التخصيصات
(function() {
    'use strict';
    
    console.log('🔥 بدء تطبيق القوة الكاملة للتخصيصات...');
    
    // فرض التخصيصات بقوة
    function forceStyles() {
        const style = document.createElement('style');
        style.id = 'force-nuclear-styles';
        style.innerHTML = `
            /* القوة النووية الكاملة */
            * {
                color: white !important;
                font-family: 'Noto Sans Arabic', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
                direction: rtl !important;
            }
            
            /* استهداف كل شيء قد يكون شريط أدوات */
            *[class*="toolbar"],
            *[class*="header"],
            *[class*="fi-ta-header"],
            *[class*="fi-ta-toolbar"],
            *[class*="fi-ta-header-toolbar"],
            div[class*="flex"][class*="items-center"],
            div[class*="justify-between"],
            div[class*="gap-x-4"],
            div[class*="px-4"],
            div[class*="py-3"] {
                background-color: #dc2175 !important;
                background: #dc2175 !important;
                color: white !important;
            }
            
            /* فرض على كل div */
            div {
                color: white !important;
            }
            
            /* فرض على كل span */
            span {
                color: white !important;
            }
            
            /* فرض على كل p */
            p {
                color: white !important;
            }
            
            /* فرض على كل a */
            a {
                color: white !important;
            }
            
            /* فرض على كل button */
            button {
                color: white !important;
            }
            
            /* فرض على كل input */
            input {
                color: white !important;
            }
            
            /* فرض على كل label */
            label {
                color: white !important;
            }
            
            /* فرض على كل th */
            th {
                color: white !important;
            }
            
            /* فرض على كل td */
            td {
                color: white !important;
            }
            
            /* فرض على كل svg */
            svg {
                color: white !important;
                fill: white !important;
            }
            
            /* فرض على كل path */
            path {
                color: white !important;
                fill: white !important;
            }
            
            /* فرض على كل icon */
            i {
                color: white !important;
            }
            
            /* فرض على كل h1-h6 */
            h1, h2, h3, h4, h5, h6 {
                color: white !important;
            }
            
            /* فرض على كل li */
            li {
                color: white !important;
            }
            
            /* فرض على كل ul */
            ul {
                color: white !important;
            }
            
            /* فرض على كل ol */
            ol {
                color: white !important;
            }
            
            /* فرض على كل strong */
            strong {
                color: white !important;
            }
            
            /* فرض على كل em */
            em {
                color: white !important;
            }
            
            /* فرض على كل small */
            small {
                color: white !important;
            }
            
            /* فرض على كل code */
            code {
                color: white !important;
            }
            
            /* فرض على كل pre */
            pre {
                color: white !important;
            }
            
            /* فرض على كل blockquote */
            blockquote {
                color: white !important;
            }
            
            /* فرض على كل time */
            time {
                color: white !important;
            }
            
            /* فرض على كل address */
            address {
                color: white !important;
            }
            
            /* فرض على كل mark */
            mark {
                color: white !important;
            }
            
            /* فرض على كل del */
            del {
                color: white !important;
            }
            
            /* فرض على كل ins */
            ins {
                color: white !important;
            }
            
            /* فرض على كل sub */
            sub {
                color: white !important;
            }
            
            /* فرض على كل sup */
            sup {
                color: white !important;
            }
            
            /* فرض على كل dd */
            dd {
                color: white !important;
            }
            
            /* فرض على كل dt */
            dt {
                color: white !important;
            }
            
            /* فرض على كل dl */
            dl {
                color: white !important;
            }
            
            /* فرض على كل figure */
            figure {
                color: white !important;
            }
            
            /* فرض على كل figcaption */
            figcaption {
                color: white !important;
            }
            
            /* فرض على كل main */
            main {
                color: white !important;
            }
            
            /* فرض على كل section */
            section {
                color: white !important;
            }
            
            /* فرض على كل article */
            article {
                color: white !important;
            }
            
            /* فرض على كل aside */
            aside {
                color: white !important;
            }
            
            /* فرض على كل footer */
            footer {
                color: white !important;
            }
            
            /* فرض على كل header */
            header {
                color: white !important;
            }
            
            /* فرض على كل nav */
            nav {
                color: white !important;
            }
            
            /* فرض على كل select */
            select {
                color: white !important;
            }
            
            /* فرض على كل textarea */
            textarea {
                color: white !important;
            }
            
            /* فرض على كل option */
            option {
                color: white !important;
            }
            
            /* فرض على كل optgroup */
            optgroup {
                color: white !important;
            }
            
            /* فرض على كل fieldset */
            fieldset {
                color: white !important;
            }
            
            /* فرض على كل legend */
            legend {
                color: white !important;
            }
            
            /* فرض على كل table */
            table {
                color: white !important;
            }
            
            /* فرض على كل thead */
            thead {
                color: white !important;
            }
            
            /* فرض على كل tbody */
            tbody {
                color: white !important;
            }
            
            /* فرض على كل tfoot */
            tfoot {
                color: white !important;
            }
            
            /* فرض على كل tr */
            tr {
                color: white !important;
            }
            
            /* فرض على كل caption */
            caption {
                color: white !important;
            }
            
            /* فرض على كل colgroup */
            colgroup {
                color: white !important;
            }
            
            /* فرض على كل col */
            col {
                color: white !important;
            }
        `;
        
        // إزالة الـ style القديم إذا وجد
        const oldStyle = document.getElementById('force-nuclear-styles');
        if (oldStyle) {
            oldStyle.remove();
        }
        
        // إضافة الـ style الجديد
        document.head.appendChild(style);
        
        console.log('✅ تم تطبيق التخصيصات النووية');
    }
    
    // تطبيق التخصيصات بقوة عبر inline styles
    function forceInlineStyles() {
        console.log('🎯 بدء تطبيق التخصيصات المباشرة...');
        
        let count = 0;
        
        // تطبيق على كل العناصر
        document.querySelectorAll('*').forEach(element => {
            // تطبيق اللون الأبيض على كل عنصر
            if (element.style) {
                element.style.setProperty('color', 'white', 'important');
                element.style.setProperty('font-family', 'Noto Sans Arabic, Segoe UI, Tahoma, Geneva, Verdana, sans-serif', 'important');
                element.style.setProperty('direction', 'rtl', 'important');
                count++;
            }
            
            // إذا كان العنصر يحتوي على كلمات مشتبه بها
            const className = element.className ? element.className.toString() : '';
            if (className.includes('toolbar') || 
                className.includes('header') || 
                className.includes('fi-ta-header') ||
                className.includes('fi-ta-toolbar') ||
                className.includes('fi-ta-header-toolbar') ||
                (className.includes('flex') && className.includes('items-center')) ||
                className.includes('justify-between') ||
                className.includes('gap-x-4') ||
                className.includes('px-4') ||
                className.includes('py-3')) {
                
                element.style.setProperty('background-color', '#dc2175', 'important');
                element.style.setProperty('background', '#dc2175', 'important');
                element.style.setProperty('color', 'white', 'important');
                
                console.log('🔥 تم تطبيق اللون الوردي على:', element, 'الكلاس:', className);
            }
        });
        
        console.log(`✅ تم تطبيق التخصيصات المباشرة على ${count} عنصر`);
    }
    
    // تطبيق التخصيصات بقوة عبر CSS custom properties
    function forceCustomProperties() {
        console.log('🎨 بدء تطبيق التخصيصات المخصصة...');
        
        const root = document.documentElement;
        
        // تطبيق متغيرات CSS مخصصة
        root.style.setProperty('--force-text-color', 'white');
        root.style.setProperty('--force-bg-color', '#dc2175');
        root.style.setProperty('--force-font-family', 'Noto Sans Arabic, Segoe UI, Tahoma, Geneva, Verdana, sans-serif');
        root.style.setProperty('--force-direction', 'rtl');
        
        // تطبيق على body
        document.body.style.setProperty('color', 'white', 'important');
        document.body.style.setProperty('font-family', 'Noto Sans Arabic, Segoe UI, Tahoma, Geneva, Verdana, sans-serif', 'important');
        document.body.style.setProperty('direction', 'rtl', 'important');
        
        console.log('✅ تم تطبيق التخصيصات المخصصة');
    }
    
    // تطبيق التخصيصات عند تحميل الصفحة
    function initialize() {
        console.log('🚀 بدء تهيئة التخصيصات...');
        
        forceStyles();
        forceInlineStyles();
        forceCustomProperties();
        
        console.log('✅ تم الانتهاء من تهيئة التخصيصات');
    }
    
    // تطبيق التخصيصات فوراً
    initialize();
    
    // تطبيق التخصيصات عند تحميل الصفحة
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initialize);
    } else {
        initialize();
    }
    
    // تطبيق التخصيصات عند تحميل النافذة
    window.addEventListener('load', initialize);
    
    // تطبيق التخصيصات بشكل دوري
    setInterval(() => {
        forceInlineStyles();
        forceCustomProperties();
    }, 2000);
    
    // مراقبة تغييرات DOM
    const observer = new MutationObserver((mutations) => {
        let shouldApply = false;
        
        mutations.forEach((mutation) => {
            if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                shouldApply = true;
            }
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                shouldApply = true;
            }
        });
        
        if (shouldApply) {
            console.log('🔄 تم رصد تغييرات في DOM، إعادة تطبيق التخصيصات...');
            setTimeout(() => {
                forceInlineStyles();
                forceCustomProperties();
            }, 100);
        }
    });
    
    // بدء مراقبة DOM
    observer.observe(document.body, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeFilter: ['class', 'style']
    });
    
    console.log('🎉 تم تهيئة مراقب DOM بنجاح');
    
})();
