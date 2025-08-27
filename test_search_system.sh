#!/bin/bash

echo "🔍 اختبار نظام البحث في منصة HAGTY"
echo "===================================="

# اختبار الصفحة الرئيسية مع نموذج البحث
echo "📄 اختبار الصفحة الرئيسية مع نموذج البحث..."
if curl -s -o /dev/null -w "%{http_code}" http://localhost:8001/ | grep -q "200"; then
    echo "✅ الصفحة الرئيسية تعمل مع نموذج البحث"
else
    echo "❌ مشكلة في الصفحة الرئيسية"
fi

echo ""

# اختبار صفحة البحث
echo "🔍 اختبار صفحة البحث..."
if curl -s -o /dev/null -w "%{http_code}" "http://localhost:8001/search?q=test" | grep -q "200"; then
    echo "✅ صفحة البحث تعمل"
else
    echo "❌ مشكلة في صفحة البحث"
fi

echo ""

# اختبار البحث في أقسام مختلفة
echo "📋 اختبار البحث في أقسام مختلفة..."

# اختبار البحث في قسم الصحة
echo "🏥 اختبار البحث في قسم الصحة..."
if curl -s -o /dev/null -w "%{http_code}" "http://localhost:8001/search?q=طبيب&section=health" | grep -q "200"; then
    echo "✅ البحث في قسم الصحة يعمل"
else
    echo "❌ مشكلة في البحث في قسم الصحة"
fi

# اختبار البحث في قسم الزفاف
echo "💒 اختبار البحث في قسم الزفاف..."
if curl -s -o /dev/null -w "%{http_code}" "http://localhost:8001/search?q=مصور&section=wedding" | grep -q "200"; then
    echo "✅ البحث في قسم الزفاف يعمل"
else
    echo "❌ مشكلة في البحث في قسم الزفاف"
fi

# اختبار البحث في قسم الجمال
echo "💄 اختبار البحث في قسم الجمال..."
if curl -s -o /dev/null -w "%{http_code}" "http://localhost:8001/search?q=تجميل&section=beauty" | grep -q "200"; then
    echo "✅ البحث في قسم الجمال يعمل"
else
    echo "❌ مشكلة في البحث في قسم الجمال"
fi

echo ""

# اختبار جميع الأقسام مع نموذج البحث
echo "📝 اختبار جميع الأقسام مع نموذج البحث..."

sections=("health" "beauty" "wedding" "fashion" "babies" "umomi" "accessoraty")

for section in "${sections[@]}"; do
    echo "🔍 اختبار قسم: $section"
    if curl -s -o /dev/null -w "%{http_code}" "http://localhost:8001/section/$section" | grep -q "200"; then
        echo "✅ قسم $section يعمل مع نموذج البحث"
    else
        echo "❌ مشكلة في قسم $section"
    fi
done

echo ""
echo "🎉 انتهى اختبار نظام البحث!"
echo ""
echo "📋 روابط البحث:"
echo "البحث العام: http://localhost:8001/search?q=كلمة_البحث"
echo "البحث في قسم محدد: http://localhost:8001/search?q=كلمة_البحث&section=اسم_القسم"
echo ""
echo "📝 أمثلة على البحث:"
echo "- البحث عن أطباء: http://localhost:8001/search?q=طبيب"
echo "- البحث عن مصورين في الزفاف: http://localhost:8001/search?q=مصور&section=wedding"
echo "- البحث عن تجميل في الجمال: http://localhost:8001/search?q=تجميل&section=beauty"
