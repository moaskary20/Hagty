// ==UserScript==
// @name         Custom User Page Styles
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  تغيير لون النص وإضافة خط مخصص في صفحة المستخدمين فقط
// @author       You
// @match        *://yourdomain.com/admin/users*
// @grant        none
// ==/UserScript==

(function() {
    'use strict';

    // تطبيق لون خلفية شريط أدوات الجدول
    function applyHeaderToolbarStyles() {
        const selectors = [
            '.fi-ta-header-toolbar',
            '[class*="fi-ta-header-toolbar"]',
            'div[class*="header-toolbar"]',
            '.fi-ta-header-toolbar.flex',
            '.fi-ta-header-toolbar.flex.items-center',
            '.fi-ta-header-toolbar.flex.items-center.justify-between',
            '.fi-ta-header-toolbar.flex.items-center.justify-between.gap-x-4',
            '.fi-ta-header-toolbar.flex.items-center.justify-between.gap-x-4.px-4',
            '.fi-ta-header-toolbar.flex.items-center.justify-between.gap-x-4.px-4.py-3',
            '.fi-ta-header-toolbar.flex.items-center.justify-between.gap-x-4.px-4.py-3.sm\\:px-6'
        ];
        
        selectors.forEach(selector => {
            const elements = document.querySelectorAll(selector);
            elements.forEach(function(el) {
                el.style.setProperty('background-color', '#dc2175', 'important');
                el.style.setProperty('background', '#dc2175', 'important');
                el.style.setProperty('color', 'white', 'important');
            });
        });
    }

    // تغيير لون نص العناصر المطلوبة في صفحة المستخدمين فقط
    function applyUserTableTextColor() {
        // استهدف كل العناصر التي تحمل الكلاسات المطلوبة
        var labels = document.querySelectorAll('.fi-ta-text-item-label.text-gray-950');
        labels.forEach(function(el) {
            // تحقق أنك في صفحة المستخدمين فقط
            if (window.location.pathname.includes('/admin/users')) {
                el.style.setProperty('color', '#fff', 'important');
                el.style.setProperty('--tw-text-opacity', '1', 'important');
            }
        });
    }

    // إضافة تحكم ديناميكي في الخط لعناصر الصفحة في صفحة المستخدمين فقط
    function applyFontFamilyForUsersPage() {
        if (!window.location.pathname.includes('/admin/users')) return;
        var html = document.documentElement;
        if (html.getAttribute('dir') === 'rtl') {
            var styleId = 'users-font-family-override';
            if (!document.getElementById(styleId)) {
                var style = document.createElement('style');
                style.id = styleId;
                style.innerHTML = 'html[dir="rtl"] * { font-family: \'Noto Sans Arabic\', \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif !important; }';
                document.head.appendChild(style);
            }
        }
    }

    // إضافة كود جافاسكريبت يحقن ستايل الخط مباشرة داخل صفحة المستخدمين عند كل تحميل أو تحديث ديناميكي
    (function() {
        function injectFontStyleForUsersPage() {
            if (!window.location.pathname.includes('/admin/users')) return;
            var styleId = 'users-font-family-override-direct';
            if (!document.getElementById(styleId)) {
                var style = document.createElement('style');
                style.id = styleId;
                style.innerHTML = '* { font-family: \'Noto Sans Arabic\', \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif !important; }';
                document.body.appendChild(style);
            }
        }
        document.addEventListener('DOMContentLoaded', injectFontStyleForUsersPage);
        var observer = new MutationObserver(injectFontStyleForUsersPage);
        observer.observe(document.body, { childList: true, subtree: true });
    })();

    // إصلاح لون شريط الأدوات
    (function() {
        function fixToolbarColor() {
            if (!window.location.pathname.includes('/admin/users')) return;
            document.querySelectorAll('.fi-ta-header-toolbar').forEach(function(el) {
                el.style.setProperty('background', '#dc2175', 'important');
                el.style.setProperty('background-color', '#dc2175', 'important');
                el.style.setProperty('color', '#fff', 'important');
                el.style.setProperty('border-color', '#ed4496', 'important');
            });
        }
        document.addEventListener('DOMContentLoaded', fixToolbarColor);
        new MutationObserver(fixToolbarColor).observe(document.body, { childList: true, subtree: true });
    })();

    // تطبيق خط Noto Sans Arabic بقوة على جميع العناصر
    (function() {
        function applyArabicFont() {
            var style = document.getElementById('arabic-font-override');
            if (!style) {
                style = document.createElement('style');
                style.id = 'arabic-font-override';
                style.innerHTML = 'html[dir="rtl"] * { font-family: "Noto Sans Arabic", "Segoe UI", Tahoma, Geneva, Verdana, sans-serif !important; }';
                document.head.appendChild(style);
            }
            // تطبيق الخط مباشرة على كل العناصر أيضاً
            if (document.documentElement.getAttribute('dir') === 'rtl') {
                document.querySelectorAll('*').forEach(function(el) {
                    el.style.setProperty('font-family', '"Noto Sans Arabic", "Segoe UI", Tahoma, Geneva, Verdana, sans-serif', 'important');
                });
            }
        }
        document.addEventListener('DOMContentLoaded', applyArabicFont);
        new MutationObserver(applyArabicFont).observe(document.body, { childList: true, subtree: true });
    })();

    // نفذ عند تحميل الصفحة
    document.addEventListener('DOMContentLoaded', function() {
        applyUserTableTextColor();
        applyFontFamilyForUsersPage();
        applyHeaderToolbarStyles();
    });

    // راقب أي تغييرات ديناميكية (Livewire/Filament)
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                applyUserTableTextColor();
                applyFontFamilyForUsersPage();
                applyHeaderToolbarStyles();
            }
        });
    });
    observer.observe(document.body, { childList: true, subtree: true });
})();
