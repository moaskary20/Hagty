#!/bin/bash

# Script لتشغيل ComprehensiveDataSeeder
# منصة HAGTY - إضافة بيانات شاملة لجميع الأقسام

echo "🚀 بدء تشغيل ComprehensiveDataSeeder..."
echo "=================================="

# التحقق من وجود المشروع
if [ ! -f "artisan" ]; then
    echo "❌ خطأ: يجب تشغيل هذا الـ script من مجلد المشروع"
    echo "انتقل إلى مجلد المشروع أولاً: cd /var/www/Hagty"
    exit 1
fi

# التحقق من وجود قاعدة البيانات
echo "🔍 التحقق من قاعدة البيانات..."

# تحديث autoload
echo "📦 تحديث autoload..."
composer dump-autoload

# تشغيل الـ seeder
echo "🌱 تشغيل ComprehensiveDataSeeder..."
php artisan db:seed --class=ComprehensiveDataSeeder

# التحقق من النتيجة
if [ $? -eq 0 ]; then
    echo "✅ تم تشغيل الـ seeder بنجاح!"
    echo ""
    echo "🎉 البيانات المضافة:"
    echo "   💄 قسم جمالي - صيحات الموضة ونصائح التجميل"
    echo "   🎉 قسم فرحي - مشغلو الدي جي وباقاتهم"
    echo "   ✈️ قسم رحلتي - عروض السفر والفنادق"
    echo "   🤱 قسم أومومتي - نصائح الأمومة والتربية"
    echo "   👨‍👩‍👧‍👦 قسم عائلتي - النصائح والأنشطة العائلية"
    echo ""
    echo "🌐 يمكنك الآن زيارة لوحة التحكم: /admin"
    echo "📱 أو تصفح الأقسام المختلفة في التطبيق"
else
    echo "❌ حدث خطأ أثناء تشغيل الـ seeder"
    echo "🔍 تحقق من السجلات: tail -f storage/logs/laravel.log"
    exit 1
fi

echo ""
echo "🎯 تم الانتهاء! منصة HAGTY جاهزة للاستخدام 🚀"
