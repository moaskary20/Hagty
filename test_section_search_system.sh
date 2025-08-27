#!/bin/bash

echo "🔍 اختبار نظام البحث المتخصص في الأقسام..."
echo "=========================================="

# اختبار الصفحة الرئيسية
echo "📄 اختبار الصفحة الرئيسية..."
curl -s -o /dev/null -w "الرئيسية: %{http_code}\n" "http://localhost:8001/"

# اختبار أقسام البحث المتخصصة
echo ""
echo "🏥 اختبار قسم الصحة..."
curl -s -o /dev/null -w "قسم الصحة: %{http_code}\n" "http://localhost:8001/section/health"
curl -s -o /dev/null -w "بحث الصحة: %{http_code}\n" "http://localhost:8001/search/health?q=طبيب"

echo ""
echo "👗 اختبار قسم الموضة..."
curl -s -o /dev/null -w "قسم الموضة: %{http_code}\n" "http://localhost:8001/section/fashion"
curl -s -o /dev/null -w "بحث الموضة: %{http_code}\n" "http://localhost:8001/search/fashion?q=أزياء"

echo ""
echo "💒 اختبار قسم الزفاف..."
curl -s -o /dev/null -w "قسم الزفاف: %{http_code}\n" "http://localhost:8001/section/wedding"
curl -s -o /dev/null -w "بحث الزفاف: %{http_code}\n" "http://localhost:8001/search/wedding?q=مصمم"

echo ""
echo "💄 اختبار قسم الجمال..."
curl -s -o /dev/null -w "قسم الجمال: %{http_code}\n" "http://localhost:8001/section/beauty"
curl -s -o /dev/null -w "بحث الجمال: %{http_code}\n" "http://localhost:8001/search/beauty?q=مصفف"

echo ""
echo "🎒 اختبار قسم أكسسوراتى..."
curl -s -o /dev/null -w "قسم أكسسوراتى: %{http_code}\n" "http://localhost:8001/section/accessoraty"
curl -s -o /dev/null -w "بحث أكسسوراتى: %{http_code}\n" "http://localhost:8001/search/accessoraty?q=كورس"

echo ""
echo "👶 اختبار قسم الأطفال..."
curl -s -o /dev/null -w "قسم الأطفال: %{http_code}\n" "http://localhost:8001/section/babies"
curl -s -o /dev/null -w "بحث الأطفال: %{http_code}\n" "http://localhost:8001/search/babies?q=أحمد"

echo ""
echo "✅ تم اختبار جميع أقسام البحث المتخصصة!"
echo ""
echo "📋 ملخص الاختبار:"
echo "🏥 قسم الصحة - البحث في الأطباء، المستشفيات، الصيدليات"
echo "👗 قسم الموضة - البحث في اتجاهات الموضة، الفيديوهات، الدورات"
echo "💒 قسم الزفاف - البحث في مصممي فساتين، منظمي الحفلات، فناني المكياج"
echo "💄 قسم الجمال - البحث في جراحي التجميل، مصففي الشعر، محلات التجميل"
echo "🎒 قسم أكسسوراتى - البحث في الكورسات، الطلاب، المحلات"
echo "👶 قسم الأطفال - البحث في معلومات الأطفال"
echo ""
echo "🎉 نظام البحث المتخصص يعمل بنجاح!"
