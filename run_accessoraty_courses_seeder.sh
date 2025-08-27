#!/bin/bash

# سكريبت تشغيل seeder الكورسات التعليمية في أكسسوراتى
# Script to run Accessoraty Courses Seeder

echo "🚀 بدء تشغيل seeder الكورسات التعليمية في أكسسوراتى..."
echo "Starting Accessoraty Courses Seeder..."

# التحقق من وجود Laravel
if [ ! -f "artisan" ]; then
    echo "❌ خطأ: لا يوجد ملف artisan. تأكد من أنك في مجلد Laravel الصحيح"
    echo "Error: artisan file not found. Make sure you're in the correct Laravel directory"
    exit 1
fi

# التحقق من وجود قاعدة البيانات
echo "🔍 التحقق من اتصال قاعدة البيانات..."
echo "Checking database connection..."
php artisan migrate:status > /dev/null 2>&1

if [ $? -ne 0 ]; then
    echo "❌ خطأ: لا يمكن الاتصال بقاعدة البيانات"
    echo "Error: Cannot connect to database"
    exit 1
fi

echo "✅ تم الاتصال بقاعدة البيانات بنجاح"
echo "Database connection successful"

# تشغيل الـ seeder
echo "📚 تشغيل AccessoratyCoursesSeeder..."
echo "Running AccessoratyCoursesSeeder..."

php artisan db:seed --class=AccessoratyCoursesSeeder

if [ $? -eq 0 ]; then
    echo ""
    echo "🎉 تم تشغيل seeder الكورسات التعليمية بنجاح!"
    echo "Accessoraty Courses Seeder completed successfully!"
    echo ""
    echo "📊 البيانات المضافة:"
    echo "Added data:"
    echo "  - 5 كورسات تعليمية (5 Educational Courses)"
    echo "  - 10 طلاب (10 Students)"
    echo "  - محتوى الكورسات (Course Contents)"
    echo "  - سجلات الحضور (Attendance Records)"
    echo "  - الامتحانات والنتائج (Exams & Results)"
    echo "  - الشهادات (Certificates)"
    echo ""
    echo "🎯 تم الانتهاء! قسم أكسسوراتى مليء بالبيانات 🚀"
    echo "Done! Accessoraty section is now populated with data 🚀"
else
    echo ""
    echo "❌ حدث خطأ أثناء تشغيل الـ seeder"
    echo "Error occurred while running the seeder"
    exit 1
fi
