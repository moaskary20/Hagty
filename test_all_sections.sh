#!/bin/bash

echo "🔍 اختبار جميع أقسام منصة HAGTY"
echo "=================================="

# تعريف الأقسام
sections=("health" "beauty" "wedding" "fashion" "babies" "umomi" "accessoraty")

# اختبار الصفحة الرئيسية
echo "📄 اختبار الصفحة الرئيسية..."
if curl -s -o /dev/null -w "%{http_code}" http://localhost:8001/ | grep -q "200"; then
    echo "✅ الصفحة الرئيسية تعمل بشكل صحيح"
else
    echo "❌ مشكلة في الصفحة الرئيسية"
fi

echo ""

# اختبار جميع الأقسام
for section in "${sections[@]}"; do
    echo "🔍 اختبار قسم: $section"
    if curl -s -o /dev/null -w "%{http_code}" http://localhost:8001/section/$section | grep -q "200"; then
        echo "✅ قسم $section يعمل بشكل صحيح"
    else
        echo "❌ مشكلة في قسم $section"
    fi
done

echo ""
echo "🎉 انتهى اختبار جميع الأقسام!"
echo ""
echo "📋 روابط الأقسام:"
echo "الصفحة الرئيسية: http://localhost:8001/"
for section in "${sections[@]}"; do
    echo "قسم $section: http://localhost:8001/section/$section"
done
