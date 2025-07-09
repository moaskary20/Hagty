<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- CSS فوري -->
    <style id="force-toolbar-override">
        * {
            color: white !important;
            font-family: 'Noto Sans Arabic', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
            direction: rtl !important;
        }
        
        /* الكلاس الفعلي المكتشف */
        .fi-ta-header-toolbar.flex.items-center.justify-between.gap-x-4.px-4.py-3.sm\:px-6 {
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
        
        *[class*="toolbar"]:not([class*="sidebar"]):not([class*="topbar"]) {
            background-color: #dc2175 !important;
            background: #dc2175 !important;
            color: white !important;
        }
        
        *[class*="header"]:not([class*="sidebar"]):not([class*="topbar"]) {
            background-color: #dc2175 !important;
            background: #dc2175 !important;
            color: white !important;
        }
        
        *[class*="fi-ta-header"] {
            background-color: #dc2175 !important;
            background: #dc2175 !important;
            color: white !important;
        }
        
        *[class*="fi-ta-toolbar"] {
            background-color: #dc2175 !important;
            background: #dc2175 !important;
            color: white !important;
        }
        
        *[class*="fi-ta-header-toolbar"] {
            background-color: #dc2175 !important;
            background: #dc2175 !important;
            color: white !important;
        }
        
        div[class*="flex"][class*="items-center"]:not([class*="sidebar"]) {
            background-color: #dc2175 !important;
            background: #dc2175 !important;
            color: white !important;
        }
        
        div[class*="justify-between"]:not([class*="sidebar"]) {
            background-color: #dc2175 !important;
            background: #dc2175 !important;
            color: white !important;
        }
        
        div[class*="gap-x-4"]:not([class*="sidebar"]) {
            background-color: #dc2175 !important;
            background: #dc2175 !important;
            color: white !important;
        }
        
        div[class*="px-4"]:not([class*="sidebar"]) {
            background-color: #dc2175 !important;
            background: #dc2175 !important;
            color: white !important;
        }
        
        div[class*="py-3"]:not([class*="sidebar"]) {
            background-color: #dc2175 !important;
            background: #dc2175 !important;
            color: white !important;
        }
        
        /* النصوص الرمادية */
        .text-gray-700, .text-gray-950, .text-gray-600, .text-gray-800, .text-gray-900 {
            color: white !important;
        }
    </style>
    
    <!-- JavaScript فوري -->
    <script>
        console.log("🔥 بدء تشغيل الحل المباشر من Template...");
        
        // دالة لتطبيق الألوان مباشرة
        function applyDirectColors() {
            console.log("🎯 تطبيق الألوان مباشرة...");
            
            let found = 0;
            
            // البحث عن العناصر المختلفة
            const selectors = [
                ".fi-ta-header-toolbar",
                "[class*=\"fi-ta-header-toolbar\"]",
                "[class*=\"toolbar\"]",
                "[class*=\"header\"]",
                "[class*=\"fi-ta-header\"]",
                "[class*=\"fi-ta-toolbar\"]",
                "div[class*=\"flex\"][class*=\"items-center\"]",
                "div[class*=\"justify-between\"]",
                "div[class*=\"gap-x-4\"]",
                "div[class*=\"px-4\"]",
                "div[class*=\"py-3\"]"
            ];
            
            selectors.forEach(selector => {
                try {
                    const elements = document.querySelectorAll(selector);
                    elements.forEach(element => {
                        const className = element.className || "";
                        
                        // تجاهل العناصر الجانبية
                        if (!className.includes("sidebar") && !className.includes("topbar") && !className.includes("fi-sidebar")) {
                            // تطبيق الألوان بطرق متعددة
                            element.style.cssText += "; background-color: #dc2175 !important; background: #dc2175 !important; color: white !important;";
                            element.style.setProperty("background-color", "#dc2175", "important");
                            element.style.setProperty("background", "#dc2175", "important");
                            element.style.setProperty("color", "white", "important");
                            
                            // إضافة attribute
                            element.setAttribute("data-force-applied", "true");
                            
                            found++;
                            console.log(`✅ تم تطبيق اللون على: ${selector} ->`, element.className);
                        }
                    });
                } catch(e) {
                    console.warn(`خطأ في selector ${selector}:`, e);
                }
            });
            
            console.log(`🎯 تم تطبيق الألوان على ${found} عنصر`);
            return found;
        }
        
        // تطبيق فوري
        applyDirectColors();
        
        // تطبيق عند تحميل DOM
        document.addEventListener("DOMContentLoaded", () => {
            console.log("📄 DOM محمل - تطبيق الألوان");
            setTimeout(() => {
                applyDirectColors();
            }, 100);
        });
        
        // تطبيق عند تحميل النافذة
        window.addEventListener("load", () => {
            console.log("🌐 النافذة محملة - تطبيق الألوان");
            setTimeout(() => {
                applyDirectColors();
            }, 500);
        });
        
        // تطبيق دوري كل ثانية
        setInterval(() => {
            const found = applyDirectColors();
            if (found > 0) {
                console.log(`🔄 تطبيق دوري: معالجة ${found} عنصر`);
            }
        }, 1000);
        
        console.log("🔥 الحل المباشر من Template جاهز!");
    </script>
    <script src="/js/nuclear-color-force.js"></script>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
</html>
