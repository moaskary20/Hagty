// Admin Sidebar Remove White Bar - إزالة الشريط الأبيض نهائياً

document.addEventListener('DOMContentLoaded', function() {
    // إزالة الشريط الأبيض من العناصر النشطة
    function removeWhiteBar() {
        // البحث عن جميع العناصر النشطة
        const activeElements = document.querySelectorAll('.fi-sidebar-nav-item.fi-active, .fi-sidebar-nav-item[aria-current="page"], .fi-sidebar-nav-item.active');
        
        activeElements.forEach(element => {
            // إزالة جميع الحدود والخطوط
            element.style.background = '#E6DAC8';
            element.style.backgroundColor = '#E6DAC8';
            element.style.color = '#A15DBF';
            element.style.border = 'none';
            element.style.borderLeft = 'none';
            element.style.borderRight = 'none';
            element.style.borderTop = 'none';
            element.style.borderBottom = 'none';
            element.style.outline = 'none';
            element.style.boxShadow = '0 4px 15px rgba(230, 218, 200, 0.3)';
            
            // إزالة الحدود من العناصر الفرعية
            const childElements = element.querySelectorAll('*');
            childElements.forEach(child => {
                child.style.background = 'transparent';
                child.style.backgroundColor = 'transparent';
                child.style.border = 'none';
                child.style.outline = 'none';
                child.style.color = '#A15DBF';
            });
        });
    }
    
    // تشغيل الوظيفة عند التحميل
    removeWhiteBar();
    
    // تشغيل الوظيفة كل 100ms للتأكد
    setInterval(removeWhiteBar, 100);
    
    // تشغيل الوظيفة عند تغيير الصفحة
    window.addEventListener('popstate', removeWhiteBar);
    
    // تشغيل الوظيفة عند النقر
    document.addEventListener('click', function() {
        setTimeout(removeWhiteBar, 50);
    });
});
