# خطة توحيد تصميم الصفحات

## الصفحات المطلوب تحويلها:

### الصفحات البسيطة (تم تحويلها ✅):
1. ✅ hotels.blade.php
2. ✅ tourism-offices.blade.php  
3. ✅ promo-videos.blade.php
4. ✅ calendar.blade.php (bazzaraty)
5. ✅ travel-offers.blade.php
6. ✅ women-camps.blade.php
7. ✅ welcome-baby.blade.php

### الصفحات المعقدة (يحتاج تحويل):
1. ⏳ wedding-gift-suppliers.blade.php
2. ⏳ wedding-dress-designers.blade.php
3. ⏳ doctor-follow-up.blade.php
4. ⏳ week-by-week-care.blade.php
5. ⏳ how-to-be-mom.blade.php
6. ⏳ be-ready-to-welcome.blade.php

## القواعد الموحدة:
- استخدام `<x-filament::page>` بدلاً من `<x-filament-panels::page>`
- استخدام `fi-card` بدلاً من divs مخصصة
- استخدام `fi-btn` و `fi-input` و `fi-label` للعناصر
- إزالة الألوان الداكنة (#1a1a1a, #2a2a2a, #23232b)
- استخدام ألوان Filament الافتراضية مع خلفية #F5F4F4 للصفحات
- استخدام حدود #E6A0C4 للبطاقات والعناصر
- استخدام hover #E6A0C4 للأزرار

## المرحلة التالية:
- تحويل الصفحات المعقدة بشكل تدريجي
- الحفاظ على الوظائف الموجودة
- تبسيط التصميم مع الحفاظ على المحتوى

