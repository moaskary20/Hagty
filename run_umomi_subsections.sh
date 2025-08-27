#!/bin/bash

# Script لتشغيل UmomiSubsectionsSeeder
# منصة HAGTY - إضافة بيانات للأقسام الفرعية في أومومتي

echo "🤱 بدء تشغيل UmomiSubsectionsSeeder..."
echo "=================================="

# التحقق من وجود المشروع
if [ ! -f "artisan" ]; then
    echo "❌ خطأ: يجب تشغيل هذا الـ script من مجلد المشروع"
    echo "انتقل إلى مجلد المشروع أولاً: cd /var/www/Hagty"
    exit 1
fi

# تحديث autoload
echo "📦 تحديث autoload..."
composer dump-autoload

# تشغيل الـ seeder
echo "🌱 تشغيل UmomiSubsectionsSeeder..."
php artisan db:seed --class=UmomiSubsectionsSeeder

# التحقق من النتيجة
if [ $? -eq 0 ]; then
    echo "✅ تم تشغيل الـ seeder بنجاح!"
    echo ""
    echo "🎉 البيانات المضافة للأقسام الفرعية:"
    echo "   👨‍⚕️ متابعة الطبيب - 3 أطباء أمومة مع تذكيرات وتنبيهات"
    echo "   📅 العناية أسبوعياً - 3 أسابيع مع نصائح وتحذيرات"
    echo "   🎁 استعدي لاستقبال... - مستلزمات وحقائب وقوائم"
    echo ""
    echo "🌐 يمكنك الآن زيارة لوحة التحكم: /admin"
    echo "📱 أو تصفح قسم أومومتي والأقسام الفرعية"
else
    echo "❌ حدث خطأ أثناء تشغيل الـ seeder"
    echo "🔍 تحقق من السجلات: tail -f storage/logs/laravel.log"
    exit 1
fi

echo ""
echo "🎯 تم الانتهاء! الأقسام الفرعية في أومومتي مليئة بالبيانات 🚀"
